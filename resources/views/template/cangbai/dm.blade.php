@extends('template.lc.layout')
@section('body','vod-type apptop')
@section('title','唯美动漫')
@section('content')
<script>
$("#唯美动漫").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel_hd">
					<div class="stui-pannel__head active bottom-line clearfix">
						<h3 class="title"><img src="/public/static/lc/icon/icon_25.png"/>动漫</h3>
						<span class="more text-muted pull-right hidden-xs">提示：如有侵权 联系后 立马删除</span>
					</div>
						<ul class="stui-screen__list type-slide bottom-line-dot clearfix"><li><span class="text-muted">动漫分类</span></li><li><a href="/dmlist/all/1.html">全部</a></li>
						@foreach($dmtype as $key=>$v)
						<li><a href="/dmlist/{{$v}}/1.html">{{$key}}</a></li>
						@endforeach
						</ul>
				</div>
				<div class="stui-pannel_bd">
					{!! config('adconfig.list_top') !!}
				</div>
				<div class="stui-pannel_bd">
       <ul class="stui-vodlist clearfix">
	   @foreach($dms as $dm)
        <li class="col-md-6 col-sm-4 col-xs-3">
         <div class="stui-vodlist__box">
          <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dm['url']}}.html" onclick="jilu(this)" title="{{$dm['title']}}" style="background-image: url({{$dm['img']}});">
		  <span class="play hidden-xs"></span><span class="pic-text text-right">{{$dm['js']}}</span></a>
          <div class="stui-vodlist__detail">
           <h4 class="title text-overflow"><a href="/play/{{$dm['url']}}.html" onclick="jilu(this)" title="{{$dm['title']}}">{{$dm['title']}}</a></h4>
		   <p class="text text-overflow text-muted hidden-xs"></p>
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