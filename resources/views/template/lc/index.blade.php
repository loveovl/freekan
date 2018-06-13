@extends('template.lc.layout')
@section('body','index')
@section('title','首页')
@section('content')
<script>
$("#首页").attr("class","active");
</script>
<div class="hy-right-qrcode hidden-sm hidden-xs">
<dl class="clearfix">
<div class="row">
 <div class="item">
<meta charset="utf-8" />
<p>
</p>
<p>
</p>		<title>首页幻灯片</title>
<script type="text/javascript" src="/public/static/lc/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="/public/static/lc/js/jquery.SuperSlide.2.1.1.js"></script>
<link href="/public/static/lc/css/style.css" rel="stylesheet" type="text/css">
<div class="bartop"></div>
<div class="top-nav">
	<div class="curcity">{{session('username')}}</div>
    <div class="login"><span class="login-text">退出<a href="/userloginout.html"></span><span class="login-icon"></span></div>
	<div class=""></div>
	<ul>
    	<li><a href="/movielist/102/1.html">惊悚</a></li>
        <li><a href="/movielist/100/1.html">爱情</a></li>
        <li><a href="/movielist/103/1.html">喜剧</a></li>
        <li><a href="/movielist/106/1.html">动作</a></li>
        <li><a href="/yinyue.php">音乐</a></li>
		<li><a href="/movielist/104/1.html">科幻</a></li>
        <li><a href="/movielist/112/1.html">剧情</a></li>
        <li><a href="/movielist/105/1.html">犯罪</a></li>
        <li><a href="/movielist/108/1.html">战争</a></li>
		<li><a href="/movielist/115/1.html">悬疑</a></li>
		<li><a href="/ucenter.html"><font color="#FF0000">登陆</a></li>
    </ul>
	<font color="#000">
</div>
		<title>幻灯片测试</title>
<!--<link href="/public/static/hd/home.css" rel="stylesheet" type="text/css" />
<link href="/public/static/hd/v280_head.css" rel="stylesheet" type="text/css" />-->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="/public/static/hd/jquery.lazyload.js" type="text/javascript" language="javascript"></script>
<script src="/public/static/hd/jquery.autocomplete.js" type="text/javascript" language="javascript"></script>
<script src="/public/static/hd/tpl.js" type="text/javascript" language="javascript"></script>-->
<script src="/public/static/lc/js/v280_home.js" type="text/javascript" language="javascript"></script>
<link href="/public/static/lc/css/v280_home.css" rel="stylesheet" type="text/css" />

	</head>
	<body>
<div class="site_focus" id="mod_txv_focus">
    	<div class="focus_inner">
          @if($bannerlist)
          @foreach($bannerlist as $v)
        	<a href="{{$v['banner_link']}}" target="_blank" class="focus_img lunbo" style="background-image: url({{$v['banner_img']}}); background-color: rgb(1, 22, 103);background-size:100% 455px;"></a>                
		@break($loop->index==0) 	
          @endforeach
            @else
            @endif
            <div class="focus_control">
		@if($bannerlist)
          @foreach($bannerlist as $v)
            	<h2 class="focus_title" style="padding-top: 13px;text-align: center;" id="mod_txv_focus_title">{{$v['banner_title']}}</h2>                         
			@break($loop->index==0)
              @endforeach
            @else
            @endif
                <div class="focus_thumbnails">
                    <div class="focus_thumbnails_inner" id="mod_txv_focus_nav">
                        <ul class="focus_thumbnails_list cf">
                          @if($bannerlist)
          @foreach($bannerlist as $v)
                            <li style="display: list-item;" title="{{$v['banner_title']}} " img="{{$v['banner_img']}}" class="current" num="1">

                                <a href="{{$v['banner_link']}}" class="link_thumbnails" target="_blank">
                                    <img src="{{$v['banner_img']}}"></a>
                            </li>

			@endforeach
            @else
            @endif
                        </ul>
                    </div>
                    <a href="javascript:;" class="btn_prev" id="focus_smaillPic_prev" title="上一组" hidefocus="true"><i class="ico_prev"></i><span class="btn_inner">上一组</span></a>
                   <a href="javascript:;" class="btn_next" id="focus_smaillPic_next" title="下一组" hidefocus="true"><span class="btn_inner">下一组</span><i class="ico_next"></i></a>
               </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        (function() {
            var v280 = {};
            v280.Focus = {
                focusNum: $("#mod_txv_focus_nav li").length,
                currentNum: 0,
                setFocus: function() {
               var imgObj = $(".lunbo");
                var liObj = $("#mod_txv_focus_nav li").get(this.currentNum);
                imgObj.stop().animate({
                    opacity: '0.4'
                }, 500, function() {
                    $("#mod_txv_focus_title").html($(liObj).attr("title"));
                    imgObj.css({
                        "background-image": "url(" + $(liObj).attr('img') + ")"
                    });
                    imgObj.css({
                      	"background-size":"100% 455px"
                    });
                    imgObj.attr("href", $(liObj).attr('href'));
                    var color = $(liObj).attr('color');
                    if (color != "") imgObj.css("background-color", "#" + color);
                    imgObj.animate({
                        opacity: '1'
                    }, 500);
                });
                this.show();
            },

				show:function(){
					var liObj = $("#mod_txv_focus_nav li").get(this.currentNum);
                    $("#mod_txv_focus_nav li").removeClass("current");
                    $(liObj).addClass("current");
					
					var start = 0,end = this.focusNum;
					//总列表数小于七条时退出
					if(this.focusNum <= 7) return;
					
					if(this.currentNum >= 7){
						if(this.currentNum % 7 == 0)
							start = this.currentNum;
						else
							start = parseInt(this.currentNum / 7) * 7;
					}
						
					if(start + 7 > end)
						start = end - 7;
					else
						end = start + 7;
					
					$("#mod_txv_focus_nav li").css("display","none");
					for(var i = start; i < end ; i++)
					{
						liObj = $("#mod_txv_focus_nav li").get(i);
						$(liObj).css("display","list-item");
					}
				},
                Prev: function() {
                    this.currentNum--;
                    if (this.currentNum < 0)
                        this.currentNum = this.focusNum - 1;
                    this.setFocus();

                },
                Next: function() {
                    this.currentNum++;
                    if (this.currentNum >= this.focusNum)
                        this.currentNum = 0;
                    this.setFocus();
                },
                Auto: function() {
                    window.setInterval(function() { v280.Focus.Next(); }, 5000);
                }
            };
            v280.Focus.Auto();
            $("#focus_smaillPic_prev").click(function() { v280.Focus.Prev() });
            $("#focus_smaillPic_next").click(function() { v280.Focus.Next() });
			$("#mod_txv_focus_nav li").mouseover(function(){
				v280.Focus.currentNum = parseInt($(this).attr("num")) - 1;
				v280.Focus.setFocus();
			});
        })();
    </script>
    </dl>
                        </div>
                    </div>
					</div>
					</div>
					<p>
					</p>
