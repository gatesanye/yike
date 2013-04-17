<?php include '../../base.php'; 
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){	//检查权限
	header('HTTP/1.1 403 Forbidden');
	header("location: /app/user/login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>更新资料</title>
<?php echo View\Home::$styles . "\n"; ?>
</head>

<body>
<?php echo View\Home::getNav(); ?>
	<form id='reg' class="form-horizontal error" style="width: 600px; margin: 0 auto;">		
		<div class="control-group">
			<label class="control-label" for="username">用户名：</label>
			<div class="controls">					
				<input type="text" id="username" name="username" class="span2"/>					
			</div>
		</div>
		
		<div class="control-group" >
			<label class="control-label" for="password">密码：</label>
			<div class="controls"><input type="password" id="password" name="password"/></div>
		</div>
		
		<div class="control-group" >
			<label class="control-label" for="cellphone">长号：</label>
			<div class="controls"><input type="text" id="cellphone" name="cellphone" /></div>
		</div>
		
		<div class="control-group" >
			<label class="control-label" for="szuPhone">短号：</label>
			<div class="controls"><input type="text" id="szuPhone" name="szuPhone"/></div>
		</div>
		
		<div class="control-group" >
			<label class="control-label" for="email">邮件：</label>
			<div class="controls"><input type="text" id="email" name="email"/></div>
		</div>
		
		<div class="control-group" >
			<label class="control-label" for="qq">QQ：</label>
			<div class="controls"><input type="text" id="qq" name="qq"/></div>
		</div>
		
		<div class="form-actions">
			<input type="submit" id="submit" class="btn btn-primary" value="注册！"/>
			<input type="reset" id="reset" value="重填" />
		</div>		
	</form>

<?php echo View\Home::getFooter();?>
<?php echo View\Home::$scripts . "\n"; ?>
</body>
</html>
<?php View\General::waste($start); ?>