@extends('layout.homes')

@section('title',$title)

@section('content')
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="favicon" rel="shortcut icon" href="/favicon.ico" />
        <title>@yield('title')</title>
    <meta name="keywords" content="51CTO博客2.0,51CTO博客,IT博客,技术博客,原创技术文章,技术交流">
<meta name="description" content="51CTO博客2.0是国内领先的IT原创文章分享及交流平台,包含系统运维,云计算,大数据分析,Web开发入门,高可用架构,微服务,架构设计,PHP教程,Python入门,Java,数据库,网络安全,人工智能,区块链,移动开发技术,服务器,考试认证等文章。">    <link href="/static/css/base.css" rel="stylesheet"><link href="/static/css/header.css" rel="stylesheet"><link href="/static/css/other.css" rel="stylesheet"><link href="/static/css/list_tab.css" rel="stylesheet">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<script src="/bootstrap/js/bootstrap.min.js"></script>
<link href="/static/css/setting.css" rel="stylesheet">
    <script>
        var HOME_URL = 'http://home.51cto.com/';
    </script>
    <script src="https://static1.51cto.com/edu/center/js/jquery.min.js"></script><script src="https://static1.51cto.com/edu/blog/js/cookie.js"></script><script src="https://static1.51cto.com/edu/blog/js/login.js?v=1.0.0.7"></script><script src="https://static1.51cto.com/edu/blog/js/common.js?v=1.0.0.8"></script><script src="https://static1.51cto.com/edu/blog/js/mbox.js"></script><script src="https://static1.51cto.com/edu/blog/js/follow.js?v=1.0.0.8"></script><script src="https://static1.51cto.com/edu/blog/js/vip.js?v=1.0.0.1"></script><script src="https://static1.51cto.com/edu/blog/js/window.js?v=1.0.0.2"></script>
	
<img src="https://static1.51cto.com/edu/blog/mobile/images/share_default.jpg" border="0" style="width:0; height:0; position:absolute;">
<style type="text/css">
  .service-btn{
    width: 53px;
height: 36px;
color: #1ac6fe;
line-height: 16px;
padding-top: 50px;
    display: inline-block;
    background: url(http://i2.51cto.com/images/blog/201811/02/463350acf4c693cfb3dc248bc8a2a0eb.png) no-repeat center;
  }
  .service-btn:hover{
    background: url(http://i2.51cto.com/images/blog/201811/02/2d5fa2ff4eb9ef66847aff20ba4c8bae.png) no-repeat center;
height: 36px;
color: #fff;
line-height: 16px;
padding-top: 50px;
  }
</style>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script src="https://static1.51cto.com/edu/blog/mobile/js/lib/box.js"></script> 
<script>
    var isLogin = '1';
    var userId = '14169965';
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
    <div class="Page setting-box">
  <ul class="setting-title">
  <li  class="on"><a href="/home/type">文章管理</a></li>
      <li ><a href="/home/arttype">文章分类</a></li>
  <li ><a href="http://blog.51cto.com/blogger/setting#D">基本设置</a></li>
    <div class="clear"></div>
</ul> <div class="setting-content-3">
    <form action="http://blog.51cto.com/blogger/blog-manage" method="get" name="selectForm" id="selectForm">
      <div class="select-box">
        <div class="pulldown pulldown-1 fl">
                      <p class="reprint">未分类</p>
                    <input type="hidden" name="ccid" value="" id="ccid"/>
        </div>
        <div class="pulldown pulldown-2 fl">
                      <p class="reprint">全部</p>
                    <ul class="pulldown-list" for="blog_type">
            <li>全部</li>
                          <li value="1">原创</li>
                          <li value="2">转载</li>
                          <li value="3">翻译</li>
                      </ul>
          <input type="hidden" name="blog_type" value="" id="blog_type"/>
        </div>
        <div class="pulldown pulldown-3 fl">
                      <p class="reprint">全部</p>
                    <ul class="pulldown-list" for="is_hide">
            <li>全部</li>
                          <li value="0">公开</li>
                          <li value="1">隐藏</li>
                      </ul>
          <input type="hidden" name="is_hide" value="" id="is_hide"/>
        </div>
        <input class="select-btn blue-btn fl" type="submit" value="查找">
        <div class="clear"></div>
      </div>
    </form>
    <table>
      <thead>
        <tr>
          <td style="width: 70px;">选择</td>
          <td>标题</td>
          <td style="width: 70px;">类型</td>
          <td style="width: 70px;">分类</td>
          <td style="width: 100px;">发布日期</td>
          <td style="width: 140px;">操作</td>
        </tr>
      </thead>
      <tbody class="blog-list-table">
           {{--分类信息--}}
          @foreach($rs as $k=>$v)
                    <tr>
            <td><input type="checkbox" name="ids[]" value="2343868"></td>
            <td>
              <a class="title" target="_blank" href="http://blog.51cto.com/14179965/2343868">
                {{$v->title}}                                             </a>
            </td>
            <td><p>转载</p></td>
				@if($v->person !== '0' )
            <td><p>
					{{$v->person}}
            </p></td>
				@else
				 <td><p>
					未分类
				 </p></td>
				@endif
            <td><p class="time">2019-01-17 16:57:10</p></td>
            <td>
              <a class="edi btn btn-info" target="_blank" href="/home/type/{{$v->id}}/edit">编辑</a>
              		<form style="display:inline" action="/home/type/{{$v->id}}" method="post"> 
                              <p class="ding dingT" value="2343868"><button onclick="confirm('确认删除')"  class="btn btn-danger">删除</button></p>
						{{csrf_field()}}
						{{method_field('DELETE')}}
                    </form>
                          </td>
          </tr>
          @endforeach
                        </tbody>
    </table>
    <div class="bottom">
      <input class="fl" type="checkbox" name="check-all" id="check-all">
      <label class="fl" for="check-all">全选</label>
      <p class="select-name fl">移动到</p>
      <div class="pulldown pulldown-4 fl">
                  <p class="reprint">未分类</p>
                <input type="hidden" name="custom_id" value="" id="custom_id"></input>
      </div>
      <div class="remove-btn blue-btn fl">删除</div>
      <div class="clear"></div>
    </div>
      </div>
</div>
<script>
  var removeUrl = 'http://blog.51cto.com/blogger/operation';
</script>
</div>
<script src="https://static1.51cto.com/edu/blog/js/blog_manage.js?v=1.0.0.1"></script>   
    <div class="rightTools">
        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=3591348659&amp;site=qq&amp;menu=yes" class="qq"></a>
    <a href="http://blog.51cto.com/51ctoblog/2057444" class="yy" target="_blank"></a>
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
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
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
  var uid = '14169965';
  var BLOG_URL = 'http://blog.51cto.com/';
</script>
<script src="https://static1.51cto.com/edu//blog/js/jquery.cookie.js"></script>
<script src="https://static1.51cto.com/edu/blog/js/time-on-page.js?v=1.0.2" charset="utf-8"></script>
<script>
    (function(){
        var wh=$(window).height(),fh=$('.Footer').outerHeight(true),hh=$('.Header').outerHeight(true)
        $('.Content-box').css({'min-height': wh-fh-hh})
    })()
</script>

@stop