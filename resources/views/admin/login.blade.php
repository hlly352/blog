<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/admins/assets/css/normalize.css">
    <link rel="stylesheet" href="/admins/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admins/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admins/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/admins/assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="/admins/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="/admins/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/admins/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-white">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h4 style="color:gray;margin-left:-150px;height:30px">二郎巷博客</h4>    
                </div>
                @if(session('error'))
                    <div class="alert alert-danger" role="alert" style="width:320px;margin-left:30px;">
                        {{session('error')}}
                    </div>
                @endif
                <div class="login-form">
                    <form action="/admin/dologin" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="请输入用户名" style="width:320px;">
                        </div>
                        <div class="form-group">
                           <br>
                            <input type="password" name="password" class="form-control" placeholder="请输入密码" style="width:320px;">
                        </div>
                        <div class="form-group">
                            <br>
                            <input type="text" name="vcode" class="form-control" placeholder="请输入验证码" style="width:200px;display:inline">&nbsp;&nbsp;&nbsp;&nbsp;<img src="/captch" style="display:inline;border-radius: 5px; height:39px" onclick="this.src = this.src += '?1'">
                        </div>
                        <br>
                        {{csrf_field()}}
                        <button class="btn btn-success" style="width:320px;">登录</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script src="/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="/admins/assets/js/popper.min.js"></script>
    <script src="/admins/assets/js/bootstrap.min.js"></script>
    <script src="/admins/assets/js/jquery.matchHeight.min.js"></script>
    <script src="/admins/assets/js/main.js"></script>
</body>
<script type="text/javascript">
    $('.alert').delay(2000).fadeOut(1500);
</script>
</html>
