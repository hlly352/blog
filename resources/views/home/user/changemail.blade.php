@extends('layout.centers')
@section('title',$title)
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('index')
<!-- 获取账号登录的信息 -->
@php
    $user = DB::table('user')->where('id',session('userid'))->first();
    $info = DB::table('userinfo')->where('uid',session('userid'))->first();
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
    <div class="lev_secin set-email index"><a href="/home/changemail">修改邮箱</a></div> 
    <div class="lev_secin set-pass "><a href="/home/changepass/{{$user->id}}">修改密码</a></div>
</div>
@stop

@section('content')
<div class="setbox">
	<div class="Ftitle_all mb25">
	    <span class="titxet t18">修改邮箱</span>       
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
        <form id="art_form" action="/home/dochangemail/{{$user->id}}" method="post" enctype="multipart/form-data" class="form-horizontal">
        	<div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                    	<label for="text-input" class=" form-control-label">
                    		<font style="vertical-align: inherit;">旧邮箱:</font>
                    	</label>
                    </div>
                    <div class="col-12 col-md-7">
                    	<input type="email" value="{{$info->email}}" id="file_upload" name="oldmail" style="margin-top: 8px" disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2" style="text-align:center; line-height: 38px">
                        <label for="text-input" class=" form-control-label">
                            <font style="vertical-align: inherit;">新绑定的邮箱:</font>
                        </label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="file_upload" name="email" style="margin-top: 8px">
                    </div>
                </div>
	        <div class="card-footer">
	        	{{csrf_field()}}
	        	<input class="btn btn-outline-success" type="submit" value="激活邮箱" style="margin-left: 20px">
	        </div>
        </form>
    </div>
</div>
</div>
@stop

@section('js')

@stop