<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="bEYyRUJUdDkrJUMtCCclWgEPQgggYS1QWHRgIi0WAXMqC3UJcicDdA==">
	<title>{{$title}}</title>
	<meta name="keywords" content="51CTO技术家园">
	<meta name="description" content="51CTO技术家园">
	<link href="/homes/center/css/public.css" rel="stylesheet">
	<link href="/homes/center/css/myzy.css" rel="stylesheet">
	<script src="/homes/center/js/jquery.min.js"></script>
	<script src="/homes/center/js/system/yii.js"></script>
	<script src="/homes/center/js/51cto.js"></script>
	<script src="/homes/center/js/jquery.message.js"></script>
	<script src="/homes/center/js/public.js"></script>
	<script src="/homes/center/js/imgscal.js"></script>
	<script src="/homes/center/js/jquery.masonry.min.js"></script>
	<script src="/homes/center/js/tip/jquery.cluetip.js"></script>
	<script src="/homes/center/js/public/ts_common.js"></script>
	<script src="/homes/center/js/public/space.js"></script>
	<script src="/homes/center/js/public/follow.js"></script>
	<script src="/homes/center/js/public/msg.js"></script>	
</head>
<!--简导航开始-->
<body>
<div class="Fheader">
    <div class="center clearfix">
        <div class="Fheader_l left clearfix"  style="width:610px;" >
            <ul class="clearfix">
                <li><a href="/">二郎巷博客</a><b class="line"></b></li>   
            </ul>
        </div>
        <div style="width:590px;" class="Fheader_r right clearfix" id ="login_status">
            <ul class="clearfix">               
                <li><a href="" style="padding-right:0;"><strong class="usericon">
                	<img  src="{{$info->profile}}"   alt="头像" /></strong>{{$user->username}}</a>&nbsp;
                </li>
                <li><a href="/home/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<!--简导航结束-->
<!--导航开始-->
<div class="Fnav">
    <div class="center clearfix">
        <div class="Fnav_l left">
            <dl class="clearfix">
                <dt><a href="/home"><font size="5px">二郎巷博客</font></a></dt>
                <dd class=""><a href="/">首页</a></dd>
                <dd class="curr" ><a href="Javascript:void(0)">个人主页</a></dd>
               <!--  <dd class=""><a href="" class="position_r">消息中心<b class="dot position_a"></b></a></dd> -->
                <!-- <dd class=""><a target="_blank" href="">充值中心</a>
                <dd class=""><a style=" position:relative;" target="_blank" href="">会员中心<img width="41" height="39" style=" position:absolute; bottom:10px;" alt="" src="1234://static1.51cto.com/home/web/images/vip.png"></a>
                </dd> -->
            </dl>
        </div>
    </div>
</div>
<!--导航结束-->
<!--主体开始-->
<div class="main mb20">
    <div class="center clearfix">
        <div class="mainindex_l left">           
		    <div class="memdatabox clearfix white_box mb20" id="Editor_num">
		        <div class="portbox left">
		            <div class="mb10">
		                <a class="tx_100 position_r" href="">
		                 	<table width="100%">
		                 		<tr>
		                 			<td height="100"><img src="{{$info->profile}}"  alt="头像" width="100"/></td>
		                 		</tr>
		                 	</table>
		                </a>
		            </div>
            		<div class="datas clearfix">
                		<div class="num left tc"></div>
	                	<!-- <div class="line left"></div> -->
	                	<div class="num right tc"></div>
            	    </div>
        	    </div>
            	<div class="port_m_box left  ml20" >
                	<div class="name">
                		<a href="" class="left">{{$user->username}}</a>          
                    </div>
                    <div class="my_messages">
                        <span class="Mes_num">性别：
                        	@if($info->sex !=2)
                        	<b>{{$info->sex==0?'男':'女'}}</b>
                        	@else
                        	<b>暂无</b>
                        	@endif
                        </span>
                        
                    </div>
                    <div class="my_messages">
                    	<span  class="Mes_num">使用邮箱：<b>{{$info->email}}</b></span>  
                    </div>
                    <div class="my_messages">
                    	<span  class="Mes_num"><a href="/home/center/{{$info->id}}/edit">修改资料</a></b></span>  
                    </div>
    	            <div class="my_title" id="jsUserHonor"></div>
            	</div>        
   		    </div>
		<!--用户发送私信-->
		<div style = "display:none" class ="jsFansSendMsg">
		    <dl class="dl_340 pl20 mb10 clearfix">
		        <dt class="left mt5">主题：</dt>
		        <dd class="left validation_or">
		            <span><input name="title" type="text" class="pop_input_290 inputtext_del t14" placeholder="最多输入30个字" /><span class="cl_red jsTitleError"></span></span>
		        </dd>
		    </dl>
		    <dl class="dl_340 pl20 mb10 clearfix">
		        <dt class="left mt5">内容：</dt>
		        <dd class="left validation_or">
		            <span><textarea name="content" cols="" rows="" class="pop_area_290 inputtext_del t14" placeholder="最多输入500个字"></textarea><span class="cl_red jsContentError"></span></span>
		        </dd>
		    </dl>
		</div>
		<div class="index_tabbox">
            <div class="tab_sub white_box">
	            <ul class="clearfix">
	                <li class="first cur_tab"><a href="">我的动态</a></li>
	            </ul>
        	</div>
        	<input type="hidden" name="uid" id ="jsUserId" value="14169969">
            <div class="tab_conbox">
                <!--我的动态开始-->
                <div class="tab_con">
                    <div class="white_box">
                        <div class="tabin_screen">
                            <ul class="clearfix">
                                <li class="scr_cur"><a href="">全部</a></li>
                                <li class=""><a href="">博客</a></li>
                                <li class=""><a href="">收藏</a></li>
                                <li class=""><a href="">其他</a></li>
                            </ul>
                        </div>
                        <div class="pt30 pb30 tc">
                        	<span class="t16">您还有没动态记录，赶快活跃起来让更多人认识你！</span>
                        </div>
                    </div>
                    <input type = "hidden" name = "page" id ="jsCurrentPage" value=1 />
                    <input type="hidden" name = "count" id = "jsFeedType" value ="user">
                    <input type = "hidden" name = "appType" id = "jsAppType" value="all">
                    <input type = "hidden" name = "uid" id = "jsUserId" value="14169969">
                </div>
                <!--我的动态结束-->
            </div>
        </div>
    </div>   
	<div class="mainindex_r right">
    <!-- 我的个人中心入口 -->
        <div class="Operation white_box mb20" style="width: 100px;">
	        <ul class="clearfix">
	            <li class="left"><a target="_blank" href="/home/article/create" class="bke">写博文</a></li>
	            <!-- <li class="left"><a target="_blank" href="" class="ftie">发帖</a></li> -->
	        </ul>
    	</div>
	    <!-- 我的快捷入口 -->
	    	    
	</div>
	<div class = "jsEditFollowRemark" style="display: none">
	    <div class="tl t12 mb15 pl20 validation_or">
	        <span>备注名</span>
	            <span class="pl10">
	                <input class="pop_input_140 t14 inputtext_del" type="text" name="remark">
	                <input  type="hidden" name="followId">
	            </span>
	        <div>
	            <span class="cl_red pl5" style="padding-left:45px;"></span>
	        </div>
	    </div>
	</div>
