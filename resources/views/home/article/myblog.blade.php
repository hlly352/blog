@extends('layout.homes')

@section('title',$title)

@section('content')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="favicon" rel="shortcut icon" href="/favicon.ico" />


<meta name="description" content="wx5c4042f13be00的博客(http://blog.51cto.com/14179969)">    <link href="/static/css/base.css" rel="stylesheet"><link href="/static/css/header.css" rel="stylesheet"><link href="/static/css/other.css" rel="stylesheet"><link href="/static/css/list_tab.css" rel="stylesheet"><link href="/static/css/right.css" rel="stylesheet"><link href="/static/css/blog_my.css" rel="stylesheet">

    <script src="/static/js/jquery.min_1.js"></script><script src="/static/js/cookie.js"></script><script src="/static/js/login.js"></script><script src="/static/js/common.js"></script><script src="/static/js/mbox.js"></script><script src="/static/js/follow.js"></script><script src="/static/js/vip.js"></script><script src="/static/js/window.js"></script>

<img src="/static/picture/share_default.jpg" border="0" style="width:0; height:0; position:absolute;">
<style type="text/css">
	.service-btn{
		width: 53px;
height: 36px;
color: #1ac6fe;
line-height: 16px;
padding-top: 50px;
		display: inline-block;
		background: url(/static/images/463350acf4c693cfb3dc248bc8a2a0eb_1.png) no-repeat center;
	}
	.service-btn:hover{
		background: url(/static/images/2d5fa2ff4eb9ef66847aff20ba4c8bae_1.png) no-repeat center;
height: 36px;
color: #fff;
line-height: 16px;
padding-top: 50px;
	}
</style>
<!--[if lt IE 9]>
  <script src="/static/js/html5shiv.js"></script>
  <script src="/static/js/respond.min.js"></script>
<![endif]-->

<script src="/static/js/box.js"></script> 
<script>
    var isLogin = '0';
    var userId = '';
    var imgpath = 'https://s1.51cto.com/';
    var BLOG_URL = 'http://blog.51cto.com/';
    var msg_num_url = 'http://blog.51cto.com/index/ajax-msg-num';
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
        
</script>
 <div class="Content-box">
    <script>
