@extends('layout.centers')
@section('title',$title)
@section('content')
<div class="setbox">
    <div class="Ftitle_all mb25">
        <span class="titxet t18">个人资料</span>                
    </div>
    <form id="userInfoForm" method="post" action="/home/center/5">
        <input name="_csrf" type="hidden" id="_csrf" value="eUw5QmZUN0kMGloUJDFoPzUUTycUFWUoKiNodFIhcz0PeFdwPwZnGw==">
        <div class="grzl_box">
            <div class="formlist t14">
                <dl class="formlist_dl clearfix">
                    <dt class="left w_110 tr">用户名：</dt>
                    <dd class="left w_325 ml10"><span>{{$user->username}}</span></dd>
                </dl>
            </div>
            <input type="hidden" name="uid" value="{{$user->id}}">
            <div class="formlist t14 validation_or">
                <dl class="formlist_dl clearfix">
                    <dt class="left w_110 tr">姓名：</dt>
                    <dd class="left w_325 ml10">
                        <span>
                             <input require="false" class="form-control" datatype="limit|ajax"  max="18" placeholder="请填写姓名，最多6个字"  msg="请填写姓名，最多6个字|请输入真实姓名" type="text"  name="realname" value="{{$res->realname}}" />
                        </span>
                    </dd>
                </dl>
                <div class="set_jy jsErrortrueName" ><span class="icon_gth"></span><em></em></div>
            </div>
            <div class="formlist t14 validation_or">
                <dl class="formlist_dl clearfix">
                    <dt class="left w_110 tr">性别：</dt>
                    <dd class="left w_325 ml10">
                        <span class="mr25 pointer_c">
                            <input name ="sex" type="radio" value="0" @if($res->sex==0) checked="checked" @endif />
                            <label for="mail" class="pl10">男</label>
                        </span>
                        <span class="mr25 pointer_c">
                            <input name ="sex" type="radio"  value="1" @if($res->sex==1) checked="checked" @endif />
                            <label for="femail" class="pl10">女</label>
                        </span>
                        <span class="mr25 pointer_c">
                            <input  name ="sex" type="radio"  value="2" @if($res->sex==2) checked="checked" @endif />
                            <label for="nomail" class="pl10">保密</label>
                        </span>
                    </dd>
                </dl>
            </div>
            <div class="formlist t14 validation_or">
                <dl class="formlist_dl clearfix">
                    <dt class="left w_110 tr">生日：</dt>
                    <dd class="left w_325 ml10">
                        <span>
                            <input name="birth" type="text"  class="form-control" onfocus="WdatePicker({lang:'zh-cn'})"  readonly="true" value="{{$res->birth}}"/>
                        </span>
                    </dd>
                </dl>
            </div>
            <div class="formlist t14 validation_or">
                <dl class="formlist_dl clearfix">
                    <dt class="left w_110 tr">年龄：</dt>
                    <dd class="left w_325 ml10">
                        <span> 
                            <input type="text" require="false" value="{{$res->age}}" name="age" class="form-control" />
                        </span>
                    </dd>
                </dl>
                <div class="set_jy jsErrorphone" ><span class="icon_gth"></span><em></em></div>
            </div>
            <div class="formlist t14 validation_or">
                <dl class="formlist_dl clearfix">
                    <dt class="left w_110 tr">邮箱：</dt>
                    <dd class="left w_325 ml10">
                        <span> 
                            <input type="email" require="false" value="{{$res->email}}" name="email" class="form-control" disabled/>
                        </span>
                    </dd>
                </dl>
                <div class="set_jy jsErrorphone" ><span class="icon_gth"></span><em></em></div>
            </div>
            <div class="formlist t14 validation_or">
                <dl class="formlist_dl clearfix">
                    <dt class="left w_110 tr">手机号：</dt>
                    <dd class="left w_325 ml10">
                        <span>
                            <input type="text" require="false" datatype="mobile" maxlength="11" msg="请输入正确手机"  name="phone" class="form-control" value="{{$res->phone}}"/>
                        </span>
                    </dd>
                </dl>
                <div class="set_jy jsErrorcellphone" ><span class="icon_gth"></span><em></em></div>
            </div>
            <div class="formlist t14 validation_or">
                <dl class="formlist_dl clearfix">
                    <dt class="left w_110 tr">通讯地址：</dt>
                    <dd class="left w_325 ml10">
                        <span>
                            <input type="text" require="false" datatype="limit"  max="150"  msg ="通讯地址，最多支持50个字" placeholder="请输入通讯地址，最多支持50个字" value="{{$res->phone}}" name="address"  class="form-control" />
                        </span>
                    </dd>
                </dl>
                <div class="set_jy jsErroraddress" ><span class="icon_gth"></span><em></em></div>
            </div>
            <input type="hidden" name ="workIndex" value="">
            <input type="hidden" name ="eduIndex" value="">
            <div class="grzlbox_btn">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input name="" type="submit" value="保存修改 " class="btn btn-info">
            </div>
        </div>
    </form>
</div>
@stop

@section('js')
<script type="text/javascript">
    $('.alert').delay(2000).fadeOut(1500);
</script>
@stop

