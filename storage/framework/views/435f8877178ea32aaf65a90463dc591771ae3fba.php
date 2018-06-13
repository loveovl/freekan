<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FREEKAN 安装向导 - 检测安装环境</title>
	<link href="/public/static/install/css/install.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="/public/static/install/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/install/js/common.js"></script>
</head>
<body>
<div class="header"></div>
<div class="mainBody">
	<div class="forms">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr align="left" class="head">
				<td width="30%" height="36">项目</th>
				<td width="30%">所需配置</th>
				<td width="15%">推荐配置</th>
				<td width="25%" align="right">当前服务器</th>
			</tr>
			<tr>
				<td height="26" class="firstCol">操作系统</td>
				<td>不限制</td>
				<td>类Unix</td>
				<td class="endCol"><?php echo e($info['os']); ?></td>
			</tr>
			<tr>
				<td height="26" class="firstCol">PHP 版本</td>
				<td>7.0</td>
				<td>7.1</td>
				<td class="endCol"><?php echo e($info['version']); ?></td>
			</tr>
			<tr>
				<td height="26" class="firstCol">附件上传</td>
				<td>不限制</td>
				<td>2M</td>
				<td class="endCol"><?php echo e($info['upsize']?$info['upsize']:'不支持附件上传'); ?></td>
			</tr>
			<tr>
				<td height="26" class="firstCol">GD 库</td>
				<td>1.0</td>
				<td>2.0</td>
				<td class="endCol"><?php echo e($info['gd']); ?></td>
			</tr>
			<tr>
				<td height="26" class="firstCol">磁盘空间</td>
				<td>10M</td>
				<td>不限制</td>
				<td class="endCol"><?php echo e($info['disk']); ?></td>
			</tr>
		</table>
		<div class="hr_10"></div>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr align="left" class="head">
				<td width="60%" height="36">函数名称</th>
				<td width="25%">建议</th>
				<td width="15%" align="right">检查结果</th>
			</tr>
			<?php $__currentLoopData = $info['function']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td height="26" class="firstCol"><?php echo e($key); ?>()</td>
				<td>支持</td>
				<td class="endCol"><?php echo e($v); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
	</div>
</div>
<div class="footer"> <span class="step2"></span> <span class="formSubBtn">
	<div>
		<a href="javascript:void(0);" onclick="history.go(-1);return false;" class="back">返 回</a>
		    <?php if(isset($info['error'])&&$info['error']==1): ?>
			<a href="javascript:void(0);" class="submit">请修复</a>
		    <?php else: ?>
			<a href="/install/2" class="submit">下一步</a>
		    <?php endif; ?>
		<input type="hidden" name="s" id="s" value="2">
	</div>
	</span> </div>
</body>
</html>