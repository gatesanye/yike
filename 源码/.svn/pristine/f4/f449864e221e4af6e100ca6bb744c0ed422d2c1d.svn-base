<?php
include_once '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){	//检查权限
	header('HTTP/1.1 403 Forbidden');	
	header("location: /app/user/login.php");
	exit;
}
$id = intval($_REQUEST['id']);
$unuse = Model\OwnedThing::findUnuse($id);
if(!$unuse){
	header('HTTP/1.1 404 Not Found');
	exit;
}
$catalogues = Model\Catalogue::all();
?>
<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>修改闲置物品  <?php echo $unuse->ownthing_name; ?></title>
<?php echo View\Home::$styles. "\n"; echo View\Home::addStyle("unuse/new.css"); ?>

</head>

<body>
<?php echo View\Home::getNav(); ?>
	<form class="well" style="width: 700px; margin: 0 auto;" id="newunuse">
		<div style="position: relative;">
			<div style="width: 45%;">
				<label for="thingtitle">物品名称</label>
				<input type="text" class="" placeholder="物品名称" id="thingtitle" style="width: 100%;" value="<?php echo $unuse->ownthing_name; ?>"/>
			</div>
			
			<div style="position: absolute; right: 10px; top: 0px; width: 45%;">
				<label>分类</label>
				<select style="width: 100%;" name="cat" id="cat">
				<?php foreach($catalogues as $cat ): ?>
					<option value="<?php echo $cat->catalogue_id; ?>" <?php echo $unuse->catalogue_id == $cat->catalogue_id ? 'selected="selected"' : ''; ?>><?php echo $cat->catalogue_name; ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>
		
		<div style="position: relative;">
			<div style="width: 45%;">
				<label for="thingtitle">图片</label>
				<input type="text" name="cover" id="cover" placeholder="图片路径" value="<?php echo $unuse->ownthing_pic; ?>" /><input type="button" id="uploadimg" value="选择图片" />
			</div>
			
			<div style="position: absolute; right: 10px; top: 0px; width: 45%;">
				<label>估价</label>
				<input type="text" name="thingvalue" id="thingvalue" style="width: 98%;" placeholder="估价" value="<?php echo $unuse->ownthing_money; ?>"/>
			</div>
		</div>		
		
		<div>
			<label for="thingdetail">物品详细信息</label>
			<textarea id="thingdetail" style="width: 100%; height: 600px;" name="thingdetail"><?php echo $unuse->ownthing_details; ?></textarea>
		</div>
		
		<input type="hidden" value="<?php echo $unuse->ownthing_id; ?>" name="unuseid" id="unuseid">
		
		<div class="form-actions" style="text-align: center;">
			<input type="button" class="btn btn-primary" value="更新" style="margin-right: 3em;" id="formSubmit"/>
			<input type="button" onclick="javascript:location.reload();" class="btn btn-warning" value="重新填写" />
		</div>		
	</form>
	<?php echo View\Home::getFooter();?>
<?php
	echo View\Home::$scripts . "\n"; 	
	echo View\Home::editor();
	echo View\Home::addScript('unuse/edit.js') . "\n";
?>
</body>
</html>
<?php View\General::waste($start); ?>