
/**
 * Created by pc on 2016/1/21.
 */
$(function(){
    to_mess();
    leftSwitchMenu();
    $(".jsGetCode").click(function(){
        var _this = $(this);
        checkEmail('[name="checkEmail"]',callback = function(){
            if(emailFlag == 1){
                $(".jsSendEmailCode").click();
                $("#jsUpdateDiv").show();
                _this.hide();
                $(".jsSendSuccMsg").show();
                var newEmail = $("[name='checkEmail']").val();
                var emailArr = newEmail.split("@");
                $(".jsReceiveEmailUrl").find("a").href = "http://mail."+emailArr[1];
                $(".jsCodeValidate").show();
                $(".jsSaveEdit").show();
            }
        });
    });
})
var sendFlag = 0;
var emailFlag = 0;
var passFlag = 0;
var codeFlag = 0;
var mobilePatten = /(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
var emailPatten = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
var emailSuffix = ["@qq.com","@vip.qq.com","@gmail.com","@126.com","@163.com","@139.com","@hotmail.com","@sohu.com","@sina.com","@sina.cn","@51cto.com","@vip.sina.com","@nokia.com","@huanuo-nokia.com"];

function checkUserMobile(obj){
    var mobile = $(obj).val();
    if(mobile == ''){
        sendFlag = 0;
        showMess(obj,"请输入手机号",'errors');
        return false;
    }

    if(mobilePatten.test(mobile) && mobile.length == 11 ){
        checkMobile(obj,mobile);
        return false;
    }else{
        sendFlag = 0;
        showMess(obj,"手机号格式不正确",'errors');
    }
}

/*设置手机发送验证码开始*/
var to_mess = function(){
    var wait=90;
    var timer;//设置定时器参数
    function time(o) {
        if (wait == 0) {
            o.removeAttribute("disabled");
            o.value="发送验证码";
            wait = 90;
            //发送成功后删除类名tomessbtn_dis
            $(o).removeClass('tomessbtn_dis');
            clearTimeout(timer);
        } else {
            o.setAttribute("disabled", true);
            o.value="重新发送" + wait + "s";
            wait--;
            setTimeout(function() {
                time(o)
            }, 1000)
        }
    }
    $(".jsSendMobileCode").click(function(){
        if(sendFlag == 1 && emailFlag == 1){
            var mobile = $("[name='checkMobile']").val();
            $(".tomessbtn").addClass("tomessbtn_dis");
            sendCode(this,mobile,0);
            time(this);
        }
    })
    $(".jsSendEmailCode").click(function(){
        if(emailFlag == 1){
            var sendNum = $("[name='checkEmail']").val();
            $(".tomessbtn").addClass("tomessbtn_dis");
            sendCode(this,sendNum,1);
            time(this);
        }
    })
}

function sendCode(obj,sendNum,is_email){
	var custom_code=$("[name='custom']").val();
    var send_data = {};
    if(!is_email){
        if(!mobilePatten.test(sendNum)){
            showMess(obj,"手机号格式不正确",'errors'); return ;
        }
        var sysCode = $("[name='captcha']").val();
        if(!sysCode){
            showMess(obj,'请输入验证码','errors'); return ;
        }
        if(custom_code){
            var changeurl = '/custom/send-mobile-code';
        }else{
            var changeurl = '/info/send-mobile-code';
        }
        send_data = {'mobile':sendNum,'captcha':sysCode,'_csrf':yii.getCsrfToken()};
    }else{
        var changeurl = '/info/send-email-code';
        send_data = {'sendNum':sendNum,'_csrf':yii.getCsrfToken()};
    }
    if(1 != emailFlag){
        return ;
    }
    $.ajax({
        type:'post',
        data:send_data,
        datatype:'json',
        url:changeurl,
        success:function(data){
            if(data == 'ok'){
                showMess(obj,'发送成功','success');
            }else{
                showMess(obj,data,'errors');
            }
        }
    })
}

function checkMobile(obj,mobile){
    if(!mobile){
        return ;
    }
    $.ajax({
        type:'post',
        data:{'mobile':mobile,'_csrf':yii.getCsrfToken()},
        datatype:'json',
        url:'/info/check-user-mobile',
        success:function(data){
            if(data == 'ok'){
                sendFlag = 1;
                hideMess(obj);
                return ;
            }
            sendFlag = 0;
            showMess(obj,data,'errors');
        }
    });
}

function checkCode(obj,is_email){
    if(is_email){
        if( 1 != emailFlag){
            return ;
        }
    }else{
        if(1 != sendFlag || 1 != emailFlag){
            return ;
        }
    }

    var mobile = $("[name='checkMobile']").val();
    var code = $("[name='checkCode']").val();
    var email = $("[name='checkEmail']").val();
    if(code == ''){
        showMess(obj,"请输入验证码",'errors');
        return ;
    }
    if(code.length > 6){
        showMess(obj,"请输入正确的验证码",'errors');
        return ;
    }
    codeFlag = 1;
    if(is_email == 1){
        var dataCode = {'code':code,'email':email,'_csrf':yii.getCsrfToken()};
        var url = "/info/check-email-code";
    }else{
        var dataCode = {'code':code,'mobile':mobile,'_csrf':yii.getCsrfToken()};
        var url = "/info/check-mobile-code";
    }
    $.ajax({
        type:'post',
        datatype:'json',
        url:url,
        data:dataCode,
        success:function(data){
            if(data == 'ok'){
                codeFlag = 1;
                showMess(obj,"验证码正确",'success');
                return ;
            }
            codeFlag = 0;
            showMess(obj,data,'errors');
        }
    });
}

function bindSubmit(obj){
    bindMobileSumit(obj,'/info/set-mobile');
}
$(function(){
    $(".jsEdit").click(function(){
        var bindStatus = $("#jsBindStatus").val();
        var bindNum  =$("#jsOldBindNum").val();
        if(bindStatus == 0){
            $.ajax({
                url:'/info/bind-user',
                type:'post',
                dateType:'html',
                data:{bindNum:bindNum},
                success:function(html){
                    var bindAlertId = $.alert.show({
                        title:'登录异常提醒',
                        html:html,
                        showButton:false,
                        showCancelButton:false
                    });
                    $("#"+bindAlertId+" .jsCloseBg").live("click",function(){
                        $("#"+bindAlertId).remove();
                         $.shadow.close();
                    });
                    $("#"+bindAlertId+" #user_verify").blur(function(){
                        var code = $(this).val();
                        var sendstr = $("#jsSendStr").val();
                        var obj = $(this);
                        var checkVerify = 0;
                        if(code){
                            $.ajax({
                                type:'post',
                                data:{'send_str':sendstr,'_csrf':yii.getCsrfToken(),code:code},
                                dataType:'json',
                                async:false,
                                url:'/info/check-code',
                                success:function(data){
                                    if(data == true){
                                        checkVerify = 1;
                                        showMessage(obj,"",'success');
                                    }else{
                                        showMessage(obj,"验证码错误",'errors');
                                    }
                                }
                            });
                        }else{
                            showMessage(obj,"验证码错误",'errors');
                        }
                        $("#jsCheckCode").val(checkVerify);return;
                    });
                }
            });
            return;
        }else{
            $("#jsUpdateDiv").show();
        }
    });
});
function bindMobileSumit(obj,ureparlurl){
    if(1 != sendFlag ){
        checkUserMobile("[name='checkMobile']");
        return ;
    }

    if(1 != emailFlag){
        checkVerify("[name='captcha']");
        return ;
    }

    if( 1 != codeFlag){
        checkCode("[name='checkCode']");
        return ;
    }
    var mobile = $("[name='checkMobile']").val();
    var mcode = $("[name='checkCode']").val();
    var syscode = $("[name='captcha']").val();
    $.ajax({
        data:{'mobile':mobile,'captcha':syscode,'mcode':mcode,'_csrf':yii.getCsrfToken()},
        type:'post',
        url:'/info/update-user-mobile',
        dataType:'json',
        success:function(data){
            if( data.status == 'ok'){
				_educto.push(['_trackEvent', 'mobile', 'save']);
                hideMess(obj);
                $(".regemailloeslist .emailstatus").html("<span>保存成功</span>");
                var bindmoblielist = $.alert.show({
                    'title':'提示',
                    'obj':'.regemailloeslist',
                    'showButton':true,
                    'showCancelButton':false,
                    'width':'280',
                    'onConfirm':function(){
                        $.alert.close(-1);
                        if(ureparlurl){
                            window.location.href=ureparlurl;
                        }else{
                            window.location.reload();
                        }
                    }
                })
                // 提现页面跳转过来的情况，绑定完手机号，还要跳回提现页面
                if (getQueryString('backUrl')) {
                    window.location.href = getQueryString('backUrl')
                }
            }else{
                showMess("[name='checkCode']",data.message,'errors');
            }
        }
    });
}

// window.location.href = getQueryString('backUrl')

function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}


