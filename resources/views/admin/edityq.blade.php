@extends('public.admin')
@section('yq','active opened active')
@section('addyq','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">编辑友情链接</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">友链名称</label>

                            <div class="col-sm-10">
                                <input type="hidden" value="{{$yq['yq_id']}}" name="yq_id">
                                <input type="text" class="form-control" id="field-1" value="{{$yq['yq_name']}}" name="yq_name" placeholder="请输入友链名称" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">友链地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" name="yq_link" value="{{$yq['yq_link']}}" placeholder="请输入友链地址" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">更新</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                var yqname = $('#field-1').val();
                var yqlink = $('#field-3').val();
                if(yqname==''||yqlink==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/edityqlink",
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
                            var webdir =  "{{config('webset.webdir')}}";
                            setTimeout(function () {
                                if('{{config('cacheconfig.autocache')}}'=='on'){
                                    autocache(webdir,'yqlinklist');
                                }
                                else {
                                    window.location = '/'+webdir+'/yqlinklist'
                                }
                            },1000);
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