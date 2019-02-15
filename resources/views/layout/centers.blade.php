<!doctype html>
	<html lang="en-US">
	<head>
	<meta charset="UTF-8">
	<meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="eUw5QmZUN0kMGloUJDFoPzUUTycUFWUoKiNodFIhcz0PeFdwPwZnGw==">
	<title>@yield('title')</title>
	<meta name="keywords" content="51CTO技术家园">
    <meta name="description" content="51CTO技术家园">
    <link href="/homes/center/static/CSS/datepicker.css" rel="stylesheet">
    <link href="/homes/center/static/CSS/fset.css" rel="stylesheet">
    <link href="/homes/center/static/CSS/jquery-ui.css" rel="stylesheet">
    <link href="/homes/center/static/CSS/public.css" rel="stylesheet">
    <link href="/homes/center/css/public.css" rel="stylesheet">
    <link href="/homes/center/css/myzy.css" rel="stylesheet">
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
    <script src="/homes/center/static/JS/yii.js"></script>
    <script src="/homes/center/js/jquery.min.js"></script>
    <script src="/homes/center/js/system/yii.js"></script>
    <script src="/homes/center/js/51cto.js"></script>
    <script src="/homes/center/js/jquery.message.js"></script>
    <script src="/homes/center/js/public.js"></script>
    <script src="/homes/center/js/imgscal.js"></script>
    <script src="/homes/center/js/jquery.masonry.min.js"></script>
    <script src="/homes/center/js/tip/jquery.cluetip.js"></script>	
    <script src="/homes/center/js/public/ts_common.js"></script>
    <script src="/homes/center/js/public/space.js"></script>
    <script src="/homes/center/js/public/follow.js"></script>
    <script src="/homes/center/js/public/msg.js"></script>
</head>
<!--简导航开始-->
<body>
    @php
        $uid = session('userid');
        $profile = \DB::table('userinfo')->where('uid',$uid)->first();
    @endphp
<div class="Fheader">
    <div class="center clearfix">
        <div class="Fheader_l left clearfix"  style="width:610px;" >
            <ul class="clearfix">
                <li><a href="/" style="border:0px">二郎巷博客</a><b class="line"></b></li>   
            </ul>
        </div>
        <div style="width:590px;" class="Fheader_r right clearfix" id ="login_status">
            <ul class="clearfix">               
                <li><a href="" style="padding-right:0;border:0px"><strong class="usericon">
                    <img  src="{{$profile->profile}}"   alt="头像" /></strong>{{$user->username}}</a>&nbsp;
                </li>
                <li><a href="/home/logout" style="border:0px">退出</a></li>
            </ul>
        </div>
    </div>
</div>

<!--简导航结束-->
<!--导航开始-->
<div class="Fnav" style="border-bottom: 0px">
    <div class="center clearfix">
        <div class="Fnav_l left">
            <dl class="clearfix">
                <dt><a href="/home"><font size="5px">二郎巷博客</font></a></dt>
                <dd class=""><a href="/">首页</a></dd>
                <dd class="curr" ><a href="">个人主页</a></dd>
               <!--  <dd class=""><a href="" class="position_r">消息中心<b class="dot position_a"></b></a></dd> -->
                <!-- <dd class=""><a target="_blank" href="">充值中心</a>
                <dd class=""><a style=" position:relative;" target="_blank" href="">会员中心<img width="41" height="39" style=" position:absolute; bottom:10px;" alt="" src="1234://static1.51cto.com/home/web/images/vip.png"></a>
                </dd> -->
            </dl>
        </div>
    </div>
</div>
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
                <div class="datas clearfix"></div>
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
<script src="1234://static2.51cto.com/home/web/js/WdatePicker.js?v=10002"></script>
@section('js')

@show
</body>
</html>
