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
    
        <form action="/admin/doroleper/{{$role->id}}" method="post" class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名</font></font>
                        </label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="text-input" name="rolename" value="{{$role->rolename}}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限名</font></font>
                        </label>
                    </div>
                    <div class="col col-md-7">
                        <div class="form-check form-check">
                            @foreach($permission as $k=>$v)
                            <label class="form-check-label ">
                                <input type="checkbox" id="inline-checkbox1" name="roleid[]" value="{{$v->id}}" class="form-check-input">{{$v->pername}}&nbsp;    
                            </label><br>
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