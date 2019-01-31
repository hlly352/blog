<!DOCTYPE html>
<html lang="en-US">   
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="screen-orientation" content="portrait" />
    <meta name="x5-orientation" content="portrait" />
    <meta name="full-screen" content="yes" />
    <meta name="x5-fullscreen" content="true" />
    <meta name="browsermode" content="application" />
    <meta name="x5-page-mode" content="app" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta charset="UTF-8" />
    <meta name="csrf-param" content="_csrf" />
    <meta name="csrf-token" content="TmN6YzVuUGwKVhMVciYRCXdSKFoFLz0iO1IlGlQoAFgUABsFRxwGGw==" />
    <title>{{$title}}</title>
    <!-- <link rel="shortcut icon" href="https://static2.51cto.com/home/web/images/favicon.ico" type="image/x-icon" /> -->
    <link href="/homes/login/css/z_sign.min.css" rel="stylesheet" />
    <script src="/homes/login/js/jquery.min.js"></script>
    <script src="/homes/login/js/51cto.js"></script>
    <script src="/homes/login/js/msg.js"></script>
    <script src="/homes/login/js/jquery.message.js"></script>
    <script src="/homes/login/js/yii.js"></script>
    <script src="/homes/login/js/yii.activeform.js"></script>
    <script src="/homes/login/js/yii.validation.js"></script>