function customBindSubmit(obj){
    var url = '/home';
    bindMobileSumit(obj,url);
}

function checkEmail(obj,callback){
    var email = $(obj).val();
    if(!email){
        showMess(obj,"请输入邮箱",'errors');
        return ;
    }
    if(!emailPatten.test(email)){
        emailFlag = 0;
        showMess(obj,"邮箱格式错误",'errors');
        return ;
    }
    var emailArr = email.split("@")[1];
    if( '-1' == $.inArray("@"+emailArr,emailSuffix)){
        emailFlag = 0;
        showMess(obj,"该邮箱非常用邮箱，请您更换QQ、163、126、sina、gmail等常用邮箱。",'errors');
        return ;
    }
    $.ajax({
        data:{'email':email,'_csrf':yii.getCsrfToken()},
        datatype:'json',
        type:'post',
        url:'/info/check-user-email',
        success:function(data){
            if(1 != data){
                showMess(obj,data,'errors');
                return ;
            }else{
                emailFlag = 1;
                showMess(obj,"",'success');
                return 1;
            }
        },
        complete:function(){
            if(callback != undefined){
                callback();
            }
        }
    });
    return emailFlag;
}

function checkVerify(obj){
    var code = $(obj).val();
    if(!code){
        showMess(obj,'请输入验证码','errors');return ;
    }

    $.ajax({
        data:{'code':code,'_csrf':yii.getCsrfToken()},
        datatype:'json',
        type:'post',
        url:'/info/check-verify-code',
        success:function(data){
            if(data == 'ok'){
                showMess(obj,"输入正确",'success');
                emailFlag = 1;
                return 1;
            }else{
                emailFlag = 0;
                showMess(obj,data,'errors');
            }
        }
    });

}

