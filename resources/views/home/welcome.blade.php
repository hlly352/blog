@extends('layout.homes')




@section('content')
 
<script src="static/js/box.js"></script> 
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
  *   'https://gg.51cto.com/www/delivery/...'
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
        var m3_u = (location.protocol=='https:'?'https://gg.51cto.com/www/delivery/ajs.php':'http://gg2.51cto.com/www/delivery/ajs.php');
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
        <ul class="fl cates">
            <li class="title">全部分类</li>
            <li>
                <div class="layer1"></div>
                <div class="layer2">
                    <a href="http://blog.51cto.com/artcommend/27" target="_blank">系统/运维</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/28" target="_blank">云计算</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/29" target="_blank">大数据</a>
                </div>
                <div class="layer3">
                    <h3>系统/运维</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/44" target="_blank">Linux</a>
                        <a href="http://blog.51cto.com/artcommend/45" target="_blank">Windows</a>
                        <a href="http://blog.51cto.com/artcommend/46" target="_blank">Unix</a>
                        <a href="http://blog.51cto.com/artcommend/6" target="_blank">其他</a>
                    </p>
                    <h3>云计算</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/47" target="_blank">OpenStack</a>
                        <a href="http://blog.51cto.com/artcommend/48" target="_blank">虚拟化</a>
                        <a href="http://blog.51cto.com/artcommend/49" target="_blank">云平台</a>
                        <a href="http://blog.51cto.com/artcommend/50" target="_blank">Office 365</a>
                        <a href="http://blog.51cto.com/artcommend/51" target="_blank">云服务</a>
                        <a href="http://blog.51cto.com/artcommend/52" target="_blank">Docker</a>
                        <a href="http://blog.51cto.com/artcommend/53" target="_blank">其他</a>
                    </p>
                    <h3>大数据</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/54" target="_blank">Hadoop</a>
                        <a href="http://blog.51cto.com/artcommend/55" target="_blank">Spark</a>
                        <a href="http://blog.51cto.com/artcommend/56" target="_blank">Storm</a>
                        <a href="http://blog.51cto.com/artcommend/57" target="_blank">Hive</a>
                        <a href="http://blog.51cto.com/artcommend/58" target="_blank">Yarn</a>
                        <a href="http://blog.51cto.com/artcommend/59" target="_blank">其他</a>
                    </p>
                </div>
            </li>
            <li>
                <div class="layer1"></div>
                <div class="layer2">
                    <a href="http://blog.51cto.com/artcommend/30" target="_blank">Web开发</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/31" target="_blank">编程语言</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/32" target="_blank">软件研发</a>
                </div>
                <div class="layer3">
                    <h3>Web开发</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/60" target="_blank">PHP</a>
                        <a href="http://blog.51cto.com/artcommend/61" target="_blank">Html/CSS</a>
                        <a href="http://blog.51cto.com/artcommend/62" target="_blank">JavaScript</a>
                        <a href="http://blog.51cto.com/artcommend/63" target="_blank">jQuery</a>
                        <a href="http://blog.51cto.com/artcommend/64" target="_blank">Node.js</a>
                        <a href="http://blog.51cto.com/artcommend/65" target="_blank">XML/XSL</a>
                        <a href="http://blog.51cto.com/artcommend/16" target="_blank">其他</a>
                    </p>
                    <h3>编程语言</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/66" target="_blank">Python</a>
                        <a href="http://blog.51cto.com/artcommend/15" target="_blank">Java</a>
                        <a href="http://blog.51cto.com/artcommend/18" target="_blank">C/C++</a>
                        <a href="http://blog.51cto.com/artcommend/17" target="_blank">.Net</a>
                        <a href="http://blog.51cto.com/artcommend/67" target="_blank">Ruby</a>
                        <a href="http://blog.51cto.com/artcommend/68" target="_blank">Go语言</a>
                        <a href="http://blog.51cto.com/artcommend/69" target="_blank">R语言</a>
                        <a href="http://blog.51cto.com/artcommend/8" target="_blank">其他</a>
                    </p>
                    <h3>软件研发</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/19" target="_blank">软件测试</a>
                        <a href="http://blog.51cto.com/artcommend/70" target="_blank">敏捷开发</a>
                        <a href="http://blog.51cto.com/artcommend/71" target="_blank">研发管理</a>
                        <a href="http://blog.51cto.com/artcommend/72" target="_blank">软件设计</a>
                        <a href="http://blog.51cto.com/artcommend/73" target="_blank">软件架构</a>
                        <a href="http://blog.51cto.com/artcommend/74" target="_blank">其他</a>
                    </p>
                </div>
            </li>
            <li>
                <div class="layer1"></div>
                <div class="layer2">
                    <a href="http://blog.51cto.com/artcommend/33" target="_blank">考试认证</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/35" target="_blank">网络/安全</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/34" target="_blank">数据库</a>
                    </div>
                <div class="layer3">
                    <h3>考试认证</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/75" target="_blank">软考</a>
                        <a href="http://blog.51cto.com/artcommend/76" target="_blank">红帽认证</a>
                        <a href="http://blog.51cto.com/artcommend/77" target="_blank">华为认证</a>
                        <a href="http://blog.51cto.com/artcommend/78" target="_blank">思科认证</a>
                        <a href="http://blog.51cto.com/artcommend/79" target="_blank">微软认证</a>
                        <a href="http://blog.51cto.com/artcommend/80" target="_blank">H3C认证</a>
                        <a href="http://blog.51cto.com/artcommend/81" target="_blank">等级考试</a>
                        <a href="http://blog.51cto.com/artcommend/131" target="_blank">PMP</a>
                        <a href="http://blog.51cto.com/artcommend/82" target="_blank">其他</a>
                    </p>
                    <h3>网络/安全</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/89" target="_blank">网络管理</a>
                        <a href="http://blog.51cto.com/artcommend/1" target="_blank">路由交换</a>
                        <a href="http://blog.51cto.com/artcommend/2" target="_blank">安全技术</a>
                        <a href="http://blog.51cto.com/artcommend/90" target="_blank">通信技术</a>
                        <a href="http://blog.51cto.com/artcommend/91" target="_blank">数据中心</a>
                        <a href="http://blog.51cto.com/artcommend/14" target="_blank">其他</a>
                    </p>
                    <h3>数据库</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/83" target="_blank">MySQL</a>
                        <a href="http://blog.51cto.com/artcommend/84" target="_blank">Oracle</a>
                        <a href="http://blog.51cto.com/artcommend/85" target="_blank">NoSQL</a>
                        <a href="http://blog.51cto.com/artcommend/130" target="_blank">SQL Server</a>
                        <a href="http://blog.51cto.com/artcommend/87" target="_blank">Hbase</a>
                        <a href="http://blog.51cto.com/artcommend/86" target="_blank">MongoDB</a>
                        <a href="http://blog.51cto.com/artcommend/88" target="_blank">Sybase</a>
                        <a href="http://blog.51cto.com/artcommend/7" target="_blank">其他</a>
                    </p>
                </div>
            </li>
            <li>
                <div class="layer1"></div>
                <div class="layer2">
                    <a href="http://blog.51cto.com/artcommend/36" target="_blank">人工智能</a>
                    <span></span>               
                    <a href="http://blog.51cto.com/artcommend/37" target="_blank">移动开发</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/38" target="_blank">游戏开发</a>
                </div>
                <div class="layer3">
                    <h3>人工智能</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/92" target="_blank">深度学习</a>
                        <a href="http://blog.51cto.com/artcommend/93" target="_blank">机器人开发</a>
                        <a href="http://blog.51cto.com/artcommend/94" target="_blank">其他</a>
                    </p>
                    <h3>移动开发</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/95" target="_blank">HTML5</a>
                        <a href="http://blog.51cto.com/artcommend/96" target="_blank">移动测试</a>
                        <a href="http://blog.51cto.com/artcommend/97" target="_blank">微信开发</a>
                        <a href="http://blog.51cto.com/artcommend/98" target="_blank">iOS</a>
                        <a href="http://blog.51cto.com/artcommend/99" target="_blank">Android</a>
                        <a href="http://blog.51cto.com/artcommend/100" target="_blank">Swift</a>
                        <a href="http://blog.51cto.com/artcommend/26" target="_blank">其他</a>
                    </p>
                    <h3>游戏开发</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/101" target="_blank">Unity3D</a>
                        <a href="http://blog.51cto.com/artcommend/102" target="_blank">Cocos2d-x</a>
                        <a href="http://blog.51cto.com/artcommend/103" target="_blank">VR虚拟现实</a>
                        <a href="http://blog.51cto.com/artcommend/104" target="_blank">手游开发</a>
                        <a href="http://blog.51cto.com/artcommend/105" target="_blank">3D游戏</a>
                        <a href="http://blog.51cto.com/artcommend/106" target="_blank">其他</a>
                    </p>
                </div>
            </li>
            <li>
                <div class="layer1"></div>
                <div class="layer2">
                    <a href="http://blog.51cto.com/artcommend/39" target="_blank">嵌入式</a>
                    <span></span>               
                    <a href="http://blog.51cto.com/artcommend/40" target="_blank">服务器</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/41" target="_blank">企业信息化</a>
                </div>
                <div class="layer3">
                    <h3>嵌入式</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/107" target="_blank">嵌入式Linux</a>
                        <a href="http://blog.51cto.com/artcommend/108" target="_blank">驱动/内核开发</a>
                        <a href="http://blog.51cto.com/artcommend/109" target="_blank">单片机/工控</a>
                        <a href="http://blog.51cto.com/artcommend/110" target="_blank">物联网</a>
                        <a href="http://blog.51cto.com/artcommend/111" target="_blank">智能硬件</a>
                        <a href="http://blog.51cto.com/artcommend/112" target="_blank">其他</a>
                    </p>
                    <h3>服务器</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/113" target="_blank">Exchange</a>
                        <a href="http://blog.51cto.com/artcommend/114" target="_blank">Windows Server</a>
                        <a href="http://blog.51cto.com/artcommend/115" target="_blank">Lync</a>
                        <a href="http://blog.51cto.com/artcommend/116" target="_blank">SharePoint</a>
                        <a href="http://blog.51cto.com/artcommend/117" target="_blank">Nginx</a>
                        <a href="http://blog.51cto.com/artcommend/118" target="_blank">集群</a>
                        <a href="http://blog.51cto.com/artcommend/119" target="_blank">分布式</a>
                        <a href="http://blog.51cto.com/artcommend/120" target="_blank">邮件服务器</a>
                        <a href="http://blog.51cto.com/artcommend/3" target="_blank">其他</a>
                    </p>
                    <h3>企业信息化</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/20" target="_blank">项目管理</a>
                        <a href="http://blog.51cto.com/artcommend/121" target="_blank">ERP</a>
                        <a href="http://blog.51cto.com/artcommend/122" target="_blank">CRM</a>
                        <a href="http://blog.51cto.com/artcommend/123" target="_blank">BPM</a>
                        <a href="http://blog.51cto.com/artcommend/13" target="_blank">管理软件</a>
                        <a href="http://blog.51cto.com/artcommend/9" target="_blank">其他</a>
                    </p>
                </div>
            </li>
            <li>
                <div class="layer1"></div>
                <div class="layer2">
                    <a href="http://blog.51cto.com/artcommend/42" target="_blank">Office办公</a>
                    <span></span>                
                    <a href="http://blog.51cto.com/artcommend/43" target="_blank">其它</a>
                </div>
                <div class="layer3">
                    <h3>Office办公</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/124" target="_blank">Excel</a>
                        <a href="http://blog.51cto.com/artcommend/125" target="_blank">PPT</a>
                        <a href="http://blog.51cto.com/artcommend/126" target="_blank">Word</a>
                        <a href="http://blog.51cto.com/artcommend/127" target="_blank">其他</a>
                    </p>
                    <h3>其它</h3>
                    <p>
                        <a href="http://blog.51cto.com/artcommend/10" target="_blank">IT职场</a>
                        <a href="http://blog.51cto.com/artcommend/21" target="_blank">IT业界</a>
                        <a href="http://blog.51cto.com/artcommend/12" target="_blank">其他</a>
                     </p>
                    <!-- <a href="http://blog.51cto.com/cloumn/index?pc" target="_blank" style="margin-top:20px;"><img src="static/picture/348-91.png" style="display:block;"></a>-->
                </div>
            </li>
        </ul>
      <!-- category end-->
      <!-- banners start-->
    <div class="banners" id="banners">
        <ul class="bannerList" id="bannerList">
            @foreach($banner as $k=>$v)
            <li class="cur">
                <a href="{{$v->link}}" target="_blank">
                    <img src="{{$v->pic}}">
                    <span>{{$v->title}}</span>
                </a>
            </li>
            @endforeach
            <!-- <li class="">
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
            </li> -->
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
        <a style="float: right;" href="http://51ctoblog.blog.51cto.com/26414/1944698" target="_blank" class="iwant fr">我要上首页</a>
    </div>
      <!--普通文章-->
    <div class="aListDiv cur">
        <ul class="aList">
                     <!--专栏推荐-->
            @foreach($rs as $k=>$value)
            <li id="blog_2342274" class=' '>
                <div class="userInfo clearfix">
                    <div class="is-vip-bg fl" style="margin-right:10px;">
                        <a href="http://blog.51cto.com/cyent" target="_blank" style="margin-right:0;">
                            <img class="avatar is-vip-img is-vip-img-4" data-uid="905592" src="static/picture/noavatar_middle.gif"/>
                        </a>
                    </div>
                    <a class="name" href="http://blog.51cto.com/cyent" target="_blank">{{$value->author}}</a>
                    <span class="time">发布于:{{date('Y-m-d H:i:s',$value->addtime)}}</span>
                </div>
                <h2>
                    <a href="/home/article/{{$value->art_id}}?read={{$value->read_num}}&comment={{getCom($value->art_id)}}" title="title">{{$value->title}}</a>
                </h2>
                <p class="con">{!!$value->contents!!}</p>
                <div class="intro">
                    <a class="jing" href="http://blog.51cto.com/artcommend" target="_blank">精选文章</a>                  
                    <p class="">阅读&nbsp;<span class="read_num">{{$value->read_num}}</span></p>
                    <p class="">评论&nbsp;<span class="comment_num">{{getCom($value->art_id)}}</span></p>
                    <p class="">收藏&nbsp;<span class="collect_num">{{$value->collect_num}}</span></p>
                    <p style="display:none;" class="admire_num_p">赞赏&nbsp;<span class="admire_num">{{$value->good_num}}</span></p>
                </div>
                <button class="zan favour_num" data-type="1" blog_id="2342274">0</button>
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
        <li class="f" ><span>公告</span>
            <a href="http://blog.51cto.com/51ctoblog/2069953?gongg" target="_blank"  class='blue'>51CTO博客2.0常见问题解答&QAQ</a>
        </li>
        <li>
            <a href="http://blog.51cto.com/51ctoblog/2343471" target="_blank"  class='blue'>51CTO订阅专栏作者申请标准</a>
        </li>
    </ul>
  
    <!-- 订阅专栏 end -->
    <h3 class="BoxTil">推荐作者 <a class="fr" href="/expert" target="_blank">更多</a></h3>
        <div class="Box BlogerList bd">
            <ul>
                <li style="border:0;">
                    <div class="pic">
                        <div class="is-vip-bg">
                            <a class="fl" href="http://blog.51cto.com/suifu" target="_blank">
                                <img class="is-vip-img is-vip-img-0" data-uid="9167728" src="static/picture/wkiol1lkq46cukwfaaasq8xix2m460.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="main">
                        <h4>
                            <a href="http://blog.51cto.com/suifu" target="_blank">贺磊</a>
                            <a id="checkFollow_9167728" class="follow-1 checkFollow on fr">关注</a>
                        </h4>
                        <dl><dt>321W+</dt><dd>人气</dd></dl>
                        <dl><dt>694</dt><dd>评论</dd></dl>
                        <dl><dt>889</dt><dd>点赞</dd></dl>
                        <div class="clear"></div>
                    </div>
                </li>
                <script>
                    FollowBtn = new Follow($('#checkFollow_9167728'),'9167728','1',['on','in','mutual','off'])
                    FollowBtn.success=FollowBtnSucc
                </script>               
            </ul>
        </div>
        
        <h3 class="BoxTil">粉丝榜TOP10<span style="font-size:14px">(专栏作者)</span></h3>
        <div class="Box BlogerList bd">
            <ul class="followUsers-list">
                <li class="num-one">
                    <span class="num-list">1</span>
                    <div class="pic">
                        <div class="is-vip-bg">
                            <a class="fl" href="http://blog.51cto.com/gingerbeer" target="_blank">
                                <img class="is-vip-img is-vip-img-0" data-uid="625855" src="static/picture/avatar.php"/>
                            </a>
                        </div>
                    </div>
                    <a class="name" href="http://blog.51cto.com/gingerbeer" target="_blank">姜汁啤酒</a>
                    <div class="followUsers-right">
                        <a class="number">3288</a>
                        <div class="clear"></div>
                    </div>
                </li>
                <script>
                    FollowBtn = new Follow($('#checkFollow10_625855'),'625855','1',['on','in','mutual','off'])
                      FollowBtn.success=FollowBtnSucc
                </script>
                <div class="clear"></div>
            </ul>
        </div>
        
        <!-- 热门推荐 start -->
        <h3 class="BoxTil">热门推荐 <a class="fr" href="http://blog.51cto.com/artcommend" target="_blank">更多</a></h3>
        <div class="Box articles">
            <div class="list">
                <ul class="seven-list">
                    <li class="s1"><a href="http://blog.51cto.com/cyent/2342274" target="_blank">基于QMP实现对qemu虚拟机进行交互</a></li> 
                </ul>
            </div>
        </div>
        <!-- 热门推荐 end -->
        
        <h3 class="BoxTil">博文动态</h3>
        <div class="Box articles">
            <div class="list">
                <ul class="seven-list">
                     <li class="s1"><a href="http://blog.51cto.com/13988201/2343866" target="_blank">图片侵权难题，华为云告诉你怎么办！</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
@stop
