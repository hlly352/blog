@extends('layout.homes')

@section('title',$title)

@section('content')
    <meta charset="UTF-8">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <meta 1234-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="favicon" rel="shortcut icon" href="/favicon.ico" />
    <title></title>
    <meta name="keywords" content="qmp,qemu,hmp,kvm">
    <meta name="description" content="本文详解QMP，包含qmp、hmp、qemu-guest-agent的介绍、工作原理、配置方法、范例">    
    <link href="/static/css/header_2.css" rel="stylesheet">
    <link href="/static/css/other_2.css" rel="stylesheet">
    <link href="/static/css/right_2.css" rel="stylesheet">
    <link href="/static/css/blog_details.css" rel="stylesheet">
    <link href="/static/css/highlight.css" rel="stylesheet">
    <script src="/static/js/jquery.min_5.js"></script>
    <!-- <script src="/static/js/jquery-3.2.1.min.js"></script> -->
    <script src="/static/js/cookie_2.js"></script>
    <script src="/static/js/login_2.js"></script>
    <script src="/static/js/common_2.js"></script>
    <script src="/static/js/mbox_2.js"></script>
    <script src="/static/js/follow_2.js"></script>
    <script src="/static/js/vip_2.js"></script>
    <script src="/static/js/window_2.js"></script>

    <img src="/static/picture/share_default_2.jpg" border="0" style="width:0; height:0; position:absolute;">
    <style type="text/css">
      .service-btn{
        width: 53px;
        height: 36px;
        color: #1ac6fe;
        line-height: 16px;
        padding-top: 50px;
        display: inline-block;
        background: url(/static/images/463350acf4c693cfb3dc248bc8a2a0eb_5.png) no-repeat center;
      }
      .service-btn:hover{
        background: url(/static/images/2d5fa2ff4eb9ef66847aff20ba4c8bae_5.png) no-repeat center;
        height: 36px;
        color: #fff;
        line-height: 16px;
        padding-top: 50px;
      }
    </style>
    <script src="/static/js/box_2.js"></script> 
    <script src="/static/js/entrance_3.js" id="zhichiScript" class="zhiCustomBtn" data-args="manual=true"></script>

    <div class="Content-box">
        <link rel="stylesheet" href="/static/css/mdeshow.css">
        <link rel="stylesheet" href="/static/css/tinyscrollbar.css"/>
        <script type="text/javascript" src="/static/js/jquery.tinyscrollbar.js"></script>
        <div class="Content Index" style="padding-bottom: 50px;">
            <div class="Page M764">
                <!-- left start -->
                <div class="artical-Left-blog">
                    <div class="status">
                        <a class="tab_name original">原创</a>
                        <a class="tab_name translation" >推荐</a>     
                    </div>
                    <h1 class="artical-title">{{$rs->title}}</h1>
                    <div class="artical-title-list">
                        <div class="is-vip-bg-6 fl" style="height: 100px">
                            <a href="" class="a-img" target="_blank"><img class="is-vip-img is-vip-img-4" data-uid="905592" src="{{$img}}"></a>
                        </div>
                        <a href="" class="name fl" target="_blank" style="margin-right:0;">{{$rs->author}}</a>

                        <a class="comment comment-num fr"><font class="comment_number"></font></a>
                        <span class="fr"></span>
                        <a href="javascript:;" class="read fr"></a>
                        <a href="javascript:;" class="time fr">{{date('Y-m-d H:i:s',$rs->addtime)}}</a>
                        <div class="clear"></div>
                    </div>
                    <div class="artical-content-bak main-content">
                        <div class="con artical-content editor-preview-side">
                            
                            <blockquote>
                            <p>{{$rs->description}}</p>
                            </blockquote>
                            <p><strong>{{$rs->author}}的原创文章，欢迎转载</strong></p>
                            <hr />
                            {!!$rs->contents!!}
                        </div>
                    </div>
                    <div class="artical-copyright mt26">©著作权归作者所有：来自二郎巷博客作者{{$rs->author}}的原创作品，如需转载，请注明出处，否则将追究法律责任</div>
                    <div class="appreciate-box">
                        
                    </div>
                    @php
                        $artid = $rs->id;
                        $goods = \DB::table('art_info')->where('art_id',$artid)->first();
                    @endphp
                    <div class="more-list">
                        <p class="is-praise fl "><span type="1" blog_id="2342274" userid='905592'>{{$goods->good_num}}</span></p>
                        <input type="hidden" name="" value="{{$rs->id}}">
                        <div class="clear"></div>
                    </div>
                    <div class="author-module">
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="artical-Left" id="comment" style="margin:0 auto">
                    <!-- 发布评论 -->
                    <div class="comment-creat">
                        @if(session('userid'))
                        <div class="is-vip-bg-6 fl">
                            <a href="" class="header-img" target="_blank">
                                <img  src="{{$profile}}"/>
                            </a>
                        </div>
                        <div class="first-publish fr publish_user_id">
                            <textarea class="textareadiv textareadiv-publis" name="" id="" placeholder="用心的回复会被更多人看到和认可"  maxlength="500"></textarea>
                            <div class="comment-push">
                                <input type="hidden" id="artid" value="{{$rs->id}}"/>
                                <script>
                                //点赞
                                $('.is-praise').click(function(){
                                    //获取文章的id
                                    var artids = $(this).next().val();
                                    $.get('/article/goods',{artids:artids},function(data){
                                        if(data){
                                            window.location.reload();
                                        }
                                    })
                                })

                                $(function(){
                                    $('.cancel-btn-1').click(function(){
                                        $('.textareadiv').val('');
                                    });        
                                });
                                $(function(){
                                    $('.blue-btn').click(function(){
                                        var mes = $('.textareadiv').val();
                                        if(mes == ''){
                                            alert('内容不能为空');
                                        }else{
                                            var id = $('#artid').val();                  
                                            $.get('/article/comment',{id:id,mes:mes},function(data){
                                                if(data){
                                                    window.location.reload();  
                                                }
                                            });
                                        }
                                    });
                                });
                                
                                </script>
                                <p class="msg fl"></p>
                                <p class="blue-btn fr" style="padding:0 20px;cursor:pointer" >发布</p>
                                <p class="cancel-btn cancel-btn-1 fr">取消</p>
                                <div class="clear"></div>
                            </div>
                            <input type="hidden" class="user_id" value="905592" display>
                            <input type="hidden" class="reply_id" value="2342274">
                            <input type="hidden" class="first_pid" value="">
                        </div>
                        @else
                        <div class="is-vip-bg-6 fl"></div>
                        @endif
                        <div class="clear"></div>
                    </div>
                    <div class="comment-number" id="comment_pl" style="margin:0px;margin-top:30px;margin-bottom:30px">
                        <p class="number fl"><span class="comment_number">
                          {{$num}}
                        </span>条评论</p>

                        <a class="time-last time fr comment-sort" id="sort-desc" flag="desc" page="1"></a>
                        <a class="time-first time fr comment-sort on" id="sort-asc" flag="asc" page="2"></a>
                        <div class="clear"></div>
                    </div>
                    <div class="commentLists" style="margin-top:36px">
                        <!--显示评论-->
                        @foreach($info as $k=>$v)
                        <div class="commentList-box cbox-727805" id="727805" style="background: rgb(255, 255, 255);">
                            <div class="comment-1 publish_user_id reply_id_box comment_number-list" rid="727805">
                                <div class="top">
                                    <div class="is-vip-bg-6 fl header-con">
                                        <a href="" class="header-img">
                                            <img class="is-vip-img-bg is-vip-img-4" src="{{getImg($v->uid)}}">
                                        </a>
                                    </div>
                                    <div class="head-right jf-list-box">
                                        <p class="name">

                                            <a href="">
                                                {{getAuthor($v->uid)}}
                                            </a>
                                        </p>
                                        <div class="time">
                                            <span class="fl">
                                                {{$i++}}楼&nbsp;&nbsp;{{date('Y-m-d H:i:s',$v->addtime)}}</span>
                                            <span class="fr del" ><img src="/static/images/54s.png" /></span>
                                                <input type="hidden" value="{{$v->id}}" />    
                                            <div class="clear"></div>
                                        </div>
                                        <script>
                                        $('.del').unbind('click').on('click',function(event){   
                                            //获取评论的id                 
                                            var comid =  $(this).next().val();
                                            if(confirm('确认删除')){
                                                //通过ajax动态删除评论
                                                $.get('/article/delcom',{'comid':comid},function(data){
                                                    alert(data);
                                                    if(data){
                                                        window.location.reload();
                                                    }      
                                                });
                                            }
                                        });
                                        </script>
                                        <input type="hidden" class="reply_id" value="727805">
                                        <input type="hidden" class="user_id" value="14169965">
                                        <input type="hidden" class="first_pid" value="727805">
                                    </div>
                                </div>
                                <input type="hidden" name="" value="{{$v->id}}">
                                <div class="con msgs">{{$v->content}}</div> </div>
                        </div>
                        @endforeach          
                    </div>        
                    <!-- page -->
                    <div class="act_pageList_box"></div>
                </div>
                <!-- end left -->
                <!-- right start -->
                <div clasarts="Blog-Right artical-Right">
                    <a class="catalog"></a>
                    <a class="scrollTop" href="javascript:void(0);" onclick="$(window).scrollTop(0);"></a>
                </div>
                <!-- end right  -->
            </div>

            <div class="the-lowest-bg">
                <div class="the-lowest Page M764">
                    <p class="is-praise fl "><span type="1" blog_id="2342274" userid='905592'>1</span></p>
                    <p class="b-favorites favorites-opt fl"><i></i><b>0</b></p>
                    <a class="b-reply fl"><i></i><font class="comment_number"></font></a>
                    <div class="b-share fl">
                        <i></i>分享
                        <div class="bdsharebuttonbox">
                            <a class="bds_tsina p2" data-cmd="tsina"></a>
                            <a class="bds_sqq p3" data-cmd="sqq"></a>
                            <a class="bds_weixin p1" data-cmd="weixin"><em class="code-icon"></em><img class="code-img" src="/static/picture/768001fc752c4f0188d139c55aebd970.gif"></a>
                        </div>
                    </div>
                    <div class="b-fllow author-checkFollow fr" style="margin-left: 20px;">

                        <a id="checkFollow3_905592" class="follow-1 checkFollow on"></a>
                    </div>
                    <a href="" class="b-name fr"></a>
                    <div class="is-vip-bg-6 fr">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div></div>

