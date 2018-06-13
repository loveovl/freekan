
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')</title>
	<meta name="keywords" content="{{config('webset.webkeywords')?config('webset.webkeywords'):'全网vip免费看'}}">
	<meta name="description" content="{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')-{{config('webset.wedesc')?config('webset.wedesc'):'全网vip免费看'}}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<link rel="shortcut icon" href="/public/static/lc/images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="/public/static/lc/font/iconfont.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/lc/css/stui_block.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/lc/css/stui_default.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/lc/css/stui_custom.css" type="text/css" />
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/lc/js/stui_default.js"></script>
	<script type="text/javascript" src="/public/static/lc/js/bootstrap.min.js"></script>
    @section('other')
     @show
</head>
<body>
  <header class="stui-header__top clearfix" id="header-top">
   <div class="container">
    <div class="row">
     <div class="stui-header_bd clearfix">
      <div class="stui-header__logo">
       <a class="logo" href="/"></a>
      </div>
      <div class="stui-header__side">
       <ul class="stui-header__user">
        <li class="visible-xs"><a class="open-popup" href="/"></a></li>
       </ul>
       <div class="stui-header__search">
		  <form id="homeso" role="search">
      <input type="text" class="form-control ff-wd" id="sos" name="key" placeholder="请输入关键字">
      <button class="submit" id="button" type="button">
          <i class="icon iconfont icon-search"></i>
        </button>
	</form> 
        <div id="word" class="autocomplete-suggestions active hidden-xs" style="display: none;"></div>
       </div>
      </div>
      <ul class="stui-header__menu type-slide nav-gallery">
		@if($navlist)
		@foreach($navlist as $v)
			<li id="{{$v['nav_title']}}"><a href="{{$v['nav_addr']}}" title="{{$v['nav_title']}}">{{$v['nav_title']}}</a></li>
		@endforeach
        @else
        @endif
			<li id="{!! config('appconfig.appdh') !!}">{!! config('appconfig.isdh')?'<a href="/app.html" target="_blank">'.config('appconfig.appdh').'</a>':'' !!}</li>
      </ul>
     </div>
    </div>
   </div>
  </header>
@section('content')
@show
<div class="container">
  <div class="row">
    <div class="col-lg-wide stui-pannel stui-pannel-bg hidden-sm hidden-xs clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/lc/icon/icon_26.png" />友情链接</h3>
       </div>
      </div>
      <div class="stui-pannel_bd clearfix">
       <div class="col-xs-1">
        <ul class="stui-link__text clearfix">
			@if(isset($yqlist))
            @foreach($yqlist as $yq)
			<li><a class="text-muted" href="{{$yq['yq_link']}}" target="_blank">{{$yq['yq_name']}}</a></li>
			@endforeach
            @else
            @endif
        </ul>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
<div class="container">
   <div class="row">
    <div class="stui-foot clearfix stui-pannel stui-pannel-bg">
     <div class="col-pd text-center hidden-xs"></div>
     <p class="text-center"><a href="http://{{config('webset.webdomin')}}/" target="_blank" title="{{config('webset.webname')}}"><img src="/public/static/lc/images/logo.png" width="150" height="48" alt="{{config('webset.webname')}}"/></a></p>
     <p class="text-center">Copyright © 2018 - {{config('webset.copyright')}} - {{config('webset.webicp')}}</p>
     <p class="text-center">本站提供的最新电影和电视剧资源均系收集于各大视频网站,本站只提供web页面服务,并不提供影片资源存储,也不参与录制、上传
若本站收录的节目无意侵犯了贵司版权，请给我们邮箱地址来信,我们会及时处理和回复,谢谢。{{config('webset.webmail')}} 将及时更正和删除！</p>
     <p class="text-center">{!! config('webset.webtongji') !!}</p>
    </div>
  <div class="stui-extra clearfix">
   <li><a class="backtop" href="javascript:scroll(0,0)" style="display: none;"><i class="icon iconfont icon-less"></i></a></li>
   <li class="hidden-xs"><span><i class="icon iconfont icon-qrcode"></i></span><div class="sideslip"><div class="col-pd"><img class="qrcode" width="150" height="150" src="http://qr.liantu.com/api.php?text=http://{{config('webset.webdomin')}}"/> <p class="text-center font-12">扫码用手机访问</p></div></div></li> 
   <li><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email={{config('webset.webmail')}}" target="_blank"><i class="icon iconfont icon-comments"></i></a></li>
  </div>
  </div>
 </div>
<script>
    function jilu(obj) {
        var url = $(obj).attr('href');
        var img = $(obj).children().children('img').attr('src');
        var title = $(obj).attr('title');
        $.ajax({
            type: "get",
            url: "/history",
            dataType: "json",
            data: {"url": url, "img": img, "title": title},
            success: function () {

            }
        })
    }
</script>
        <script>
            $(function () {
                $('#button').click(function () {
                    var key = $('#sos').val();
                    if (key != '' && key != null) {
                        window.location = '/search/' + key + '.html'
                    }
                });

                $('input').keyup(function () {
                    if (event.keyCode == 13) {
                        $("#button").trigger("click");
                    }
                })
            })
        </script>
</body>
</html>