</head>   
<body>
    <div class="sign">
        <div class="loginWrap">
            <!-- <a class="logo" href="http://www.51cto.com"></a> -->
            <h1>二郎巷博客</h1>
            <div class="loginPic zxflogoPic clearfix">
                <div class="loginImg">
                    <a href="http://blog.51cto.com/cloumn/index?dl" target="_blank">
                        <!-- <img src="/homes/login/picture/2ff39751a49d12573a0e62d0fbdc883e.jpg" alt=""
                        border="0" /> -->
                        广告图
                    </a>
                </div>
                <div class="loginBord" id="login-base">
                    <div class="loginTit" style="display:block">
                        <div class="tosignup">
                            <a target="_blank" href="http://51ctohome.blog.51cto.com/1805422/579769"
                            style="margin-right:10px;color:#969696;">无法登录?</a>|
                            <a href="/home/register" style="margin-left:10px;color:#d54e4e;">注册</a>
                        </div>
                        <h1 style="color:#333;">登录博客</h1>
                    </div>
                    
                    @if(count($errors) > 0)
                    <div style="background-color: #f8d7da;width: 310px;border-radius: 3px;color: #721c24;margin:0 auto;margin-top: 5px;margin-bottom: 5px">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(session('error'))
                        <div style="background-color: #f8d7da;width: 310px;height:40px;line-height:40px;border-radius: 3px;color: #721c24;margin:0 auto;margin-top: 5px;margin-bottom: 15px;text-align: center" role="alert">
                            {{session('error')}}
                        </div>
                    @endif

                    <form id="login-form" action="/home/dologin" method="post" role="form">
                        <input type="hidden" name="_csrf" value="TmN6YzVuUGwKVhMVciYRCXdSKFoFLz0iO1IlGlQoAFgUABsFRxwGGw=="/>
                        <div class="inpBox textbox_ui user">
                            <div class="form-group field-loginform-username required">
                                <label class="control-label" for="loginform-username">
                                </label>
                                <input type="text" id="loginform-username" class="form-control" name="username" placeholder="用户名/邮箱/手机" />
                                <div class="custom invalid error_9o8Kl" style="display:none">
                                </div>
                            </div>
                        </div>
                        <div class="inpBox textbox_ui pass zxfpass">
                            <div class="form-group field-loginform-password required">
                                <label class="control-label" for="loginform-password"></label>
                                <input type="password" id="loginform-password" class="form-control" name="password"
                                placeholder="密码" />
                                <div class="custom invalid error_9o8Kl" style="display:none"></div>
                            </div>
                        </div>
                        <div class="clearfix zxfDl">
                            <a class="fr" href="">忘记密码?</a>
                            <label for="agree_userterm" class="fr">
                                <div class="form-group field-loginform-rememberme">
                                    <div class="checkbox">
                                        
                                        <div class="custom invalid error_9o8Kl" style="display:none"></div>
                                    </div>
                                </div>
                            </label>
                            {{csrf_field()}}
                            <input type="submit" class="loginbtn fl" name="login-button" value="登 录"style="width:220px" />
                            <input type="hidden" name="show_qr" value="0" />

                        </div>
                        <div id="errorMsg"></div>
                    </form>
                    <br>
                    <div class="otherAccout zxfAccout">
                        <p>
                            你也可以使用以下账号登录
                        </p>
                        <div class="z_box">
                            <div class="z_a">
                                <div class="z_a_m clearfix">
                                    <a class="a_QQ" href="/third-party/auth?type=qq">
                                        <i class="iQQ"></i>QQ
                                    </a>
                                    <a href="/third-party/auth?type=sina">
                                        <i class="iweibo"></i>微博
                                    </a>
                                    <a href="/third-party/auth?type=douban">
                                        <i class="douban"></i>豆瓣
                                    </a>
                                    <a href="/third-party/auth?type=renren">
                                        <i class="irenren"></i>人人
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shadow_l"></div>
                    <div class="shadow_r"></div>
                </div>
                <!--20160530检测到微信开始-->
                <!-- -->
                <script type="text/javascript">
                    $(function() {
                        $('.zxfAccout p').click(function() {
                            $('.z_box').toggle();
                            $('.zxfAccout p').toggleClass('pUp');
                        });
                        function btnbg(zxf_a) {
                            $(zxf_a).focus(function() {
                                $('.zxfDl .loginbtn').addClass('zxfBtnbg');
                            });
                            $(zxf_a).blur(function() {
                                if ($('.pass input').val() == '' && $('.user input').val() == '') {
                                    $('.zxfDl .loginbtn').removeClass('zxfBtnbg');
                                }
                            });
                        }
                        btnbg('.pass input');
                        btnbg('.user input');
                        $(".usehelp a").hover(function() {
                            $(".hidetips").show()
                        },
                        function() {
                            $(".hidetips").hide()
                        });
                    });
                </script>
                <!--20160530检测到微信结束-->
                <div class="shadow_l"></div>
                <div class="shadow_r"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    </script>
    <!--意见反馈-->
    <!--div class="feedback" style="display:none">
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
    </div-->
    <div class="feedbackstatus" style="display:none">
        <div class="popsuctext">
            您已提交成功！
            <br />
            感谢您的宝贵意见，我们会尽快处理
        </div>
        <div class="regemailloeslist" style="display:none">
            <div class="tl t14 mb15 pl20 emailstatus"></div>
        </div>
    </div>
    <div class="foot">
        <a target="_blank" href="http://www.51cto.com/about/aboutus.html">关于我们</a>|
        <a target="_blank" href="http://www.51cto.com/about/zhaopin.html">诚聘英才</a>|
        <a target="_blank" href="http://www.51cto.com/about/contactus.html">联系我们</a>|
        <a target="_blank" href="http://www.51cto.com/about/history2011.html">网站大事</a>|
        <a href="javascript:void(0)" class="ina popyjdatilfeedback">意见反馈</a>|
        <a target="_blank" href="http://www.51cto.com/about/map.htm">网站地图</a>
        <br />
        Copyright &copy; 2005-2019
        <a href="Http://www.51cto.com">51CTO.COM</a>
        版权所有
    </div>
    <script src="static/js/loginform.js">
    </script>
    <div style="display:none">
        <script src="static/js/count.js">
        </script>
        <script>
            var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?844390da7774b6a92b34d40f8e16f5ac";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </div>
    <script type="text/javascript">
        var uid = '0';
        var _educto = _educto || [];
        _educto.push(['_setUserId', uid]);
    </script>
    <script type="text/javascript">
        /*document.write(decodeURI("%3Cscript src='https://tongji.51cto.com/cto.js/3d7ca8d8c01f7e7b50250ff1c15bdae3' type='text/javascript'%3E%3C/script%3E"));*/
        
    </script>
    <style type="text/css">
        .service-btn{ width: 53px; height: 36px; color: #1ac6fe; line-height:
        16px; padding-top: 50px; display: inline-block; background: url(static/images/463350acf4c693cfb3dc248bc8a2a0eb.png)
        no-repeat center; } .service-btn:hover{ background: url(static/images/2d5fa2ff4eb9ef66847aff20ba4c8bae.png)
        no-repeat center; height: 36px; color: #fff; line-height: 16px; padding-top:
        50px; }
    </style>
    <script type="text/javascript">
        document.write(unescape("%3Cscript src='https://tongji.51cto.com/frontend/tj.gif' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script src="static/js/entrance.js" id="zhichiScript" class="zhiCustomBtn"data-args="manual=true"></script>
    <script type="text/javascript">
        var zhiManager = (getzhiSDKInstance());
        zhiManager.on("load",
        function() {
            zhiManager.initBtnDOM();
        });
        //zhiManager.set('title','垃圾/广告信息举报');
        zhiManager.set('powered', false);
        zhiManager.set('color', '4285f4');
        zhiManager.set('customBtn', 'true');
        zhiManager.set('moduleType', 2);
        zhiManager.set('size', {
            'width': 360,
            'height': 500
        });

        zhiManager.set('customMargin', 20);
        zhiManager.set('horizontal', 20);
        zhiManager.set('vertical', 90);
        zhiManager.set('preVisitArgs', {
            'preVisitUrl': document.referrer ? document.referrer: ''
        });
        zhiManager.set('curVisitArgs', {
            'curVisitUrl': location.href,
            curVisitTitle: document.title,
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#login-form').yiiActiveForm([{
                "id": "loginform-username",
                "name": "username",
                "container": ".field-loginform-username",
                "input": "#loginform-username",
                "error": ".custom.invalid.error_9o8Kl",
                "encodeError": false,
                "validate": function(attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "账号不能为空"
                    });
                }
            },
            {
                "id": "loginform-password",
                "name": "password",
                "container": ".field-loginform-password",
                "input": "#loginform-password",
                "error": ".custom.invalid.error_9o8Kl",
                "encodeError": false,
                "validate": function(attribute, value, messages, deferred, $form) {
                    yii.validation.required(value, messages, {
                        "message": "密码不能为空"
                    });
                }
            },
            {
                "id": "loginform-rememberme",
                "name": "rememberMe",
                "container": ".field-loginform-rememberme",
                "input": "#loginform-rememberme",
                "error": ".custom.invalid.error_9o8Kl",
                "encodeError": false,
                "validate": function(attribute, value, messages, deferred, $form) {
                    yii.validation.boolean(value, messages, {
                        "trueValue": "1",
                        "falseValue": "0",
                        "message": "10天内自动登录 must be either \"1\" or \"0\".",
                        "skipOnEmpty": 1
                    });
                }
            }], []);
        });
    </script>
</body>
</html>