<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta 1234-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="anI0MWpGWUo7B1FkLnIJKDs0fGZYFiAMJRh3QS0fFn4eS2xZLSw.Cw==">
	<title>{{$title}}</title>
	<link rel="shortcut icon" href="1234s://static3.51cto.com/home/web/images/favicon.ico" type="image/x-icon">				
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
			<dt style="margin-top:-20px"><a href="" target="_blank" style="text-decoration: none ;"><font color="blue"><h3>二郎巷博客</h3></font></a></dt>
			<dd>账号通行证</dd>
		</dl>
		<dl class="nav2">
			<dt style="margin-top:25px"><a href="">登录</a></dt>
			
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
<form action="/home/register/add" method="post" name="">
    <!-- <input type="hidden" name="token" id="token" value=""> -->
    <div class="zczh">
        <dl class="tit_wx clearfix"></dl>
        <div class="tab_wxzh">
            <div class="tab_wxzh_in">                
                <span class="cur" onclick="changeBindType(0)">创建新账号</span>
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
            <div class="tab_wxform_in" style="display:block;">
                
                <div class="form_list" style="position: relative">
                    <div class="form_input"><input name="username" type="text" maxlength="30" class="input_320 icon_name input_tel" placeholder="请输入用户名" style="width:322px"></div>
                    <div class="hidmail" id="hidmail-0" style="display: none;"></div>
                </div>
                <div class="form_list" style="position: relative">
                    <div class="form_input"><input name="password" type="text" maxlength="30" class="input_320 icon_pass input_tel" placeholder="请输入密码" style="width:322px"></div>
                    <div class="hidmail" id="hidmail-0" style="display: none;"></div>
                </div>
                <div class="form_list" style="position: relative">
                    <div class="form_input"><input name="repassword" type="text" maxlength="30" class="input_320 icon_pass input_tel" placeholder="请确认密码" style="width:322px"></div>
                    <div class="hidmail" id="hidmail-0" style="display: none;"></div>
                </div>
                <div class="form_list" style="position: relative">
                    <div class="form_input"><input name="email" type="text" maxlength="30" class="input_320 icon_mail input_tel" placeholder="请输入邮箱" style="width:322px"></div>
                    <div class="hidmail" id="hidmail-0" style="display: none;"></div>
                </div>
                <style type="text/css">
                    .form-group1 .input-submit{background:url(/image/image.png) ;font-size:16px;color:#fff;cursor:pointer;width: 322px;height: 45px;font-weight: 100}
                    .form-group1 .input-submit:hover{background:url(/image/image.png) ;}
                </style>
                <div class="form-group1 form_list">
                    {{csrf_field()}}
                    <input class="btn input-submit" value="创建并登录" id="bind_login" type="submit">
                    <div id="bind_reg_msg"></div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- <input type="hidden" id="regType">
<input type="hidden" id="re_registerName">
<input type="hidden" id="re_codev">
<input type="hidden" id="re_checkUser">
<input type="hidden" id="re_password">
<input type="hidden" id="re_verify_code"> -->


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
<script>
    function sendEmailSuccess() {
        var w_width=$(window).width();
        var w_height=$(window).height();
        $('#shade_layer').css('width',w_width+'px');
        $('#shade_layer').css('height',w_height+'px');
        $('#shade_layer').show();
        var wechat_left = ($(document).width()-$('.PopBox_380').first().width())/2;
        $('.PopBox_380').first().css('left',wechat_left+'px');
        $('.PopBox_380').show();
    }
    $(function () {
        $('.pop_offbtn_white').click(function(){
            $('.PopBox_380').hide();
            $('#shade_layer').hide();
        })
    })
</script>
<div class="PopBox PopBox_380" style="    border: 1px solid #d7d8da; background: #fff;">
    <div class="PopBoxin pb20">
        <span class="pop_offbtn_white">×</span>
        <div class="poptite pl20 t14 mb25">提示</div>
        <div class="t14 tc cl_6 pb15 pt15">用户名：<span id="callback_username"></span>&nbsp;&nbsp;&nbsp;&nbsp;密码：<span id="callback_password"></span></div>
        <div class="t12 tc cl_9 pb20">激活邮件已发送到您的邮箱邮箱，<a id="email_login_url" href="1234://home.51cto.com/third-party/regapi?from=dd&amp;isnew=1">点击前往</a></div>
    </div>
</div>

<div style="display: none" id="sync_user"></div>

<!-- <script>   
    //验证username
    function checkIsUser(obj,callback){
        $('#bind_login_msg').html('');
        var userAgent = navigator.userAgent.toLowerCase();
        var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
        var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
        var isie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);
        var is_ie=0;
        var fun_is_ie = false;
        try{
            fun_is_ie = isIE()
        }catch(e){

        }
        if(isie || fun_is_ie) is_ie=1;
        var uservalue=$('#'+obj).val();
        var userlen=checkStrLen(uservalue);
        var nostr="51cto|51ct0|root|妈的|傻逼|王八|admin|管理|bbs|blog|group";
        //var ustr="51cto云特卖";
        var pattern = new RegExp(nostr,"gi");
        var userformat=/^(\w|[\u4E00-\u9FA5])+$/;
        if(uservalue==""){
            showErrMsg(obj, '请输入用户名');
            return false;
        }else{
            $.getJSON('/third-party/checkuserid?api_type=4&username='+uservalue,function(data){
            if(data.code == 0){
                showErrMsg(obj, '用户不存在');
            }else if(data.code == 2){
                showErrMsg(obj, '此用户已经绑定,请更换其他用户');
            }else{
                showSuccMsg(obj);
            }
        }).complete(function(){
            if(typeof callback != 'undefined'){
                callback();
            }
        });

        }
    }
    //验证password
    function pwdCheck(obj){
        $('#bind_login_msg').html('');
        var mess="";
        var pwd_value=$("#"+obj).val();
        if (pwd_value.indexOf(" ") != -1) {
            showErrMsg(obj, "不支持空格，请输入6-20个字符，包含数字、大小写字母和符号（空格除外）") ;
            return ;
        }
        if(/.*[\u4e00-\u9fa5]+.*$/.test(pwd_value)) {
            showErrMsg(obj, "不支持汉字，请输入6-20个字符，包含数字、大小写字母和符号（空格除外）") ;
            return ;
        }
        if(pwd_value==""){
            showErrMsg(obj, "请输入密码。") ;
        }else{			
			$(".pwd .ts_error").hide();
		}
    }

    /* 邮箱后缀提示 */

    $(document).click(function(){
        $(".hidmail").hide();
    });

</script> -->
<!-- <script src="./footer.js"></script> -->
<div class="footer">
    <a href="" target="_blank">关于我们</a>|
    <a href="" target="_blank">诚聘英才  </a>|
    <a href="" target="_blank">联系我们  </a>|
    <a href="" target="_blank">网站大事  </a>|
    <a href="" target="_blank">友情链接  </a>|
    <a class="jsFeedCallBack" href="javascript:void(0);">意见反馈  </a>|
    <a href="" target="_blank">网站地图</a>
    <span>Copyright ? 2005-2015 51CTO.COM 京ICP证060544</span>
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