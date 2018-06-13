@extends('template.lc.layout')
@section('title','播放页')
@section('other')
<style>
.collapse{display:none}.collapse.in{display:block;}
</style>
@endsection()
@section('content')
<script>
$("#动漫").attr("class","active");
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
						<img id="addid" src="" style="display: none;width:100%;height:100%;border: 0px solid #FF6651">
								<iframe id="video" src="/jzad" allowfullscreen="true" allowtransparency="true" style="width:100%;height:100%;border:none"></iframe>
                            <a style="display:none" id="videourlgo" href=""></a>
						</div>
						<div class="stui-player__detail detail">
						<div class="title">
						<span class="pull-right bdshare-button-style0-24 player_switch" id="xlus">
						@foreach($jk as $key=>$v)
						<a onclick="xldata(this)" data-jk="{{$v}}" class="btn btn-sm btn-default">{{$key}}</a>
						@endforeach</span>
						</div>
							<p class="data margin-0">
<span class="text-muted" id="xuji">正在播放：{{$pm}}</span>
							<a class="detail-more" href="javascript:;">详情 <i class="icon iconfont icon-moreunfold"></i></a></p>
							<div class="detail-content" style="display: none;">
								<p class="data"><span class="text-muted">类型：</span>动漫</p>
								<p class="desc margin-0"><span class="left text-muted">简介：</span><span style="font-variant-ligatures: normal; orphans: 2; widows: 2;">{{$desc}}</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@foreach($js as $key=>$v)		
<div class="stui-pannel stui-pannel-bg clearfix">
	<div class="stui-pannel-box"><div class="stui-pannel_hd">
		<div class="stui-pannel__head bottom-line active clearfix">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#dm{{$v['name']}}">
			<span class="more text-muted pull-right">无需安装任何插件，即可播放,点播放源可折叠！</span>
				<h3 class="title">{{$v['name']}}</h3>
          </a>
		</div>
	</div>
	<div class="stui-pannel_bd col-pd clearfix">
		<ul class="stui-content__playlist column10 clearfix collapse in" id="dm{{$v['name']}}">
			{!! isset($v['data'])?$v['data']:'暂无可用播放源' !!}
		</ul> 
	</div>
	</div>
</div>
@endforeach
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
</div>
<script type="text/javascript" src="/public/static/lc/js/jquery.SuperSlide.js"></script>
<script>
	$(function () {
			$('.title.g-clear').remove();
			$('.all.js-show-init').remove();
			$('.js-tab-wrapper').remove();
			
			$.each($('.num-tab.js-tabs'),function () {
					if($(this).children('.num-tab-main').length>1){
							$(this).children('.num-tab-main:eq(0)').remove();
					}
					$(this).children('.num-tab-main').children('a').wrap("<li></li>");
					$(this).children('.num-tab-main').children('li').children('a').addClass('am-btn am-btn-default lipbtn');

			});
			
			$('.ji-tab-content.js-tab-content').css('opacity',1);
			$('.num-tab-main.g-clear.js-tab').removeAttr("style");
			$.each($('.lipbtn'),function () {
					var url = $(this).attr('href');
					$(this).attr('data-href',url);
					$(this).attr('href','javascript:;');
					$(this).attr('onclick','bofang(this)');
			});
			var biaoti = $('#xuji').text();
			$('title').text(biaoti);
			$('#xlus').children('a:eq(0)').addClass('jkbtn');
			var autourl = $('.lipbtn:eq(0)').attr('data-href');
			$('.lipbtn:eq(0)').attr('id','ys');
			var text = $('.lipbtn:eq(0)').text();
			$('.js').text('-第'+text+'集');
			var jiekou = $('#xlus').children('a:eq(0)').attr('data-jk');
			if(autourl!=''||autourl!=null){
					setTimeout(function () {
							$('#video').attr('src', jiekou + autourl);
					},3000)
			}
	})
	function bofang(obj) {
			var href = $(obj).attr('data-href');
			var text = $(obj).text();
			$('.js').text('-第' + text+'集');
			$.each($('.lipbtn'), function () {
					$(this).attr('id','');
			});
			$(obj).attr('id','ys');
			var jiekou = $('.jkbtn').attr('data-jk');
			if (href != '' || href != null) {
					$('#video').attr('src', '/jzad');
					setTimeout(function () {
							$('#video').attr('src', jiekou + href);
			},3000)
	}
	}
	function xldata(obj) {
			var url = $(obj).attr('data-jk');
			$.each($('.jkbtn'), function () {
					$(this).removeClass('jkbtn');
			});
			$(obj).addClass('jkbtn');
			var src = $('#ys').attr('data-href');
			$('#video').attr('src', url + src);
	}
	</script>
@endsection