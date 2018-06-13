@extends('template.lc.layout')
@section('body','vod-type apptop')
@section('title','热门大剧')
@section('content')
<script>
$("#热门大剧").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel_hd">
					<div class="stui-pannel__head active bottom-line clearfix">
						<h3 class="title"><img src="/public/static/lc/icon/icon_25.png"/>电视剧</h3>
						<span class="more text-muted pull-right hidden-xs">提示：如有侵权 联系后 立马删除</span>
					</div>
						<ul class="stui-screen__list type-slide bottom-line-dot clearfix"><li><span class="text-muted">电视剧分类</span></li><li><a href="/tvlist/all/1.html">全部</a></li>
						@foreach($tvtype as $key=>$v)
						<li><a href="/tvlist/{{$v}}/1.html">{{$key}}</a></li>
						@endforeach
						</ul>
				</div>
				<div class="stui-pannel_bd">
					{!! config('adconfig.list_top') !!}
				</div>
				<div class="stui-pannel_bd">
       <ul class="stui-vodlist clearfix">
	   @foreach($dsj as $ds)
        <li class="col-md-6 col-sm-4 col-xs-3">
         <div class="stui-vodlist__box">
          <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$ds['url']}}.html" onclick="jilu(this)" title="{{$ds['title']}}" style="background-image: url({{$ds['img']}});">
		  <span class="play hidden-xs"></span><span class="pic-text text-right">{{$ds['js']}}</span></a>
          <div class="stui-vodlist__detail">
           <h4 class="title text-overflow"><a href="/play/{{$ds['url']}}.html" onclick="jilu(this)" title="{{$ds['title']}}">{{$ds['title']}}</a></h4>
		   <p class="text text-overflow text-muted hidden-xs">{{$ds['star']}}</p>
          </div>
         </div>
		</li>
		 @endforeach
       </ul>
      </div>
  </div>
</div>   
    <!-- 筛选列表 -->
    <ul class="stui-page text-center cleafix">
	{!! $pagehtml !!}
	<li><a>共24页</a></li>
    </ul>
    <!-- 列表翻页-->
   </div>
</div>
@endsection