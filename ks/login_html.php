<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>欢迎登录</title>
<style>
body {       
	background-image: url('view2.jpg');
	background-repeat: no-repeat;
	background-size: 2200px 1000px;
	background-color: #eee;
	margin: 0;
	padding: 0;
}

.reg {
	width: 400px;
	margin: 15px auto;
	padding: 20px;
	border: 1px solid #ccc;
	background-color: #fff;
}

.reg .title {
	text-align: center;
	padding-bottom: 10px;
}

.reg th {
	font-weight: normal;
	text-align: right;
}

.reg input[type="text"],
.reg input[type="password"],
.reg input[type="submit"],
.reg input[type="reset"],
.reg input[type="button"] {
	width: 180px;
	border: 1px solid #ccc;
	height: 30px;
	padding: 4px;
	margin-bottom: 10px;
}

.reg input[type="submit"],
.reg input[type="reset"],
.reg input[type="button"] {
	background-color: #0099ff;
	border: 1px solid #0099ff;
	color: #fff;
	cursor: pointer;
}

.error-box {
	width: 378px;
	margin: 15px auto;
	padding: 10px;
	background: #FFF0F2;
	border: 1px dotted #ff0099;
	font-size: 14px;
	color: #ff0000;
}

.error-box ul {
	margin: 10px;
	padding-left: 25px;
}
</style>
</head>
<body>
<form method="post">
	<div class="reg">
		<h2 class="title">欢迎登录</h2>
		<table>
			<tr>
				<th>用户名：</th>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<th>密码：</th>
				<td><input type="password" name="password"></td>
			</tr>
		</table>
		<div class="td-btn">
			<input type="submit" value="登录">
			<input type="reset" value="重新填写">
			<input type="button" value="注册" onclick="window.location.href='register.php'">
			<input type="button" value="查询信息" onclick="window.location.href='search.html'">
		</>
	</div>
</form>
<?php if(!empty($error)): ?>
	<div class="error-box">
		登录失败，信息如下：
		<ul>
			<?php foreach($error as $v): ?>
				<li><?php echo $v; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>
</body>
</html>