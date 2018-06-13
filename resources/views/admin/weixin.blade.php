@extends('public.admin')
@section('wx','active opened active')
@section('weixin','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">基本信息设置</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">APPID</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="{{config('wxconfig.appid')}}" name="appid" placeholder="请输入appid" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">APPSECRET</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="{{config('wxconfig.appsecret')}}" name="appsecret" placeholder="请输入appsecret" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">TOKEN</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" value="{{config('wxconfig.token')}}" name="token" placeholder="请输入token" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">微信二维码图片地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-4" value="{{config('wxconfig.wximg')}}" name="wximg" placeholder="请输入微信二维码地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">被关注后回复内容</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-5" value="{{config('wxconfig.recontent')}}" name="recontent" placeholder="请输入被关注后回复内容" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-8">自定义回复标题</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-8" value="{{config('wxconfig.twtitle')}}" name="twtitle" placeholder="请输入自定义回复标题" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-9">搜索无内容提示语</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-9" value="{{config('wxconfig.noreinfo')}}" name="noreinfo" placeholder="请输入搜索无内容提示语" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7">新浪开放平台APPKEY</label>
                            <div class="col-sm-10">
                                    <input type="text" id="filed-7" class="form-control" name="sina_app_key" value="{{config('wxconfig.sina_app_key')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-6">微信防红开关</label>
                            <div class="col-sm-9">
                                <div class="form-block">
                                    <input type="checkbox" id="filed-6" name="fanghong" {{config('wxconfig.fanghong')?'checked':''}} class="iswitch iswitch-primary">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label" for="field-6">对接地址:<span style="color: red">http://{{config('webset.webdomin')}}/yzwx</span></label>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-8"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">修改</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                for(var i=1;i<10;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('请填写完整信息')
                        return false;
                    }
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/weixin",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp){
                        if(resp.status==200){
                            layer.msg(resp.msg);
                            window.location = window.location.href
                        }
                        else if(resp.status==500){
                            layer.msg(resp.msg);
                            setTimeout(function(){
                                window.location = window.location.href;
                            },1000)
                        }
                        else {
                            layer.msg(resp.msg);
                        }
                    }
                })
            })
        })
    </script>
@endsection