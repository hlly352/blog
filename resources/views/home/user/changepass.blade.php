@extends('layout.centers')
@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('index')
<!-- 获取账号登录的信息 -->
@php
    $user = DB::table('user')->where('id',session('uid'))->first();
    $info = DB::table('userinfo')->where('uid',session('uid'))->first();
@endphp

<div class="lev_sec">
    <div class="lev_secin face"><a href="/home/center/{{$info->id}}/edit">修改个人资料</a></div>
    @if($info)
    <div class="lev_secin face"><a href="/home/profile/{{$info->id}}">修改头像</a></div>
    @else
    <div class="lev_secin face"><a href="/home/profiles">修改头像</a></div>
    @endif
</div>
@stop

@section('change')

<div class="lev_sec">
    <!-- <div class="lev_secin set-mobile"><a href="">绑定手机</a></div>    -->
    <div class="lev_secin set-email"><a href="/home/changemail/{{$user->id}}">修改邮箱</a></div> 
    <div class="lev_secin set-pass index"><a href="/home/changepass/{{$user->id}}">修改密码</a></div>
</div>
@stop

@section('content')
<div class="setbox">
	<div class="Ftitle_all mb25">
	    <span class="titxet t18">修改密码</span>       
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
	<div class="col-lg-10">
    <div class="card">
        <form id="art_form" action="/home/dochangepass/{{$user->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        	<div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                    	<label for="text-input" class=" form-control-label">
                    		<font style="vertical-align: inherit;">旧密码:</font>
                    	</label>
                    </div>
                    <div class="col-12 col-md-7">
                    	<input type="password" id="file_upload" name="oldpass" style="margin-top: 8px">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;">新密码:</font>
                        </label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="password" id="file_upload" name="password" style="margin-top: 8px">
                        <font style="vertical-align: inherit;">请输入6-12位密码</font>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;">确认密码:</font>
                        </label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="password" id="file_upload" name="repassword" style="margin-top: 8px">
                    </div>
                </div>
	        <div class="card-footer">
	        	{{csrf_field()}}
	        	<input class="btn btn-outline-success" type="submit" value="修改" style="margin-left: 20px">
	        </div>
        </form>
    </div>
</div>
</div>
@stop

@section('js')

@stop