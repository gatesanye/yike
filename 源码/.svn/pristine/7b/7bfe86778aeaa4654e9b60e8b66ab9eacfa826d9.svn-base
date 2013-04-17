<?php include '../../base.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>易客登陆</title>
<?php echo View\Home::$styles . "\n"; ?>
	<style>
		#login { width: 600px; margin: 0 auto; margin-top: 150px;}
		#submit { margin-right: 30px; }
	</style>
</head>

<body>
<?php echo View\Home::getNav(); ?>
	<form id="login" class="form-horizontal">
		<fieldset id="userlogin">
			<div class="control-group" >
				<label class="control-label" for="yikename">用户名：</label>
				<div class="controls"><input type="text" id="yikename" name="yikename"/></div>
			</div>
			<div class="control-group">				
				<label class="control-label" for="yiketoken">密码：</label>
				<div class="controls"><input type="password" id="yiketoken" name="yiketoken"/></div>
			</div>
			<div class="control-group">				
				<label class="control-label" for="check">验证码：</label>
				<div class="controls"><input type="text" id="check" name="check"/>
					<img name=codeimg src='/ValidatorCode.php' onclick="javascript:$(this).fadeOut('fast', reCode())" title="看不清楚？点击更换">
				</div>
			</div>
			<div class="form-actions">
				<input type="submit" name="submit" class="btn btn-primary" id="submit" value="登陆"/>
				<input type="reset" name="reset" id="reset" class="btn" value="重新填写" />	
			</div>		
		</fieldset>
	</form>
<?php echo View\Home::$scripts . "\n"; echo View\Home::addScript('user/login.js') . "\n"; ?>
</body>
</html>
<?php View\General::waste($start); ?>