<!-- 老博文美观处理 -->
<script src="/static/js/countdown.js"></script>
<script>
  var praise_url = '1234://blog.1234.com/praise/praise'
      addReply_url = '1234://blog.1234.com/comments/add'

      blog_id = '2342274'
      pv_log_info = {
            'pv_type':'blog',
            'user_id':'905592',
            'blog_id':'2342274'
        };
      rid = '0'
      is_comment = '0'
      comment_list = '/blog/ajax-comment-list'
      comment_sort = "asc"
      index_url = '1234://blog.1234.com/cyent';
      uc_url = '1234://ucenter.1234.com/'
      blog_url = '1234://blog.1234.com/'
      img_url = '1234:///static1.1234.com/edu/blog/'
      i_user_id = ''
      c_user_id ='905592'
      collect_url = '1234://blog.1234.com/collect/add'
      is_old = '0'
      nicknameurl = '1234://blog.1234.com/cyent'
      nickname = '小慢哥'
      myself = window.location.href;
  $('.you-like-list li:odd').css({'margin-left': '10%'});
  $('.column-box a:odd').addClass('left-list')
  $('.myUrl').text(myself).click(function(){window.open(myself)})
  setTimeout(function(){$('.Footer').css({'margin-top':'-50px'})},50)
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
    FollowBtn = new Follow($('#checkFollow1_905592'),'905592','1',['on','in','mutual','off']);
    FollowBtn.success=FollowBtnSucc;
    FollowBtn = new Follow($('#checkFollow2_905592'),'905592','1',['on','in','mutual','off']);
    FollowBtn.success=FollowBtnSucc;
    FollowBtn = new Follow($('#checkFollow3_905592'),'905592','1',['on','in','mutual','off']);
    FollowBtn.success=FollowBtnSucc;
          if(is_old==1){
    // SyntaxHighlighter.all();
    insertCodeElement("![](1234:\/\/fzxiaomange.com\/img\/qmp\/cover.png)\n\n> \u672c\u6587\u8be6\u89e3QMP\uff0c\u5305\u542bqmp\u3001hmp\u3001qemu-guest-agent\u7684\u4ecb\u7ecd\u3001\u5de5\u4f5c\u539f\u7406\u3001\u914d\u7f6e\u65b9\u6cd5\u3001\u8303\u4f8b\n\n**\u5c0f\u6162\u54e5\u7684\u539f\u521b\u6587\u7ae0\uff0c\u6b22\u8fce\u8f6c\u8f7d**\n\n---\n\n## \u76ee\u5f55\n\n\u25aa QMP\u4ecb\u7ecd\n\u25aa QMP\u8bed\u6cd5\n\u25aa \u5355\u72ec\u4f7f\u7528qemu\uff0c\u542f\u7528QMP\n\u25aa \u901a\u8fc7libvirt\u542f\u52a8qemu\uff0c\u542f\u7528QMP\n\u25aa qemu-guest-agent\uff08qemu-ga\uff09\n\u25aa \u5b98\u65b9\u53c2\u8003\u6587\u6863\n\n## QMP\u4ecb\u7ecd\n\nqemu\u5bf9\u5916\u63d0\u4f9b\u4e86\u4e00\u4e2asocket\u63a5\u53e3\uff0c\u79f0\u4e3aqemu monitor\uff0c\u901a\u8fc7\u8be5\u63a5\u53e3\uff0c\u53ef\u4ee5\u5bf9\u865a\u62df\u673a\u5b9e\u4f8b\u7684\u6574\u4e2a\u751f\u547d\u5468\u671f\u8fdb\u884c\u7ba1\u7406\uff0c\u4e3b\u8981\u6709\u5982\u4e0b\u529f\u80fd\n\n\u25b7 \u72b6\u6001\u67e5\u770b\u3001\u53d8\u66f4\n\u25b7 \u8bbe\u5907\u67e5\u770b\u3001\u53d8\u66f4\n\u25b7 \u6027\u80fd\u67e5\u770b\u3001\u9650\u5236\n\u25b7 \u5728\u7ebf\u8fc1\u79fb\n\u25b7 \u6570\u636e\u5907\u4efd\n\u25b7 \u8bbf\u95ee\u5185\u90e8\u64cd\u4f5c\u7cfb\u7edf\n\n\u901a\u8fc7\u8be5socket\u63a5\u53e3\u4f20\u9012\u4ea4\u4e92\u7684\u534f\u8bae\u662fqmp\uff0c\u5168\u79f0\u662fqemu monitor protocol\uff0c\u8fd9\u662f\u57fa\u4e8ejson\u683c\u5f0f\u7684\u534f\u8bae\n\n\u5728\u7ee7\u7eed\u5f80\u4e0b\u8bb2\u4e4b\u524d\uff0c\u9700\u8981\u5148\u4e86\u89e3qemu\u3001kvm\u3001libvirt\u4e4b\u95f4\u7684\u533a\u522b\uff08\u56e0\u4e3a\u6709\u5f88\u591a\u7ae5\u978b\u5bf9\u8fd9\u4e09\u8005\u7684\u7406\u89e3\u662f\u6df7\u4e71\u7684\uff09\n\n\u25b7 qemu\uff1a\u865a\u62df\u673a\u4eff\u771f\u5668\u3002\u901a\u8fc7\u8f6f\u4ef6\u6a21\u62df\u51facpu\u3001\u5185\u5b58\u3001\u78c1\u76d8\u3001\u4e3b\u677f\u3001\u7f51\u5361\u7b49\u8bbe\u5907\n\u25b7 kvm\uff1a\u9ad8\u6027\u80fd\u7684cpu\u4eff\u771f\u5668\u3002\u7531\u4e8e\u8f6f\u4ef6\u6a21\u62df\u7684cpu\u6027\u80fd\u5f88\u5dee\uff0c\u56e0\u6b64\u51fa\u73b0\u4e86kvm\uff0c\u8fd9\u662f\u901a\u8fc7\u786c\u4ef6\u4e0e\u5185\u6838\u7684\u652f\u6301\u5b9e\u73b0\u63a5\u8fd1native\u6027\u80fd\u7684cpu\u4eff\u771f\u5668\uff0c\u53ef\u4ee5\u7406\u89e3\u4e3a\u865a\u62df\u673a\u91cc\u7684cpu\u4efb\u52a1\u76f4\u63a5\u4ea4\u7ed9\u7269\u7406\u673acpu\u5b8c\u6210\u3002\n\u25b7 libvirt\uff1a\u865a\u62df\u673a\u7ba1\u7406\u5e73\u53f0\u3002\u80fd\u7eb3\u7ba1qemu\u3001lxc\u3001esx\u7b49\u865a\u62df\u5316\u8f6f\u4ef6\uff0c\u901a\u8fc7\u7f16\u5199xml\u5b9e\u73b0\u5bf9\u865a\u62df\u673a\u3001\u5b58\u50a8\u3001\u7f51\u7edc\u7b49\u8fdb\u884c\u914d\u7f6e\u548c\u7ba1\u7406\n\n> \u4e0a\u9762\u53ea\u63cf\u8ff0\u6700\u6838\u5fc3\u7684\u529f\u80fd\uff0c\u53e6\u6709\u4e00\u4e9b\u9ad8\u7ea7\u529f\u80fd\uff0c\u4ee5\u53ca\u4e92\u76f8\u91cd\u53e0\u7684\u529f\u80fd\u5728\u8fd9\u91cc\u4e0d\u505a\u63cf\u8ff0\uff0c\u5426\u5219\u5bb9\u6613\u6df7\u6dc6\n\n## QMP\u8bed\u6cd5\n\n```\n# \u4e0d\u5e26\u53c2\u6570\u7684\u6307\u4ee4\n{ \"execute\" : \"XXX\" }\n\n# \u5e26\u53c2\u6570\u7684\u6307\u4ee4\n{ \"execute\" : \"XXX\", \"arguments\" : { ... } }\n```\n\n## \u5355\u72ec\u4f7f\u7528qemu\uff0c\u542f\u7528QMP\n\n\u542f\u52a8qemu\u865a\u62df\u673a\n\n```\n# qemu monitor\u91c7\u7528tcp\u65b9\u5f0f\uff0c\u76d1\u542c\u5728127.0.0.1\u4e0a\uff0c\u7aef\u53e3\u4e3a4444\n\/usr\/libexec\/qemu-kvm -qmp tcp:127.0.0.1:4444,server,nowait\n\n# qemu monitor\u91c7\u7528unix socket\uff0csocket\u6587\u4ef6\u751f\u6210\u4e8e\/opt\/qmp.socket\n\/usr\/libexec\/qemu-kvm -qmp unix:\/opt\/qmp.socket,server,nowait\n```\n\n\u8fde\u63a5qemu monitor\n\n```\n# tcp\u53ef\u4ee5\u901a\u8fc7telnet\u8fdb\u884c\u8fde\u63a5\uff0c\u65b9\u6cd5\u5982\u4e0b\n> telnet 127.0.0.1 4444\nTrying 127.0.0.1...\nConnected to 127.0.0.1.\nEscape character is '^]'.\n{\"QMP\": {\"version\": {\"qemu\": {\"micro\": 0, \"minor\": 12, \"major\": 2}, \"package\": \"qemu-kvm-ev-2.12.0-18.el7_6.1.1\"}, \"capabilities\": []}}\n\n# unix socket\u53ef\u4ee5\u901a\u8fc7nc -U\u8fdb\u884c\u8fde\u63a5\uff0c\u65b9\u6cd5\u5982\u4e0b\n> nc -U qmp.socket\n{\"QMP\": {\"version\": {\"qemu\": {\"micro\": 0, \"minor\": 12, \"major\": 2}, \"package\": \"qemu-kvm-ev-2.12.0-18.el7_6.1.1\"}, \"capabilities\": []}}\n```\n\n\u6309\u7167\u4e0a\u9762\u6267\u884c\u5b8c\u547d\u4ee4\u540e\uff0c\u4e0d\u4f1a\u9000\u51fa\u800c\u662f\u7ee7\u7eed\u7b49\u5f85\u8f93\u5165\uff0c\u4f46\u8fd9\u4e2a\u65f6\u5019\u8fd8\u65e0\u6cd5\u4f7f\u7528\uff0c\u63a5\u7740\uff0c\u9700\u8981\u8f93\u5165\u4e00\u6761qmp\u6307\u4ee4\u624d\u53ef\u4ee5\n\n```\n{ \"execute\" : \"qmp_capabilities\" }\n```\n\n\u6b64\u65f6\u5c4f\u5e55\u4f1a\u8f93\u51fa\u4ee5\u4e0b\u5185\u5bb9\uff0c\u8868\u793a\u4ece\"capabilities negotiation\u6a21\u5f0f\"\u8fdb\u5165\u4e86\"command\"\u6a21\u5f0f\n\n```\n{\"return\": {}}\n```\n\n\u63a5\u4e0b\u6765\uff0c\u5c31\u53ef\u4ee5\u6267\u884cqmp\u7684\u6307\u4ee4\u4e86\uff0cqmp\u6307\u4ee4\u975e\u5e38\u591a\uff0c\u7531\u4e8e\u7bc7\u5e45\u6709\u9650\uff0c\u8fd9\u91cc\u4ec5\u4e3e\u51e0\u4e2a\u4f8b\u5b50\uff08\u66f4\u591a\u5185\u5bb9\u8bf7\u53c2\u8003\u5b98\u65b9\u6587\u6863\uff0c\u672c\u6587\u6700\u540e\u9644\u4e0a\u7f51\u5740\uff09\n\n```\n# \u67e5\u770b\u652f\u6301\u54ea\u4e9bqmp\u6307\u4ee4\n{ \"execute\": \"query-commands\" }\n\n# \u865a\u62df\u673a\u72b6\u6001\n{ \"execute\": \"query-status\" }\n\n# \u865a\u62df\u673a\u6682\u505c\n{ \"execute\": \"stop\" }\n\n# \u78c1\u76d8\u67e5\u770b\n{ \"execute\": \"query-block\" }\n\n# \u78c1\u76d8\u5728\u7ebf\u63d2\u5165\n{ \"execute\": \"blockdev-add\", \"arguments\": { \"driver\": \"qcow2\", \"node-name\": \"drive-virtio-disk1\", \"file\": { \"driver\": \"file\", \"filename\": \"\/opt\/data.qcow2\" } } }\n{ \"execute\": \"device_add\", \"arguments\": { \"driver\": \"virtio-blk-pci\", \"drive\": \"drive-virtio-disk1\" } }\n\n# \u78c1\u76d8\u5b8c\u6574\u5907\u4efd\n{ \"execute\" : \"drive-backup\" , \"arguments\" : { \"device\" : \"drive-virtio-disk0\" , \"sync\" : \"full\" , \"target\" : \"\/opt\/backuptest\/fullbackup.img\" } }\n```\n\n\u9664\u4e86\u4f7f\u7528telnet\u3001nc\u4ece\u5916\u90e8\u8fde\u63a5\uff0c\u8fd8\u53ef\u4ee5\u5728qemu\u542f\u52a8\u65f6\u5019\u8fdb\u5165\u4e00\u4e2a\u4ea4\u4e92\u7684cli\u754c\u9762\uff0c\u76f4\u63a5\u8f93\u5165\u6307\u4ee4\uff0c\u53ea\u4e0d\u8fc7\u8fd9\u4e2a\u65f6\u5019\u8f93\u5165\u7684\u662fhmp\uff08human monitor protocol\uff09\uff0c\u800c\u4e0d\u662fqmp\u3002hmp\u7b80\u5316\u4e86qmp\u7684\u4f7f\u7528\uff0c\u4f46\u5b9e\u9645\u5728\u5e95\u5c42\u4f9d\u7136\u662f\u8f6c\u5316\u4e3aqmp\u8fdb\u884c\u64cd\u4f5c\u7684\uff0c\u914d\u7f6e\u65b9\u6cd5\u5982\u4e0b\n\n```\n\/usr\/libexec\/qemu-kvm -qmp tcp:127.0.0.1:4444,server,nowait -monitor stdio\n```\n\n\u6b64\u65f6\u4f1a\u51fa\u73b0\u4ea4\u4e92\u754c\u9762\uff0c\u8f93\u5165help\uff0c\u5c31\u53ef\u4ee5\u770b\u5230hmp\u652f\u6301\u7684\u6240\u6709\u547d\u4ee4\n\n```\n(qemu) help\n```\n\n> \u4f7f\u7528hmp\u4e0d\u9700\u8981\u8f93\u5165\u7c7b\u4f3cqmp\u7684{ \"execute\" : \"qmp_capabilities\" }\n\n\u8fd9\u91cc\u5217\u51fa\u51e0\u4e2a\u8303\u4f8b\n\n```\n# \u76f4\u63a5\u8f93\u5165info\u56de\u8f66\uff0c\u53ef\u4ee5\u770b\u5230\u6240\u6709\u67e5\u8be2\u7c7b\u7684\u6307\u4ee4\u4f7f\u7528\u65b9\u6cd5\n(qemu) info\n\n# \u67e5\u770b\u5757\u8bbe\u5907\n(qemu) info block\n\n# \u5728\u7ebf\u589e\u52a0\u78c1\u76d8\n(qemu) drive_add 0 file=\/opt\/data.qcow2,format=qcow2,id=drive-virtio-disk1,if=none\n(qemu) device_add virtio-blk-pci,scsi=off,drive=drive-virtio-disk1\n```\n\n## \u901a\u8fc7libvirt\u542f\u52a8qemu\uff0c\u542f\u7528QMP\n\n\u67092\u79cd\u65b9\u6cd5\uff1a\n\n1\\. xml\u91cc\u4e0d\u505a\u4efb\u4f55\u989d\u5916\u914d\u7f6e\uff0c\u9ed8\u8ba4\u5c31\u4f1a\u542f\u7528QMP\uff0c\u4f46\u901a\u8fc7\u8fd9\u79cd\u65b9\u6cd5\u542f\u7528\u7684QMP\uff0c\u53ea\u80fd\u901a\u8fc7libvirt\u63a5\u53e3\uff08\u6bd4\u5982virsh\u547d\u4ee4\u6216libvirt api\uff09\u6765\u8fdb\u884cQMP\u6307\u4ee4\u7684\u8f93\u5165\uff0c\u800c\u4e0d\u80fd\u901a\u8fc7telnet\u3001nc\u4e4b\u7c7b\u7684\uff0c\u56e0\u4e3a\u9ed8\u8ba4\u542f\u7528\u7684QMP\uff0c\u53ea\u4f1a\u751f\u6210unix socket\uff08\u4f4d\u4e8e\/var\/lib\/libvirt\/qemu\/domain-xx-DOMAIN\/monitor.sock\uff09\uff0c\u800c\u8be5socket\u88ablibvirtd\u59cb\u7ec8\u8fde\u63a5\u5360\u7528\u7740\u3002\u6b64\u65f6\u901a\u8fc7ps aux\u547d\u4ee4\u53ef\u4ee5\u770b\u5230qemu\u8fdb\u7a0b\u53c2\u6570\uff0c\u548c\u4e4b\u524d\u6709\u70b9\u4e0d\u592a\u4e00\u6837\uff0c\u4e0d\u662f-qmp\uff0c\u800c\u662f\u5982\u4e0b\n\n```\n-chardev socket,id=charmonitor,fd=36,server,nowait \\\n-mon chardev=charmonitor,id=monitor,mode=control\n```\n\n> qemu\u547d\u4ee4\u53c2\u6570\u652f\u63012\u79cd\u65b9\u6cd5\u914d\u7f6eqmp\uff0c\u5373-qmp\u548c-mon\n\n\u8fd9\u91cc\u901a\u8fc7virsh\u505a\u4e2a\u7b80\u5355\u793a\u8303\n\n```\nvirsh qemu-monitor-command DOMAIN --pretty '{ \"execute\": \"query-block\" }'\n```\n\n> \u4f7f\u7528--pretty\u662f\u4e3a\u4e86\u8ba9json\u7684\u8f93\u51fa\u5177\u6709\u6362\u884c\u7f29\u8fdb\u7684\u683c\u5f0f\u5316\u6548\u679c\uff0c\u800c\u4e0d\u662f\u6253\u5370\u5728\u4e00\u884c\u91cc\n> \u4e0d\u9700\u8981\u5728\u6267\u884c\u5176\u4ed6\u6307\u4ee4\u524d\u6267\u884c{ \"execute\" : \"qmp_capabilities\" }\n\n2\\. \u5728xml\u91cc\u989d\u5916\u589e\u52a02\u6bb5\u914d\u7f6e\uff0c\u6ce8\u610f\u770b\u4e0b\u9762\u8fd9\u4e2axml\u7684\u7b2c\u4e00\u884c\uff0c\u9700\u8981\u589e\u52a0\u4e00\u4e2axmlns:qemu\uff0c\u53e6\u5916\u5728<domain>\u91cc\u589e\u52a0<qemu:command>\n\n```\n<domain type='kvm' xmlns:qemu='1234:\/\/libvirt.org\/schemas\/domain\/qemu\/1.0'>\n  ...\n  <devices>\n    ...\n  <\/devices>\n  <qemu:commandline>\n    <qemu:arg value='-qmp'\/>\n    <qemu:arg value='unix:\/tmp\/qmp-sock,server,nowait'\/>\n  <\/qemu:commandline>\n<\/domain>\n```\n\n\u63a5\u7740\u901a\u8fc7libvirt\u542f\u52a8qemu\uff08\u6bd4\u5982virsh start xxx\uff09\uff0c\u5c31\u521b\u5efa\u4e862\u4e2aqmp\u901a\u9053\uff0c\u4e00\u4e2a\u662flibvirt\u9ed8\u8ba4\u521b\u5efa\u7684\uff0c\u53ef\u4ee5\u4f9d\u7136\u4f7f\u7528libvirt\u63a5\u53e3\u6765\u6267\u884cQMP\u6307\u4ee4\uff0c\u53e6\u4e00\u4e2a\u5c31\u662f\u81ea\u5b9a\u4e49\u7684qmp\uff0c\u53ef\u4ee5\u901a\u8fc7\u4e0a\u9762\u63d0\u5230\u7684nc\u6765\u4f7f\u7528\n\n```\nnc -U \/tmp\/qmp-sock\n```\n\nlibvirt\u4e5f\u652f\u6301hmp\uff1a\n\n```\nvirsh qemu-monitor-command DOMAIN --hmp 'info block'\n```\n\n## qemu-guest-agent\uff08qemu-ga\uff09\n\n\u901a\u8fc7qmp\u8fd8\u53ef\u4ee5\u5bf9\u865a\u62df\u673a\u5185\u7684\u64cd\u4f5c\u7cfb\u7edf\u8fdb\u884cRPC\u64cd\u4f5c\uff0c\u5176\u539f\u7406\u662f\uff1a\n\n1\\. \u5148\u5728xml\u91cc\u914d\u7f6echannel\u6bb5\uff0c\u7136\u540e\u542f\u52a8\u865a\u62df\u673a\uff0c\u4f1a\u5728\u5bbf\u4e3b\u673a\u4e0a\u751f\u6210\u4e00\u4e2aunix socket\uff0c\u540c\u65f6\u5728vm\u91cc\u751f\u6210\u4e00\u4e2a\u5b57\u7b26\u8bbe\u5907\uff0c\u751f\u6210\u7684unix socket\u548c\u5b57\u7b26\u8bbe\u5907\u53ef\u4ee5\u7406\u89e3\u4e3a\u4e00\u4e2achannel\u96a7\u9053\u7684\u4e24\u7aef\n2\\. \u865a\u62df\u673a\u91cc\u8981\u542f\u52a8qemu-guest-agent\u5b88\u62a4\u8fdb\u7a0b\uff0c\u8be5\u5b88\u62a4\u8fdb\u7a0b\u4f1a\u76d1\u542c\u5b57\u7b26\u8bbe\u5907\n3\\. \u7136\u540e\u53ef\u4ee5\u5728\u5bbf\u4e3b\u673a\u4e0a\u5c06\u865a\u62df\u673a\u91cc\u7684qemu-guest-agent\u6240\u652f\u6301\u7684RPC\u6307\u4ee4\u7ecf\u8fc7channel\u53d1\u9001\u5230\u865a\u62df\u673a\u91cc\uff0c\u865a\u62df\u673a\u91cc\u7684qemu-guest-agent\u4ece\u5b57\u7b26\u8bbe\u5907\u6536\u5230\u6570\u636e\u540e\uff0c\u6267\u884c\u6307\u4ee4\uff0c\u6bd4\u5982\u8bfb\u5199\u6587\u4ef6\u3001\u4fee\u6539\u5bc6\u7801\u7b49\u7b49\n\n\u82e5\u8981\u4f7f\u7528qemu-guest-agent\u9700\u8981\u6ee1\u8db3\u4ee5\u4e0b\u6761\u4ef6\n\n1\\. xml\u91cc\u914d\u7f6echannel\uff0c\u8303\u4f8b\uff1a\n```\n<domain type='kvm'>\n  ...\n  <devices>\n    ...\n    <channel type='unix'>\n      <source mode='bind' path='\/tmp\/channel.sock'\/>\n      <target type='virtio' name='org.qemu.guest_agent.0'\/>\n    <\/channel>\n  <\/devices>\n<\/domain>\n```\n\n> \u6ce8\u610f\uff0cpath\u53ef\u4ee5\u81ea\u5b9a\u4e49\uff0c\u4f46name\u9700\u8981\u4fdd\u6301org.qemu.guest_agent.0\uff0c\u56e0\u4e3a\u8fd9\u4f1a\u5f71\u54cd\u865a\u62df\u673a\u91cc\u5b57\u7b26\u8bbe\u5907\u7684\u6587\u4ef6\u540d\uff0c\u800c\u865a\u62df\u673a\u91cc\u7684qemu-guest-agent\u670d\u52a1\u9ed8\u8ba4\u8bfb\u53d6\u7684\u662f\u5bf9\u5e94org.qemu.guest_agent.0\u7684\u5b57\u7b26\u8bbe\u5907\uff0c\u5982\u679c\u6539\u4e86name\uff0c\u90a3\u4e48qemu-guest-agent\u7684\u914d\u7f6e\u6587\u4ef6\u4e5f\u8981\u8ddf\u7740\u6539\uff0c\u6539\u6210\u5bf9\u5e94name\u7684\u8def\u5f84\n\n2\\. \u865a\u62df\u673a\u5185\u7684\u64cd\u4f5c\u7cfb\u7edf\u5185\u6838\u9700\u8981\u652f\u6301\uff08linux\u3001windows\u5747\u652f\u6301\uff09\n\n3\\. \u865a\u62df\u673a\u91cc\u8981\u5b89\u88c5\u5e76\u542f\u52a8qemu-ga\u7684\u670d\u52a1\uff08\u6bd4\u5982centos\u53ef\u4ee5yum install qemu-ga && systemctl start qemu-guest-agent\uff0cwindows\u901a\u8fc7\u5bfc\u5165virtio-win\u7684iso\uff0c\u8be5iso\u91cc\u5305\u542b\u6709qemu-ga\u7a0b\u5e8f\uff09\n\n\u5f53\u6309\u7167\u4e0a\u8ff0\u914d\u7f6e\u597d\u540e\uff0c\u53ef\u4ee5\u5728\u5bbf\u4e3b\u673a\u4e0a\u8fdb\u884cRPC\u64cd\u4f5c\n\n```\n# \u6d4b\u8bd5\u865a\u62df\u673a\u91cc\u7684qemu-guest-agent\u662f\u5426\u53ef\u7528\nvirsh qemu-agent-command DOMAIN --pretty '{ \"execute\": \"guest-ping\" }'\n\n# \u67e5\u770b\u652f\u6301\u7684qemu-guest-agent\u6307\u4ee4\nvirsh qemu-agent-command DOMAIN --pretty '{ \"execute\": \"guest-info\" }'\n\n# \u83b7\u5f97\u7f51\u5361\u4fe1\u606f\nvirsh qemu-agent-command DOMAIN --pretty '{ \"execute\": \"guest-network-get-interfaces\" }'\n\n# \u6267\u884c\u547d\u4ee4\uff0c\u8fd9\u662f\u5f02\u6b65\u7684\uff0c\u7b2c\u4e00\u6b65\u4f1a\u8fd4\u56de\u4e00\u4e2apid\uff0c\u5047\u8bbe\u4e3a797\uff0c\u5728\u7b2c\u4e8c\u6b65\u9700\u8981\u5e26\u4e0a\u8fd9\u4e2apid\nvirsh qemu-agent-command DOMAIN --pretty '{ \"execute\": \"guest-exec\", \"arguments\": { \"path\": \"ip\", \"arg\": [ \"addr\", \"list\" ], \"capture-output\": true } }'\nvirsh qemu-agent-command DOMAIN --pretty '{ \"execute\": \"guest-exec-status\", \"arguments\": { \"pid\": 797 } }'\n```\n\n> qemu-guest-agent\u4e0d\u652f\u6301hmp\u8c03\u7528\n\n\u865a\u62df\u673a\u91cc\u7684\/etc\/sysconfig\/qemu-ga\u5185\u5bb9\u4e2d\u7684BLACKLIST_RPC\u53c2\u6570\u53ef\u4ee5\u914d\u7f6e\u7981\u6b62\u54ea\u4e9b\u6307\u4ee4\n\n## \u5b98\u65b9\u53c2\u8003\u6587\u6863\n\n```\n# qemu\n1234:\/\/qemu.weilnetz.de\/doc\/qemu-doc.html\n\n# qmp\n1234:\/\/qemu.weilnetz.de\/doc\/qemu-qmp-ref.html\n\n# qemu-guest-agent\n1234:\/\/qemu.weilnetz.de\/doc\/qemu-ga-ref.html\n```", '#result');
  }

  function insertCodeElement(content, container){
    container = container || document;
    // 创建一个 div 来放置获取到的内容，这样就可以把 content 字符串内容转换成 dom
    // 方便我们对这个 dom 进行操作（只是创建 div，并没有插入到文档，他只存在于内存中）
    var parent = document.createElement('div');
    parent.innerHTML = content;

    // 找到 parent 中的所有 pre 标签，并遍历
    var $pres = $(parent).find('pre');
    $pres.each(function(index, el) {
      var $el = $(el),
          html = $el.html(),
          code = document.createElement('code'),
          elClass = $el.attr('class');
      if(!elClass) {return};
          // 获取 pre 标签中，class 属性中包含的本段代码所有的编程语言
      var language = elClass.substring(6, elClass.indexOf(';'));

      code.className = 'language-' + language;
      code.innerHTML = html;

      $el.html(code);
    });

    $(container).html(parent.innerHTML);

    // 最后，调用 Prism 的方法来高亮代码
    Prism.highlightAll();
  }
  window._bd_share_config={
    "common":{
      "bdText":"基于QMP实现对qemu虚拟机进行交互",
      "bdDesc":$("#abstract_bdshare").text(),
      "bdMini":"2",
      "bdMiniList":false,
      "bdPic":"1234://s1.1234.com/images/201710/25/bd540a4f14d822f6e69087758699358b.jpg",
      "bdStyle":"0",
      "bdSize":"16"
    },
    "share":{}
  };
  with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='1234://bdimg.share.baidu.com//static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
  setTimeout(function(){
    $('.bdsharebuttonbox a').removeAttr('title')
  },1000);

  var now_time = 1547728491; //当前时间
  setInterval(function(){now_time+=0.01},10);

  // 初始化页面
  updatePage();
  // 页面tab切换
  zDate.visibilityAction(function () {
    zDate.getServerTime(function (e) {
      var updateResult = new Date(e).getTime();
      now_time = +updateResult.toString().substr(0, 10);
      updatePage();
    });
   })

  // 页面刷新
  function updatePage() {
    $('.presell').each(function(index, item) {
      var end_time = $(this).data('end'); // 结束时间
      if (!end_time) {
        return;
      }
      var me = $(this);
      if (me.lastTime) {
        clearInterval(me.lastTime);
        me.lastTime = null;
      } else {
        me.lastTime = setInterval(function() {
          zDate.setLastTimePc(me.find('.timespan'), (end_time*1000-now_time*1000), me.lastTime, function() {
            me.parents('.right').find('.cloumn-subscribe').removeClass('presell-color');
            me.remove();
            $('.pre-tips').remove();
          });
        }, 10);
      }
    });
  }
    //二维码显示
    $(".group_git_box").hover(function(){
      $(this).parents('.group_img_box').find(".group_code_box").show()
    },function(){
      $(this).parents('.group_img_box').find(".group_code_box").hide()
    })  
