<?php $__env->startSection('body','index'); ?>
<?php $__env->startSection('title','影视首页'); ?>
<?php $__env->startSection('content'); ?>
<script>
$("#影视首页").attr("class","active");
</script>
  <div class="container">
   <div class="row">
            <marquee style="width: 100%;color: red;font-size: 20px;padding-top: 5px;padding-bottom: 5px;"><?php echo e(config('webset.notice')); ?></marquee>
        </div>
        <div class="row">
            <?php echo config('adconfig.index_ad'); ?>

        </div>
   <div class="row">
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="stui-pannel-bd">
       <div class="carousel carousel_default flickity-page">
	   <?php if($bannerlist): ?>
       <?php $__currentLoopData = $bannerlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2 col-xs-1">
         <a href="<?php echo e($v['banner_link']); ?>" class="stui-vodlist__thumb img-shadow" title="<?php echo e($v['banner_title']); ?>" style="background: url(<?php echo e($v['banner_img']); ?>) no-repeat; background-position:50% 50%; background-size: cover; padding-top: 40%;"><span class="pic-text text-center"><?php echo e($v['banner_title']); ?></span></a>
        </div>
	   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php else: ?>
       <?php endif; ?>
       </div>
      </div>
     </div>
    </div> 
    <!--会员视频-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/viplist.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_1.png" />会员视频</h3>
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
			<?php if(isset($vipdata)&&!empty($vipdata)): ?>
            <?php $__currentLoopData = $vipdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>		 
			<li class="col-md-5 col-sm-4 col-xs-3 <?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>" id="vodlist-<?php echo e($dy['dy_id']); ?>">          
			<div class="stui-vodlist__box">           
			<a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($dy['dy_id']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>" style="background-image: url(<?php echo e($dy['dy_img']); ?>);">		   
			<span class="play hidden-xs"></span><span class="pic-text text-right">会员专属</span></a>           
			<div class="stui-vodlist__detail">            
			<h4 class="title text-overflow"><a href="/play/<?php echo e($dy['dy_id']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>"><?php echo e($dy['dy_title']); ?></a></h4>         
			</div>          
			</div>		 
			</li>		
			<?php if($loop->index==5) break; ?>                                
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <?php endif; ?>
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/viplist.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />
         热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		<?php if(isset($vipdata)&&!empty($vipdata)): ?>
        <?php $__currentLoopData = $vipdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
			<li class="<?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>"><a href="/play/<?php echo e($dy['dy_id']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>">
			<span class="text-muted pull-right">9.9分</span>
			<span class="badge badge-second">*</span><?php echo e($dy['dy_title']); ?></a></li>
        <?php if($loop->index==4) break; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <?php endif; ?>
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--会员视频-->
	<!--尝鲜视频-->
    <div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/autocxlist/5/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_1.png" />尝鲜视频</h3>
         <?php $__currentLoopData = $videotype['cx']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <ul class="nav nav-text pull-right <?php if($loop->index>3): ?> hidden-xs hidden-md <?php endif; ?>">
			<li><a href="/autocxlist/<?php echo e($type); ?>/1.html" class="text-muted"><?php echo e($key); ?>片</a> <span class="split-line"></span></li>
		 </ul>
          <?php if($loop->index==9) break; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
			<?php if(isset($dydata)&&!empty($dydata)): ?>
			<?php $__currentLoopData = $dydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	 
			<li class="col-md-5 col-sm-4 col-xs-3 <?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>" id="vodlist-<?php echo e($dy['dy_addr']); ?>">          
			<div class="stui-vodlist__box">           
			<a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($dy['dy_addr']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>" style="background-image: url(<?php echo e($dy['dy_img']); ?>);">   
			<span class="play hidden-xs"></span><span class="pic-text text-right">尝鲜视频</span></a>           
			<div class="stui-vodlist__detail">            
			<h4 class="title text-overflow"><a href="/play/<?php echo e($dy['dy_addr']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>"><?php echo e($dy['dy_title']); ?></a></h4>           
			</div>          
			</div>		 
			</li>		
			<?php if($loop->index==5) break; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <?php endif; ?>
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/autocxlist/5/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
			<?php if(isset($dydata)&&!empty($dydata)): ?>
			<?php $__currentLoopData = $dydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	 
			<li class="<?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>"><a href="/play/<?php echo e($dy['dy_addr']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>">
			<span class="text-muted pull-right">9.9分</span>
			<span class="badge badge-second">*</span><?php echo e($dy['dy_title']); ?></a></li>
			<?php if($loop->index==4) break; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <?php endif; ?>
        </ul>
       </div>
       </div>
      </div>
     </div>
    <!--尝鲜视频-->
	<!--电影-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/movielist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_7.png" />电影</h3>
		 <?php $__currentLoopData = $videotype['movie']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <ul class="nav nav-text pull-right <?php if($loop->index>4): ?> hidden-xs hidden-md <?php endif; ?>">
			<li><a href="/movielist/<?php echo e($type); ?>/1.html" class="text-muted"><?php echo e($key); ?>片</a> <span class="split-line"></span></li>
		 </ul>
		 <?php if($loop->index==10) break; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
         <?php $__currentLoopData = $dys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <li class="col-md-5 col-sm-4 col-xs-3 <?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>" id="vodlist-<?php echo e($dy['url']); ?>">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($dy['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['title']); ?>" style="background-image: url(<?php echo e($dy['img']); ?>);">
		   <span class="play hidden-xs"></span><span class="pic-text text-right"><?php echo e(isset($dy['pf'])?$dy['pf']:''); ?>分</span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/<?php echo e($dy['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['title']); ?>"><?php echo e($dy['title']); ?></a></h4>
           </div>
          </div>
		 </li>
		 <?php if($loop->index==5) break; ?>                                
		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/movielist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 <?php $__currentLoopData = $dys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li class="<?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>"><a href="/play/<?php echo e($dy['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['title']); ?>"><span class="text-muted pull-right"><?php echo e(isset($dy['pf'])?$dy['pf']:''); ?>分</span><span class="badge badge-second">*</span><?php echo e($dy['title']); ?></a></li>
		 <?php if($loop->index==4) break; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--电影-->
    <!--电视剧-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/tvlist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />电视剧</h3>
		 <?php $__currentLoopData = $videotype['tv']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <ul class="nav nav-text pull-right <?php if($loop->index>4): ?> hidden-xs hidden-md <?php endif; ?>">
			<li><a href="/tvlist/<?php echo e($type); ?>/1.html" class="text-muted"><?php echo e($key); ?>片</a> <span class="split-line"></span></li>
		 </ul>
		 <?php if($loop->index==10) break; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        <?php $__currentLoopData = $dsjs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <li class="col-md-5 col-sm-4 col-xs-3 <?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>" id="vodlist-<?php echo e($dsj['url']); ?>">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($dsj['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dsj['title']); ?>" style="background-image: url(<?php echo e($dsj['img']); ?>);">
		   <span class="play hidden-xs"></span><span class="pic-text text-right"><?php echo e($dsj['js']); ?></span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/<?php echo e($dsj['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dsj['title']); ?>"><?php echo e($dsj['title']); ?></a></h4>
			<p class="text text-overflow text-muted hidden-xs"><?php echo e($dsj['star']); ?></p>
           </div>
          </div>
		 </li>
		 <?php if($loop->index==5) break; ?>                                
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/tvlist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 <?php $__currentLoopData = $dsjs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li class="<?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>"><a href="/play/<?php echo e($dsj['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dsj['title']); ?>"><span class="text-muted pull-right"><?php echo e($dsj['js']); ?></span><span class="badge badge-second">*</span><?php echo e($dsj['title']); ?></a></li>
        <?php if($loop->index==4) break; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--综艺-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/zylist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />综艺</h3>
		 <?php $__currentLoopData = $videotype['zy']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <ul class="nav nav-text pull-right <?php if($loop->index>4): ?> hidden-xs hidden-md <?php endif; ?>">
			<li><a href="/zylist/<?php echo e($type); ?>/1.html" class="text-muted"><?php echo e($key); ?>片</a> <span class="split-line"></span></li>
		 </ul>
		 <?php if($loop->index==10) break; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        <?php $__currentLoopData = $zys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <li class="col-md-5 col-sm-4 col-xs-3 <?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>" id="vodlist-<?php echo e($zy['url']); ?>">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($zy['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($zy['title']); ?>" style="background-image: url(<?php echo e($zy['img']); ?>);">
		   <span class="play hidden-xs"></span><span class="pic-text text-right"><?php echo e($zy['js']); ?></span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/<?php echo e($zy['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dsj['title']); ?>"><?php echo e($zy['title']); ?></a></h4>
			<p class="text text-overflow text-muted hidden-xs"><?php echo e($zy['star']); ?></p>
           </div>
          </div>
		 </li>
		 <?php if($loop->index==5) break; ?>                                
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/zylist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 <?php $__currentLoopData = $zys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li class="<?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>"><a href="/play/<?php echo e($zy['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($zy['title']); ?>"><span class="text-muted pull-right"><?php echo e($zy['js']); ?></span><span class="badge badge-second">*</span><?php echo e($zy['title']); ?></a></li>
        <?php if($loop->index==4) break; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
       </div>
       </div>
      </div>
     </div>
	<!--动漫-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box clearfix">
      <div class="col-lg-wide-75 col-xs-1 padding-0">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/dmlist/all/1.html">更多<i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_2.png" />动漫</h3>
		 <?php $__currentLoopData = $videotype['dm']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <ul class="nav nav-text pull-right <?php if($loop->index>4): ?> hidden-xs hidden-md <?php endif; ?>">
			<li><a href="/dmlist/<?php echo e($type); ?>/1.html" class="text-muted"><?php echo e($key); ?>片</a> <span class="split-line"></span></li>
		 </ul>
		 <?php if($loop->index==10) break; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
       </div>
       <div class="stui-pannel_bd clearfix">
        <ul class="stui-vodlist clearfix">
        <?php $__currentLoopData = $dms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 <li class="col-md-5 col-sm-4 col-xs-3 <?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>" id="vodlist-<?php echo e($dm['url']); ?>">
          <div class="stui-vodlist__box">
           <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($dm['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dm['title']); ?>" style="background-image: url(<?php echo e($dm['img']); ?>);">
		   <span class="play hidden-xs"></span><span class="pic-text text-right"><?php echo e($dm['js']); ?></span></a>
           <div class="stui-vodlist__detail">
            <h4 class="title text-overflow"><a href="/play/<?php echo e($dm['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dm['title']); ?>"><?php echo e($dm['title']); ?></a></h4>
			<p class="text text-overflow text-muted hidden-xs"><?php echo e($dm['js']); ?></p>
           </div>
          </div>
		 </li>
		 <?php if($loop->index==5) break; ?>                                
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
       </div>
      </div>
      <div class="col-lg-wide-25 hidden-md hidden-sm hidden-xs">
       <div class="stui-pannel_hd">
        <div class="stui-pannel__head clearfix">
         <a class="more text-muted pull-right" href="/dmlist/all/1.html">更多 <i class="icon iconfont icon-more"></i></a>
         <h3 class="title"><img src="/public/static/lc/icon/icon_12.png" />热播榜</h3>
        </div>
       </div>
       <div class="stui-pannel_bd">
        <ul class="stui-vodlist__rank col-pd clearfix">
		 <?php $__currentLoopData = $dms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li class="<?php if($loop->index>4): ?> hidden-lg hidden-md <?php endif; ?>"><a href="/play/<?php echo e($dm['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($dm['title']); ?>"><span class="text-muted pull-right"><?php echo e($dm['js']); ?></span><span class="badge badge-second">*</span><?php echo e($dm['title']); ?></a></li>
        <?php if($loop->index==4) break; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
       </div>
       </div>
      </div>
     </div>
	</div>
</div>
        <script>
            $(function () {
                $('#button').click(function () {
                    var key = $('#sos').val();
                    if (key != '' && key != null) {
                        window.location = '/search/' + key + '.html'
                    }
                });

                $('input').keyup(function () {
                    if (event.keyCode == 13) {
                        $("#button").trigger("click");
                    }
                })
            })
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.lc.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>