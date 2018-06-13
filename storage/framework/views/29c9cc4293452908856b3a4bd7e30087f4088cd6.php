
<?php $__env->startSection('app','active opened active'); ?>
<?php $__env->startSection('appinfo','active'); ?>
<?php $__env->startSection('content'); ?>
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
                            <label class="col-sm-2 control-label" for="field-1">APP名称</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="<?php echo e(config('appconfig.appname')); ?>" name="appname" placeholder="请输入APP名称" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">安卓下载地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="<?php echo e(config('appconfig.appaz')); ?>" name="appaz" placeholder="请输入APP安卓下载地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">IPhone下载二维码</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" value="<?php echo e(config('appconfig.appip')); ?>" name="appip" placeholder="请输入IPhone下载二维码地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">APP图片地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-4" value="<?php echo e(config('appconfig.appimg')); ?>" name="appimg" placeholder="请输入APP图片地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">APP宣传语图片地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-5" value="<?php echo e(config('appconfig.appxc')); ?>" name="appxc" placeholder="请输入APP宣传语图片地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">导航栏名称</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-5" value="<?php echo e(config('appconfig.appdh')); ?>" name="appdh" placeholder="请输入APP导航名称" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-6">是否加入导航</label>
                            <div class="col-sm-9">
                                <div class="form-block">
                                    <input type="checkbox" id="filed-6" name="isdh" <?php echo e(config('appconfig.isdh')?'checked':''); ?> class="iswitch iswitch-primary">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7"></label>
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
                for(var i=1;i<6;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('请填写完整信息')
                        return false;
                    }
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/appinfo",
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