<div class="hy-right-qrcode hidden-sm hidden-xs">
 <div class="container">
   <div class="row">
   <table border="0" cellspacing="0" cellpadding="0" width="100%" background="https://i.loli.net/2018/04/17/5ad596281a25a.png">
<tbody>
<tr>
<td height="45" width="80">
<div style="text-align:left;color:#FF0000;letter-spacing:2px;padding-top:3px;padding-left:66px;font-size:14px;font-weight:bold;">最新消息</div></td>
<td style="color:#000000;" width="595" align="center">
<marquee style="width: 100%;color: red;font-size: 20px;padding-top: 5px;padding-bottom: 5px;">{{config('webset.notice')}}</marquee></td></tr></tbody></table>
</TD></TR></TBODY></TABLE>
<p>
					</p>
    <!--会员视频-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/viplist.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_1.png" />会员视频</h3>
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
			@if(isset($vipdata)&&!empty($vipdata))
            @foreach($vipdata as $key=>$dy)		 
			<li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dy['dy_id']}}">          
			<div class="stui-vodlist__box">           
			<a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dy['dy_id']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}" style="background-image: url({{$dy['dy_img']}});">		   
			<span class="play hidden-xs"></span><span class="pic-text text-right">会员专属</span></a>           
			<div class="stui-vodlist__detail">            
			<h4 class="title text-overflow"><a href="/play/{{$dy['dy_id']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}">{{$dy['dy_title']}}</a></h4>         
			</div>          
			</div>		 
			</li>		
			@break($loop->index==9)                                
			@endforeach
            @else
            @endif
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/viplist.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />
         热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		@if(isset($vipdata)&&!empty($vipdata))
        @foreach($vipdata as $key=>$dy)	
			<li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dy['dy_id']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}">
			<span class="text-muted pull-right">9.9分</span>
			<span class="badge badge-second">*</span>{{$dy['dy_title']}}</a></li>
        @break($loop->index==4)
        @endforeach
        @else
        @endif
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--会员视频-->
	<!--尝鲜视频-->
    <div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/autocxlist/5/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_1.png" />尝鲜视频</h3>
         @foreach($videotype['cx'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>3) hidden-xs hidden-md @endif">
			<li><a href="/autocxlist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
          @break($loop->index==9)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
			@if(isset($dydata)&&!empty($dydata))
			@foreach($dydata as $key=>$dy)	 
			<li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dy['dy_addr']}}">          
			<div class="stui-vodlist__box">           
			<a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dy['dy_addr']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}" style="background-image: url({{$dy['dy_img']}});">   
			<span class="play hidden-xs"></span><span class="pic-text text-right">尝鲜视频</span></a>           
			<div class="stui-vodlist__detail">            
			<h4 class="title text-overflow"><a href="/play/{{$dy['dy_addr']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}">{{$dy['dy_title']}}</a></h4>           
			</div>          
			</div>		 
			</li>		
			@break($loop->index==5)
            @endforeach
            @else
            @endif
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/autocxlist/5/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
			@if(isset($dydata)&&!empty($dydata))
			@foreach($dydata as $key=>$dy)	 
			<li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dy['dy_addr']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}">
			<span class="text-muted pull-right">9.9分</span>
			<span class="badge badge-second">*</span>{{$dy['dy_title']}}</a></li>
			@break($loop->index==4)
            @endforeach
            @else
            @endif
        </ul>
       </div>
       </div>
      </div>
     </div>
    <!--尝鲜视频-->
	<!--电影-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/movielist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_7.png" />电影</h3>
		 @foreach($videotype['movie'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>4) hidden-xs hidden-md @endif">
			<li><a href="/movielist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
		 @break($loop->index==10)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
         @foreach($dys as $dy)
		 <li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dy['url']}}">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dy['url']}}.html" onclick="jilu(this)" title="{{$dy['title']}}" style="background-image: url({{$dy['img']}});">
		   <span class="play hidden-xs"></span><span class="pic-text text-right">{{isset($dy['pf'])?$dy['pf']:''}}分</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/{{$dy['url']}}.html" onclick="jilu(this)" title="{{$dy['title']}}">{{$dy['title']}}</a></h4>
           </div>
          </div>
		 </li>
		 @break($loop->index==5)                                
		 @endforeach
		</ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/movielist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 @foreach($dys as $dy)
         <li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dy['url']}}.html" onclick="jilu(this)" title="{{$dy['title']}}"><span class="text-muted pull-right">{{isset($dy['pf'])?$dy['pf']:''}}分</span><span class="badge badge-second">*</span>{{$dy['title']}}</a></li>
		 @break($loop->index==4)
         @endforeach
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--电影-->
    <!--电视剧-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/tvlist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />电视剧</h3>
		 @foreach($videotype['tv'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>4) hidden-xs hidden-md @endif">
			<li><a href="/tvlist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
		 @break($loop->index==10)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        @foreach($dsjs as $dsj)
		 <li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dsj['url']}}">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dsj['url']}}.html" onclick="jilu(this)" title="{{$dsj['title']}}" style="background-image: url({{$dsj['img']}});">
		   <span class="play hidden-xs"></span><span class="pic-text text-right">{{$dsj['js']}}</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/{{$dsj['url']}}.html" onclick="jilu(this)" title="{{$dsj['title']}}">{{$dsj['title']}}</a></h4>
			<p class="text text-overflow text-muted hidden-xs">{{$dsj['star']}}</p>
           </div>
          </div>
		 </li>
		 @break($loop->index==5)                                
         @endforeach
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/tvlist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 @foreach($dsjs as $dsj)
         <li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dsj['url']}}.html" onclick="jilu(this)" title="{{$dsj['title']}}"><span class="text-muted pull-right">{{$dsj['js']}}</span><span class="badge badge-second">*</span>{{$dsj['title']}}</a></li>
        @break($loop->index==4)
        @endforeach
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--综艺-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/zylist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />综艺</h3>
		 @foreach($videotype['zy'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>4) hidden-xs hidden-md @endif">
			<li><a href="/zylist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
		 @break($loop->index==10)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        @foreach($zys as $zy)
		 <li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$zy['url']}}">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$zy['url']}}.html" onclick="jilu(this)" title="{{$zy['title']}}" style="background-image: url({{$zy['img']}});">
		   <span class="play hidden-xs"></span><span class="pic-text text-right">{{$zy['js']}}</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/{{$zy['url']}}.html" onclick="jilu(this)" title="{{$dsj['title']}}">{{$zy['title']}}</a></h4>
			<p class="text text-overflow text-muted hidden-xs">{{$zy['star']}}</p>
           </div>
          </div>
		 </li>
		 @break($loop->index==5)                                
         @endforeach
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/zylist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 @foreach($zys as $zy)
         <li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$zy['url']}}.html" onclick="jilu(this)" title="{{$zy['title']}}"><span class="text-muted pull-right">{{$zy['js']}}</span><span class="badge badge-second">*</span>{{$zy['title']}}</a></li>
        @break($loop->index==4)
        @endforeach
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--动漫-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/dmlist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />动漫</h3>
		 @foreach($videotype['dm'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>4) hidden-xs hidden-md @endif">
			<li><a href="/dmlist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
		 @break($loop->index==10)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        @foreach($dms as $dm)
		 <li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dm['url']}}">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dm['url']}}.html" onclick="jilu(this)" title="{{$dm['title']}}" style="background-image: url({{$dm['img']}});">
		   <span class="play hidden-xs"></span><span class="pic-text text-right">{{$dm['js']}}</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/{{$dm['url']}}.html" onclick="jilu(this)" title="{{$dm['title']}}">{{$dm['title']}}</a></h4>
			<p class="text text-overflow text-muted hidden-xs">{{$dm['js']}}</p>
           </div>
          </div>
		 </li>
		 @break($loop->index==5)                                
         @endforeach
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/dmlist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 @foreach($dms as $dm)
         <li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dm['url']}}.html" onclick="jilu(this)" title="{{$dm['title']}}"><span class="text-muted pull-right">{{$dm['js']}}</span><span class="badge badge-second">*</span>{{$dm['title']}}</a></li>
        @break($loop->index==4)
        @endforeach
        </ul>
       </div>
       </div>
      </div>
     </div>
	</div>
