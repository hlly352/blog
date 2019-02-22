@extends('layout.homes')
@section('content')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="favicon" rel="shortcut icon" href="/favicon.ico" />
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="mQiidwMZ1I_jK7MUtaabGmVGv4p3Vqlb0IHEyRMu4FnrGGwTLzY9PtJ-PY37KQ3nu0D1LY-dw7Oz2gnR-ZvWJg==">
    
    <meta name="keywords" content="51CTO博客2.0,51CTO博客,IT博客,技术博客,原创技术文章,技术交流">
<meta name="description" content="51CTO博客2.0是国内领先的IT原创文章分享及交流平台,包含系统运维,云计算,大数据分析,Web开发入门,高可用架构,微服务,架构设计,PHP教程,Python入门,Java,数据库,网络安全,人工智能,区块链,移动开发技术,服务器,考试认证等文章。">    <link href="/static/css/header.css" rel="stylesheet"><link href="/static/css/other.css" rel="stylesheet"><link href="/static/css/publish.css" rel="stylesheet">
    <script>
        var HOME_URL = 'http://home.51cto.com/';
    </script>
    <script src="/static/js/jquery.min.js"></script><script src="/static/js/cookie.js"></script><script src="/static/js/login.js"></script><script src="/static/js/common.js"></script><script src="/static/js/mbox.js"></script><script src="/static/js/follow.js"></script><script src="/static/js/vip.js"></script><script src="/static/js/window.js"></script>
<body>
<img src="/static/image/share.png" border="0" style="width:0; height:0; position:absolute;">
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

<script src="/staticedu/blog/mobile/js/lib/box.js"></script> 
@if(session('success'))
    <script>
        
       alert(session('success'));   
    </script>
  
    
@endif
@if(session('error'))
    <script>
        
       alert('文章存储失败');   
    </script>
  
@endif
<script>
    var isLogin = '1';
    var userId = '14169965';
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
 <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="/static/js/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/js/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/static/zh-cn.js"></script>
<!--  <script src="//www.sobot.com/chat/frame/js/entrance.js?sysNum=a8d9379eaf884b4f81a48348979e3b1a" id="zhichiScript" class="zhiCustomBtn" data-args="manual=true"></script> -->


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

zhiManager.set('userinfo', {partnerId:'14169965',uname:'wx5c40423391747',params:'{"用户名":"wx5c40423391747"}'});
zhiManager.set('customMargin', 20);
zhiManager.set('horizontal', 20);
zhiManager.set('vertical', 90);
zhiManager.set('preVisitArgs',{'preVisitUrl': document.referrer?document.referrer:''});
zhiManager.set('curVisitArgs',{'curVisitUrl': location.href,curVisitTitle:document.title,});
</script>
<div class="Content-box">
    <script type="text/javascript" charset="utf-8" src="http://blog.51cto.com/static/js/ueditor1.4.3/prism.js?v=1.0.1"></script>
<script type="text/javascript" charset="utf-8" src="http://blog.51cto.com/static/js/ueditor1.4.3/ueditor.config.js?v=1.0.1"></script>
<script type="text/javascript" charset="utf-8" src="http://blog.51cto.com/static/js/ueditor1.4.3/ueditor.all.js?v=1.0.3"></script>
<style>
    #edui1 {width: 99.8% !important}
    .edui-default .edui-editor-iframeholder {width: 99.8% !important;}
</style>
<div class="Page Max noFooter">
    <form action="/home/type/{{$art->id}}" method="post" name="blogForm" id="blogForm">
        <div class="blog-title-bg" style="position: relative;z-index: 19;">
            <div class="blog-title">
                <div class="pulldown pulldown-title fl">
                                            <p class="reprint">标题</p>
                                        <ul class="pulldown-list" for="blog_type">
                                                    <li value="1">原创</li>
                                                    <li value="2">转载</li>
                                                    <li value="3">翻译</li>
                                            </ul>
                    <input type="hidden" name="blog_type" value="" id="blog_type"></input>
                </div>
                <div class="titleCon"><input class="fl" type="text" name="title" id="title" value="{{$art->title}}" autocomplete="off" placeholder="标题，支持50个字" maxlength="50"></div>
                <div class="clear"></div>
            </div>
            <p class="publish-msg">标题</p>
        </div>
        <div class="blog-type-bg">
            <p class="publish-msg">标题</p>
        </div>
        <div class="reprint-list">
            <input type="radio" name="copy_code" value="1" id="source"  checked="checked"  checked="checked" ><label for="source">转载请注明出处</label>
            <input type="radio" name="copy_code" value="2" id="authorization" ><label for="authorization">转载需作者授权</label>
            <input type="radio" name="copy_code" value="3" id="noallow"  ><label for="noallow">谢绝转载</label>
        </div>
        <div>
  
    <script id="editor" type="text/plain" style="width:1265px;height:500px;margin-top:20px">{!!$art->contents!!}</script>
</div>




