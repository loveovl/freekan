@extends('public.admin')
@section('user','active opened active')
@section('userlist','active')
@section('css')
    <link rel="stylesheet" href="/public/static/admin/assets/js/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="/public/static/admin/assets/js/select2/select2.css">
    <link rel="stylesheet" href="/public/static/admin/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/public/static/admin/assets/js/multiselect/css/multi-select.css">
@endsection()
@section('js')
    <script src="/public/static/admin/assets/js/daterangepicker/daterangepicker.js"></script>
    <script src="/public/static/admin/assets/js/datepicker/bootstrap-datepicker.js"></script>
    <script src="/public/static/admin/assets/js/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/public/static/admin/assets/js/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="/public/static/admin/assets/js/select2/select2.min.js"></script>
    <script src="/public/static/admin/assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="/public/static/admin/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
    <script src="/public/static/admin/assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/public/static/admin/assets/js/typeahead.bundle.js"></script>
    <script src="/public/static/admin/assets/js/handlebars.min.js"></script>
    <script src="/public/static/admin/assets/js/multiselect/js/jquery.multi-select.js"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">编辑用户{{$user['user_name']}}</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">会员到期时间</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="hidden" value="{{$user['user_id']}}" name="user_id">
                                    <input type="text" class="form-control datepicker" id="field-1" name="user_vip_time" value="{{$user['user_vip_time']>time()?date('Y-m-d',$user['user_vip_time']):''}}" data-format="yyyy-mm-dd" placeholder="会员到期时间为空或者小于当前时间则不开通或者关闭会员资格">
                                    <div class="input-group-addon">
                                        <a href="#"><i class="linecons-calendar"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">会员密码</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" name="user_pass" value="" placeholder="会员密码为空则不修改" required>
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
                var viptime = $('#field-1').val();
                var userpass= $('#field-3').val();
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/edituser",
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
                                window.location = window.location.href;
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