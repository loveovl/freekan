
<?php $__env->startSection('user','active opened active'); ?>
<?php $__env->startSection('userset','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">会员限制设置</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-9">卡密购买地址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-9" value="<?php echo e(config('userconfig.kamibuy')); ?>" name="kamibuy" placeholder="请输入卡密购买地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-10">会员专属板块开关</label>
                            <div class="col-sm-9">
                                <div class="form-block">
                                    <input type="checkbox" id="filed-10" name="uservideo"
                                           <?php echo e(config('userconfig.uservideo')?'checked':''); ?>  class="iswitch iswitch-primary">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-1">会员专属会员限制开关</label>
                                <div class="col-sm-9">
                                    <div class="form-block">
                                        <input type="checkbox" id="filed-1" name="uservideobk"
                                               <?php echo e(config('userconfig.uservideobk')?'checked':''); ?>   class="iswitch iswitch-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-1">抢先板块会员限制开关</label>
                                <div class="col-sm-9">
                                    <div class="form-block">
                                        <input type="checkbox" id="filed-1" name="qxbk"
                                               <?php echo e(config('userconfig.qxbk')?'checked':''); ?>   class="iswitch iswitch-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-2">电影板块会员限制开关</label>
                                <div class="col-sm-9">
                                    <div class="form-block">
                                        <input type="checkbox" id="filed-2" name="dybk"
                                               <?php echo e(config('userconfig.dybk')?'checked':''); ?> class="iswitch iswitch-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-3">电视板块会员限制开关</label>
                                <div class="col-sm-9">
                                    <div class="form-block">
                                        <input type="checkbox" id="filed-3" name="tvbk"
                                               <?php echo e(config('userconfig.tvbk')?'checked':''); ?> class="iswitch iswitch-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-4">综艺板块会员限制开关</label>
                                <div class="col-sm-9">
                                    <div class="form-block">
                                        <input type="checkbox" id="filed-4" name="zybk"
                                               <?php echo e(config('userconfig.zybk')?'checked':''); ?> class="iswitch iswitch-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-5">动漫板块会员限制开关</label>
                                <div class="col-sm-9">
                                    <div class="form-block">
                                        <input type="checkbox" id="filed-5" name="dmbk"
                                               <?php echo e(config('userconfig.dmbk')?'checked':''); ?> class="iswitch iswitch-primary">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="field-6">直播板块会员限制开关</label>
                                <div class="col-sm-9">
                                    <div class="form-block">
                                        <input type="checkbox" id="filed-6" name="livebk"
                                               <?php echo e(config('userconfig.livebk')?'checked':''); ?> class="iswitch iswitch-primary">
                                    </div>
                                </div>
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
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type: "post",
                    url: "/action/userset",
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        if (resp.status == 200) {
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