var is_reload = true;
$(".follow-top").click(function() {
    is_reload = false;
})
function FollowBtnSucc(e){//1:未关注,2:已关注,3:互相关注
    if(e==2||e==3){
        $.post('/index/wxbind',{uid:userId},function(res){
            if(res.data.wxBind == 0){//没绑定
                if(getCookie('follow1'))return false;
                box1()
            }else{
                if(getCookie('follow2'))return false;
                box2()
            }
        },'json')
    }else{
        if(is_reload) {
            window.location.reload();
        }
    }
    is_reload = true;
}
</script>
<div class="blog-my-bg">
	<!-- header start -->
	<div class="header-bg">
		<div class="header Page">
			<div class="header-top">
                <div class="is-vip-bg-2 fl">
      				<a href="javascript:;" class="a-img">
                        <img class="is-vip-img is-vip-img-1" data-uid="14169969" src="/static/picture/noavatar_middle.gif"/>
      				</a>
                </div>
    				<div class="right">
					<a href="javascript:;" class="name">{{$title}}</a>
					<ul class="number-list">
				
						<li><span>{{getArticle(session('userid'))}}</span><p>文章</p></li>
                                                    <li><span>{{getComnum(session('userid'))}}</span><p>评论</p></li>
                            <li><span>{{getGood(session('userid'))}}</span><p>点赞</p></li>
                        						<div class="clear"></div>
					</ul>
					<ul class="icon-list">
						                                                																		<div class="clear"></div>
					</ul>
				</div>
				<div class="right-msg">
                    					
				</div>
				<div class="clear"></div>
			</div>

			<div class="header-bottom">
				
                    					<div class="clear"></div>
				</ul>
				<div class="bdsharebuttonbox right-list fr">
			
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="Page blog-my">

        <!-- left -->
        <div class="Left" id="Tab">
        	<!-- tab -->
        	<ul class="blog-my-tab">
        		<li class="on"><a href="javascript:void(0);">文章</a></li>
        
        		<div class="clear"></div>
        	</ul>
			<!-- title -->
                            <ul class="blog-my-title">
                       <li class="on"><a href="/home/myblog">全部</a></li>
                              @foreach($mytype as $k=>$v)
                    <li class="on"><a href="/home/myblog?person={{$v->name}}">{{$v->name}}</a></li>
                    @endforeach
                                        <div class="clear"></div>
                </ul>
			<div class="artical-tit">

				<!-- <p class="fl"><a href="http://blog.51cto.com/14179969">全部文章</a></p> -->

                <form class="fr form-search" method='get' action="http://blog.51cto.com/search/user" target="_blank">
                    <input type="hidden" name="uid" value="14169969">
                    <input class="select-input fr" type="text" name="q" placeholder="请输入搜索关键词" maxlength="38">
                    <div class="pulldown select-down time fl" style="display: none">
                    	<p>发布时间</p>
                    	<i class="arrow"></i>
                    	<ul class="pulldown-list" for="time">
                    		<li><a href="javascript:;">三个月内</a></li>
                    		<li><a href="javascript:;">六个月内</a></li>
                    		<li><a href="javascript:;">一年内</a></li>
                    		<li><a href="javascript:;">三年内</a></li>
                    		<li><a href="javascript:;">五年内</a></li>
                    	</ul>
                    	<!-- <input name="time" id="time" value="" type="hidden"> -->
                    </div>
                    <div class="pulldown select-down filtrate fl" style="display: none">
	                    <p>文章状态</p>
	                    <i class="arrow"></i>
	                    <ul class="pulldown-list" for="filtrate_id">
	                    	                    	<li value="全部"><a href="http://blog.51cto.com/14179969?s=">全部</a></li>
	                    			              				                	<li value="推荐" data-id="3"><a href="http://blog.51cto.com/14179969?s=3">推荐</a></li>
			              				                	<li value="原创" data-id="4"><a href="http://blog.51cto.com/14179969?s=4">原创</a></li>
		              				                	ti<li value="转载" data-id="5"><a href="http://blog.51cto.com/14179969?s=5">转载</a></li>
			              				                	<li value="翻译" data-id="6"><a href="http://blog.51cto.com/14179969?s=6">翻译</a></li>
			              							</ul>
						<!-- <input name="filtrate_id" id="filtrate_id" value="" type="hidden"> -->
	                </div>
	            
                </form>
				<div class="clear"></div>
            </div>
            

            <!--文章的显示逻辑-->
           

                
              <ul class="artical-list">
                @foreach($rs as $key=>$val)
           
                     <li id="userblog">
                        <div class="top ">
                            <div class="is-vip-bg fl">
                                <a href="http://blog.51cto.com/14179965" class="a-img" target="_blank">
                                    <img class="avatar is-vip-img is-vip-img-4" data-uid="14169965" src="https://ucenter.51cto.com/images/noavatar_middle.gif">
                                </a>
                            </div>
                            <a href="/home/myblog" class="name fl">{{$val->author}}</a>
                                                        <a href="javascript:;" class="time fl">发布于:{{date('Y-m-d H:i',$val->addtime)}}</a>
                  
                            <div class="clear"></div>
                        </div>
                        <a class="tit" href="http://blog.51cto.com/14179965/2347317">
                          @php echo strip_tags($val->contents) @endphp
                                                                                                           </a>
                        <a href="javascript:;" class="con">fewqftr3wqfewqafewafasf</a>
                        <div class="bot">
                                                            <p class="tab original fl">原创</p>
                                                                                                <p class="read fl">阅读&nbsp;4</p>
                                                                <p class="comment fl">评论&nbsp;0</p>
                                <p class="collect fl">收藏&nbsp;0</p>
                                                                                            <p class="remove fr" data-id="2347317" data-url="/blogger/operation">删除</p>
                                <a class="edit fr" href="http://blog.51cto.com/blogger/publish/2347317" target="_blank">编辑</a>
                                                        <div class="clear"></div>
                        </div>
                    </li>
                 
            
              @endforeach 
                 </ul>
        
                    <!--没有文章显示的内容-->
              <!-- 
                  <div class="noList">
                        <img src="/static/picture/nolist.png">
                        <p>暂无文章</p>
                    </div>
                -->
            
              
                            
            <!--关注和粉丝的显示-->
            
            <!-- page -->
            		</div>
		<!-- right -->
		<div class="Right">
            			<!-- 发布博文 -->
            			<!-- 博客名称 -->
			<div class="Box articles blogger-name">
				<div class="list">
					<a class="BoxTil3 fl" href="http://blog.51cto.com/14179969">wx5c4042f13be00<span><i></i>用户</span></a>
					<div class="BoxTil2-box fr">
						<span></span>
						<div>
							<img src="/static/picture/91d8b5e7499849b0a737897bb88eef21.gif">
							<p>分享到朋友圈</p>
						</div>
					</div>
					<div class="clear"></div>
					<div class="num-arctic">共<span>0</span>篇文章</div>
					<div class="bottom">
						<div class="msg-title">
                            <i class="l"></i>
                            <p class="msg-1">
                                                                                                            这个家伙比较懒，还没有个人介绍
                                                                                                </p>
                            <i class="r"></i>
                        </div>
						<h4 class="title"><a href="javascript:;">用户个人信息</a></h4>
						<ul class="my-list">
                            							<li>无忧币：40</li>
							<li>注册日期：2019-01-17 0天</li>
                        </ul>
                        <div class="my-crouse-box">
                                                    </div>
					</div>
				</div>
			</div>
			<!-- 七日热门 -->
            				<h3 class="BoxTil">七日热门</h3>
				<div class="Box articles">
					<div class="list">
					  <ul class="seven-list">
					    					    	<li class="s1"><a href="http://blog.51cto.com/12643266/2343070" target="_blank">Linux自动化运维之Cobbler（快速入门）</a></li>
					    					    	<li class="s2"><a href="http://blog.51cto.com/bigboss/2341986" target="_blank">Centos7 搭建LDAP并启用TLS加密</a></li>
					    					    	<li class="s3"><a href="http://blog.51cto.com/sery/2342085" target="_blank">proxmox超融合集群挂接nfs出错删除挂接点操作备忘</a></li>
					    					    	<li class="s4"><a href="http://blog.51cto.com/bearlovecat/2342980" target="_blank">Oracle的十八般武艺</a></li>
					    					    	<li class="s5"><a href="http://blog.51cto.com/14031893/2342504" target="_blank">如何打通CMDB，实现就近访问</a></li>
					    					  </ul>
					</div>
				</div>
            		    <!-- 最近来访 -->
	        		</div>
		<div class="clear"></div>
	</div>
	<!-- end content -->
