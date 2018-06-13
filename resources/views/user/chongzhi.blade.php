@extends('user.layout')
@section('kamipay','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">卡密充值</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">–</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <form class="form-inline" id="myform">
                        <div class="form-group">
                            <input type="text" class="form-control" size="50" name="key" id="key" placeholder="请输入卡密">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-secondary btn-single" id="pay">充值</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#pay').click(function () {
                var key = $('#key').val();
                if(key==''){
                    layer.msg('请填写正确的key');
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/pay",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp){
                        if(resp.status==200){
                            layer.msg(resp.msg)
                        }
                        else if(resp.status==400){
                            layer.msg(resp.msg)
                        }
                        else {
                            layer.msg(resp.msg)
                        }
                    },
                    error:function (resp) {
                        var messge = resp.responseJSON.errors;
                        if(messge.key){
                            layer.msg((messge.key)[0])
                        }
                    }
                })

                return false;
            })
        })
    </script>
@endsection