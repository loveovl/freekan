<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{$url=='userlogin'?'您还未登录,正在进入登录界面':'您还不是VIP会员,正在进入会员中心'}}</title>
<style type="text/css">
*{
    padding: 0;
    margin: 0;
}

body{
  padding: 50px;
  background: url(https://i.loli.net/2018/04/24/5ade994d158cf.jpg) 0 0 repeat;
}

.demo{
  padding:25px;
  background-color: rgba(0,0,0,0.3);
  height:800px;;
}
.demo p{
  color: #FFFFFF;
}
@media \0screen\,screen\9 {
  .demo{
    background-color:#000000;
    filter:Alpha(opacity=50);
    position:static; 
    *zoom:1; 
  }
  .demo p{
    position: relative;
  }  
}
.a2{ 
    margin:0 auto; 
    width:500px; 
    text-align:center; 
	position: relative;
	top:100px;
	}
.a3{margin:0 auto;
    width:800px;
	text-align:center;
	position:relative;
	top:50%;
	font-size:50px;
	font-family:"幼圆";
	color:#CCC;
}
</style>
</head>

<body>
<div class="demo"">
<div class="a2"><img src="" />
</div>
<div class="a3">{{$url=='userlogin'?'您还未登录,正在进入登录界面':'您还不是VIP会员,正在进入会员中心'}}</div>
</div>
</body>
<script>
        setTimeout(function () {
            window.location = '/{{$url}}.html';
        },2000);
</script>
</html>