</div>
 </dl>
                        </div>
                    </div>
				<!--分类开始-->
				<div class="container">
   <div class="row">
   <div class="col-lg-wide stui-pannel stui-pannel-bg hidden-sm hidden-xs clearfix">
				<link href="app.css" rel="stylesheet" type="text/css">
        <section class="imain clearfix">
            <ul class="sel_list">
                <li>
					<dl>
                        <dt class="yellow">电影</dt>
                        <dd>
                            <p class="clearfix">
								<span class="s_tit">类&nbsp;型：</span>
                             					<span>
						<a href="/movielist/103/1.html" title="喜剧">喜剧</a>
					</span>
										<span>
						<a href="/movielist/100/1.html" title="爱情">爱情</a>
					</span>
										<span>
						<a href="/movielist/106/1.html" title="动作">动作</a>
					</span>
										<span>
						<a href="/movielist/102/1.html" title="恐怖">恐怖</a>
					</span>
										<span>
						<a href="/movielist/104/1.html" title="科幻">科幻</a>
					</span>
										<span>
						<a href="/movielist/112/1.html" title="剧情">剧情</a>
					</span>
										<span>
						<a href="/movielist/105/1.html" title="犯罪">犯罪</a>
					</span>
										<span>
						<a href="/movielist/113/1.html" title="奇幻">奇幻</a>
					</span>
										<span>
						<a href="/movielist/108/1.html" title="战争">战争</a>
					</span>
										<span>
						<a href="/movielist/115/1.html" title="悬疑">悬疑</a>
					</span>
										<span>
						<a href="/movielist/107/1.html" title="动画">动画</a>
					</span>
										<span>
						<a href="/movielist/117/1.html" title="文艺">文艺</a>
					</span>
										<span>
						<a href="/movielist/118/1.html" title="记录">记录</a>
					</span>
										<span>
						<a href="/movielist/119/1.html" title="传记">传记</a>
					</span>
										<span>
						<a href="/movielist/120/1.html" title="歌舞">歌舞</a>
					</span>
										<span>
						<a href="/movielist/121/1.html" title="古装">古装</a>
					</span>
										<span>
						<a href="/movielist/122/1.html" title="历史">历史</a>
					</span>
										<span>
						<a href="/movielist/123/1.html" title="惊悚">惊悚</a>
					</span>
										<span>
						<a href="/movielist/109/1.html" title="其他">其他</a>
					</span>
					                                <!--<span><a href="/movielist/103/1.html" title="喜剧">喜剧</a></span>
                                <span><a href="/movielist/100/1.html" title="爱情">爱情</a></span>
                                <span><a href="/movielist/106/1.html" title="动作">动作</a></span>
								<span><a href="/movielist/102/1.html" title="恐怖">恐怖</a></span>
                                <span><a href="/movielist/104/1.html" title="科幻">科幻</a></span>
								<span><a href="/movielist/112/1.html" title="剧情">剧情</a></span>
								<span><a href="/movielist/105/1.html" title="犯罪">犯罪</a></span>
                                <span><a href="/movielist/113/1.html" title="奇幻">奇幻</a></span>
                                <span><a href="/movielist/108/1.html" title="战争">战争</a></span>
                                <span><a href="/movielist/115/1.html" title="悬疑">悬疑</a></span>
                                <span><a href="/movielist/107/1.html" title="动画">动画</a></span>
                                <span><a href="/movielist/117/1.html" title="文艺">文艺</a></span>
                                <span><a href="/movielist/118/1.html" title="记录">记录</a></span>
                                <span><a href="/movielist/119/1.html" title="传记">传记</a></span>
								<span><a href="/movielist/120/1.html" title="歌舞">歌舞</a></span>
								<span><a href="/movielist/121/1.html" title="古装">古装</a></span>
								<span><a href="/movielist/122/1.html" title="历史">历史</a></span>
								<span><a href="/movielist/123/1.html" title="惊悚">惊悚</a></span>
								<span><a href="/movielist/109/1.html" title="其他">其他</a></span>-->
                            </p>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="blue">电视剧</dt>
                        <dd>
                            <p class="clearfix"><span class="s_tit">类&nbsp;型：</span>
                            	  								<span>
									<a href="/tvlist/101/1.html" title="言情">言情</a>
								</span>
																<span>
									<a href="/tvlist/105/1.html" title="伦理">伦理</a>
								</span>
																<span>
									<a href="/tvlist/109/1.html" title="喜剧">喜剧</a>
								</span>
																<span>
									<a href="/tvlist/108/1.html" title="悬疑">悬疑</a>
								</span>
																<span>
									<a href="/tvlist/111/1.html" title="都市">都市</a>
								</span>
																<span>
									<a href="/tvlist/100/1.html" title="偶像">偶像</a>
								</span>
																<span>
									<a href="/tvlist/104/1.html" title="古装">古装</a>
								</span>
																<span>
									<a href="/tvlist/107/1.html" title="军事">军事</a>
								</span>
																<span>
									<a href="/tvlist/103/1.html" title="警匪">警匪</a>
								</span>
																<span>
									<a href="/tvlist/112/1.html" title="历史">历史</a>
								</span>
																<span>
									<a href="/tvlist/106/1.html" title="武侠">武侠</a>
								</span>
																<span>
									<a href="/tvlist/113/1.html" title="科幻">科幻</a>
								</span>
																<span>
									<a href="/tvlist/102/1.html" title="宫廷">宫廷</a>
								</span>
																<span>
									<a href="/tvlist/114/1.html" title="情景">情景</a>
								</span>
																<span>
									<a href="/tvlist/115/1.html" title="动作">动作</a>
								</span>
																<span>
									<a href="/tvlist/116/1.html" title="励志">励志</a>
								</span>
																<span>
									<a href="/tvlist/117/1.html" title="神话">神话</a>
								</span>
																<span>
									<a href="/tvlist/118/1.html" title="谍战">谍战</a>
								</span>
																<span>
									<a href="/tvlist/119/1.html" title="其他">其他</a>
								</span>
																<!--<span><a href="/tvlist/101/1.html" title="言情">言情</a></span>
								<span><a href="/tvlist/105/1.html" title="伦理">伦理</a></span>
								<span><a href="/tvlist/109/1.html" title="喜剧">喜剧</a></span>
                                <span><a href="/tvlist/100/1.html" title="偶像">偶像</a></span>
								<span><a href="/tvlist/108/1.html" title="悬疑">悬疑</a></span>
                                <span><a href="/tvlist/104/1.html" title="古装">古装</a></span>
                                <span><a href="/tvlist/111/1.html" title="都市">都市</a></span>
                                <span><a href="/tvlist/107/1.html" title="军事">军事</a></span>
                                <span><a href="/tvlist/103/1.html" title="警匪">警匪</a></span>
                                <span><a href="/tvlist/102/1.html" title="宫廷">宫廷</a></span>
                                <span><a href="/tvlist/113/1.html" title="科幻">科幻</a></span>
                                <span><a href="/tvlist/112/1.html" title="抗日">历史</a></span>
                                <span><a href="/tvlist/114/1.html" title="情景">情景</a></span>
                                <span><a href="/tvlist/118/1.html" title="谍战">谍战</a></span>
                                <span><a href="/tvlist/115/1.html" title="动作">动作</a></span>
                                <span><a href="/tvlist/106/1.html" title="武侠">武侠</a></span>
                                <span><a href="/tvlist/116/1.html" title="励志">励志</a></span>
                                <span><a href="/tvlist/117/1.html" title="神话">神话</a></span>
                                <span><a href="/tvlist/119/1.html" title="其他">其他</a></span>-->
                            </p>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="green">动漫</dt>
                        <dd>
                            <p class="clearfix"><span class="s_tit">类&nbsp;型：</span>
                              					<span><a href="/dmlist/100/1.html" title="热血">热血</a></span>
										<span><a href="/dmlist/101/1.html" title="恋爱">恋爱</a></span>
										<span><a href="/dmlist/102/1.html" title="美少女">美少女</a></span>
										<span><a href="/dmlist/103/1.html" title="运动">运动</a></span>
										<span><a href="/dmlist/104/1.html" title="校园">校园</a></span>
										<span><a href="/dmlist/105/1.html" title="搞笑">搞笑</a></span>
										<span><a href="/dmlist/106/1.html" title="幻想">幻想</a></span>
										<span><a href="/dmlist/107/1.html" title="冒险">冒险</a></span>
										<span><a href="/dmlist/108/1.html" title="悬疑">悬疑</a></span>
										<span><a href="/dmlist/109/1.html" title="魔幻">魔幻</a></span>
										<span><a href="/dmlist/110/1.html" title="动物">动物</a></span>
										<span><a href="/dmlist/111/1.html" title="少儿">少儿</a></span>
										<span><a href="/dmlist/131/1.html" title="亲子">亲子</a></span>
										<span><a href="/dmlist/112/1.html" title="机战">机战</a></span>
										<span><a href="/dmlist/113/1.html" title="怪物">怪物</a></span>
										<span><a href="/dmlist/114/1.html" title="益智">益智</a></span>
										<span><a href="/dmlist/115/1.html" title="战争">战争</a></span>
										<span><a href="/dmlist/116/1.html" title="社会">社会</a></span>
										<span><a href="/dmlist/117/1.html" title="友情">友情</a></span>
										<span><a href="/dmlist/118/1.html" title="成人">成人</a></span>
										<span><a href="/dmlist/119/1.html" title="竞技">竞技</a></span>
										<span><a href="/dmlist/120/1.html" title="耽美">耽美</a></span>
										<span><a href="/dmlist/121/1.html" title="童话">童话</a></span>
										<span><a href="/dmlist/122/1.html" title="LOLl">LOLl</a></span>
										<span><a href="/dmlist/123/1.html" title="青春">青春</a></span>
										<span><a href="/dmlist/124/1.html" title="男性向">男性向</a></span>
										<span><a href="/dmlist/125/1.html" title="女性向">女性向</a></span>
										<span><a href="/dmlist/126/1.html" title="动作">动作</a></span>
										<span><a href="/dmlist/127/1.html" title="真人版">真人版</a></span>
										<span><a href="/dmlist/128/1.html" title="OVA版">OVA版</a></span>
										<span><a href="/dmlist/129/1.html" title="TV版">TV版</a></span>
										<span><a href="/dmlist/130/1.html" title="电影版">电影版</a></span>
										<span><a href="/dmlist/132/1.html" title="新番动画">新番动画</a></span>
					                                <!--<span><a href="/dmlist/100/1.html" title="热血">热血</a></span>
                                <span><a href="/dmlist/101/1.html" title="恋爱">恋爱</a></span>
                                <span><a href="/dmlist/102/1.html" title="美女">美女</a></span>
								<span><a href="/dmlist/103/1.html" title="运动">运动</a></span>
								<span><a href="/dmlist/104/1.html" title="校园">校园</a></span>
                                <span><a href="/dmlist/105/1.html" title="搞笑">搞笑</a></span>
                                <span><a href="/dmlist/106/1.html" title="幻想">幻想</a></span>
                                <span><a href="/dmlist/107/1.html" title="冒险">冒险</a></span>
                                <span><a href="/dmlist/108/1.html" title="悬疑">悬疑</a></span>
                                <span><a href="/dmlist/119/1.html" title="竞技">竞技</a></span>
                                <span><a href="/dmlist/109/1.html" title="魔幻">魔幻</a></span>
                                <span><a href="/dmlist/126/1.html" title="动作">动作</a></span>
                                <span><a href="/dmlist/111/1.html" title="少儿">少儿</a></span>
                                <span><a href="/dmlist/123/1.html" title="青春">青春</a></span>
								<span><a href="/dmlist/114/1.html" title="益智">益智</a></span>
                                <span><a href="/dmlist/115/1.html" title="战争">战争</a></span>
                                <span><a href="/dmlist/116/1.html" title="社会">社会</a></span>
                                <span><a href="/dmlist/117/1.html" title="友情">友情</a></span>
                                <span><a href="/dmlist/121/1.html" title="童话">童话</a></span>-->
                            </p>
                        </dd>
                    </dl>
                </li>
                <li>
                    <dl>
                        <dt class="red">综艺</dt>
                        <dd>
                            <p class="clearfix"><span class="s_tit">类&nbsp;型：</span>
                              					<span>
						<a href="/zylist/101/1.html" title="选秀">选秀</a>
					</span>
										<span>
						<a href="/zylist/102/1.html" title="八卦">八卦</a>
					</span>
										<span>
						<a href="/zylist/103/1.html" title="访谈">访谈</a>
					</span>
										<span>
						<a href="/zylist/104/1.html" title="情感">情感</a>
					</span>
										<span>
						<a href="/zylist/105/1.html" title="生活">生活</a>
					</span>
										<span>
						<a href="/zylist/106/1.html" title="晚会">晚会</a>
					</span>
										<span>
						<a href="/zylist/107/1.html" title="搞笑">搞笑</a>
					</span>
										<span>
						<a href="/zylist/108/1.html" title="音乐">音乐</a>
					</span>
										<span>
						<a href="/zylist/109/1.html" title="时尚">时尚</a>
					</span>
										<span>
						<a href="/zylist/110/1.html" title="游戏">游戏</a>
					</span>
										<span>
						<a href="/zylist/111/1.html" title="少儿">少儿</a>
					</span>
										<span>
						<a href="/zylist/112/1.html" title="体育">体育</a>
					</span>
										<span>
						<a href="/zylist/113/1.html" title="纪实">纪实</a>
					</span>
										<span>
						<a href="/zylist/114/1.html" title="科教">科教</a>
					</span>
										<span>
						<a href="/zylist/115/1.html" title="曲艺">曲艺</a>
					</span>
										<span>
						<a href="/zylist/116/1.html" title="歌舞">歌舞</a>
					</span>
										<span>
						<a href="/zylist/117/1.html" title="财经">财经</a>
					</span>
										<span>
						<a href="/zylist/118/1.html" title="汽车">汽车</a>
					</span>
										<span>
						<a href="/zylist/119/1.html" title="播报">播报</a>
					</span>
										<span>
						<a href="/zylist/120/1.html" title="真人秀">真人秀</a>
					</span>
					                                <!--<span><a href="/zylist/101/1.html" title="选秀">选秀</a></span>
                                <span><a href="/zylist/103/1.html" title="访谈">访谈</a></span>
                                <span><a href="/zylist/107/1.html" title="搞笑">搞笑</a></span>
                                <span><a href="/zylist/110/1.html" title="游戏">游戏</a></span>
                                <span><a href="/zylist/114/1.html" title="科教">科教</a></span>
                                <span><a href="/zylist/102/1.html" title="八卦">八卦</a></span>
                                <span><a href="/zylist/108/1.html" title="音乐">音乐</a></span>
                                <span><a href="/zylist/105/1.html" title="生活">生活</a></span>
                                <span><a href="/zylist/109/1.html" title="时尚">时尚</a></span>
                                <span><a href="/zylist/113/1.html" title="纪实">纪实</a></span>
                                <span><a href="/zylist/116/1.html" title="歌舞">歌舞</a></span>
                                <span><a href="/zylist/115/1.html" title="曲艺">曲艺</a></span>
                                <span><a href="/zylist/112/1.html" title="体育">体育</a></span>
                                <span><a href="/zylist/117/1.html" title="财经">财经</a></span>
                                <span><a href="/zylist/118/1.html" title="汽车">汽车</a></span>
                                <span><a href="/zylist/119/1.html" title="播报">播报</a></span>
                                <span><a href="/zylist/109/1.html" title="时尚">时尚</a></span>
                                <span><a href="/zylist/104/1.html" title="情感">情感</a></span>
                                <span><a href="/zylist/106/1.html" title="财经">晚会</a></span>-->
                            </p>
                        </dd>
                    </dl>
                </li>
            </ul>
        </section>
		<!--分类结束-->
		</div>
		</div>
		</div>
			<div class="hy-right-qrcode hidden-sm hidden-xs">
 <!--合作伙伴-->
 <div class="container">
   <div class="row">
   <div class="hy-footer clearfix">
    <div class="stui-foot clearfix stui-pannel stui-pannel-bg">
     <div class="col-pd text-center hidden-xs"></div>
