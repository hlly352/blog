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
    
        <form action="/admin/user" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font>
                        </label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="text-input" name="username" placeholder="请输入用户名" class="form-control">
                    </div>
                    <div class="col-12 col-md-3" style="line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">请输入2-10位用户名</font></font>
                        </label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="password-input" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit; ">密码</font></font></label></div>
                    <div class="col-12 col-md-7"><input type="password" id="password-input" name="password" placeholder="请输入密码" class="form-control"></div>
                    <div class="col-12 col-md-3" style="line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">请输入6-12位密码</font></font>
                        </label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="password-input" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font></label></div>
                    <div class="col-12 col-md-7"><input type="password" id="password-input" name="repassword" placeholder="请确认密码" class="form-control"></div>
                    <div class="col-12 col-md-3" style="line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">两次密码请相同</font></font>
                        </label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="select" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></label></div>
                    <div class="col-12 col-md-7">
                        <select name="status" id="select" class="form-control">

                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">开启</font></font></option>
                            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">禁用</font></font></option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px"><label for="select" class=" form-control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">level</font></font></label></div>

                    <div class="col-12 col-md-7">
                        <select name="level" id="select" class="form-control">
                            <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">普通用户</font></font></option>
                            <option value="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vip用户</font></font></option>
                            <option value="2" selected><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">普通管理员</font></font></option>
                        </select>
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