function bindUserEmail(obj) {
    checkVerify('[name="captcha"]');
    checkEmail('[name="checkEmail"]');
    var email = $("[name='checkEmail']").val();
    var code = $("[name='captcha']").val();
    if (email && code) {
        $.ajax({
            data: {'email': email, 'code': code, '_csrf': yii.getCsrfToken()},
            datatype: 'json',
            type: 'post',
            url: '/info/send-user-email',
            success: function (data) {
                if (data == 'ok') {					
                    hideMess(obj);
                    email_zh = email.split("@");
                    $(".regemailloeslist .emailstatus").html("<span>新激活邮件已发出，请去新邮箱激活。<br /><br /><div><a  href='http://mail." + email_zh[1] + "' ref='" + email_zh[1] + "' target='_blank'>进入邮箱</a></div></span>");
                    var bindemaillist = $.alert.show({
                        'title': '提示',
                        'obj': '.regemailloeslist',
                        'showButton': true,
                        'showCancelButton': false,
                        'width': '280',
                        'onConfirm': function () {
                            $.alert.close(-1);
                            window.location.reload();
                        }
                    })
                }
            }
        });
    }
}
function bindEmail(obj){
    //checkVerify('[name="captcha"]');
    checkEmail('[name="checkEmail"]');
    var email = $("[name='checkEmail']").val();
    var code = $("[name='checkCode']").val();
    if( 1 != codeFlag){
        checkCode("[name='checkCode']");
        return ;
    }
    //if(email && code){
    //    $.ajax({
    //        data:{'email':email,'code':code,'_csrf':yii.getCsrfToken()},
    //        datatype:'json',
    //        type:'post',
    //        url:'/info/send-user-email',
    //        success:function(data){
    //            if(data == 'ok'){
    //                hideMess(obj);
    //                email_zh=email.split("@");
    //                $(".regemailloeslist .emailstatus").html("<span>新激活邮件已发出，请去新邮箱激活。<br /><br /><div><a  href='http://mail."+email_zh[1]+"' ref='"+email_zh[1]+"' target='_blank'>进入邮箱</a></div></span>");
    //                var bindemaillist = $.alert.show({
    //                    'title':'提示',
    //                    'obj':'.regemailloeslist',
    //                    'showButton':true,
    //                    'showCancelButton':false,
    //                    'width':'280',
    //                    'onConfirm':function(){
    //                        $.alert.close(-1);
    //                        window.location.reload();
    //                    }
    //                })
    //            }
    //        }
    //    });
    //}
    if(email && code){
        $.ajax({
            data:{'email':email,'code':code,'_csrf':yii.getCsrfToken()},
            dataType:'json',
            type:'post',
            url:'/info/bind-user-email',
            success:function(data){
                if( data.status == 'ok') {
					_educto.push(['_trackEvent', 'email', 'save']);
                    hideMess(obj);
                    $(".regemailloeslist .emailstatus").html("<span>保存成功</span>");
                    var bindmoblielist = $.alert.show({
                        'title': '提示',
                        'obj': '.regemailloeslist',
                        'showButton': true,
                        'showCancelButton': false,
                        'width': '280',
                        'onConfirm': function () {
                            $.alert.close(-1);
                            window.location.reload();
                        }
                    });
                }else{
                    showMess("[name='checkCode']",data.message,'errors');
                }
            }
        });
    }
}

