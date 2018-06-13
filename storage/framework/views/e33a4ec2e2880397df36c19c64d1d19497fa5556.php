
<?php $__env->startSection('userindex','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="xe-widget xe-counter xe-counter-purple">
                <div class="xe-icon">
                    <i class="linecons-user"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?php echo e($userlevel==0?'普通会员':'VIP会员'); ?></strong>
                    <span>会员等级</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="xe-widget xe-counter">
                <div class="xe-icon">
                    <i class="linecons-cloud"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"><?php echo e($usercreate); ?></strong>
                    <span>注册时间</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="xe-widget xe-counter xe-counter-red">
                <div class="xe-icon">
                    <i class="linecons-lightbulb"></i>
                </div>
                <div class="xe-label">
                    <?php if($userlevel==0): ?>
                        <strong class="num">未开通</strong>
                    <?php elseif($etime<time()): ?>
                        <strong class="num">已到期</strong>
                    <?php else: ?>
                    <strong class="num"><?php echo e(date('Y-m-d',$etime)); ?></strong>
                    <?php endif; ?>
                    <span>VIP到期时间</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <h5>近期播放历史</h5>

            <ul class="list-group list-group-minimal">
                <?php if($history): ?>
                    <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-info"><a href="<?php echo e($v['url']); ?>" style="color: white">>>></a></span>
                    <?php echo e($v['title']); ?>

                </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                <?php endif; ?>
            </ul>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>