</div>
<!--主体结束-->

<!--底部开始-->
<div class="Ffooter">
    <div class="center">
        <p>Copyright © 2005-2019 二郎巷博客 京ICP证060544号 版权所有 未经许可 请勿转载</p>
    </div>
</div>
<!--底部开始-->

<!--意见反馈-->
<div class="feedback" style="display:none">
	<div class="popyjdatil">
    	<dl class="dl_400 pl20 mb10 clearfix">
            <dt class="left mt5 tr">意见或建议：</dt>
            <dd class="left validation_or">
                <span><textarea name="feedarea" cols="" rows="" class="pop_area_320 inputtext_del t12" placeholder="请详细描述意见、问题或建议，2-300字以内"></textarea><span class="cl_red" id="cl_redp"></span></span>
            </dd>           
        </dl>
        <dl class="dl_400 pl20 mb10 clearfix">
            <dt class="left mt5 tr">联系方式：</dt>
            <dd class="left validation_or">
               <span><input type="text" value="" placeholder="邮箱/QQ号" class="pop_input_320 inputtext_del t12" name="feedord"><span class="cl_red" id="c1_redb"></span></span>
            </dd>                
        </dl>           
    </div>   		
</div>
<div class="feedbackstatus" style="display:none">
	<div class="popsuctext" >您已提交成功！<br />感谢您的宝贵意见，我们会尽快处理</div> 
	<div class="regemailloeslist" style="display:none">
		<div class="tl t14 mb15 pl20 emailstatus" ></div>
	</div>
</div>

<div style="display:none">
    <iframe frameborder="0" scrolling="no" width="0" height="0" src="//log.51cto.com/pageview.php?frompos=www_art"></iframe>
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "1234://hm.baidu.com/hm.js?844390da7774b6a92b34d40f8e16f5ac";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();

    //document.write(decodeURI("%3Cscript src='1234://tongji.51cto.com/cto.js/3d7ca8d8c01f7e7b50250ff1c15bdae3' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script src="1234://logs.51cto.com/rizhi/count/count.js"></script>
    <script type="text/javascript"> document.write(unescape("%3Cscript src='1234://tongji.51cto.com/frontend/tj.gif' type='text/javascript'%3E%3C/script%3E")); </script>
</div>
<!-- <script src="1234://static1.51cto./com/home/web/js/activity_pop.js"></script> -->
<!-- <style type="text/css">
	.service-btn{
		width: 53px;
height: 36px;
color: #1ac6fe;
line-height: 16px;
padding-top: 50px;
		display: inline-block;
		background: url(1234://i2.51cto.com/images/blog/201811/02/463350acf4c693cfb3dc248bc8a2a0eb.png) no-repeat center;
	}
	.service-btn:hover{
		background: url(1234://i2.51cto.com/images/blog/201811/02/2d5fa2ff4eb9ef66847aff20ba4c8bae.png) no-repeat center;
height: 36px;
color: #fff;
line-height: 16px;
padding-top: 50px;
	}
</style>
<script src="//www.sobot.com/chat/frame/js/entrance.js?sysNum=a8d9379eaf884b4f81a48348979e3b1a" id="zhichiScript" class="zhiCustomBtn" data-args="manual=true"></script>
<a href="javascript:;" class="zhiCustomBtn" style="position: fixed;z-index: 2147483583;width: 60px;height: 6px;right: 160px;bottom: 300px;text-align: center;font-size: 14px;"><span class="service-btn">在线<br/>客服</span></a> -->
<!-- <script type="text/javascript">
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

zhiManager.set('userinfo', {partnerId:'14169969',uname:'wx5c4042f13be00',params:'{"用户名":"wx5c4042f13be00"}'});
zhiManager.set('customMargin', 20);
zhiManager.set('horizontal', 20);
zhiManager.set('vertical', 90);
zhiManager.set('preVisitArgs',{'preVisitUrl': document.referrer?document.referrer:''});
zhiManager.set('curVisitArgs',{'curVisitUrl': location.href,curVisitTitle:document.title,});
</script> -->
</body>
</html>
