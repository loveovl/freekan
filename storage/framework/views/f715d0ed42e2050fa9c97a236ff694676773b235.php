<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FREEKAN 安装向导 - 配置数据文件</title>
	<link href="/public/static/install/css/install.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="/public/static/install/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/install/js/common.js"></script>
<script type="text/javascript" src="/public/static/install/js/forms.js"></script>
</head>
<body>
<form name="form" id="form" method="post" action="/install/3">
	<div class="header"></div>
	<div class="mainBody">
		<div class="table">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td height="40" colspan="2" align="left"><span class="title">填写数据库信息</span></td>
				</tr>
				<tr>
					<td width="30%" height="40" align="right">数据库服务器：</td>
					<td><input type="text" name="dbhost" id="dbhost" class="input" value="localhost" />
						<span class="cnote">数据库服务器地址, 一般为 localhost</span></td>
				</tr>
				<tr>
					<td height="40" align="right">数据库名称：</td>
					<td><input type="text" name="dbname" id="dbname" class="input" value="freekan" /></td>
				</tr>
				<tr>
					<td height="40" align="right">数据库用户：</td>
					<td><input type="text" name="dbuser" id="dbuser" class="input" value="root" /></td>
				</tr>
				<tr>
					<td height="40" align="right">数据库密码：</td>
					<td><input type="password" name="dbpwd" id="dbpwd" class="input" onblur="CheckPwd()" />
						<span class="cnote"><span id="cpwdTxt"></span></span>
						<input type="hidden" name="cpwd" id="cpwd" value="false"></td>
				</tr>
				<tr>
					<td height="40" colspan="2" align="left"><span class="title">填写管理员信息</span></td>
				</tr>
				<tr>
					<td height="40" align="right">管理员账号：</td>
					<td><input type="text" name="username" id="username" class="input" value="admin" /></td>
				</tr>
				<tr>
					<td height="40" align="right">管理员密码：</td>
					<td><input type="password" name="password" id="password" class="input" value="" /></td>
				</tr>
				<tr>
					<td height="40" align="right">重复密码：</td>
					<td><input type="password" value="" name="repassword" id="repassword" class="input" /></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="footer"> <span class="step3"></span>  <span class="formSubBtn"> <a href="javascript:void(0);" onclick="history.go(-1);return false;" class="back">返 回</a> <a href="javascript:void(0);" onclick="CheckForm();return false;" class="submit">下一步</a>
		</span> </div>
</form>
</body>
</html>