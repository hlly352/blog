@extends('layout.homes')

@section('title',$title)

@section('content')
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="favicon" rel="shortcut icon" href="/favicon.ico" />
        
    <meta name="keywords" content="51CTO博客2.0,51CTO博客,IT博客,技术博客,原创技术文章,技术交流">
<meta name="description" content="51CTO博客2.0是国内领先的IT原创文章分享及交流平台,包含系统运维,云计算,大数据分析,Web开发入门,高可用架构,微服务,架构设计,PHP教程,Python入门,Java,数据库,网络安全,人工智能,区块链,移动开发技术,服务器,考试认证等文章。">    
	<link href="/static/css/base.css" rel="stylesheet">
	<link href="/static/css/header.css" rel="stylesheet">
	<link href="/static/css/other.css" rel="stylesheet">
	<link href="/static/css/list_tab.css" rel="stylesheet">
	<link href="/static/css/setting.css" rel="stylesheet">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
	<script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/cookie.js"></script>
    <script src="/static/js/login.js"></script>
    <script src="/static/js/common.js"></script>
    <script src="/static/js/mbox.js"></script>
    <script src="/static/js/follow.js"></script>
    <script src="/static/js/vip.js"></script>
    <script src="/static/js/window.js"></script>
<img src="/static/mobile/images/share_default.jpg" border="0" style="width:0; height:0; position:absolute;">
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

<script src="/static/js/box.js"></script> 
<script>
    var isLogin = '1';
    var userId = '14169969';
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
  
</script>
 <div class="Content-box">
    <div class="Page setting-box">
    <ul class="setting-title">
	<li ><a href="/home/type">文章管理</a></li>
    	<li  class="on"><a href="/home/arttype">文章分类</a></li>
	
		<div class="clear"></div>
</ul>    <div class="setting-content-2">
  
        <table>
            <thead>
                <tr>
                    <td style="width: 70px;">序号</td>
                    <td>分类</td>
                    <td style="width: 70px;">操作</td>
                </tr>
            </thead>
            <tbody>
                   @foreach($types as $k=>$v)
                   	@if($v != '0')
     				 <tr>
                        <td>
                        	<input class="number" type="text" name="" value="{{$i++}}" disabled/>
                        </td>
                        <td>
                        	<input class="title" type="text" name="" value="{{$v}}">
                        </td>
                        <td>  
                            <form action="/home/arttype/{{$v}}" method="post">                      	
                             	<button  class="btn btn-warning">删除</button> 
                                {{csrf_field()}}
                                {{method_field('DELETE')}}  
                            </form>                      	
                         </td>

                    </tr>
              		@endif
                  @endforeach
            </tbody>
			</table>
		<div class="btn-box">
			<p class="add-input fl">添加分类</p>
			<p class="save-input blue-btn fr">保存</p>
            <input type="hidden" name="_csrf" value="acr0HLqMqIWGS01_7B8oIfAyvjRQVjfbaQtK0mnxepI8Az1njDF_CnoGDEZz8s3ALT2--8LbSHVEsX9W2fEOHg=="/>
            <div class="clear"></div>
        </div>
    
    </div>
</div>
<script>
    // 添加分类
    var success_msg = '';
    var error_msg = '';
    if(success_msg){
        new AutoBox({content:success_msg,mask:"#000",autoClose:5})
    }else if(error_msg){
        new AutoBox({content:error_msg,mask:"#000",autoClose:3})
    }
    $('.add-input').click(function(){
        var i = $('#cateFrom tbody tr').length;
        if(i>=20){
            new AutoBox({content:'您最多可添加20个分类',mask:"#000",autoClose:3})
            return false;
        }
        var max_sort = i ? $('#cateFrom tbody tr:nth-child('+ i +')').find('.number').val() : 0;
        var new_sort = parseInt(max_sort) + 1;
        var tr = '<tr><td><input class="number" name="sort[]" type="text" value="' + new_sort + '"/></td><td><input class="title" name="name[]" type="text" placeholder="请输入分类"></td><td><p class="close" data-id="0"></p></td></tr>';
        $('.setting-content-2 table').append(tr);
    })
    $('#cateFrom tbody tr td p.close').live('click',function(){//删除分类
        var box = $(this).parent().parent();
        var id = $(this).data('id');
        if(id > '0'){
            new AutoBox({content:'<div style="padding: 0 30px 30px;">确定要删除该条分类？删除以后该分类下的文章可以在全部分类下查看</div>',Yes:'确定',No:'取消','W': '500',mask:"#000",yc:function(){
                $.ajax({
                    url:'/blogger/del-cate',
                    type:"post",
                    data:{id:id},
                    dataType:'json',
                    success:function(res){
                        if(res.status == '0'){
                            box.remove();
                        }else{
                            new AutoBox({content:res.msg,mask:"#000",autoClose:3})
                        }
                    }
                });
            }})
        }else{
            box.remove();
        }
        return true;
    });
    $('.setting-content-2 .number').keyup(function(){
        var text = $(this).val().replace(/[^\d]/g, '')
        if($(this).length > 0 && $(this).length < 20){
            $(this).val(text)
        }
    })
    $('.save-input').click(function(){
        var errorMsg = '';
        var title_arr = new Array();
        $('#cateFrom .title').each(function(i,v){
            var title = $.trim($(v).val());
            var is_a = $.inArray(title, title_arr);
            if(is_a > 0){
                errorMsg = '分类名称重复';
            }
            if(errorMsg!='') return false;
            title_arr.push(title);
            if(title.length>15){
                errorMsg = '分类名称不要超过15字符';
            }else if(title.length<=0){
                errorMsg = '分类名称不要为空';
            }
        });
        if(errorMsg){
            new AutoBox({content:errorMsg,mask:"#000",autoClose:3})
            return false;
        }
        if($('#cateFrom .title').length > 20){
            new AutoBox({content:'您最多可添加20个分类',mask:"#000",autoClose:3})
        }
        $('#cateFrom').submit();
    });
</script>
</div>

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
            bp.src = '/static/js/push.js';
        }
        else {
            bp.src = '/static/js/pushh.js';
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
  var uid = '14169969';
  var BLOG_URL = 'http://blog.51cto.com/';
</script>
<script src="/static/js/jquery.cookie.js"></script>
<script src="/static/js/time-on-page.js?v=1.0.2" charset="utf-8"></script>
<script>
    (function(){
        var wh=$(window).height(),fh=$('.Footer').outerHeight(true),hh=$('.Header').outerHeight(true)
        $('.Content-box').css({'min-height': wh-fh-hh})
    })()
</script>
</body>
</html>

@endsection