//密码强度
//判断输入密码的类型
function CharMode(iN) {

    if (iN >= 48 && iN <= 57) //数字
        return 1;
    if (iN >= 65 && iN <= 90) //大写
        return 2;
    if (iN >= 97 && iN <= 122) //小写
        return 4;
    else return 8;
} //bitTotal函数
//计算密码模式
function bitTotal(num) {
    modes = 0;
    for (i = 0; i < 4; i++) {
        if (num & 1) modes++;
        num >>>= 1;
    }
    return modes;
} //返回强度级别
function checkStrong(sPW) {
    if (sPW.length <= 4) return 0; //密码太短
    Modes = 0;
    for (i = 0; i < sPW.length; i++) { //密码模式
        Modes |= CharMode(sPW.charCodeAt(i));
    }

    return bitTotal(Modes);
} //显示颜色
function pwStrength(obj) {
    pwdcheck(obj);
    if(passFlag != 1){
        return ;
    }
    var pwdvalue=document.getElementById("userpwd").value;
    if (pwdvalue.indexOf(" ") != -1) {
        poiely(1);
    }else if(/.*[\u4e00-\u9fa5]+.*$/.test(pwdvalue)){
        poiely(2);
    }else{
        if (pwdvalue == null || pwdvalue == '' || pwdvalue.length < 6 || pwdvalue.length >20) {
            $("#pwLength span").removeClass("inten_cur");
        } else {
            $("#pwLength span").removeClass("inten_cur");
            S_level = checkStrong(pwdvalue);
            for(var i=0;i<S_level;i++){
                $("#pwLength span").eq(i).addClass("inten_cur");
            }
        }
        return;
    }
}

