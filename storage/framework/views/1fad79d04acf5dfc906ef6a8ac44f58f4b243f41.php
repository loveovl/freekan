<?php $__env->startSection('set','active opened active'); ?>
<?php $__env->startSection('webset','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">基本设置</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">网站名称</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="<?php echo e(config('webset.webname')); ?>"
                                       name="webname" placeholder="请输入网站名称" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-11">网站副标题</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-11" value="<?php echo e(config('webset.websubname')); ?>"
                                       name="websubname" placeholder="请输入网站副标题名称" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-9">网站域名</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-9" name="webdomin"
                                       value="<?php echo e(config('webset.webdomin')); ?>" placeholder="请输入网站关键字,用逗号隔开" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">网站关键字</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" name="webkeywords"
                                       value="<?php echo e(config('webset.webkeywords')); ?>" placeholder="请输入网站关键字,用逗号隔开" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">网站描述信息</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" name="webdesc"
                                       value="<?php echo e(config('webset.webdesc')); ?>" placeholder="请输入网站描述信息" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-20">首页公告</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="notice" id="field-20" value="<?php echo e(config('webset.notice')); ?>" placeholder="请输入首页公告" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7">后台路径</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-7" name="webdir"
                                       value="<?php echo e(empty(config('webset.webdir'))?'admin':config('webset.webdir')); ?>"
                                       placeholder="请输入后台路径" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">网站备案号</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="webicp" id="field-4"
                                       value="<?php echo e(config('webset.webicp')); ?>" placeholder="请输入网站备案信息" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-12">站长邮箱</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="webmail" id="field-12"
                                       value="<?php echo e(config('webset.webmail')); ?>" placeholder="请输入站长邮箱" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-13">底部版权</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="copyright" id="field-13"
                                       value="<?php echo e(config('webset.copyright')); ?>" placeholder="请输入底部版权" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">网站logo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="weblogo" id="field-5">
                                <img src="/public/static/<?php echo e(config('webset.weblogo')); ?>" height="50px" width="100px">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-14">网站模板</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="field-14"  name="webtemplate" style="display: inline-block;">
                                <?php if($templates): ?>
                                  <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v); ?>"<?php echo config('webset.webtemplate')==$v?'selected':''; ?>><?php echo e($v); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php else: ?>
                                    <option value="">暂无模板</option>
                                  <?php endif; ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-14">网站主题色(仅wapian)</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="field-14"  name="theme" style="display: inline-block;">
                                        <option value="white" <?php echo e(config('webset.theme')=='white'?'selected':''); ?>>白色</option>
                                        <option value="black" <?php echo e(config('webset.theme')=='black'?'selected':''); ?>>黑色</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-6">首页视频随机开关</label>
                            <div class="col-sm-9">
                                <div class="form-block">
                                    <input type="checkbox" id="filed-6" name="randmovie" <?php echo e(config('webset.randmovie')?'checked':''); ?> class="iswitch iswitch-primary">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-8">畅言代码</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="cy" cols="5" id="field-8"
                                          placeholder="输入畅言代码"><?php echo config('webset.cy'); ?></textarea>
                            </div>

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-6">统计代码</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="webtongji" cols="5" id="field-6"
                                          placeholder="输入网站统计代码"><?php echo config('webset.webtongji'); ?></textarea>
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
                var webname = $('#field-1').val();
                var webkeywords = $('#field-2').val();
                var webdesc = $('#field-3').val();
                var webdir = $('#field-7').val();
                if (webname == '' || webkeywords == '' || webdesc == '' || webdir == '') {
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type: "post",
                    url: "/action/webset",
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
                            var webdir = resp.path;
                            setTimeout(function () {
                                if('<?php echo e(config('cacheconfig.autocache')); ?>'=='on'){
                                    autocache(webdir,'webset');
                                }
                                else {
                                    window.location = '/'+webdir+'/webset'
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