<div class="hy-layout hidden-md hidden-sm hidden-xs clearfix"><div class="hy-video-head">
<h3 class="margin-0"><h3 class="title"><img src="/public/static/lc/icon/icon_26.png" />合作伙伴</h3><div data-title="&#26469;&#33258;&#28120;&#23453;&#20195;&#30721;&#29983;&#25104;&#32593;&#119;&#119;&#119;&#46;&#48;&#48;&#49;&#100;&#97;&#105;&#109;&#97;&#46;&#99;&#111;&#109;" style="height:125px;"><div class="most-footer footer-more-trigger" style="left:auto;right:auto;width:950px;height:125px;top:auto;padding:0;border:none;z-index:1;background:none;"><div class="most-footer footer-more-trigger" style="left:-102px;top:0px;width:1154px;height:125px;border:none;padding:0;background:none;"><img src="http://ww2.sinaimg.cn/large/87c01ec7gy1fqewkm69vsj20w203hq4f.jpg" usemap="#ma369112084" /><map name="ma369112084"><area style="outline:none;" target="_blank" shape="rect" coords="3,-77,163,61" href="http://www.iqiyi.com/" /><area style="outline:none;" target="_blank" shape="rect" coords="164,0,330,59" href="http://www.letv.com" /><area style="outline:none;" target="_blank" shape="rect" coords="332,0,495,59" href="http://www.wasu.cn/" /><area style="outline:none;" target="_blank" shape="rect" coords="496,1,657,62" href="http://www.fun.tv/" /><area style="outline:none;" target="_blank" shape="rect" coords="660,2,824,60" href="http://www.hunantv.com/" /><area style="outline:none;" target="_blank" shape="rect" coords="824,0,985,63" href="http://www.cntv.cn/" /><area style="outline:none;" target="_blank" shape="rect" coords="986,0,1150,62" href="http://v.ifeng.com/" /><area style="outline:none;" target="_blank" shape="rect" coords="3,63,167,123" href="http://www.pptv.com/" /><area style="outline:none;" target="_blank" shape="rect" coords="167,63,331,122" href="http://www.kankan.com/" /><area style="outline:none;" target="_blank" shape="rect" coords="335,63,494,122" href="http://www.56.com/" /><area style="outline:none;" target="_blank" shape="rect" coords="498,65,655,120" href="http://www.ku6.com/" /><area style="outline:none;" target="_blank" shape="rect" coords="660,62,817,119" href="http://www.1905.com/" /><area style="outline:none;" target="_blank" shape="rect" coords="822,63,985,118" href="http://v.qq.com" /><area style="outline:none;" target="_blank" shape="rect" coords="987,63,1151,121" href="http://www.yinyuetai.com" /></map></div></div></div>  </div>
                    </div>
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
		  </dl>
                        </div>
                    </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  </dl>
                        </div>
                    </div>
	<div class="container">
   <div class="row">
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
</dl>
                        </div>
                    </div>
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
 </dl>
                        </div>
                    </div>
