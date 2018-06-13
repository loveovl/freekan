<?php $__env->startSection('body','index'); ?>
<?php $__env->startSection('title','首页'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row" style="margin-top:10px;">
            <?php echo config('adconfig.index_ad'); ?>

        </div>
        <div class="row">
            <div class="hy-layout clearfix">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="swiper-container hy-slide">
                        <div class="swiper-wrapper">
                           <?php if($bannerlist): ?>
                               <?php $__currentLoopData = $bannerlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="hy-video-slide">
                                    <a class="videopic"
                                       href="<?php echo e($v['banner_link']); ?>"
                                       title="<?php echo e($v['banner_title']); ?>"
                                       style="padding-top: 60%; background: url(<?php echo e($v['banner_img']); ?>)  no-repeat; background-position:50% 50%; background-size: cover;">
                                        <span class="title"><?php echo e($v['banner_title']); ?></span>
                                    </a>
                                </div>
                            </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php else: ?>
                            <?php endif; ?>

                        </div>
                        <div class="swiper-button-next hidden-xs">
                            <i class="icon iconfont icon-right"></i>
                        </div>
                        <div class="swiper-button-prev hidden-xs">
                            <i class="icon iconfont icon-back"></i>
                        </div>
                        <div class="swiper-pagination">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 padding-0">
                    <div class="hy-index-menu clearfix">
                        <div class="item">
                            <ul class="clearfix">
                                <li><a href="/movielist/all/1.html"><i
                                                class="icon iconfont icon-menu1 text-color"></i><span>最新电影</span></a>
                                </li>
                                <li><a href="/<?php echo e(config('autocxconfig.is_autocx')?'autocxlist/5/1':'cxlist'); ?>.html"><i class="icon iconfont icon-ic_mymatch_ranking text-color"></i><span>抢先片源</span></a>
                                </li>
                                <li><a href="/tvlist/all/1.html"><i
                                                class="icon iconfont icon-update text-color"></i><span>电视剧</span></a>
                                </li>
                                <li><a href="/ucenter.html"><i
                                                class="icon iconfont icon-member1 text-color"></i><span>会员中心</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hy-index-tags hidden-md clearfix">
                        <div class="item">
                            <ul class="clearfix">
                                <?php $__currentLoopData = $videotype['movie']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/movielist/<?php echo e($type); ?>/1.html"><?php echo e($key); ?></a></li>
                                  <?php if($loop->index==7) break; ?>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="hy-right-qrcode hidden-sm hidden-xs">
                        <div class="item">
                            <dl class="clearfix">
                                <dt><img src="<?php echo e(config('wxconfig.wximg')); ?>"></dt>
                                <dd>
                                    <h4>扫描二维码关注看大片</h4>
                                    <p class="text-muted">
                                        也可以分享到朋友圈哦！
                                    </p>
                                    <p class="margin-0 text-muted">
                                        http://<?php echo e(config('webset.webdomin')); ?>/ </p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                <marquee style="width: 100%;color: red;font-size: 20px"><?php echo e(config('webset.notice')); ?></marquee>
                </div>
            </div>
            <!--会员视频-->
            <?php if(config('userconfig.uservideo')): ?>
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <h3 class="margin-0"><i class="icon iconfont icon-update text-color"></i>会员视频</h3>
                    <ul class="pull-right">
                        <li class="active"><a href="/viplist.html" class="text-muted">更多 <i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix">
                    <div class="hy-video-list cleafix">
                        <div class="item">
                            <?php if(isset($vipdata)&&!empty($vipdata)): ?>
                                <?php $__currentLoopData = $vipdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2 col-sm-3 col-xs-4">
                                        <a class="videopic lazy" href="/play/<?php echo e($dy['dy_id']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>" data-src="<?php echo e($dy['dy_img']); ?>">
                                            <span class="play hidden-xs"></span><span class="score">会员专属</span></a>
                                        <div class="title">
                                            <h5 class="text-overflow"><a href="/play/<?php echo e($dy['dy_id']); ?>.html" onclick="jilu(this)" src="<?php echo e($dy['dy_img']); ?>" title="<?php echo e($dy['dy_title']); ?>"><?php echo e($dy['dy_title']); ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                    <?php if($loop->index==11) break; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="hy-video-footer visible-xs clearfix">
                    <a href="/viplist.html" class="text-muted">查看更多 <i
                                class="icon iconfont icon-right pull-right"></i></a>
                </div>
            </div>
            <?php else: ?>
            <?php endif; ?>
            <!--会员视频-->
            <!--抢先看-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <h3 class="margin-0"><i class="icon iconfont icon-update text-color"></i> 抢先看</h3>
                    <ul class="pull-right">
                            <li class="active"><a href="/autocxlist/5/1.html" class="text-muted">更多 <i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix">
                    <div class="hy-video-list cleafix">
                        <div class="item">
                            <?php if(isset($dydata)&&!empty($dydata)): ?>
                                <?php $__currentLoopData = $dydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-2 col-sm-3 col-xs-4">
                                        <a class="videopic lazy" href="/play/<?php echo e($dy['dy_addr']); ?>.html" onclick="jilu(this)"  title="<?php echo e($dy['dy_title']); ?>" data-src="<?php echo e($dy['dy_img']); ?>">
                                             <span class="play hidden-xs"></span>
                                            <span class="score">抢先</span>
                                        </a>
                                        <div class="title">
                                            <h5 class="text-overflow"><a href="/play/<?php echo e($dy['dy_addr']); ?>.html" onclick="jilu(this)" data-src="<?php echo e($dy['dy_img']); ?>" title="<?php echo e($dy['dy_title']); ?>"><?php echo e($dy['dy_title']); ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                    <?php if($loop->index==11) break; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="hy-video-footer visible-xs clearfix">
                    <a href="/autocxlist/5/1.html" class="text-muted">查看更多 <i
                                class="icon iconfont icon-right pull-right"></i></a>
                </div>
            </div>
            <!--抢先看-->
            <!--电影-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <ul class="pull-right">
                        <?php $__currentLoopData = $videotype['movie']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="text-muted hidden-md hidden-sm hidden-xs"><a href="/movielist/<?php echo e($type); ?>/1.html" class="text-muted border-right"><?php echo e($key); ?></a> /</li>
                            <?php if($loop->index==7) break; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="active"><a href="/movielist/all/1.html" class="text-muted">更多<i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                    <h3 class="margin-0"><i class="icon iconfont icon-film text-color"></i>电影</h3>
                </div>
                <div class="clearfix">
                    <?php $__currentLoopData = $dys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <a class="videopic lazy" href="/play/<?php echo e($dy['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['title']); ?>" data-src="<?php echo e($dy['img']); ?>">
                                <span class="play hidden-xs"></span>
                                <span class="score"><?php echo e(isset($dy['pf'])?$dy['pf']:''); ?></span>
                            </a>
                            <div class="title">
                                <h5 class="text-overflow"><a href="/play/<?php echo e($dy['url']); ?>.html" onclick="jilu(this)"
                                                             title="<?php echo e($dy['title']); ?>"
                                                             src="<?php echo e($dy['img']); ?>"><?php echo e($dy['title']); ?></a></h5>
                            </div>
                        </div>
                        <?php if($loop->index==17) break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="hy-video-footer visible-xs clearfix">
                        <a href="/movielist/all/1.html" class="text-muted">查看更多 <i
                                    class="icon iconfont icon-right pull-right"></i></a>
                    </div>
                </div>
            </div>
            <!--电影-->
            <!--电视剧-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <ul class="pull-right">
                        <?php $__currentLoopData = $videotype['tv']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="text-muted hidden-md hidden-sm hidden-xs"><a href="/tvlist/<?php echo e($type); ?>/1.html" class="text-muted border-right"><?php echo e($key); ?></a> /</li>
                            <?php if($loop->index==7) break; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="active"><a href="/tvlist/all/1.html" class="text-muted">更多 <i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                    <h3 class="margin-0"><i class="icon iconfont icon-show text-color"></i>电视剧</h3>
                </div>
                <div class="clearfix">
                    <?php $__currentLoopData = $dsjs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <a class="videopic lazy" href="/play/<?php echo e($dsj['url']); ?>.html" onclick="jilu(this)"
                               title="<?php echo e($dsj['title']); ?>"
                               data-src="<?php echo e($dsj['img']); ?>"><span
                                        class="play hidden-xs"></span><span class="score"><?php echo e($dsj['js']); ?></span></a>
                            <div class="title">
                                <h5 class="text-overflow"><a href="/play/<?php echo e($dsj['url']); ?>.html" data-src="<?php echo e($dsj['img']); ?>"
                                                             onclick="jilu(this)"><?php echo e($dsj['title']); ?></a></h5>
                            </div>
                            <div class="subtitle text-muted text-muted text-overflow hidden-xs"><?php echo e($dsj['star']); ?></div>
                        </div>
                        <?php if($loop->index==17) break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="hy-video-footer visible-xs clearfix">
                        <a href="/tvlist/all/1.html" class="text-muted">查看更多 <i
                                    class="icon iconfont icon-right pull-right"></i></a>
                    </div>
                </div>
            </div>
            <!--电视剧-->
            <!--综艺-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <ul class="pull-right">
                        <?php $__currentLoopData = $videotype['zy']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="text-muted hidden-md hidden-sm hidden-xs"><a href="/zylist/<?php echo e($type); ?>/1.html" class="text-muted border-right"><?php echo e($key); ?></a> /</li>
                            <?php if($loop->index==7) break; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="active"><a href="/zylist/all/1.html" class="text-muted">更多<i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                    <h3 class="margin-0"><i class="icon iconfont icon-mallanimation text-color"></i>综艺</h3>
                </div>
                <div class="clearfix">
                    <?php $__currentLoopData = $zys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <a class="videopic lazy" onclick="jilu(this)" href="/play/<?php echo e($zy['url']); ?>.html"
                               title="<?php echo e($zy['title']); ?>" data-src="<?php echo e($zy['img']); ?>"><span
                                        class="play hidden-xs"></span><span class="score"><?php echo e($zy['js']); ?></span></a>
                            <div class="title">
                                <h5 class="text-overflow"><a href="/play/<?php echo e($zy['url']); ?>.html" onclick="jilu(this)"
                                                             data-src="<?php echo e($zy['img']); ?>"><?php echo e($zy['title']); ?></a></h5>
                            </div>
                            <div class="subtitle text-muted text-muted text-overflow hidden-xs"><?php echo e($zy['star']); ?></div>
                        </div>
                        <?php if($loop->index==17) break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="hy-video-footer visible-xs clearfix">
                        <a href="/zylist/all/1.html" class="text-muted">查看更多 <i
                                    class="icon iconfont icon-right pull-right"></i></a>
                    </div>
                </div>
            </div>
            <!--综艺-->
            <!--动漫-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <ul class="pull-right">
                        <?php $__currentLoopData = $videotype['dm']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="text-muted hidden-md hidden-sm hidden-xs"><a href="/dmlist/<?php echo e($type); ?>/1.html" class="text-muted border-right"><?php echo e($key); ?></a> /</li>
                            <?php if($loop->index==7) break; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li class="active"><a href="/dmlist/all/1.html" class="text-muted">更多<i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                    <h3 class="margin-0"><i class="icon iconfont icon-mallanimation text-color"></i>动漫</h3>
                </div>
                <div class="clearfix">
                    <?php $__currentLoopData = $dms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <a class="videopic lazy" href="/play/<?php echo e($dm['url']); ?>.html" title="<?php echo e($dm['title']); ?>" data-src="<?php echo e($dm['img']); ?>" onclick="jilu(this)"><span class="play hidden-xs"></span><span class="score"><?php echo e($dm['js']); ?></span></a>
                            <div class="title">
                                <h5 class="text-overflow"><a href="/play/<?php echo e($dm['url']); ?>.html" src="<?php echo e($dm['img']); ?>"
                                                             onclick="jilu(this)"><?php echo e($dm['title']); ?></a></h5>
                            </div>
                            <div class="subtitle text-muted text-muted text-overflow hidden-xs"></div>
                        </div>
                        <?php if($loop->index==17) break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="hy-video-footer visible-xs clearfix">
                        <a href="/zylist/all/1.html" class="text-muted">查看更多 <i
                                    class="icon iconfont icon-right pull-right"></i></a>
                    </div>
                </div>
            </div>
            <!--动漫-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <h3 class="margin-0">友情链接</h3>
                </div>
                <div class="hy-footer-link">
                    <div class="item clearfix">
                        <ul class="clearfix">
                            <?php if(isset($yqlist)): ?>
                                <?php $__currentLoopData = $yqlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($yq['yq_link']); ?>" target="_blank"><?php echo e($yq['yq_name']); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var swiper = new Swiper('.hy-slide', {
            autoplay:true,
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.wapian.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>