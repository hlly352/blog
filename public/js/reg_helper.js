/**
 * 用户注册注册工具
 * @type {{}}
 */
var reg_helper = {
    home_url : '//home.51cto.com',
    /**
     * 短信token
     */
    sms_token : '',
    /**
     * 倒计时button
     */
    button_countdown_set_timeout : '',
    /**
     * 按钮倒计时时间
     */
    countdown_time : 90,
    /**
     * 发送短信
     * @param {string} mobile    手机号
     * @param {string} verify    图片验证码
     * @param {string} button_id 倒计时的button的ID
     */
    sendSmsCode:function (mobile,verify,button_id) {
        this.updateSmsToken();//更新token
        var post_data = {
            'ckmobile': mobile,
            'type'    : 'regcode',
            'token'   : this.sms_token,
            'verify'  : verify
        };
        $.post(this.home_url + "/third-party/check-pass-mobile",post_data,function (data){
            if(data.flag == 1){
                showErrMsg("sms_code",data.msg);
            }else{
                reg_helper.buttonCountdown(button_id);
            }
        },'json')

    },
    /**
     * 获取sms_token
     */
    updateSmsToken:function () {
        var token = '';
        $.ajax({
            type : "post",
            url  : this.home_url + "/third-party/flush-token",
            data : "",
            dataType: "json",
            async : false,
            success : function(data){
                //赋值给全局变量;
               token = data.token;
            }
        });
        this.sms_token = token;
    },
    /**
     * @param {string} button_id 按钮的ID
     */
    buttonCountdown:function (button_id) {
        var jquery_obj = $('#'+button_id);
        if (this.countdown_time == 0) {
            jquery_obj
                .removeAttr('disabled')
                .val('获取验证码');
            this.countdown_time = 90;
        } else {
            jquery_obj
                .attr('disabled','disabled')
                .val("重新发送" + this.countdown_time + "s");
            this.countdown_time--;
            this.button_countdown_set_timeout =  setTimeout(function() {
                reg_helper.buttonCountdown(button_id)
            }, 1000)
        }
    }

};