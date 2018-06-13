<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>会员中心</title>

    <link rel="stylesheet" href="/public/static/admin/assets/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/xenon-core.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/xenon-forms.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/xenon-components.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/xenon-skins.css">
    <link rel="stylesheet" href="/public/static/admin/assets/css/custom.css">
    <link rel="stylesheet" href="/public/static/admin/css/layer.css">
    <!--extra css-->
    <?php $__env->startSection('css'); ?>
    <?php echo $__env->yieldSection(); ?>
    <script src="/public/static/admin/assets/js/jquery-1.11.1.min.js"></script>
    <script src="/public/static/admin/js/layer.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/public/static/admin/assets/js/html5shiv.min.js"></script>
    <script src="/public/static/admin/assets/js/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body">
</div>

<div class="page-container">

    <div class="sidebar-menu toggle-others fixed">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="#" class="logo-expanded">
                        <img src="/public/static/admin/assets/images/logo@2x.png" width="80" alt="" />
                    </a>

                    <a href="#" class="logo-collapsed">
                        <img src="/public/static/admin/assets/images/logo-collapsed@2x.png" width="40" alt="" />
                    </a>
                </div>

                <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                <div class="mobile-menu-toggle visible-xs">

                    <a href="#" data-toggle="mobile-menu">
                        <i class="fa-bars"></i>
                    </a>
                </div>

            </header>



            <ul id="main-menu" class="main-menu">
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <li class="<?php echo $__env->yieldContent('userindex'); ?>">
                    <a href="/ucenter.html">
                        <i class="linecons-desktop"></i>
                        <span class="title">会员中心</span>
                    </a>
                </li>
                <li class="<?php echo $__env->yieldContent('userinfo'); ?>">
                    <a href="#">
                        <i class="linecons-cog"></i>
                        <span class="title">会员信息</span>
                    </a>
                    <ul>
                        <li class="<?php echo $__env->yieldContent('changeinfo'); ?>">
                            <a href="/changeinfo.html">
                                <span class="title">修改密码</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo $__env->yieldContent('kamipay'); ?>">
                    <a href="/chongzhi.html">
                        <i class="linecons-fire"></i>
                        <span class="title">升级会员</span>
                    </a>
                </li>
                <li class="<?php echo $__env->yieldContent('kamibuy'); ?>">
                    <a href="<?php echo e(config('userconfig.kamibuy')??'http://www.baidu.com'); ?>">
                        <i class="linecons-key"></i>
                        <span class="title">卡密购买</span>
                    </a>
                </li>
                <li class="">
                    <a href="/">
                        <i class="linecons-cloud"></i>
                        <span class="title">站点首页</span>
                    </a>
                </li>
            </ul>

        </div>

    </div>
    <div class="main-content">

        <!-- User Info, Notifications and Menu Bar -->
        <nav class="navbar user-info-navbar" role="navigation">

            <!-- Left links for user info navbar -->
            <ul class="user-info-menu left-links list-inline list-unstyled">

                <li class="hidden-sm hidden-xs">
                    <a href="#" data-toggle="sidebar">
                        <i class="fa-bars"></i>
                    </a>
                </li>
            </ul>


            <!-- Right links for user info navbar -->
            <ul class="user-info-menu right-links list-inline list-unstyled">
                <li class="dropdown user-profile">
                    <a href="#" data-toggle="dropdown">
                        <img src="/public/static/admin/assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                        <span>
								<?php echo e(session('username')); ?>

                            <i class="fa-angle-down"></i>
							</span>
                    </a>

                    <ul class="dropdown-menu user-profile-menu list-unstyled">
                        <li>
                            <a href="/" target="_blank">
                                <i class="fa-desktop"></i>
                                站点首页
                            </a>
                        </li>
                        <li>
                            <a href="/editpass.html">
                                <i class="fa-edit"></i>
                                修改密码
                            </a>
                        </li>
                        <li class="last">
                            <a href="/userloginout.html">
                                <i class="fa-lock"></i>
                                注销
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>
        <?php $__env->startSection('content'); ?>
        <?php echo $__env->yieldSection(); ?>
        <footer class="main-footer sticky footer-type-1">

            <div class="footer-inner">

                <!-- Add your copyright text here -->
                <div class="footer-text">
                    &copy; 2017
                    <strong>BY:淡心心心</strong>
                </div>


                <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                <div class="go-up">

                    <a href="#" rel="go-top">
                        <i class="fa-angle-up"></i>
                    </a>

                </div>

            </div>

        </footer>
    </div>
</div>


<div class="page-loading-overlay">
    <div class="loader-2"></div>
</div>






<!-- Bottom Scripts -->
<script src="/public/static/admin/assets/js/bootstrap.min.js"></script>
<script src="/public/static/admin/assets/js/TweenMax.min.js"></script>
<script src="/public/static/admin/assets/js/resizeable.js"></script>
<script src="/public/static/admin/assets/js/joinable.js"></script>
<script src="/public/static/admin/assets/js/xenon-api.js"></script>
<script src="/public/static/admin/assets/js/xenon-toggles.js"></script>


<!-- Imported scripts on this page -->
<script src="/public/static/admin/assets/js/xenon-widgets.js"></script>
<script src="/public/static/admin/assets/js/devexpress-web-14.1/js/knockout-3.1.0.js"></script>
<script src="/public/static/admin/assets/js/devexpress-web-14.1/js/globalize.min.js"></script>
<script src="/public/static/admin/assets/js/devexpress-web-14.1/js/dx.chartjs.js"></script>

<!--extra js-->
<?php $__env->startSection('js'); ?>
<?php echo $__env->yieldSection(); ?>


<!-- JavaScripts initializations and stuff -->
<script src="/public/static/admin/assets/js/xenon-custom.js"></script>

</body>
</html>