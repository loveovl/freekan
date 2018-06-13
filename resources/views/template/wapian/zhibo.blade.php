@extends('template.wapian.layout')
@section('title','')
@section('body','vod-search')
@section('other')
    <script src="http://tv.bbbbbb.me/ckplayer/ckplayer.js"></script>
    <script src="/public/static/wapian/js/home.js"></script>
    <script data-cfasync="false" src="/public/static/wapian/js/email-decode.min.js"></script>
    <style type="text/css">
        .bofangdiv>a{
            display: none;
        }
        .playButton>li{
            float: left;
            padding: 5px;
        }
        .playButton>li>a {
            border: 1px solid deepskyblue;
            border-radius: 5px;
            color: deeppink;
            padding: 3px 5px;
        }
        .playButton .active a{background: #09af07;}

        .jwplayer .jw-icon-barlogo-new:before {
            content: none;
        }
        .jw-icon-barlogo-new {
            background-position: center;
        }
        #playercontainer{
            width: 100%;
            height: 600px;
            background: rgba(0,0,0,0.5)
        }
        @media (max-width: 767px){
            #playercontainer{
                width: 100%;
                height: 300px;
                background: rgba(0,0,0,0.5)
            }
        }

    </style>
@endsection()
@section('content')
    <div class="container">
        <div class="hy-player clearfix">
            <div class="item">
                <div class="col-md-12 col-sm-12 padding-0">
                    <div class="bofangdiv">
                        <div id="playercontainer">

                        </div>
                        <div class="footer clearfix" style="height: auto;">
                            <span class="text-muted">请点击下方播放源切换播放</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="hy-layout clearfix">
            <div class="hy-switch-tabs">
                <ul class="nav nav-tabs play-tabs">
                    <li><a>央视频道</a></li>
                    <li><a>卫视频道</a></li>
                    <li><a>其他频道</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="hy-play-list tab-pane fade in active" id="list3">
                    <div class="item">
                        <div class="plot">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide playButton">
                                        @foreach($yslist as $v)
                                        <li>
                                            <a data-href="{{$v['zb_addr']}}" rel="nofollow" onclick="play(this)">
                                                {{$v['zb_title']}}</a>
                                        </li>
                                         @endforeach
                                    </div>
                                    <div class="swiper-slide playButton">
                                        @foreach($wslist as $v)
                                            <li>
                                                <a data-href="{{$v['zb_addr']}}" rel="nofollow" onclick="play(this)">
                                                    {{$v['zb_title']}}</a>
                                            </li>
                                        @endforeach
                                    </div>
                                    <div class="swiper-slide playButton">
                                        @foreach($qtlist as $v)
                                            <li>
                                                <a data-href="{{$v['zb_addr']}}" rel="nofollow" onclick="play(this)">
                                                    {{$v['zb_title']}}</a>
                                            </li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //Swiper
        $(document).ready(function () {
            $(".play-tabs li").removeClass("active");
            $(".play-tabs li").eq(0).addClass("active");
            var mySwiper = new Swiper ('.swiper-container', {
                loop: false,
                on: {
                    slideChangeTransitionStart: function(){
                        $(".play-tabs li").removeClass("active");
                        $(".play-tabs li").eq(this.activeIndex).addClass("active");
                    },
                },
            });
            $(".play-tabs li").on("click",function(){
                mySwiper.slideTo($(this).index(), 500, true);
            });
            $("#jihuo").click();
        });
    </script>
    <script>
        function play(obj) {
            var url = $(obj).attr('data-href');
            var flashvars={
                f : 'http://tv.bbbbbb.me/ckplayer/m3u8.swf',
                a : url,
                c : 0,
                p : 1,
                s:4,
                lv:1
            };
            var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
            var isiPad = navigator.userAgent.match(/iPad|iPhone|Linux|Android|iPod/i) != null;
            if (isiPad) {
                var str = '<video src="'+url+'" controls="controls" autoplay="autoplay" width="100%" height="100%" style="psotion:relative;"></video>';
                $('#playercontainer').html(str);
            }else{
                CKobject.embed('http://tv.bbbbbb.me/ckplayer/ckplayer.swf','playercontainer','ck-video','100%','100%',false, flashvars ,url, params);
            }
        }
    </script>
@endsection