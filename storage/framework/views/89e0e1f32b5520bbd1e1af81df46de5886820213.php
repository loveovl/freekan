<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="<?php echo e(config('webset.webname')); ?>--用户登录">
    <title><?php echo e(config('webset.webname')); ?>--用户登录</title>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Custom Theme files -->
    <link href="/public/static/user/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="/public/static/user/css/snow.css" rel="stylesheet" type="text/css" media="all">
    <link href="/public/static/user/css/style.css" rel="stylesheet" type="text/css" media="all">
    <link href="/public/static/user/css/layer.css" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="/public/static/user/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/public/static/user/js/layer.js"></script>

    <!-- //Custom Theme files -->
    <!-- web font -->

    <!-- //web font -->
    <style>html, * {
            -webkit-user-select: text !important;
            -moz-user-select: text !important;
        }</style>
</head>
<body>
<div class="snow-container">
    <div class="snow foreground"></div>
    <div class="snow foreground layered"></div>
    <div class="snow middleground"></div>
    <div class="snow middleground layered"></div>
    <div class="snow background"></div>
    <div class="snow background layered"></div>
</div>

<div class="top-buttons-agileinfo">
    <a href="/userregister.html" class="active">免费注册</a>
</div>
<h1>用户登录</h1>
<div class="main-agileits">
    <!--form-stars-here-->
    <div class="form-w3-agile">
        <h2 class="sub-agileits-w3layouts">登录</h2>
        <form id="myform">
            <input type="text" name="user_name" placeholder="请输入用户名" required="">
            <input type="password" name="user_pass" placeholder="请输入密码" required="">
            <a href="#" class="forgot-w3layouts">忘记密码?</a>
            <div class="submit-w3l">
                <input type="button"  id="submit" value="登 录">
            </div>
            <p class="p-bottom-w3ls"><a href="/userregister.html">免费注册</a>如果您还没有账号？</p>
        </form>
    </div>
</div>
<!--//form-ends-here-->
<!-- copyright -->
<div class="copyright w3-agile">
    <p> Copyright © <a href="/" title="<?php echo e(config('webset.webname')); ?>"><?php echo e(config('webset.webname')); ?></a></p>
</div>
<!-- //copyright -->
<script>
    $(function () {
        $('#submit').click(function () {
            if (!checkAuth()){
                return false
            };
            var fm = new FormData($('#myform')[0]);
            $.ajax({
                type:"post",
                url:"/actionlogin",
                dataType:"json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fm,
                processData: false,
                contentType: false,
                success:function (data) {
                    layer.msg(data.msg);
                    if(data.status==200){
                        window.location = '/ucenter.html'
                    }
                },
                error:function (data) {
                    var messge = data.responseJSON.errors;
                    if(messge.user_name){
                        layer.msg((messge.user_name)[0])
                    }
                    else if(messge.user_pass){
                        layer.msg((messge.user_pass)[0])
                    }
                }
            })
        });

    })

    function checkAuth() {
        var username = $('input[name="user_name"]').val();
        var userpass = $('input[name="user_pass"]').val();
        if(username.length<5||username.length>20){
            layer.msg('用户名长度只能在5-20之间');
            return false
        }
        else if (userpass.length<6||userpass.length>16){
            layer.msg('密码长度只能在6-16之间');
            return false
        }
        else{
            return true
        }
    }
</script>

</body>
</html>