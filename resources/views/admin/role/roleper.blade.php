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
                    <div class="col col-md-9">
                        <div class="form-check form-check">
                           <!--  @foreach($permission as $k=>$v)
                            @if(in_array($v->pername, $rp))
                            <label class="form-check-label ">
                                <input type="checkbox" id="inline-checkbox1" name="perid[]" value="{{$v->id}}" checked class="form-check-input">{{$v->pername}}&nbsp;     
                            </label><br>
                            @else
                            <label class="form-check-label ">
                                <input type="checkbox" id="inline-checkbox1" name="perid[]" value="{{$v->id}}" class="form-check-input">{{$v->pername}}&nbsp; 
                            </label><br>
                            @endif
                            @endforeach -->
                            <style type="text/css">
                                #inline-checkbox1{margin-left: -0.25rem;}
                            </style>
                            <div class="col-lg-12">
                                <div class="card" style="margin-left: -80px">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            @foreach($per as $key=>$val)
                                            <tr>
                                                @foreach($val as $ks=>$vs)
                                                <td style="padding:-20px">
                                                    @if(in_array($vs[0], $rp))
                                                    <label class="form-check-label ">
                                                        <input type="checkbox" id="inline-checkbox1" name="perid[]" value="{{$vs[1]}}" checked class="form-check-input" >
                                                            &nbsp;&nbsp;&nbsp;{{$vs[0]}} 
                                                    </label>
                                                    @else
                                                    <label class="form-check-label ">
                                                        <input type="checkbox" id="inline-checkbox1" name="perid[]" value="{{$vs[1]}}" class="form-check-input">
                                                            &nbsp;&nbsp;&nbsp;{{$vs[0]}}
                                                    </label>
                                                    @endif 
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
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