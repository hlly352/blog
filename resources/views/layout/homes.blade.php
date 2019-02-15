<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="360-site-verification" content="11473619ba65d8ccee478771c1128394" />
    <link type="favicon" rel="shortcut icon" href="/favicon.ico" />
    <title>@yield('title',$title)</title>
    <meta name="keywords" content="51CTO博客2.0,51CTO博客,IT博客,技术博客,原创技术文章,技术交流">
    <meta name="description" content="51CTO博客2.0是国内领先的IT原创文章分享及交流平台,包含系统运维,云计算,大数据分析,Web开发入门,高可用架构,微服务,架构设计,PHP教程,Python入门,Java,数据库,网络安全,人工智能,区块链,移动开发技术,服务器,考试认证等文章。">    
    <link href="/static/css/base.css" rel="stylesheet">
    <link href="/static/css/header.css" rel="stylesheet">
    <link href="/static/css/other.css" rel="stylesheet">
    <link href="/static/css/list_tab.css" rel="stylesheet">
    <link href="/static/css/right.css" rel="stylesheet">
    <link href="/static/css/index.css" rel="stylesheet">    
   
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/cookie.js"></script>
    <script src="/static/js/login.js"></script>
    <script src="/static/js/common.js"></script>
    <script src="/static/js/mbox.js"></script>
    <script src="/static/js/follow.js"></script>
    <script src="/static/js/vip.js"></script>
    <script src="/static/js/window.js"></script>
</head>
<body>
<style type="text/css">
	/*.service-btn{
		width: 53px;
        height: 36px;
        color: #1ac6fe;
        line-height: 16px;
        padding-top: 50px;
        display: inline-block;
        background: url(/static/images/463350acf4c693cfb3dc248bc8a2a0eb.png) no-repeat center;
	}
	.service-btn:hover{
		background: url(/static/images/2d5fa2ff4eb9ef66847aff20ba4c8bae.png) no-repeat center;
        height: 36px;
        color: #fff;
        line-height: 16px;
        padding-top: 50px;
    }*/
</style>
<!--[if lt IE 9]>
  <script src="/static/js/html5shiv.js"></script>
  <script src="/static/js/respond.min.js"></script>
<![endif]-->
<div class="Header">
    <div class="Page ">
        <h1 style="width: 150px;height: 60px;float: left; text-align: center;line-height: 60px;font-size: 25px;"><a href="/" style="color:skyblue; font-family: '楷体'">二郎巷博客</a></h1>
        <ul class="Navigates fl">
            <li  class="/" ><a href="/">首页</a></li>
            <li ><a href="/home/total">文章</a></li>  
        </ul>
        <ul class="Navigates Navigates-right fr">
            <li class="more maps">
                <a href="/home/logout">退出</a>
            </li>
            @if(session('userid'))
            @php
              $uid = session('userid');
              $info = \DB::table('userinfo')->where('uid',$uid)->first();
            @endphp
            <li class="more user">
              <a class="is-vip-bg-1" href="/home/center/{{$info->id}}/edit" target="_blank">
                @if(getImg(session('userid')))
                <img class="is-vip-img is-vip-img-5" data-uid="14175912" src="{{getImg(session('userid'))}}">
                @else
                <img class="is-vip-img is-vip-img-5" data-uid="14175912" src="/uploads/profile.jpg">
                @endif
              </a>
              <div>
                <a href="/home/myblog">我的博客</a>
                <a href="/home/arttype">分类管理</a>
                <a href="/home/type">博客管理</a>
                <i class="arrow"></i>
              </div>
            </li>
            @else
            <li>
                <a href="/home/register" target="_self">注册</a>
            </li>
            <li class="login">
                <a href="/home/login" target="_self">登录</a>
            </li>
            @endif
            <li class="mRead"></li>
            <li class="write"><a href="/home/article/create" onClick="Login()">写文章</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script src="/static/js/box.js"></script> 

@section('content')

@show


<div class="Footer">
  <div class="Page ">
    <dl class="fl">
      <dt>关于我们</dt>
      <dd>
        <table>
          <tbody><tr>
            <td><a href="http://www.51cto.com/about/aboutus.html" target="_blank">关于我们</a></td>
            <td><a href="http://www.51cto.com/about/zhaopin.html" target="_blank">诚聘英才</a></td>
          </tr>
          <tr>
            <td><a href="http://www.51cto.com/about/contactus.html" target="_blank">了解我们</a></td>
            <td><a href="http://www.51cto.com/about/history2011.html" target="_blank">网站大事</a></td>
          </tr>
          <tr>
            <td><a href="http://www.51cto.com/about/guestbook/" target="_blank">意见反馈</a></td>
            <td><a href="http://www.51cto.com/about/map.htm" target="_blank">网站地图</a></td>
          </tr>
        </tbody></table>
      </dd>
    </dl>
    <dl class="fl">
      <dt>友情链接</dt>
      <dd>
        <table>
          <tr>
            <td><a href="http://bbs.51cto.com/" target="_blank">51CTO论坛</a></td>
            <td><a href="http://x.51cto.com/?blog" target="_blank">CTO训练营</a></td>
          </tr>
          <tr>
            <td><a href="http://down.51cto.com/" target="_blank">51CTO下载中心</a></td>
            <td><a href="http://edu.51cto.com/" target="_blank">51CTO学院</a></td>
          </tr>
          <tr>
            <td><a href="http://wot.51cto.com/act/2017/innovation/?blog" target="_blank">WOT峰会</a></td>
            <td><a href="https://www.ximalaya.com/" target="_blank">有声小说</a></td>
          </tr>
        </table>
      </dd>
    </dl>
    <dl class="fl">
      <dt>关注我们</dt>
      <dd>
        <img src="/static/picture/qrcode_2.png">
        <img src="/static/picture/qrcode_3.png">
      </dd>
    </dl>
    <div class="fr">
      <div class="links">
        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=3591348659&amp;site=qq&amp;menu=yes" target="_blank" class="qq">管家QQ</a>
        <a href="https://jq.qq.com/?_wv=1027&amp;k=4BKqkXY" target="_blank" class="qqq">QQ群</a>
        <a href="http://51ctoblog.blog.51cto.com" target="_blank" class="sina">官方博客</a>
      </div>
      <p class="copy">Copyright &copy; 2005-2019 <a href="http://www.51CTO.com" target="_blank">51CTO.COM</a> 版权所有 京ICP证060544号</p>
    </div>
  </div>
  </div>
    <!-- <script src="/static/js/pvlog.js"></script> -->
<script src="/static/js/count.js"></script>
<script>
  $(".gotop").click(function(){$(window).scrollTop(0)})
</script>


    
</script>
@section('js')

@show
<script src="/static/js/index.js"></script></body>
</html>
