<?php
include_once '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){	//检查权限
	header('HTTP/1.1 403 Forbidden');	
	header("location: /app/user/login.php");
	exit;
}

$id = intval($_REQUEST['id']);

$require = Model\DemandThing::findRequire($id);
if(!$require){
	header('HTTP/1.1 404 Not Found');
	exit();
}

$catalogues = Model\Catalogue::all();
?>
<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>修改需求 <?php echo $require->demandthing_title; ?></title>
<?php echo View\Home::$styles. "\n"; ?>
<style>

</style>
</head>

<body>
<?php echo View\Home::getNav(); ?>
	<form class="well" style="width: 700px; margin: 0 auto;" id="newRequire" >
		<div style="position: relative;">
			<div style="width: 45%;">
				<label for="thingtitle">需求名称</label>
				<input value="<?php echo $require->demandthing_title; ?>" type="text" class="" placeholder="物品名称" id="thingtitle" style="width: 100%;"/>
			</div>
		
			<div style="position: absolute; right: 10px; top: 0px; width: 45%;">
				<label>分类</label>
				<select style="width: 100%;" name="cat" id="cat">
				<?php foreach($catalogues as $cat ): ?>
					<option value="<?php echo $cat->catalogue_id; ?>" <?php echo $require->catalogue_id == $cat->catalogue_id ? 'selected="selected"' : ''; ?> ><?php echo $cat->catalogue_name; ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		
		<div style="position: relative;" >
			<div style="width: 45%;">
				<label for="thingtitle">图片</label>
				<input value="<?php echo $require->demandthing_pic; ?>" type="text" name="cover" id="cover" placeholder="图片路径"/><input type="button" id="uploadimg" value="选择图片" />
			</div>
			
			<div style="position: absolute; right: 10px; top: 0px; width: 45%;">
				<label>估价</label>
				<input value="<?php echo $require->demandthing_money;?>" type="text" name="thingvalue" id="thingvalue" style="width: 98%;" placeholder="估价"/>
			</div>
		</div>
		
		<div>
			<label for="thingdetail">详细信息</label>
			<textarea id="thingdetail" style="width: 100%; height: 600px;" name="thingdetail"><?php echo $require->demandthing_detail;?></textarea>
		</div>
		
		<input type="hidden" value="<?php echo $require->demandthing_id; ?>" id="requireid" name="requireid" />
		
		<div class="form-actions" style="text-align: center;">
			<input type="button" class="btn btn-primary" value="更新需求" style="margin-right: 3em;" id="formSubmit"/>
			<input type="button" onclick="javascript:location.reload();" class="btn btn-warning" value="重新填写" />
		</div>		
	</form>

<?php echo View\Home::getFooter() . "\n" . View\Home::$scripts . "\n" .
			View\Home::editor() .  View\Home::addScript('require/edit.js') . "\n"; ?>
</body>
</html>
<?php View\General::waste($start); ?>