</script>
</div>
<script src="/static/js/marked.min.js"></script>
<script src="/static/js/highlight.js"></script>
<script src="/static/js/detail_mp.js"></script>
<script src="/static/js/detail.js"></script>
<script src="/static/js/details_new.js"></script>
<script src="/static/js/copy.js"></script>   <!--  <script src="/static/js/pvlog_1.js"></script> -->
<script>
  $(".gotop").click(function(){$(window).scrollTop(0)})
</script>


    <script type="text/javascript">
    //百度统计代码
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "1234://hm.baidu.com/hm.js?2283d46608159c3b39fc9f1178809c21";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();

    //自动推送链接
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === '1234') {
            bp.src = '1234://zz.bd/static.com/linksubmit/push.js';
        }
        else {
            bp.src = '1234://push.zhanzhang.baidu.com/push.js';
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
          vds.src = ('1234:' == document.location.protocol ? '1234://' : '1234://') + 'assets.growingio.com/vds.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(vds, s);
        })();
      })();
      //document.write(decodeURI("%3Cscript src='1234://tongji.1234.com/frontend/tj.gif' type='text/javascript'%3E%3C/script%3E"));
    </script>
    
<script>
  var uid = '';
  var BLOG_URL = '1234://blog.1234.com/';
</script>
<script src="/static/js/jquery.cookie_2.js"></script>
<script src="/static/js/time-on-page_2.js" charset="utf-8"></script>
<script>
    (function(){
        var wh=$(window).height(),fh=$('.Footer').outerHeight(true),hh=$('.Header').outerHeight(true)
        $('.Content-box').css({'min-height': wh-fh-hh})
    })()
</script>
@stop