</div>
<script>
    var	pv_log_info = {
        'pv_type':'user',
        'user_id':'14169969'
        };
	var praise_url = 'http://blog.51cto.com/praise/praise'
	setPraise($('.artical-list .top .zan'))
    $('body').css('background','#fff')
	$('.blog-my-title li').click(function(){
		$('.blog-my-title li').removeClass('on')
		$(this).addClass('on')
	})
	setHover($('.filtrate'))
	setHover($('.time'))
	$('.select-down li').click(function(){
		var text = $(this).text()
		$(this).parent().prev().prev().text(text)
	})
	$('.artical-list .remove').click(function(){
    var li = $(this).parents('li'),url = $(this).data('url'),id = $(this).data('id');
		new AutoBox({
			content:'确定删除？',
			mask:"#000",
			Yes:'确定',
			No:'取消',
			yc:function(){
		        $.ajax({
		           	url:url,
		           	type:"post",
		           	data:{ids:id,operation:'delBlog'},
		           	dataType:'json',
		           	success:function(res){
			            if(res.status == '1'){
			              	if(li.siblings().length==0) location.reload();
			              	li.fadeOut()
			            }
		           	}
		        });
			}
		})
	})
	window._bd_share_config={
		"common":{
			"bdText":"wx5c4042f13be00的博客",
			"bdDesc":"快来看看我分享给你的技术好文吧",
			"bdMini":"2",
			"bdMiniList":false,
			"bdPic":"https://s1.51cto.com/images/201710/25/bd540a4f14d822f6e69087758699358b.jpg",
			"bdStyle":"0",
			"bdSize":"16",
		},
		"share":{}
	};
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com//static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
</div>
  
    <div class="rightTools">
          <a href="/home/article/create" class="aa">写文章</a>
 
    <a href="javascript:void(0);" class="gotop"></a>
</div>
  <!-- <script src="/static/js/pvlog.js"></script> -->
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
    (function(){
        var wh=$(window).height(),fh=$('.Footer').outerHeight(true),hh=$('.Header').outerHeight(true)
        $('.Content-box').css({'min-height': wh-fh-hh})
    })()
</script>

@stop

