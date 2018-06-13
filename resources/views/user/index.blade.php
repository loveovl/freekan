@extends('user.layout')
@section('userindex','active')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="xe-widget xe-counter xe-counter-purple">
                <div class="xe-icon">
                    <i class="linecons-user"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">{{$userlevel==0?'普通会员':'VIP会员'}}</strong>
                    <span>会员等级</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="xe-widget xe-counter">
                <div class="xe-icon">
                    <i class="linecons-cloud"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">{{$usercreate}}</strong>
                    <span>注册时间</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="xe-widget xe-counter xe-counter-red">
                <div class="xe-icon">
                    <i class="linecons-lightbulb"></i>
                </div>
                <div class="xe-label">
                    @if($userlevel==0)
                        <strong class="num">未开通</strong>
                    @elseif($etime<time())
                        <strong class="num">已到期</strong>
                    @else
                    <strong class="num">{{date('Y-m-d',$etime)}}</strong>
                    @endif
                    <span>VIP到期时间</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <h5>近期播放历史</h5>

            <ul class="list-group list-group-minimal">
                @if($history)
                    @foreach($history as $v)
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-info"><a href="{{$v['url']}}" style="color: white">>>></a></span>
                    {{$v['title']}}
                </li>
                   @endforeach
                  @else
                @endif
            </ul>

        </div>
    </div>
@endsection
