
<?php $__env->startSection('adminindex','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="xe-widget xe-counter" data-count=".num" data-from="20000" data-to="<?php echo e($total); ?>" data-suffix="部" data-duration="4" data-easing="true">
                <div class="xe-icon">
                    <i class="linecons-cloud"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"></strong>
                    <span>影片总数</span>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="xe-widget xe-counter xe-counter-blue" data-count=".num" data-from="0" data-to="<?php echo e($num['usernum']); ?>" data-suffix="个" data-duration="4" data-easing="true">
                <div class="xe-icon">
                    <i class="linecons-user"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"></strong>
                    <span>会员总数</span>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="xe-widget xe-counter xe-counter-turquoise" data-count=".num" data-from="0" data-to="<?php echo e($num['kaminum']); ?>" data-suffix="个" data-duration="4" data-easing="true">
                <div class="xe-icon">
                    <i class="linecons-paper-plane"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"></strong>
                    <span>卡密总数</span>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="2" data-to="<?php echo e($used_mem); ?>" data-suffix="MB" data-duration="4" data-easing="true">
                <div class="xe-icon">
                    <i class="linecons-star"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"></strong>
                    <span>当前内存占用</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <h5>服务器信息</h5>

            <ul class="list-group list-group-minimal">
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-primary"><?php echo e($info['os']); ?></span>
                    服务器系统
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-info"><?php echo e($info['core']); ?></span>
                    服务器内核
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-danger"><?php echo e($info['jsyq']); ?></span>
                   服务器解释引擎
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-success"><?php echo e($info['port']); ?></span>
                    服务器端口
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-warning"><?php echo e($info['dir']); ?></span>
                    程序绝对路径
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-info"><?php echo e(config('systeminfo.version')); ?></span>
                    当前版本
                </li>
				<li class="list-group-item">
                    <span class="badge badge-roundless badge-secondary">
					<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=29148459&site=qq&menu=yes">苍白 - QQ29148459</a></span>
                    源码来源
                </li>
            </ul>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>