<?php include '../../base.php'; ?>
<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>易客注册</title>
<?php echo View\Home::$styles. "\n"; ?>
	<style>
		#reg { width: 600px; margin: 0 auto; }
		#submit { margin-right: 30px; }
	</style>
</head>

<body>
<?php echo View\Home::getNav(); ?>
	<form id='reg' class="form-horizontal error" style="margin-top: 200px;">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="username">用户名：</label>
				<div class="controls">
					<div class="input-append">
						<input type="text" id="username" name="username" class="span2"/>
						<input type="button" class="btn" value="检查用户名是否可用" id="checkUser" name="checkUser"/>
						<span class="help-inline" id="userIsAveilable"></span>
					</div>
				</div>
			</div>
			
			<div class="control-group" >
				<label class="control-label" for="password">密码：</label>
				<div class="controls"><input type="password" id="password" name="password"/></div>
			</div>
			
			<div class="control-group" >
				<label class="control-label" for="email">邮箱：</label>
				<div class="controls"><input type="text" id="email" name="email"/></div>
			</div>

			<div class="form-actions">
				<input type="submit" id="submit" class="btn btn-primary" value="注册！"/>
				<input type="reset" id="reset" value="重填" />
			</div>
		</fieldset>
	</form>
<?php echo View\Home::$scripts . "\n"; echo View\Home::addScript('user/signup.js'); ?>
</body>
</html>
<?php View\General::waste($start); ?>