function poiely(kid){
    $("#pwLength span").removeClass("inten_cur");
    if(kid=='1'){
        showMess(obj,"不支持空格，请输入6-20个字符，包含数字、大小写字母和符号（空格除外）",'errors');
    }else if(kid=='2'){
        showMess(obj,"不支持汉字，请输入6-20个字符，包含数字、大小写字母和符号（空格除外）",'errors');
    }
    return false;
}
//验证password
function pwdcheck(obj){
    var mess="";
    var pwdvalue=document.getElementById("userpwd").value;
    passFlag = 0;
    $("#pwLength span").removeClass("inten_cur");
    if (containSpecial(pwdvalue)) {
        showMess(obj,"不支持特殊字符，请输入6-20个字符，包含数字、大小写字母和-",'errors');
        return false;
    }
    if(/.*[\u4e00-\u9fa5]+.*$/.test(pwdvalue)) {
        showMess(obj,"不支持汉字，请输入6-20个字符，包含数字、大小写字母和-",'errors');
        return false;
    }
    if(pwdvalue==""){
        showMess(obj,"请输入密码。",'errors');
        return false;
    }else if(pwdvalue.length<6){
        showMess(obj,"密码长度不能小于6个字符。",'errors');
        return false;
    }else if(pwdvalue.length>20){
        showMess(obj,"密码长度不能大于20个字符。",'errors');
        return false;
    }else{
        passFlag = 1;
        showMess(obj,"输入正确",'success');
    }
}

function containSpecial( s )
{
    var containSpecial = RegExp(/[\%\ \*]/im);
    //var containSpecial = RegExp(/[`~!@#\$%\^\&\*\ \(\)_\+<>\?:"\{\},\.\\\/;'\[\]]/im);
    return ( containSpecial.test(s) );
}

function checkRePass(obj){
    passFlag = 0;
    var pass = $("[name='password']").val();
    var rePass = $("[name='rePassword']").val();
    if(!rePass){
        showMess(obj,"请输入密码",'errors');
        return ;
    }
    //console.log(pass);
    //console.log(rePass);
    if(pass != rePass){
        showMess(obj,"输入的两次密码不一样",'errors');
        return ;
    }else{
        passFlag = 1;
        showMess(obj,"输入正确",'success');
    }
}

function checkPwd(obj){
    passFlag = 0;
    var pwd = $(obj).val();
    if(!pwd){
        showMess(obj,"请输入密码",'errors');
        return ;
    }
    $.ajax({
        datatype:'json',
        data:{'pass':pwd,'_csrf':yii.getCsrfToken()},
        type:'post',
        url:'/info/check-user-pass',
        success:function(data){
            if(data == 'ok'){
                passFlag =1;
                showMess(obj,"输入正确",'success');
                return ;
            }
            showMess(obj,data,'errors');
        }
    });

}

function updatePwd(obj){
    hideMess(obj);
    checkPwd("[name='oldPass']");
    pwStrength("[name='password']");
    checkRePass("[name='rePassword']");
    if(passFlag != 1){
        return ;
    }
    var pwd = $("[name='oldPass']").val();
    var newP = $("[name='password']").val();
    var reNewP = $("[name='rePassword']").val();
	if (containSpecial(newP) || containSpecial(reNewP)) {
        return false;
    }
    $.ajax({
        type:'post',
        datatype:'json',
        url:'/info/update-user-pass',
        data:{'oldP':pwd,'pwd':newP,'rePwd':reNewP,'_csrf':yii.getCsrfToken()},
        success:function(data){
            if(data == 'ok'){
                hideMess(obj);
                $(".regemailloeslist .emailstatus").html("<span class='bcg_ts_70'>保存成功<br /></span>");
                var updatepass = $.alert.show({
                    'title':'提示',
                    'obj':'.regemailloeslist',
                    'showButton':true,
                    'showCancelButton':false,
                    'width':'280',
                    'onConfirm':function(){
                        $.alert.close(-1);
                        window.location.reload();
                    }
                })

            }
        }
    });
}

function socialJump(url){
    if(!url){
        return ;
    }
	_educto.push(['_trackEvent', 'thirdparty', 'add']);
    window.location.href = url;
}

