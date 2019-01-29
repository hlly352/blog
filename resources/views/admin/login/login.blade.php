<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台   </title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <link rel="stylesheet" href="/admins/assets/css/normalize.css">
<link rel="stylesheet" href="/admins/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="/admins/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="/admins/assets/css/themify-icons.css">
<link rel="stylesheet" href="/admins/assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="/admins/assets/css/flag-icon.min.css"><link rel="stylesheet" href="/admins/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/admins/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="http/admins/s://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="/admins/images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="/admin/dologin" method="post">
                        <div class="form-group">
                        @if (session('errors'))
                        <div class="alert alert-success">
                            {{ session('errors') }}
                        </div>
                        @endif
                            <label>用户</label>
                            <input type="text" name="username" class="form-control" placeholder="请输入用户名">
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input type="password" class="form-control" placeholder="请输入密码">
                        </div>
                       <div class="form-group">
                            <label>验证码</label>
                            <input type="text" name="vcode" class="form-control" placeholder="请输入验证码" style="width:250px">
                            <br>
                            <img src="/captch" alt="" style='border-radius:5px' onclick='this.src=this.src += "?1"'>
                        </div>
              <!--           <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div> -->
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                     
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.alert alert-success').delay(2000).fadeOut(1500);
    </script>
    <script src="/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="/admins/assets/js/popper.min.js"></script>
    <script src="/admins/assets/js/bootstrap.min.js"></script>
    <script src="/admins/assets/js/jquery.matchHeight.min.js"></script>
    <script src="/admins/assets/js/main.js"></script>

</body>
</html>
