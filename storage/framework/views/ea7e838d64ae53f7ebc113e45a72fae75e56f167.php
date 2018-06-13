
<?php $__env->startSection('new','active opened active'); ?>
<?php $__env->startSection('playerset','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">播放器设置( <span style="color: red">不填则默认使用本地播放器</span>)</h3>

                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">M3U8播放器</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="<?php echo e(config('playerconfig.m3u8')); ?>" name="m3u8" placeholder="请输入M3U8播放器接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">MP4播放器</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="<?php echo e(config('playerconfig.mp4')); ?>" name="mp4" placeholder="请输入MP4播放器接口地址" required>
                            </div>
                        </div>
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
                for(var i=1;i<3;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('要嘛不填写！要嘛请填写完整内容!');
                        return false;
                    }
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/playerset",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>