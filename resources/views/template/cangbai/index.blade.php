@extends('template.lc.layout')
@section('body','index')
@section('title','影视首页')
@section('content')
<script>
$("#影视首页").attr("class","active");
</script>
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
       </div>
      </div>
     </div>
    </div> 
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