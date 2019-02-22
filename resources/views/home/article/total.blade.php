@extends('layout.homes')

@section('title',$title)

@section('content')
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="favicon" rel="shortcut icon" href="/favicon.ico" />
    <meta name="keywords" content="原创技术文章,技术文章,技术博客,51CTO博客">
<meta name="description" content="云计算,大数据分析,Web开发入门,PHP教程,Python入门,Java,数据库文章,网络安全文章,人工智能,移动开发技术,服务器,考试认证等。">    <link href="/static/css/base.css" rel="stylesheet"><link href="/static/css/header.css" rel="stylesheet"><link href="/static/css/other.css" rel="stylesheet"><link href="/static/css/list_tab.css" rel="stylesheet"><link href="/static/css/right.css" rel="stylesheet"><link href="/static/css/blog_list.css" rel="stylesheet">

    <script src="/static/js/jquery.min.js"></script><script src="/static/js/cookie.js"></script><script src="/static/js/login.js"></script><script src="/static/js/common.js"></script><script src="/static/js/mbox.js"></script><script src="/static/js/follow.js"></script><script src="/static/js/vip.js"></script><script src="/static/js/window.js"></script>
<img src="/static/picture/share_default.jpg" border="0" style="width:0;height:0;position:absolute;">
<style type="text/css">
	.service-btn{
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
    }
}
</script>
<div class="Page Index artical-box">
	<div class="Left fl">
		<ul class="artical-title">
			<li class="on"><a href="#" onclick="return false">文章汇总</a></li>
			
			<div class="clear"></div>
		</ul>
			<ul class="artical-list">
        @if($rs->count() != 0 )
         @foreach($rs as $k=>$v)
          @php
            $profile = \DB::table('userinfo')->where('uid',$v->uid)->first()->profile;
            $comment = \DB::table('comment')->where('art_id',$v->art_id)->get();
          @endphp
			    <li>
					<div class="top " >
	          <div class="is-vip-bg fl">
							<a href="" class="a-img" target="_blank">
	              <img class="avatar is-vip-img is-vip-img-4" data-uid="14138276" src="{{$profile}}"/>
		          </a>
	          </div>
						<a href="" class="name fl" target="_blank">{{getAuthor($v->uid)}}</a>
            	<p href="javascript:;" class="time fl">发布于：{{date('Y-m-d',$v->addtime)}}</p>
						  <!-- <p class="zan fr" type="1" blog_id="2347769">{{$v->good_num}}</p> -->
						<div class="clear"></div>
					</div>
					<a class="tit" href="/home/pubart/{{$v->art_id}}?read={{$v->read_num}}&comment={{getCom($v->id)}}" target="_blank">{{$v->title}}</a>
					<div class="con">@php echo strip_tags($v->contents) @endphp</div>
					<div class="bot">
            <span>阅读&nbsp;{{$v->read_num}}</span>
            <span>评论&nbsp;{{count($comment)}}</span>
            <div class="clear"></div>
					</div>
				</li>
			  @endforeach	
			</ul>
            		
        
		<!-- page -->
        <ul class="pagination">
<li>{!!$rs->links()!!}</li>

</ul>

  @else
    <div class = "noList">
        <!-- <img src="/static/picture/noList.png"> -->
        <p>暂无文章</p>
    </div>
  @endif
	</div>
	<script>
		$('#parent').click(function(){
			alert(($(this).children());
			});
	</script>
	<div class="Right fr">
		<ul class="artical-parent">
        	<li class="artical-parent-li artical-parent-li-1 on">
				<p class="title"><i></i><a href="/home/total">全部</a></p>
        	</li>
        	@foreach($info as $ks=>$vs)
			<li class="artical-parent-li artical-parent-li-2 ">
				<p class="title"><i></i><a id="parent" href="/home/total?pid=@php echo $ks @endphp">@php echo $vs[0] @endphp</a></p>
                				<ul class="artical-child">
                				@foreach($vs as $k=>$v)
                					<li class="artical-child-li ">
						<a href="http://blog.51cto.com/original/44">Linux</a>
					</li>
                			@endforeach
					
                				</ul>
                			</li>
			@endforeach       	
			
			        			</ul>
	</div>
	<div class="clear"></div>
</div>
<script>
	var praise_url = 'http://blog.51cto.com/praise/praise'
	setPraise($('.artical-list .top .zan'))
    $('body').css('background','#fff')
</script>
</div>

    <div class="rightTools">
      <a href="/home/article/create" class="aa" target="_blank">写文章</a>
      <a href="javascript:void(0);" class="gotop"></a>
</div>
 
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
</body>
</html>

@endsection