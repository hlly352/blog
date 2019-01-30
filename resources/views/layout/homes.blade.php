
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
        <h1 class="Logo"><a href="/">Logo</a></h1>
        <ul class="Navigates fl">
            <li  class="/" ><a href="/">首页</a></li>
            <li ><a href="/home/total">文章</a></li>
           
        </ul>
        <ul class="Navigates Navigates-right fr">
            <li class="more maps">
                <a href="/home/logout">退出</a>
                <div>
                    
                </div>
            </li>
            @if(session('userid'))
            <li class="more user">
              <a class="is-vip-bg-1" href="/home/center" target="_blank">
                @if(isset($img))
                <img class="is-vip-img is-vip-img-5" data-uid="14175912" src="{{$img->profile}}">
                @else
                <img class="is-vip-img is-vip-img-5" data-uid="14175912" src="/uploads/profile.jpg">
                @endif
              </a>
              <div>
                <a href="">我的博客</a>
                <a href="" target="_blank">我的收藏</a>
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
            <li class="mRead"><a href="javascript:;"></a>
                <div>
                    
                   
                    <i class="arrow"></i>
                </div>
            </li>
            <li class="search">
                <a href=""  target="_self">搜索</a>
            </li>
            <li class="write"><a href="/home/article/create" onClick="Login()">写文章</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script src="/static/js/box.js"></script> 
<script>
    var isLogin = '0';
    var userId = '';
    var imgpath = 'https://s1.51cto.com/';
    var BLOG_URL = 'http://blog.51cto.com/';
    var msg_num_url = '/index/ajax-msg-num';
    $('.msg-follow, .msg-follow-max').eq(1).css({top: '91px'});
    $('.msg-follow, .msg-follow-max').eq(2).css({top: '121px'});
    setTimeout(function(){
            $.ajax({
                url:msg_num_url,
                type:"get",
                dataType:'json',
                success:function(res){
                    if(res.status == '0'){
                       //
                       var hasNewMsg = false;
                       if(res.data.msgNum > 0 && !$('#myMsg i').hasClass('dot')){
                            $('#myMsg i').addClass('dot');
                            hasNewMsg = true;
                       }
                       if(res.data.notifyNum > 0 && !$('#myNotify i').hasClass('dot')){
                           $('#myNotify i').addClass('dot');
                           hasNewMsg = true;
                       }
                       if(res.data.recommend_new > 0 && !$('#myRecommend i').hasClass('dot')){
                           $('#myRecommend i').addClass('dot');
                           hasNewMsg = true;
                       }
                       if(hasNewMsg && !$('#myAllMsg i').hasClass('dot')){
                           $('#myAllMsg i').addClass('dot');
                       }
                    }

                }
            });
    },70);
    //广告图
</script>
<script src="/static/js/entrance.js" id="zhichiScript" class="zhiCustomBtn" data-args="manual=true"></script>


<script type="text/javascript">
var zhiManager = (getzhiSDKInstance());
zhiManager.on("load", function() {
    zhiManager.initBtnDOM();
});
//zhiManager.set('title','垃圾/广告信息举报');
zhiManager.set('powered',false);
zhiManager.set('color', '4285f4');
zhiManager.set('customBtn', 'true');
zhiManager.set('moduleType',2);
zhiManager.set('size',{'width':360,'height':500});

zhiManager.set('userinfo', {partnerId:'',uname:'',params:'{"用户名":""}'});
zhiManager.set('customMargin', 20);
zhiManager.set('horizontal', 20);
zhiManager.set('vertical', 90);
zhiManager.set('preVisitArgs',{'preVisitUrl': document.referrer?document.referrer:''});
zhiManager.set('curVisitArgs',{'curVisitUrl': location.href,curVisitTitle:document.title,});
</script>
<script>
  function FollowBtnSucc(e){//1:未关注,2:已关注,3:互相关注
    if(e==2||e==3){
        $.post('/index/wxbind',{uid:userId},function(res){
            if(res.status==1){
                if(res.data.wxBind == 0){//没绑定
                    if(getCookie('follow1'))return false;
                    box1()
                }else{
                    if(getCookie('follow2'))return false;
                    box2()
                }
            }
        },'json')
    }
  }
