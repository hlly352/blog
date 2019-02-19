<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta 1234-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="anI0MWpGWUo7B1FkLnIJKDs0fGZYFiAMJRh3QS0fFn4eS2xZLSw.Cw==">
	<title>{{$title}}</title>
	<link rel="shortcut icon" href="" type="image/x-icon">				
	<meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="anI0MWpGWUo7B1FkLnIJKDs0fGZYFiAMJRh3QS0fFn4eS2xZLSw.Cw==">
    <meta 1234-equiv="pragma" content="no-cache">
    <meta 1234-equiv="cache-control" content="no-cache">
    <meta 1234-equiv="expires" content="0">
    <title>{{$title}}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/css/register20160929.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/hm.js"></script>
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script src="/js/ajaxreg.js"></script>
    <script src="/js/pub.js"></script>
    <script src="/js/analyse.js"></script>
    <script src="/js/yii.js"></script>
    <script src="/js/yii.captcha.js"></script>
</head>	   
<body>
<!--头部文件-->
<div class="nav">
	<div class="nav_nr">
        <dl class="nav1">
            <dt style="margin-top:-20px"><a href="/" target="_blank" style="text-decoration: none ;"><font color="blue"><h3>二郎巷博客</h3></font></a></dt>
            <dd>账号通行证</dd>
        </dl>
        <dl class="nav2">
            
            
        </dl>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var doc=document,inputs=doc.getElementsByTagName('input'),supportPlaceholder='placeholder'in doc.createElement('input'),placeholder=function(input){var text=input.getAttribute('placeholder'),defaultValue=input.defaultValue;
    if(defaultValue==''){
        input.value=text}
        input.onfocus=function(){
            if(input.value===text){this.value=''}};
            input.onblur=function(){if(input.value===''){this.value=text}}};
            if(!supportPlaceholder){
                for(var i=0,len=inputs.length;i<len;i++){var input=inputs[i],text=input.getAttribute('placeholder');
                if((input.type==='text')&&text){placeholder(input)}}}});
</script>

<!--头部文件结束-->
<script src="/js/reg_helper.js"></script>
<form action="" method="post" name="" style="height:400px">
    <!-- <input type="hidden" name="token" id="token" value=""> -->
    <div class="zczh">
        <dl class="tit_wx clearfix"></dl>
        <div class="tab_wxzh">
            <div class="tab_wxzh_in">                
                <span class="cur" onclick="changeBindType(0)">激活邮箱提醒</span>
            </div>
        </div>
        <style type="text/css">
            .icon_name{ background:url(/image/name.png) no-repeat 6px center;}
            .icon_pass{ background:url(/image/pass.png) no-repeat 6px center;}
            .icon_mail{ background:url(/image/mail.png) no-repeat 6px center;}
        </style>

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif
        <div class="tab_wxform" >
            <div class="alert alert-success" role="alert">
                <h5 class="alert-heading"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提醒:请到您注册时的邮箱进行激活验证,以便进行登录</font></font></h5>
                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></p>
            </div>
        </div>
    </div>
</form>

<input type="hidden" id="regType">
<input type="hidden" id="re_registerName">
<input type="hidden" id="re_codev">
<input type="hidden" id="re_checkUser">
<input type="hidden" id="re_password">
<input type="hidden" id="re_verify_code">


<style>
    #send_sms_code{ cursor: pointer};
    .PopBox{ border:1px solid #d7d8da; background:#fff;}
    .PopBox_380{ width:380px; position: fixed;  top:100px;z-index: 9999;display: none;}
    .PopBoxin{ position:relative;}
    .pb20{padding-bottom:20px}
    .PopBox .poptite{ background:#3babf7; color:#fff; height:36px; line-height:36px;}
    .pop_offbtn_white{ position:absolute; top:8px; right:10px;font-size:18px; color:#fff; cursor:pointer}
    .pl20{padding-left:20px}
    .t14{font-size:14px}
    .mb25{margin-bottom:25px}
    .t18{font-size:18px}
    .tc{text-align:center}
    .cl_6{ color:#666;}
    .cl_9{ color:#999;}
    .pb15{padding-bottom:15px}
    .pt15{padding-top:15px}
    .pb20{padding-bottom:20px}
    .PopBox a{color:#3babf7}
    #shade_layer{position:fixed;
        background: #666;
        filter:alpha(opacity=50);
        -moz-opacity:0.5;
        -khtml-opacity: 0.5;
        opacity: 0.5;
        z-index: 9999;
        top:0;
        left:0;
        display: none;
    }
    .pop_offbtn_white{cursor: pointer;}
</style>
<div id="shade_layer"></div>

<!-- <script src="./footer.js"></script> -->
<div class="footer">
    
    <span>Copyright ? 2005-2015 二郎巷博客 京ICP证060544</span>
</div>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "1234s://hm.baidu.com/hm.js?844390da7774b6a92b34d40f8e16f5ac";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#w0-image').yiiCaptcha({"refreshUrl":"\/third-party\/captcha?refresh=1","hashKey":"yiiCaptcha\/third-party\/captcha"});
});
</script>	
</body>
</html>