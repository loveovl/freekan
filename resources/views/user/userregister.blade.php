<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{config('webset.webname')}}--用户注册">
    <title>{{config('webset.webname')}}--用户注册</title>
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
    <a href="/userlogin.html" class="active">登录</a>
</div>
<h1>用户注册</h1>
<div class="main-agileits">
    <!--form-stars-here-->
    <div class="form-w3-agile">
        <h2 class="sub-agileits-w3layouts">免费注册</h2>
        <form id="myform">
            <input type="text" name="user_name" placeholder="用户名" required="">
            <input type="password" name="user_pass" placeholder="密码" required="">
            <input type="password" name="user_repass" placeholder="确认密码" required="">
            <input type="email" name="user_email" placeholder="邮箱" required="">
            <div class="submit-w3l">
            <input type="button" id="submit" value="免费注册">
            </div>
        </form>
    </div>
</div>
<!--//form-ends-here-->
<!-- copyright -->
<div class="copyright w3-agile">
    <p> Copyright © <a href="/"
                       title="{{config('webset.webname')}}">{{config('webset.webname')}}</a></p>
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
              url:"/actionreg",
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
                    window.location = '/userlogin.html'
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
                  else if(messge.user_email){
                      layer.msg((messge.user_email)[0])
                  }
              }
          })
      });

    })

    function checkAuth() {
        var username = $('input[name="user_name"]').val();
        var userpass = $('input[name="user_pass"]').val();
        var userrepass = $('input[name="user_repass"]').val();
        var useremail = $('input[name="user_email"]').val();
       if(username.length<5||username.length>20){
           layer.msg('用户名长度只能在5-20之间');
           return false
       }
       else if (userpass.length<6||userpass.length>16){
           layer.msg('密码长度只能在6-16之间');
           return false
       }
       else if(useremail.length<=0){
           layer.msg('邮箱格式不正确');
           return false
       }
       else if(userpass!=userrepass){
           layer.msg('两次密码输入不正确');
           return false
       }
       else{
           return true
       }
    }
</script>
</body>
</html>