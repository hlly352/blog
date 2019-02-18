@extends('layout.homes')

@section('content')
 
<script src="static/js/box.js"></script> 
<script>
    var isLogin = '0';
    var userId = '';
    var imgpath = '';
    var BLOG_URL = '';
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
<script src="static/js/entrance.js" id="zhichiScript" class="zhiCustomBtn" data-args="manual=true"></script>


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
<!--广告-start-->
<div style="width:1200px;margin:0 auto;padding-top:10px;">
<!--/* OpenX Javascript Tag v2.8.9 */-->

<!--/*
  * The backup image section of this tag has been generated for use on a
  * non-SSL page. If this tag is to be placed on an SSL page, change the
  *   'http://gg.51cto.com/www/delivery/...'
  * to
  *   '1234://gg.51cto.com/www/delivery/...'
  *
  * This noscript section of this tag only shows image banners. There
  * is no width or height in these banners, so if you want these tags to
  * allocate space for the ad before it shows, you will need to add this
  * information to the <img> tag.
  *
  * If you do not want to deal with the intricities of the noscript
  * section, delete the tag (from <noscript>... to </noscript>). On
  * average, the noscript tag is called from less than 1% of internet
  * users.
  */-->

    <script type='text/javascript'>
        var m3_u = (location.protocol=='1234:'?'1234://gg.51cto.com/www/delivery/ajs.php':'http://gg2.51cto.com/www/delivery/ajs.php');
        var m3_r = Math.floor(Math.random()*99999999999);
        if (!document.MAX_used) document.MAX_used = ',';
        document.write ("<scr"+"ipt type='text/javascript' src='"+m3_u);
        document.write ("?zoneid=983");
        document.write ('&amp;cb=' + m3_r);
        if (document.MAX_used != ',') document.write ("&amp;exclude=" + document.MAX_used);
        document.write (document.charset ? '&amp;charset='+document.charset : (document.characterSet ? '&amp;charset='+document.characterSet : ''));
        document.write ("&amp;loc=" + escape(window.location));
        if (document.referrer) document.write ("&amp;referer=" + escape(document.referrer));
        if (document.context) document.write ("&context=" + escape(document.context));
        if (document.mmm_fo) document.write ("&amp;mmm_fo=1");
        document.write ("'><\/scr"+"ipt>");
    </script><noscript><a href='//gg.51cto.com/www/delivery/ck.php?n=ac8b447f&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='static/picture/avw.php' border='0' alt='' /></a></noscript>
