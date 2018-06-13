@extends('template.lc.layout')
@section('title','搜索结果')
@section('body','vod-search')
@section('content')
<div class="container">
   <div class="row">
    <div class="col-lg-1 col-xs-1 padding-0">
     <div class="stui-pannel stui-pannel-bg clearfix">
      <div class="stui-pannel-box">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head active bottom-line clearfix">
         <span class="more text-muted pull-right hidden-xs">温馨提示:请点击搜索结果的标题或封面图进行观看</span>
         <h3 class="title"><img src="/public/static/lc/icon/icon_27.png" />与{{$searchkey}}相关的影片</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__media col-pd clearfix">
		@if($cxs)
        @foreach($cxs as $key=>$s)
         <li class ="activeclearfix">
          <div class="thumb">
           <a class="v-thumb stui-vodlist__thumb lazyload img-shadow" href="/play/{{$s['dy_addr']}}}.html" onclick="jilu(this)" title="{{$s['dy_title']}}" style="background-image: url({{$s['dy_img']}});"><span class="play hidden-xs"></span><span class="pic-text text-right">9.9</span></a>
          </div>
          <div class="detail">
           <h3 class="title"><a href="/play/{{$key}}.html" onclick="jilu(this)">{{$s['dy_title']}}</a></h3>
           <p class="data"><span class="text-muted">搜索类型：</span>尝鲜</p>
           <p class="data"><span class="text-muted">视频年份：</span>2018</p>
           <!--<p class="data">
		   <span class="text-muted">类型：</span>尝鲜<span class="split-line"></span>
		   <span class="text-muted">地区：</span>未知<span class="split-line"></span>
		   <span class="text-muted">年份：</span>未知</span></p>-->
           <p class="margin-0 hidden-sm hidden-xs"><span class="text-muted">视频简介：</span>{{$s['dy_desc']}}</p>
          </div>
		  </li>
			@endforeach
			@else
                         <h3>很抱歉，没有找到与{{$searchkey}}抢先看相关搜素结果，请切换搜索词或者精确搜索。</h3>
			@endif
			@if($ss)
            @foreach($ss as $s)
		  <li class ="activeclearfix">
          <div class="thumb">
           <a class="v-thumb stui-vodlist__thumb lazyload img-shadow" href="/play/{{$s['dy_addr']}}.html" onclick="jilu(this)" title="{{$s['dy_title']}}" style="background-image: url({{$s['dy_img']}});"><span class="play hidden-xs"></span><span class="pic-text text-right">9.9</span></a>
          </div>
          <div class="detail">
           <h3 class="title"><a href="/play/{{$s['dy_addr']}}.html" onclick="jilu(this)">{{$s['dy_title']}}</a></h3>
           <p class="data"><span class="text-muted">搜索类型：</span>全网</p>
           <p class="data"><span class="text-muted">视频年份：</span>2018</p>
           <!--<p class="data">
		   <span class="text-muted">类型：</span>未知<span class="split-line"></span>
		   <span class="text-muted">地区：</span>未知<span class="split-line"></span>
		   <span class="text-muted">年份：</span>未知</span></p>-->
           <p class="margin-0 hidden-sm hidden-xs"><span class="text-muted">视频简介：</span>{{$s['dy_desc']}}</p>
          </div>
		  </li>
			@endforeach
			@else  
                        <h3>很抱歉，没有找到与{{$searchkey}}全网相关搜素结果，请切换搜索词或者精确搜索。</h3>
			@endif
        </ul>
       </div>
      </div>
     </div>
    </div>
    </div>
	    <script>
        $(function () {
            var key = $('.text-color:eq(0)').text();
            $('#ff-wd').val(key)
        })
    </script>
  @endsection