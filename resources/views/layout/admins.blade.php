
<!doctype html>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/admins/assets/css/normalize.css">

	<link rel="stylesheet" href="/admins/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/admins/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="/admins/assets/css/themify-icons.css">
	<link rel="stylesheet" href="/admins/assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="/admins/assets/css/flag-icon.min.css"><link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/admins/assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="/admins/assets/weather/css/weather-icons.css" rel="stylesheet" />
	<link href="/admins/assets/calendar/fullcalendar.css" rel="stylesheet" />
	<link href="/admins/assets/css/charts/chartist.min.css" rel="stylesheet">
	<link href="/admins/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/admin/index"><i class="menu-icon fa fa-laptop"></i>首页 </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-user"></i>用户管理</a>
                        <ul class="sub-menu children dropdown-menu">                            

                        <li><i class="ti ti-pencil"></i><a href="/admin/user/create">添加用户</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="/admin/user">浏览用户</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-id-badge"></i>角色管理</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="ti ti-pencil"></i><a href="/admin/role/create">添加角色</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="/admin/role">浏览角色</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-na"></i>权限管理</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="ti ti-pencil"></i><a href="/admin/permission/create">添加权限</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="/admin/permission">浏览权限</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-layers-alt"></i>分类管理</a>
                        <ul class="sub-menu children dropdown-menu">                            

                            <li><i class="ti ti-pencil"></i><a href="/admin/article/type/create">添加分类</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="/admin/article/type">查看分类</a></li>

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-book"></i>文章管理</a>
                        <ul class="sub-menu children dropdown-menu">                            

                            <li><i class="fa fa-id-badge"></i><a href="/admin/article">浏览文章</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-comments"></i>评论管理</a>
                        <ul class="sub-menu children dropdown-menu">                            

                            <li><i class="fa fa-id-badge"></i><a href="/admin/comment/show">浏览评论</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-gallery"></i>轮播图管理</a>
                        <ul class="sub-menu children dropdown-menu">                            

                            <li><i class="ti ti-pencil"></i><a href="/admin/banner/create">添加轮播图</a></li>
                            <li><i class="ti ti-pencil"></i><a href="/admin/banner">浏览轮播图</a></li>

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-direction"></i>友情链接</a>
                        <ul class="sub-menu children dropdown-menu">                            

                            <li><i class="ti ti-pencil"></i><a href="/admin/link/create">添加友情链接</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="/admin/link">浏览友情链接</a></li>

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-announcement"></i>广告管理</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="ti ti-pencil"></i><a href="/admin/advert/create">添加广告</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="/admin/user">浏览广告</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti ti-notepad"></i>公告管理</a>
                        <ul class="sub-menu children dropdown-menu">                            

                            <li><i class="ti ti-pencil"></i><a href="/admin/tip/create">添加公告</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="/admin/tip/">浏览公告</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">

                    <a class="navbar-brand" href="./" style="width:180px">
                        <!-- <img src="/admins/images/logo.png" alt="Logo"> -->
                        <h3>二郎巷博客</h3>
                    </a>
                    <a class="navbar-brand hidden" href="./">
                        <img src="/admins/images/logo2.png" alt="Logo">
                    </a>

                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                    </div>
                    <!-- 获取账号登录的信息 -->
                    @php
                        $user = DB::table('user')->where('id',session('uid'))->first();
                        $info = DB::table('userinfo')->where('uid',session('uid'))->first();
                    @endphp
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if($info)
                            <img class="user-avatar rounded-circle" src="{{$info->profile}}" alt="User Avatar">
                            @else
                            <img class="user-avatar rounded-circle" src="/uploads/profile.jpg" alt="User Avatar">
                            @endif
                        </a>
                        <div class="user-menu dropdown-menu">
                            @if($info)
                            <a class="nav-link" href="/admin/profile/{{$info->id}}"><i class="fa fa- user"></i>修改头像</a>
                            @else
                            <a class="nav-link" href="/admin/profiles"><i class="fa fa- user"></i>修改头像</a>
                            @endif
                            <a class="nav-link" href="/admin/changepass/{{$user->id}}"><i class="fa fa- user"></i>修改密码</a>                            
                            <a class="nav-link" href="/admin/logout"><i class="fa fa-power -off"></i>退出登录</a>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
        @section('content')
           
            
        @show
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <!-- <footer class="site-footer" style="position:absolute;bottom:0px">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-12">
                        Copyright &copy; 2018 Ela Admin.  Designed by Colorlib
                    </div>
                </div>
            </div>
        </footer> -->
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->


    <!-- <script src="/js/jquery-1.8.3.min.js"></script> -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/admins/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="/admins/assets/js/popper.min.js"></script>
    <script src="/admins/assets/js/plugins.js"></script>
    <script src="/admins/assets/js/main.js"></script>
    <script src="/admins/assets/js/lib/chart-js/Chart.bundle.js"></script>

    <script src="/admins/assets/js/lib/chartist/chartist.min.js"></script>
    <script src="/admins/assets/js/lib/chartist/chartist-plugin-legend.js"></script>
    <script src="/admins/assets/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="/admins/assets/js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="/admins/assets/js/lib/flot-chart/jquery.flot.spline.js"></script>
    <script src="/admins/assets/weather/js/jquery.simpleWeather.min.js"></script>
    <script src="/admins/assets/weather/js/weather-init.js"></script>
    <script src="/admins/assets/js/lib/moment/moment.js"></script>
    <script src="/admins/assets/calendar/fullcalendar.min.js"></script>
    <script src="/admins/assets/calendar/fullcalendar-init.js"></script>
    <script src="/admins/assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="/admins/assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->

    @section('js')
    
    @show

</body>
</html>