</div>
                    </div>
 <div class="tabbar visible-xs">
  <div class="container">
   <div class="row">
            <marquee style="width: 100%;color: red;font-size: 20px;padding-top: 5px;padding-bottom: 5px;">{{config('webset.notice')}}</marquee>
        </div>
        <div class="row">
            {!! config('adconfig.index_ad') !!}
        </div>
   <div class="row">
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="stui-pannel-bd">
       <div class="carousel carousel_default flickity-page">
	   @if($bannerlist)
       @foreach($bannerlist as $v)
        <div class="col-md-2 col-xs-1">
         <a href="{{$v['banner_link']}}" class="stui-vodlist__thumb img-shadow" title="{{$v['banner_title']}}" style="background: url({{$v['banner_img']}}) no-repeat; background-position:50% 50%; background-size: cover; padding-top: 40%;"><span class="pic-text text-center">{{$v['banner_title']}}</span></a>
        </div>
	   @endforeach
       @else
       @endif
       </dl>
                        </div>
                    </div>
 <div class="container">
   <div class="row">
    <!--会员视频-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/viplist.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_1.png" />会员视频</h3>
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
			@if(isset($vipdata)&&!empty($vipdata))
            @foreach($vipdata as $key=>$dy)		 
			<li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dy['dy_id']}}">          
			<div class="stui-vodlist__box">           
			<a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dy['dy_id']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}" style="background-image: url({{$dy['dy_img']}});">		   
			<span class="play hidden-xs"></span><span class="pic-text text-right">会员专属</span></a>           
			<div class="stui-vodlist__detail">            
			<h4 class="title text-overflow"><a href="/play/{{$dy['dy_id']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}">{{$dy['dy_title']}}</a></h4>         
			</div>          
			</div>		 
			</li>		
			@break($loop->index==5)                                
			@endforeach
            @else
            @endif
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/viplist.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />
         热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		@if(isset($vipdata)&&!empty($vipdata))
        @foreach($vipdata as $key=>$dy)	
			<li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dy['dy_id']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}">
			<span class="text-muted pull-right">9.9分</span>
			<span class="badge badge-second">*</span>{{$dy['dy_title']}}</a></li>
        @break($loop->index==4)
        @endforeach
        @else
        @endif
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--会员视频-->
	<!--尝鲜视频-->
    <div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/autocxlist/5/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_1.png" />尝鲜视频</h3>
         @foreach($videotype['cx'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>3) hidden-xs hidden-md @endif">
			<li><a href="/autocxlist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
          @break($loop->index==9)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
			@if(isset($dydata)&&!empty($dydata))
			@foreach($dydata as $key=>$dy)	 
			<li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dy['dy_addr']}}">          
			<div class="stui-vodlist__box">           
			<a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dy['dy_addr']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}" style="background-image: url({{$dy['dy_img']}});">   
			<span class="play hidden-xs"></span><span class="pic-text text-right">尝鲜视频</span></a>           
			<div class="stui-vodlist__detail">            
			<h4 class="title text-overflow"><a href="/play/{{$dy['dy_addr']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}">{{$dy['dy_title']}}</a></h4>           
			</div>          
			</div>		 
			</li>		
			@break($loop->index==5)
            @endforeach
            @else
            @endif
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/autocxlist/5/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
			@if(isset($dydata)&&!empty($dydata))
			@foreach($dydata as $key=>$dy)	 
			<li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dy['dy_addr']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}">
			<span class="text-muted pull-right">9.9分</span>
			<span class="badge badge-second">*</span>{{$dy['dy_title']}}</a></li>
			@break($loop->index==4)
            @endforeach
            @else
            @endif
        </ul>
       </div>
       </div>
      </div>
     </div>
    <!--尝鲜视频-->
	<!--电影-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/movielist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_7.png" />电影</h3>
		 @foreach($videotype['movie'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>4) hidden-xs hidden-md @endif">
			<li><a href="/movielist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
		 @break($loop->index==10)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
         @foreach($dys as $dy)
		 <li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dy['url']}}">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dy['url']}}.html" onclick="jilu(this)" title="{{$dy['title']}}" style="background-image: url({{$dy['img']}});">
		   <span class="play hidden-xs"></span><span class="pic-text text-right">{{isset($dy['pf'])?$dy['pf']:''}}分</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/{{$dy['url']}}.html" onclick="jilu(this)" title="{{$dy['title']}}">{{$dy['title']}}</a></h4>
           </div>
          </div>
		 </li>
		 @break($loop->index==5)                                
		 @endforeach
		</ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/movielist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 @foreach($dys as $dy)
         <li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dy['url']}}.html" onclick="jilu(this)" title="{{$dy['title']}}"><span class="text-muted pull-right">{{isset($dy['pf'])?$dy['pf']:''}}分</span><span class="badge badge-second">*</span>{{$dy['title']}}</a></li>
		 @break($loop->index==4)
         @endforeach
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--电影-->
    <!--电视剧-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/tvlist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />电视剧</h3>
		 @foreach($videotype['tv'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>4) hidden-xs hidden-md @endif">
			<li><a href="/tvlist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
		 @break($loop->index==10)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        @foreach($dsjs as $dsj)
		 <li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dsj['url']}}">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dsj['url']}}.html" onclick="jilu(this)" title="{{$dsj['title']}}" style="background-image: url({{$dsj['img']}});">
		   <span class="play hidden-xs"></span><span class="pic-text text-right">{{$dsj['js']}}</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/{{$dsj['url']}}.html" onclick="jilu(this)" title="{{$dsj['title']}}">{{$dsj['title']}}</a></h4>
			<p class="text text-overflow text-muted hidden-xs">{{$dsj['star']}}</p>
           </div>
          </div>
		 </li>
		 @break($loop->index==5)                                
         @endforeach
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/tvlist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 @foreach($dsjs as $dsj)
         <li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dsj['url']}}.html" onclick="jilu(this)" title="{{$dsj['title']}}"><span class="text-muted pull-right">{{$dsj['js']}}</span><span class="badge badge-second">*</span>{{$dsj['title']}}</a></li>
        @break($loop->index==4)
        @endforeach
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--综艺-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/zylist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />综艺</h3>
		 @foreach($videotype['zy'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>4) hidden-xs hidden-md @endif">
			<li><a href="/zylist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
		 @break($loop->index==10)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        @foreach($zys as $zy)
		 <li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$zy['url']}}">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$zy['url']}}.html" onclick="jilu(this)" title="{{$zy['title']}}" style="background-image: url({{$zy['img']}});">
		   <span class="play hidden-xs"></span><span class="pic-text text-right">{{$zy['js']}}</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/{{$zy['url']}}.html" onclick="jilu(this)" title="{{$dsj['title']}}">{{$zy['title']}}</a></h4>
			<p class="text text-overflow text-muted hidden-xs">{{$zy['star']}}</p>
           </div>
          </div>
		 </li>
		 @break($loop->index==5)                                
         @endforeach
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/zylist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 @foreach($zys as $zy)
         <li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$zy['url']}}.html" onclick="jilu(this)" title="{{$zy['title']}}"><span class="text-muted pull-right">{{$zy['js']}}</span><span class="badge badge-second">*</span>{{$zy['title']}}</a></li>
        @break($loop->index==4)
        @endforeach
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--动漫-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/dmlist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />动漫</h3>
		 @foreach($videotype['dm'] as $key=>$type)
		 <ul class="nav nav-text pull-right @if($loop->index>4) hidden-xs hidden-md @endif">
			<li><a href="/dmlist/{{$type}}/1.html" class="text-muted">{{$key}}片</a> <span class="split-line"></span></li>
		 </ul>
		 @break($loop->index==10)
         @endforeach
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        @foreach($dms as $dm)
		 <li class="col-md-5 col-sm-4 col-xs-3 @if($loop->index>4) hidden-lg hidden-md @endif" id="vodlist-{{$dm['url']}}">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dm['url']}}.html" onclick="jilu(this)" title="{{$dm['title']}}" style="background-image: url({{$dm['img']}});">
		   <span class="play hidden-xs"></span><span class="pic-text text-right">{{$dm['js']}}</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/{{$dm['url']}}.html" onclick="jilu(this)" title="{{$dm['title']}}">{{$dm['title']}}</a></h4>
			<p class="text text-overflow text-muted hidden-xs">{{$dm['js']}}</p>
           </div>
          </div>
		 </li>
		 @break($loop->index==5)                                
         @endforeach
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/dmlist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 @foreach($dms as $dm)
         <li class="@if($loop->index>4) hidden-lg hidden-md @endif"><a href="/play/{{$dm['url']}}.html" onclick="jilu(this)" title="{{$dm['title']}}"><span class="text-muted pull-right">{{$dm['js']}}</span><span class="badge badge-second">*</span>{{$dm['title']}}</a></li>
        @break($loop->index==4)
        @endforeach
        </ul>
       </div>
       </div>
      </div>
     </div>
	</div>
</div>
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
@endsection 