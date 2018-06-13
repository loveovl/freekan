@extends('public.admin')
@section('zb','active opened active')
@section('addzb2','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">批量增加直播</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-9">直播类型</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="zb_type" id="field-9">
                                    <option value="1">央视频道</option>
                                    <option value="2">卫视频道</option>
                                    <option value="3">其他频道</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">直播地址</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="zb_addr" cols="5" rows="5" id="field-7" placeholder="请输入直播播放地址,格式 标题$播放地址$排序  一行一条数据"></textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">批量增加</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                var zbaddr = $('#field-7').val();
                var zbtype = $('#field-9').val();
                if(zbaddr==''||zbtype==''){
                    layer.msg('请填写完整信息');
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/addzb2",
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
                            window.location = '/{{config('webset.webdir')}}/zblist'
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