</div>
<!--广告-end-->
<div class="Content Index" style="padding-top:10px;">
    <div class="Page">
    <div class="Left">
    <!-- category start-->
    <style>
        .cates li{padding-left:25px;}
    </style>
        <ul class="fl cates">
            <li class="title">全部分类</li>
      
            @foreach($info as $ks=>$vs)
            <li>
                <div class="layer1"></div>
                <div class="layer2">
                    <a href="/home/total?pid={{$ks}}" target="_blank">{{$vs[0]}}</a>
                                         
                </div>
                <div class="layer3">
                    <h3>{{$vs[0]}}</h3>
              @foreach($vs as $k=>$v)
                    <p>
              @if(is_array($v))
              @foreach($v as $key=>$value)
                        <a href="/home/total?pid={{$key}}" target="_blank">@php echo($value) @endphp</a>
                @endforeach  
              @endif     
                    </p>
            @endforeach
                </div>
            </li>


            @endforeach
  
        
        </ul>
      <!-- category end-->
      <!-- banners start-->
    <div class="banners" id="banners">
        <ul class="bannerList" id="bannerList">
            @if($banner)
            @foreach($banner as $k=>$v)
            <li class="cur">
                <a href="{{$v->link}}" target="_blank">
                    <img src="{{$v->pic}}">
                    <span>{{$v->title}}</span>
                </a>
            </li>
            @endforeach
            @else
            <li class="cur">
                <a href="http://blog.51cto.com/cloumn/composedetail?id=4" target="_blank">
                    <img src="static/picture/ecb2bf80e9bc163c9faca8f3490b94a0.png">
                    <span>网络工程师的看家本领 ——从零设计企业网络</span>
                </a>
            </li>
            <li class="">
                <a href="http://blog.51cto.com/cloumn/detail/45?dl" target="_blank">
                    <img src="static/picture/2a98fea055c1a3b9ed7c668e57be0cf9.jpg">
                    <span>Oracle的十八般武艺</span>
                </a>
            </li>
            <li class="">
                <a href="http://blog.51cto.com/huangyg/2339960?lb" target="_blank">
                    <img src="static/picture/fa95b70761b42ae78a4911e5646040b9.png">
                    <span>终于搞定了回家车票</span>
                </a>
            </li>
            <li class="">
                <a href="http://blog.51cto.com/cloumn/index?lb" target="_blank">
                    <img src="static/picture/581b1692d608304e3565a973c3c1f594.jpg">
                    <span>拼团来袭，2人组团，直降12元！</span>
                </a>
            </li>
            @endif
        </ul>
        <ul class="bannerDots" id="bannerDots"><li class="cur"></li><li ></li><li ></li><li ></li></ul>
        <button class="prev" id="bannerPrev"></button>
        <button class="next" id="bannerNext"></button>
    </div>
    <div class="clear"></div>
      <!-- banners end-->
      <!-- new-article start-->
    <div class="aListHead">
        <ul class="fl aListTab" id="aListTab">
            <li class="cur"><i class="buledot"></i>优质文章</li>
        </ul>
        
    </div>
    <!--普通文章-->
    <div class="aListDiv cur">
        <ul class="aList">
            <!--专栏推荐-->
            @foreach($rs as $k=>$value)
            @php 
                $profile = DB::table('userinfo')->where('uid',$value->uid)->first()->profile;
            @endphp
            <li id="blog_2342274" class='infos'>
                <div class="userInfo clearfix">
                    <div class="is-vip-bg fl" style="margin-right:10px;">
                        <a href="" target="_blank" style="margin-right:0;">
                            <img class="avatar is-vip-img is-vip-img-4" data-uid="905592" src="{{$profile}}"/>
                        </a>
                    </div>
                    <a class="name" href="" target="_blank">{{$value->author}}</a>
                    <span class="time">发布于:{{date('Y-m-d H:i:s',$value->addtime)}}</span>
                </div>
                <h2>
                    <a href="/home/pubart/{{$value->art_id}}?read={{$value->read_num}}&comment={{getCom($value->art_id)}}" title="title" class="reads" target="_blank">{{$value->title}}</a>
                    <input type="hidden" name="" value="{{$value->art_id}}">
                </h2>
                <p class="con">@php echo strip_tags($value->contents) @endphp</p>
                <div class="intro">
                    <a class="jing" href="javascript:void(0);">精选文章</a>                  
                    <p class="">阅读&nbsp;<span class="read_num">{{$value->read_num}}</span></p>
                    <p class="">评论&nbsp;<span class="comment_num">{{getCom($value->art_id)}}</span></p>
                    <p class="">收藏&nbsp;<span class="collect_num">{{$value->collect_num}}</span></p>
                    <p style="display:none;" class="admire_num_p">赞赏&nbsp;<span class="admire_num">{{$value->good_num}}</span></p>
                </div>
                <button class="zan favour_num" data-type="1" blog_id="2342274">{{$value->good_num}}</button>
                <input type="hidden" name="" value="{{$value->art_id}}">
                <input type="hidden" name="" value="{{session('userid')}}">
            </li>            
            @endforeach  
        </ul>
        <a href="/home/total" target="_blank" class="lookMore">点击浏览更多&gt;&gt;</a>
    </div>
    <!-- new-article end-->
</div>

<div class="Right">
    <div class="iWantWrite yes">
        <p>记录自己的技术轨迹</p>

        <a href="/home/article/create">我要写文章</a>
    </div>
    
  <ul class="News Box">
    <span>公告</span>
        @foreach($tips as $k=>$v)
        <li class="f" >
            <a href="" target="_blank"  class='blue'>{{$v->content}}</a>
        </li>
       @endforeach 
    </ul>

  
    <!-- 订阅专栏 end -->
   
        
        <!-- 热门推荐 start -->
        <h3 class="BoxTil">热门推荐 <a class="fr" href="/home/total" target="_blank">更多</a></h3>
        <div class="Box articles">
            <div class="list">
                <ul class="seven-list">
                    @foreach($res as $k=>$v)
                         <li style="list-style-type:none" class="s1"><a href="/home/pubart/{{$v->art_id}}" target="_blank">{{$v->title}}</a></li> 
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- 热门推荐 end -->
        

    </div>
    <div class="clear"></div>
</div>
@stop

@section('js')
<script type="text/javascript">
    $('.reads').click(function(){
        var artid = $(this).next().val();
        $.get('/article/reads',{artid:artid},function(data){
            if(data){               
                window.location.reload();
            }
        })
    })
    $('.zan').one('click',function(){
        var artids = $(this).next().val();
        var userid = $(this).next().next().val();
        if(userid){
            $.ajax({
                type:'GET',
                url:'/article/goods',
                data:{artids:artids},
                success:function(data){
                    if(data){
                        window.location.reload();
                    }
                }
            });
        } else {
            location.href = '/home/login';
        }
    })
</script>
@stop
