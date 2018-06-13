
<?php $__env->startSection('cache','active opened active'); ?>
<?php $__env->startSection('cacheindex','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="vertical-top">

        <button class="btn btn-secondary btn-icon btn-icon-standalone" action="index" onclick="flushcache(this)">
            <i class="fa-print"></i>
            <span>刷新首页缓存</span>
        </button>
    </div>
    <script>
        function flushcache(obj) {
            var action = $(obj).attr('action');
            layer.msg('刷新中', {
                icon: 16
                ,shade: 0.01,time: 10*1000
            });
            $.ajax({
                type:"get",
                url:"/action/flushcache/"+action,
                dataType:"json",
                success: function (resp){
                    if(resp.status==200){
                        layer.msg(resp.msg);
                    }
                    else {
                        layer.msg(resp.msg)
                    }
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>