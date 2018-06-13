@extends('template.lc.layout')
@section('body','vod-type apptop')
@section('title','会员视频')
@section('content')
<script>
$("#会员视频").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel_hd">
					<div class="stui-pannel__head active bottom-line clearfix">
						<h3 class="title"><img src="/public/static/lc/icon/icon_25.png"/>会员专属视频列表</h3>
						<span class="more text-muted pull-right hidden-xs">提示：如有侵权 联系后 立马删除</span>
					</div>
				</div>
				<div class="stui-pannel_hd">
				 {!! config('adconfig.list_top') !!}
				</div>
      <div class="stui-pannel_bd">
       <ul class="stui-vodlist clearfix">
	   @if(isset($vipdata)&&!empty($vipdata))
       @foreach($vipdata as $key=>$dy)
        <li class="col-md-6 col-sm-4 col-xs-3">
         <div class="stui-vodlist__box">
          <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/{{$dy['dy_id']}}.html" onclick="jilu(this)" title="{{$dy['dy_title']}}" style="background-image: url({{$dy['dy_img']}});">
		  <span class="play hidden-xs"></span><span class="pic-text text-right">2018</span></a>
          <div class="stui-vodlist__detail">
           <h4 class="title text-overflow"><a href="/play/{{$dy['dy_id']}}" onclick="jilu(this)" title="{{$dy['dy_title']}}">{{$dy['dy_title']}}</a></h4>
          </div>
         </div>
		</li>
		@endforeach
        @else
        @endif
       </ul>
      </div>
     </div>
    </div>  
    <!-- 筛选列表 -->
    <ul class="stui-page text-center cleafix">
	<li><a>共1页</a></li>
    </ul>
    <!-- 列表翻页-->
   </div>
@endsection