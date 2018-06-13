
<?php $__env->startSection('ad','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">广告位设置</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">首页广告位</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="index_ad"  cols="5" id="field-1" placeholder="请输入广告代码"><?php echo e(config('adconfig.index_ad')); ?></textarea>
                            </div>

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">播放窗口上方广告位(wapian模板不支持此位置)</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="play_top"  cols="2" id="field-2" placeholder="请输入广告代码"><?php echo e(config('adconfig.play_top')); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">播放窗口加载广告位</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="play_in"  cols="2" id="field-3" placeholder="请输入广告代码"><?php echo e(config('adconfig.play_in')); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">列表页广告位</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="list_top"  cols="2" id="field-4" placeholder="请输入广告代码"><?php echo e(config('adconfig.list_top')); ?></textarea>
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
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/setad",
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
                            var webdir =  "<?php echo e(config('webset.webdir')); ?>";
                            setTimeout(function () {
                                if('<?php echo e(config('cacheconfig.autocache')); ?>'=='on'){
                                    autocache(webdir,'setad');
                                }
                                else {
                                    window.location = '/'+webdir+'/setad'
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>