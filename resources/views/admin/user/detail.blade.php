@extends('layout.admins')
@section('title',$title)

@section('content')

<div class="col-lg-10">
    <div class="card">
        <div class="card-header">
        	<strong class="fa fa-plus-square"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">&nbsp;&nbsp;{{$title}}</font></font></strong>
    	</div>
    	<div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                	<input type="text" id="text-input" name="username" class="form-control" value="{{$user->username}}" disabled>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">头像</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                	<img src="{{$res->profile}}" width="100">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">真实姓名</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                	<input type="text" id="text-input" name="username" class="form-control" value="{{$res->realname}}" disabled>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">性别</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" class="form-check-input" id="inline-radio1" name="inline-radios" disabled value="0" @if($res->sex == 0) checked="checked" @endif >男&nbsp;
                        </label>
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio"  class="form-check-input" id="inline-radio2" name="inline-radios" disabled value="1" @if($res->sex == 1) checked="checked" @endif>女&nbsp;
                        </label>
                        <label for="inline-radio3" class="form-check-label ">
                            <input type="radio" class="form-check-input" id="inline-radio3" name="inline-radios" disabled value="2" @if($res->sex == 2) checked="checked" @endif>保密
                        </label>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">生日</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                	<input type="text" id="text-input" name="username" class="form-control" value="{{$res->birth}}" disabled>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">年龄</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                	<input type="text" id="text-input" name="username" class="form-control" value="{{$res->age}}" disabled>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">邮箱</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                	<input type="text" id="text-input" name="username" class="form-control" value="{{$res->email}}" disabled>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">手机号</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                	<input type="text" id="text-input" name="username" class="form-control" value="{{$res->phone}}" disabled>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-2" style="text-align:center; line-height: 38px">
                	<label for="text-input" class=" form-control-label">
                		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">地址</font></font>
                	</label>
                </div>
                <div class="col-12 col-md-7">
                	<input type="text" id="text-input" name="username" class="form-control" value="{{$res->address}}" disabled>
                </div>
            </div>
    	</div>
    </div>
</div>
@endsection