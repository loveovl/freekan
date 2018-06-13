<!--
            ------=====神龙坐镇，盗代码者，天天带绿帽=====-----
                  ------=====小铭QQ：1254251438=====-----
        11111111111111111111111111111111111111001111111111111111111111111
        11111111111111111111111111111111111100011111111111111111111111111
        11111111111111111111111111111111100001111111111111111111111111111
        11111111111111111111111111111110000111111111111111111111111111111
        11111111111111111111111111111000000111111111111111111111111111111
        11111111111111111111111111100000011110001100000000000000011111111
        11111111111111111100000000000000000000000000000000011111111111111
        11111111111111110111000000000000000000000000000011111111111111111
        11111111111111111111111000000000000000000000000000000000111111111
        11111111111111111110000000000000000000000000000000111111111111111
        11111111111111111100011100000000000000000000000000000111111111111
        11111111111111100000110000000000011000000000000000000011111111111
        11111111111111000000000000000100111100000000000001100000111111111
        11111111110000000000000000001110111110000000000000111000011111111
        11111111000000000000000000011111111100000000000000011110001111111
        11111110000000011111111111111111111100000000000000001111100111111
        11111111000001111111111111111111110000000000000000001111111111111
        11111111110111111111111111111100000000000000000000000111111111111
        11111111111111110000000000000000000000000000000000000111111111111
        11111111111111111100000000000000000000000000001100000111111111111
        11111111111111000000000000000000000000000000111100000111111111111
        11111111111000000000000000000000000000000001111110000111111111111
        11111111100000000000000000000000000000001111111110000111111111111
        11111110000000000000000000000000000000111111111110000111111111111
        11111100000000000000000001110000001111111111111110001111111111111
        11111000000000000000011111111111111111111111111110011111111111111
        11110000000000000001111111111111111100111111111111111111111111111
        11100000000000000011111111111111111111100001111111111111111111111
        11100000000001000111111111111111111111111000001111111111111111111
        11000000000001100111111111111111111111111110000000111111111111111
        11000000000000111011111111111100011111000011100000001111111111111
        11000000000000011111111111111111000111110000000000000011111111111
        11000000000000000011111111111111000000000000000000000000111111111
        11001000000000000000001111111110000000000000000000000000001111111
        11100110000000000001111111110000000000000000111000000000000111111
        11110110000000000000000000000000000000000111111111110000000011111
        11111110000000000000000000000000000000001111111111111100000001111
        11111110000010000000000000000001100000000111011111111110000001111
        11111111000111110000000000000111110000000000111111111110110000111
        11111110001111111100010000000001111100000111111111111111110000111
        11111110001111111111111110000000111111100000000111111111111000111
        11111111001111111111111111111000000111111111111111111111111100011
        11111111101111111111111111111110000111111111111111111111111001111
        11111111111111111111111111111110001111111111111111111111100111111
        11111111111111111111111111111111001111111111111111111111001111111
        11111111111111111111111111111111100111111111111111111111111111111
        11111111111111111111111111111111110111111111111111111111111111111
             ------=====神龙坐镇，盗代码者，天天带绿帽=====-----
                  ------=====小铭QQ：1254251438=====-----
-->
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
    <script type="text/javascript" src="/public/static/wapian/js/su.js"></script>
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
     <p class="text-center">如果侵犯了您的版权,请来信告知 {{config('webset.webmail')}} 将及时更正和删除！</p>
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