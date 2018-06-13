@extends('user.layout')
@section('userinfo','active opened active')
@section('changeinfo','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">修改密码</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">用户名</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="{{session('username')}}" name="user_name" disabled = "disabled" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">原密码</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="" name="olduser_pass" placeholder="请输入旧密码" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">新密码</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" value="" name="newuser_pass" placeholder="请输入新密码" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
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
                for(var i=1;i<4;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('请填写完整信息');
                        return false;
                    }
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/changepass.html",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp){
                        if(resp.status==200){
                            layer.msg(resp.msg);
                            window.location = '/userloginout.html'
                        }
                        else {
                            layer.msg(resp.msg)
                        }
                    }
                })
            })
        })
    </script>
@endsection