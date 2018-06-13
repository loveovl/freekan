
<?php $__env->startSection('body','vod-type apptop'); ?>
<?php $__env->startSection('title','热门大剧'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="hy-cascade clearfix">
                <div class="left-head hidden-sm hidden-xs">
                    <ul class="clearfix">
                        <li class="text"><span class="text-muted">当前频道</span></li>
                        <li><a href="/tvlist/all/1.html"  class="active">电视剧</a></li></ul>
                </div>
                <div class="content-meun clearfix">
                    <a class="head" href="javascript:;" data-toggle="collapse" data-target="#collapse">
                        <span class="text">电视剧分类</span></a>
                    <div class="item collapse in" id="collapse">
                        <ul class="visible-sm visible-xs clearfix">
                            <li class="text"><span class="text-muted">按频道</span></li>
                            <li><a href="/tvlist/all/1.html" id="idc4ca4238a0b923820dcc509a6f75849b">电视剧</a></li>					</ul>

                        <ul class="clearfix">
                            <li><a href="/tvlist/all/1.html" class="acat <?php echo e($cat=='all'?'active':''); ?>" style="white-space: pre-wrap;">全部</a></li>
                            <?php $__currentLoopData = $tvtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href='/tvlist/<?php echo e($v); ?>/1.html' class='acat <?php echo e($cat==$v?'active':''); ?>' style='white-space: pre-wrap;margin-bottom: 4px;'><?php echo e($key); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="hy-layout clearfix">
                <?php echo config('adconfig.list_top'); ?>

            </div>
            <div class="hy-layout clearfix" style="margin-top: 0;">
                <div class="hy-switch-tabs active clearfix">
                    <span class="text-muted pull-right hidden-xs">如果您喜欢本站请动动小手分享给您的朋友！</span>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#">最新电视剧</a></li>
                    </ul>
                </div>
                <div class="hy-video-list">
                    <div class="item">
                        <ul class="clearfix">
                            <?php $__currentLoopData = $dsj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-2 col-sm-3 col-xs-4">
							<a class="videopic lazy" href="/play/<?php echo e($ds['url']); ?>.html" title="<?php echo e($ds['title']); ?>" onclick="jilu(this)" data-src="<?php echo e($ds['img']); ?>" ><span class="play hidden-xs"></span><span class="score"><?php echo e($ds['js']); ?></span></a>
							<div class="title">
								<h5 class="text-overflow"><a href="/play/<?php echo e($ds['url']); ?>.html" title="<?php echo e($ds['title']); ?>" onclick="jilu(this)" src="<?php echo e($ds['img']); ?>"><?php echo e($ds['title']); ?></a></h5>
							</div>
							<div class="subtitle text-muted text-muted text-overflow hidden-xs"><?php echo e($ds['star']); ?></div>
						</div>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="hy-page clearfix">
                    <ul class="cleafix">
                        <?php echo $pagehtml; ?>

                        <li><a>共24页</a></li></ul>
                </div>		</div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.wapian.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>