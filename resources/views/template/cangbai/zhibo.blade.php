@extends('template.lc.layout')
@section('body','vod-search')
@section('title','电视直播')
@section('other')
<style>
.collapse{display:none}.collapse.in{display:block;}
</style>
@endsection()
@section('content')
<script>
$("#电视直播").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel-bd">
					<div class="stui-player col-pd">
                     <div style="border: 1px solid #E6D8B9;background:#FEFFE6;color: #080;line-height: 20px;padding: 5px 10px;margin-bottom:10px;">
                    【<span style="color:red">播放提示</span>】：<label>如果无法播放请切换线路或者播放源！
                      <span class="hidden-xs">如果还是不行,请点击☞<a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email={{config('webset.webmail')}}" style="color:red">报错</a>，好用请推荐给你的朋友！
                    <a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email={{config('webset.webmail')}}"><font color="red">点这里联系站长最新网址！</font></a></span></label>
                     </div>
					<div class="stui-player__video embed-responsive-16by9 embed-responsive clearfi">
					 <img id="addid" src="" style="display: none;width:100%;border: 0px solid #FF6651">
                            <iframe id="video" src="/jzad" allowfullscreen="true" allowtransparency="true" style="width:100%;border:none"></iframe>
                            <a style="display:none" id="videourlgo" href=""></a>
						</div>
						<div class="stui-player__detail detail">
							<div class="title">
						
						<span class="text-muted" id="xuji">请点击下方播放源切换播放</span></div>
							<p class="data margin-0">
							<a class="detail-more" href="javascript:;">详情 <i class="icon iconfont icon-moreunfold"></i></a></p>
							<div class="detail-content" style="display: none;">
								<p class="data"><span class="text-muted">类型：</span>直播</p>
								<p class="desc margin-0"><span class="left text-muted"></span><span style="font-variant-ligatures: normal; orphans: 2; widows: 2;"></span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="stui-pannel stui-pannel-bg clearfix">
  <div class="top-list stui-pannel-box">
    <div class="top-list-ji">
<div class="stui-pannel stui-pannel-bg clearfix">
	<div class="stui-pannel-box">
		<div class="stui-pannel_hd">
			<div class="stui-pannel__head bottom-line active clearfix">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#ys">
				<span class="more text-muted pull-right">无需安装任何插件，即可播放,点央视频道可折叠！</span>
					<h3 class="title">央视频道</h3>
              </a>
				</div>
			</div>
		<div class="stui-pannel_bd col-pd clearfix">
			<ul class="stui-content__playlist column10 clearfix collapse in" id="ys"> 
			@foreach($yslist as $v)
				<li>
				<a href="javascript:void(0)" id="bofang" class="am-btn am-btn-default lipbtn" data-href='{{$v['zb_addr']}}' onclick="bofang(this)" target="_self">{{$v['zb_title']}}</a>
              </li>
			@endforeach()
			</ul>
		</div>
	</div>
<div class="stui-pannel-box">
		<div class="stui-pannel_hd">
			<div class="stui-pannel__head bottom-line active clearfix">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#ws">
				<span class="more text-muted pull-right">无需安装任何插件，即可播放,点卫视频道可折叠！</span>
				
					<h3 class="title">卫视频道</h3>
              </a>
				</div>
			</div>
		<div class="stui-pannel_bd col-pd clearfix">
			<ul class="stui-content__playlist column10 clearfix collapse in" id="ws"> 
			@foreach($wslist as $v)
				<li>
					<a href="javascript:void(0)" id="bofang" class="am-btn am-btn-default lipbtn" data-href='{{$v['zb_addr']}}' onclick="bofang(this)" target="_self">{{$v['zb_title']}}</a>
				</li>
			@endforeach()
			</ul>
		</div>
	</div>
<div class="stui-pannel-box">
		<div class="stui-pannel_hd">
			<div class="stui-pannel__head bottom-line active clearfix">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#qt">
				<span class="more text-muted pull-right">无需安装任何插件，即可播放,点其他频道可折叠！</span>
				
					<h3 class="title">其他频道</h3>
              </a>
				</div>
			</div>
		<div class="stui-pannel_bd col-pd clearfix">
			<ul class="stui-content__playlist column10 clearfix collapse in" id="qt"> 
			@foreach($qtlist as $v)
				<li>
					<a href="javascript:void(0)" id="bofang" class="am-btn am-btn-default lipbtn" data-href='{{$v['zb_addr']}}' onclick="bofang(this)" target="_self">{{$v['zb_title']}}</a>
				</li>
			@endforeach()
			</ul>
		</div>
	</div>
</div>
      </div>
  </div>
<!--播放历史记录-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/lc/icon/icon_6.png" />播放历史记录</h3>
       </div>
      </div>
      <div class="stui-pannel_bd">
       <ul class="stui-vodlist__bd clearfix">
		@if($history)
        @foreach($history as $v)
		 <li class="col-md-6 col-sm-4 col-xs-3">
          <div class="stui-vodlist__box">
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="{{$v['url']}}" title="{{$v['title']}}">{{$v['title']}}</a></h4>
            <p class="text text-overflow text-muted hidden-xs"></p>
           </div>
          </div>
		  </li>
		@endforeach
        @else
        <h3>暂无历史记录</h3>
        @endif
       </ul>
      </div>
     </div>
    </div>
    <!--影片评论-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/lc/icon/icon_6.png" />影片评论</h3>
       </div>
      </div>
      <div class="stui-pannel_bd">
       {!! config('webset.cy') !!}
      </div>
     </div>
    </div>
</div>
<script type="text/javascript" src="/public/static/lc/js/jquery.SuperSlide.js"></script>
            <script>
                function bofang(obj) {
                    var href = $(obj).attr('data-href');
                    var text = $(obj).text();
                    $('.js').text('-' + text);
                    $.each($('.lipbtn'), function () {
                        $(this).attr('id','');
                    });
                    $(obj).attr('id','ys');
                    if (href != '' || href != null) {
                        $('#video').attr('src', '/jzad');
                        setTimeout(function () {
                            $('#video').attr('src', href);
                        },3000)
                    }
                }
            </script>
@endsection