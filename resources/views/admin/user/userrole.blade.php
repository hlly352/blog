@extends('layout.admins')
@section('title',$title)

@section('content')
<div class="col-lg-10">
    <div class="card">
        <div class="card-header">

            <strong class="fa fa-plus-square"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;{{$title}}</font></font></strong>
        </div>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <form action="/admin/douserrole?id={{$user->id}}" method="post" class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font>
                        </label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="text-input" name="username" value="{{$user->username}}" class="form-control" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名</font></font>
                        </label>
                    </div>
                    <div class="col col-md-7" style="margin-top: 10px">
                        <div class="form-check-inline form-check">
                            @foreach($roles as $k=>$v)
                            @if(in_array($v->rolename, $ur))
                            <label class="form-check-label ">
                                <input type="checkbox" id="inline-checkbox1" name="roleid[]" value="{{$v->id}}" checked class="form-check-input">{{$v->rolename}}&nbsp;
                            </label>
                            @else
                            <label class="form-check-label ">
                                <input type="checkbox" id="inline-checkbox1" name="roleid[]" value="{{$v->id}}" class="form-check-input">{{$v->rolename}}&nbsp;
                            </label>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{csrf_field()}}
                <input class="btn btn-outline-info" type="submit" value="提交" style="margin-left: 172px">
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    setTimeout(function(){
        $('.alert').slideUp(1000);
    },2000)
</script>

@endsection