<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


  
</script>
        <style>
            .cate{height:40px;}
        </style>
        <div class="select-box">
            
            
            <select name="first" id="first" class="form-control cate pulldown system-select system-two fl">   
                @foreach($rs as $k=>$v)
                
                    @if($v->path == '0,')
                        @if($pid == $v->id)
                            <option selected value={{$v->id}}>{{$v->name}}</option>
                        @else
                            <option value={{$v->id}}>{{$v->name}}</option>
                        @endif
                    @endif    
                
                @endforeach
                </select> 
          
                <select name="twice" id="twice" class="form-control cate pulldown system-select system-two fl">
                   
                    @foreach($min_type as $ks=>$vs)
                        @if($type_id == $vs->id)
                            <option selected value="{{$vs->id}}">{{$vs->name}}</option>
                        @else    
                            <option value="{{$vs->id}}">{{$vs->name}}</option>
                        @endif    
                    @endforeach
                </select>
                <script>
                    $('#first').live('change',function(){
                        var upid = $('#first').val();
                        var ob = $(this);
                       ob.next('select').empty();
                        
                    $.get('/homes/ajax',{'pid':upid},function(data){
                        var twice = $('#twice');
                  
                        if(data.length>0){
                        for(var i=0;i<data.length;i++){
                            //把得到数据插入到option中
                            if(data[i].id == 38){
                                    var option = '<option selected value="'+data[i].id+'">'+data[i].name+'</option>';
                                } else {
                                    var option = '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                }
                           console.log(option);
                            twice.append(option);

                        }
                        console.log(twice);

                    ob.after(twice);
                    }
                
              
                     },'json');
                        });
                </script>
             

                @if(isset($mytype))
                <select name="other" id="" class="form-control cate pulldown system-select system-two fl">
    
                    
           
                   @foreach($mytype as $ks=>$vs)
                    @if($art->person == $vs->id)
                        <option selected value={{$vs->id}}>{{$vs->name}}</option>
                    @else
                        <option value={{$vs->id}}>{{$vs->name}}</option>
                    @endif
                   @endforeach
        
                
                </select>
                @else
                 <div class="pulldown system-select myself fl cate">
                  <input style="font-size:29px;color:#999;background:white;margin-right: 0;" placeholder = "请添加博客分类" name = "person">
                </div>
              @endif
           
                                 
                <input name="custom_id" id="custom_id" value="" type="hidden">
            </div>
            <div class="clear"></div>
            <p class="publish-msg">分类</p>
        </div>
       <div class="select-tab-bg">
            <div class="select-tab" style="width:88%;margin-left:60px;margin-top:-10px">
                <div class="show-select-tab fl" >
                                    </div>
                <input type="text" id="for-tag" placeholder="标签最多设置5个，用，或；间隔" maxlength="20" name="keywords" value="{{$art->keywords}}">
                <input name="" id="tag" type="hidden" >
                <div class="clear"></div>
            </div>
            <p class="publish-msg">标签</p>
        </div>
        <div class="textarea-box" style="margin-left:60px;width:90%">
            <textarea name="description" id="abstract" cols="150" rows="1" maxlength="500" placeholder="文章摘要，最多支持500个字，不填摘要默认提取正文前200个字展示">{{$art->description}}</textarea>
        </div>
                <div class="advanced-options">
            <p></p>
            <div class="advanced-options-box">
                <input type="checkbox" name="is_comment" value="2" ><label for="">禁止评论</label>
                <input type="checkbox" name="top_time" value="1" ><label for="">置顶</label>
            </div>
        </div>
        <div class="SubmitBtns">
            <div class="Page Max">
                <div class="public-box">
                   
                    <div class="btns fr">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input class="btn-1 fr" type="submit" id="submit" value="修改文章">
                        <input type="hidden" name="did" id="did" value="">
                        <p class="btn-3 fr"></p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <input type="hidden" id="blog_id" name="blog_id" value="">
        <input type="hidden" name="is_old" value="1" />
        <input type="hidden" name="_csrf" value="mQiidwMZ1I_jK7MUtaabGmVGv4p3Vqlb0IHEyRMu4FnrGGwTLzY9PtJ-PY37KQ3nu0D1LY-dw7Oz2gnR-ZvWJg==" />
    </form>
</div>

</div>
<script src="/static/js/jquery.form.js"></script><script src="/staticedu/blog/js/blog_publish.js?v=1.0.1.4"></script><script src="/staticedu/blog/js/blog_form.js?v=1.0.0.6"></script>
<script src="/staticedu//blog/js/jquery.cookie.js"></script>
<script src="/staticedu/blog/js/time-on-page.js?v=1.0.2" charset="utf-8"></script>
<script>
    (function(){
        var wh=$(window).height(),fh=$('.Footer').outerHeight(true),hh=$('.Header').outerHeight(true)
        $('.Content-box').css({'min-height': wh-fh-hh})
    })()
</script>

@stop