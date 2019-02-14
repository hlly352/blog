<!doctype html>
	<html lang="en-US">
	<head>
	<meta charset="UTF-8">
	<meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="eUw5QmZUN0kMGloUJDFoPzUUTycUFWUoKiNodFIhcz0PeFdwPwZnGw==">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="https://static2.51cto.com/home/web/images/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="51CTO技术家园">
    <meta name="description" content="51CTO技术家园">
    <link href="/homes/center/static/CSS/datepicker.css" rel="stylesheet">
    <link href="/homes/center/static/CSS/fset.css" rel="stylesheet">
    <link href="/homes/center/static/CSS/jquery-ui.css" rel="stylesheet">
    <link href="/homes/center/static/CSS/public.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/homes/center/static/JS/51cto.js"></script>
    <script src="/homes/center/static/JS/imgscal.js"></script>
    <script src="/homes/center/static/JS/info.js"></script>
    <script src="/homes/center/static/JS/jquery.cluetip.js"></script>
    <script src="/homes/center/static/JS/jquery.masonry.min.js"></script>
    <script src="/homes/center/static/JS/jquery.message.js"></script>
    <script src="/homes/center/static/JS/jquery.min.js"></script>
    <script src="/homes/center/static/JS/msg.js"></script>
    <script src="/homes/center/static/JS/public.js"></script>
    <script src="/homes/center/static/JS/ts_common.js"></script>
    <script src="/homes/center/static/JS/yii.js"></script>	</head>
<!--简导航开始-->
<body>

<!--简导航结束-->
<!--导航开始-->
<!--导航结束-->
<!--主体开始-->
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif

<!-- 获取账号登录的信息 -->
@php
    $user = DB::table('user')->where('id',session('userid'))->first();
    $info = DB::table('userinfo')->where('uid',session('userid'))->first();
@endphp

<div class="main mb20">
    <div class="setmain center clearfix">
        <div id="leftMenu" curr="index" class="setmain_l left">
            <div class="portbox w_120">
                <div class="mb10"><a href="" class="t16 cl_3"></a></div>
                <div class="mb10 tc">
                    <a href="/space" class="tx_100">
                        <table width="100%">
                            <tr>
                                <td height="100">
                                    <img onload="proDownImage(this,98,98);" src="{{$info->profile}}"  alt="头像" />
                                </td>
                            </tr>
                        </table>
                    </a>
                </div>
                <div class="datas clearfix">
                    <div class="num left tc"><a href="/user-follow-fans/fans"><span>0</span><br /><strong>粉丝</strong></a></div>
                    <div class="line left"></div>
                    <div class="num right tc"><a href="/space/feed?uid=14169969"><span>1</span><br /><strong>关注</strong></a></div>
                </div>
            </div>
            <div class="set_fgline"></div>
            <div class="set_box">
                <div class="lev_box">
                    <div class="lev_first"><a href="javascript:;"><b class="icon_set_gr"></b>个人资料</a></div>
                    @section('index')
                    <div class="lev_sec">
                        <div class="lev_secin index"><a href="/home/center/{{$info->id}}/edit">修改个人资料</a></div>
                        @if($info)
                        <div class="lev_secin face"><a href="/home/profile/{{$info->id}}">修改头像</a></div>
                        @else
                        <div class="lev_secin face"><a href="/home/profiles">修改头像</a></div>
                        @endif
                    </div>
                    @show
                </div>		
                <div class="lev_box">
                    <div class="lev_first"><a href="javascript:;"><b class="icon_set_dt"></b>账号设置</a></div>
                    @section('change')
                    <div class="lev_sec">
    			        <!-- <div class="lev_secin set-mobile"><a href="">绑定手机</a></div>    -->
    			        <div class="lev_secin set-email"><a href="/home/changemail/{{$user->id}}">修改邮箱</a></div> 
                        <div class="lev_secin set-pass"><a href="/home/changepass/{{$user->id}}">修改密码</a></div>
                    </div>
                    @show
                </div>
            </div>
        </div>
    <!-- lev_secin_cur -->        
        <div class="setmain_r right">
        @section('content')

        @show
        </div>
    </div>
</div>
<!--主体结束-->
<!--底部开始-->
<!--底部结束-->
<script src="https://static2.51cto.com/home/web/js/WdatePicker.js?v=10002"></script>
@section('js')

@show
</body>
</html>
