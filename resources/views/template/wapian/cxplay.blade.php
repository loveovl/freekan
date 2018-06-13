@extends('template.wapian.layout')
@section('title','')
@section('content')
    <div class="container">
        <div class="row">
            <div class="hy-player clearfix">
                <div class="item">
                    <div class="col-md-9 col-sm-12 padding-0">
                        <div class="info embed-responsive embed-responsive-4by3 bofangdiv" id="cms_player">
                            <img id="addid" src="" style="display: none;width:100%;border: 0px solid #FF6651">
                            <iframe id="video" src="/jzad" allowfullscreen="true" allowtransparency="true" style="width:100%;border:none"></iframe>
                            <a style="display:none" id="videourlgo" href=""></a>


                        </div>
                        <div class="footer clearfix">
                            <ul class="cleafix hidden-sm hidden-xs">
                                <li>
                                    <a class="btn btn-sm btn-default" id="btn-pre">
                                        <i class="icon iconfont icon-rewind1"></i> 上一集
                                    </a>
                                </li>
                                <li class="">
                                    <a class="btn btn-sm btn-default" id="btn-next">下一集
                                        <i class="icon iconfont icon-fastforward"></i>
                                    </a>
                                </li>
                            </ul>
                            <span class="text-muted" id="xuji" >正在为您播放-{{$info['dyname']}}<span class="js"></span></span>

                        </div>
                      <p style="text-align:center;color: #fff;font-size: 10px;background: #DF3D5F;padding:11px 8px;border-radius: 2px;">
						观看小提示：若等待15秒以上还未播放，请手动切换其他线路或播放源，服务器加载需要时间，请耐心等待，高潮总在缓冲后！</p>
                    </div>
                    <div class="col-md-3 col-sm-12 padding-0">
                        <div class="sidebar">
                            <div class="hy-play-list play">
                                <div class="item tyui" id="dianshijuid">
                                    <div class="panel clearfix">
                                       @foreach($playinfo as $key=>$arr)
                                        <a class="option collapsed" data-toggle="collapse" data-parent="#playlist"
                                           href="#playlist{{$loop->index}}">{{$playtype[$key]}}<span class="text-muted pull-right"><i
                                                        class="icon iconfont icon-right"></i></span></a>
                                        <div id="playlist{{$loop->index}}" class="playlist collapse {{$loop->index==0?'in':''}}">
                                            <ul class="playlistlink-1 list-15256 clearfix">
                                                @foreach($arr as $v)
                                                    <li>
                                                        <a href="javascript:void(0)" target="_self" id="bofang"  class="am-btn am-btn-default lipbtn" style="" data-href='{{$v['url']}}' onclick="bofang(this)">{{$v['name']}}</a>
                                                    </li>
                                                @endforeach()
                                            </ul>

                                        </div>
                                       @endforeach()
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 hy-main-content">
                        <div class="hy-layout clearfix">
                            <div class="hy-switch-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#list3" data-toggle="tab">剧情介绍</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="hy-play-list tab-pane fade in active" id="list3">
                                    <div class="item">
                                        <div class="plot">
                                            <span>简介：</span>{{$info['dydesc']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hy-layout clearfix">
                            <div class="hy-video-head">
                                <h3 class="margin-0">影片评论</h3>
                            </div>
                            <div class="ff-forum" id="ff-forum" data-id="37432" data-sid="1">
                                <!-- UY BEGIN -->
                            {!! config('webset.cy') !!}
                            <!-- UY END --></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 hy-main-side hidden-sm hidden-xs">
                        <div class="hy-layout clearfix">
                            <div class="hy-details-qrcode side clearfix">
                                <div class="item">
                                    <h5 class="text-muted">扫一扫用手机观看</h5>
                                    <p>
                                        <img src="http://qr.liantu.com/api.php?text=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" width="250">
                                    </p>
                                    <p class="text-muted">
                                        分享到朋友圈
                                    </p>
                                </div>
                            </div>
                            <div class="hy-video-ranking side clearfix">
                                <div class="head">
                                    <a class="text-muted pull-right" href="#"><i class="icon iconfont icon-right"></i></a>
                                    <h4>您的播放历史记录</h4>
                                </div>
                                <div class="item">
                                    <ul class="clearfix">

                                        @if($history)
                                            @foreach($history as $v)
                                                <li class="text-overflow">
                                                    <span class="pull-right text-color">-&gt;&gt;</span>
                                                    <a href="{{$v['url']}}" title="{{$v['title']}}">{{$v['title']}}</a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class="text-overflow">
                                                <span class="pull-right text-color">-&gt;&gt;</span>
                                                <a href="#" title="暂无播放记录"><em class="number active "></em>暂无播放记录</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="ff-hits" id="ff-hits-insert" data-id="37432" data-sid="vod" data-type="insert"></span>
            <script>
                var swiper = new Swiper('.hy-switch', {
                    pagination: '.swiper-pagination',
                    paginationClickable: true,
                    slidesPerView: 5,
                    spaceBetween: 0,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    breakpoints: {
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 0
                        },
                        767: {
                            slidesPerView: 3,
                            spaceBetween: 0
                        }
                    }
                });
            </script>
            <script>
                $(function () {
                    var biaoti = $('#xuji').text();
                    $('title').text(biaoti);
                    var href = $('#bofang').attr('data-href');
                    if (href != '' || href != null) {
                        setTimeout(function () {
                            $('#video').attr('src',href);
                        },3000)
                    }
                    $('.lipbtn:eq(0)').attr('id','ys');
                })

            </script>
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
            <script>
                $(function () {
                    $('#btn-pre').click(function () {
                        $('#ys').parent().prev().children('a:eq(0)').click();
                    })//上一集
                    $('#btn-next').click(function () {
                        $('#ys').parent().next().children('a:eq(0)').click();
                    })//上一集
                })
            </script>
            <span class="ff-record-set" data-sid="1" data-id="37432" data-id-sid="1" data-id-pid="1">
</span>
@endsection