function socialRelieve(obj,sId){
    if(sId){
        $.message.show({
            text:'确定要解绑吗',
            showShadow:true,
            onConfirm: function () {
                $.shadow.show();
                $.ajax({
                    type:'post',
                    datatype:'json',
                    url:'/info/social-user-relieve',
                    data:{'sId':sId,'_csrf':yii.getCsrfToken()},
                    success:function(data){
                        $.shadow.close();
                        $.message.close();
                        window.location.reload();
                    }
                })
            }
        });
    }else{
        return ;
    }

}
function leftSwitchMenu(){
    $("#leftMenu .lev_secin").removeClass("lev_secin_cur");
    var curr = $("#leftMenu").attr('curr');
    $("#leftMenu ."+curr).addClass("lev_secin_cur");
}


function showMess(obj,data,type){
    if(type=='errors'){
        $(obj).parent().next(".set_jy").html('<span class="icon_gth"></span>'+data);
    }else if(type == 'success'){
        $(obj).parent().next(".set_jy").html('<span class="icon_rdui"></span>'+data);
    }
    $(obj).parent().next(".set_jy").show();
    return false;
}

function hideMess(obj){
    $(obj).parent().next(".set_jy").html("");
    $(obj).parent().next(".set_jy").hide();

}

$(function(){
    if($(".jsSaveSuccess").length){
        setTimeout(function(){
            $(".jsSaveSuccess").hide();
        },1000);
    }
});
var wait=60;
function time(o) {
    if (wait == 0) {
        o.removeAttribute("disabled");
        o.value="获取验证码";
        wait = 60;
    } else {
        o.setAttribute("disabled", true);
        o.value="重新发送" + wait + "s";
        wait--;
        setTimeout(function() {
            time(o)
        }, 1000)
    }
}
$(function(){
    $("#get_verify").live('click',function(){
        var sendtype = $("#jsSendType").val();
        var sendstr = $("#jsSendStr").val();
        sendValidateCode($(this).get(0),sendstr,sendtype);time($(this).get(0));
    });

});
function sendValidateCode(obj,sendstr,sendtype){
    if(sendtype ==1 && !mobilePatten.test(sendstr)){
        showMessage(obj,"手机号格式不正确",'errors'); return ;
    }
    if(sendtype == 0 && !emailPatten.test(sendstr)){
        showMessage(obj,"邮箱格式不正确",'errors'); return ;
    }
    var url = '/info/send-code';
    $.ajax({
        type:'post',
        data:{'send_type':sendtype,'send_str':sendstr,'_csrf':yii.getCsrfToken()},
        datatype:'json',
        url:url,
        success:function(data){
            if(data == 'ok'){
                sendtype == 1 ? $(".jsMobileInfo").show() : $(".jsEmailInfo").show();
                showMessage(obj,"",'success'); return ;
            }else{
                showMessage(obj,data.msg,'errors'); return ;
            }
        }
    })
}
$(function(){
    $("#jsValidateCode").live('click',function(){
        $("#user_verify").blur();
        var checkVerify = $("#jsCheckCode").val();
        var sendtype = $("#jsSendType").val();
        if(checkVerify == 1){
            if(sendtype == 0){
                $(".jsGetCode").show();
            }else{
                $(".jsSaveEdit").show();
            }
            $.alert.close(-1);
            $("#jsUpdateDiv").show();
            $(".jsEdit").hide();
            $("#jsValidateUser").remove();
            $("#jsBindStatus").val(1);

        }
    });
});
function showMessage(obj,data,type) {
    if (type == 'errors') {
        $(obj).parent().next(".ts_error").empty().append("<i class ='icon_erro left'></i>" + data);
        $(obj).parent().next(".ts_error").show();
        $(obj).parent().next(".ts_correct").hide();
    } else {
        $(obj).parent().next(".ts_error").empty();
        $(obj).parent().next(".ts_correct").hide();
        $(obj).parent().next(".ts_correct").show();
    }
    return false;
}