</script>
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


    <script type="text/javascript">
    //百度统计代码
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?2283d46608159c3b39fc9f1178809c21";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();

    //自动推送链接
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bd/static.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
    </script>

    <script type='text/javascript'>
      var _vds = _vds || [];
      window._vds = _vds;
      (function(){
        _vds.push(['setAccountId', '8c51975c40edfb67']);
        (function() {
          var vds = document.createElement('script');
          vds.type='text/javascript';
          vds.async = true;
          vds.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'assets.growingio.com/vds.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(vds, s);
        })();
      })();
      //document.write(decodeURI("%3Cscript src='https://tongji.51cto.com/frontend/tj.gif' type='text/javascript'%3E%3C/script%3E"));
    </script>
    
<script>
  var uid = '';
  var BLOG_URL = 'http://blog.51cto.com/';
</script>
<script src="/static/js/jquery.cookie.js"></script>
<script src="/static/js/time-on-page.js" charset="utf-8"></script>
<script>
    var praise_url = 'http://blog.51cto.com/praise/praise';
    var blog_ids = '2342274,2341986,2343515,2343452,2343316,2343070,2342980,2342504,2342284,2342085,2341944,2341911,2341658,2341541,2341273,2340863,2340777,2340750,2340464,2340378,2340204,2340038,2340024,2340022,2340015,2339960,2339755,2339601,2339589,2339520';
    var blog_stat_url = '/index/ajax-blog-stat';
    setTimeout(function(){
            $.ajax({
                url:blog_stat_url,
                type:"get",
                data:{
                   ids:blog_ids,
                },
                dataType:'json',
                success:function(res){
                    if(res.status == '0'){
                       $.each(res.data, function(index, item){
                           var blog_id = item.blog_id;
                           var li_id_name = 'blog_' + blog_id;
                           $('#'+li_id_name).find('.read_num').html(item.pv);
                           $('#'+li_id_name).find('.collect_num').html(item.favorite_num);
                           if(item.pv == '10000+'){
                              $('#'+li_id_name).find('.read_num').append('<i></i>')
                              $('#'+li_id_name).find('.read_num').parent().addClass('hasdot')
                           }
                           $('#'+li_id_name).find('.comment_num').html(item.comments_num);
                           if(item.admire_user_num > '0'){
                               $('#'+li_id_name).find('.admire_num').html(item.admire_user_num);
                               $('#'+li_id_name).find('.admire_num_p').show();
                           }
                           $('#'+li_id_name).find('.zan').html(item.apraise_num);
                           if(item.isPraise == '1'){
                               $('#'+li_id_name).find('.zan').addClass('ed');
                           }
                       });
                    }
                }
            });
    },100);
     updatePage()
//倒计时
  function updatePage() {
    $('.timeCount').each(function(index, item) {
    	var self =this
      var me = $(self);
      var end_time = $(self).data('end');
      if (!end_time||end_time<0) {
      	me.parents(".groups-timer-right").html("")
        return;
      }
      if (me.lastTime) {
        clearInterval(me.lastTime);
        me.lastTime = null;
      } else {
      	if(end_time>0){
         me.lastTime = setInterval(function() {
         end_time--
		     if (!end_time||end_time<0) {
		     	 me.parents(".groups-timer-right").html("")
		     	 	 window.location.reload()
		        return "";
		     }else{
        var hour, minute, seconds,
        hour = Math.floor(end_time  / (60 * 60) % 60),
        minute = Math.floor(end_time  / 60 % 60),
        seconds = Math.floor(end_time  % 60);
        me.html((hour < 10 ? '0' + hour : hour) + ':' +(minute < 10 ? '0' + minute : minute) + ':' +
        (seconds < 10 ? '0' + seconds : seconds) );
            }
        }, 1000);

      	}

      }
    });
  }
	//拼团按钮
	$(".jion-group-btn").hover(function(){
		$(this).find(".group-qrcode-box").show()
	},function(){
		$(this).find(".group-qrcode-box").hide()
	})
</script>
@section('js')

@show
<script src="/static/js/index.js"></script></body>
</html>
