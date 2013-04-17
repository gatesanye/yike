<?php
include_once '../../base.php';
/* if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){	//检查权限
	header('HTTP/1.1 403 Forbidden');
	header("location: /app/user/login.php");
	exit;
} */

if( !isset($_GET['id']) ){
	header('HTTP/1.1 404 Not Found');
	exit;
}

$id = intval($_GET['id']);
$unuse = Model\OwnedThing::findUnuse($id);
if(!$unuse){	//不存在，送出404头，跑到 404 页面
	header('HTTP/1.1 404 Not Found');
	exit;
}
$unuse->addClickCount();	//增加点击量
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $unuse->ownthing_name; ?> 闲置物品</title>
<?php echo View\Home::$styles. "\n"; echo View\Home::addStyle("user/unuse.css"); ?>
</head>

<body>
	<?php echo View\Home::getNav() . "\n"; ?>
	<div class="well container main-body" style="line-height: 4;">
		<h3 style="text-align: center;"><?php echo $unuse->ownthing_name; ?></h3>
		<table style="width: 100%">
			<tr>
				<td style="width: 40%">
					所有者：<a href="/app/user/user.php?id=<?php echo $unuse->ownner->user_id;?>"><?php echo $unuse->ownner->user_name;echo " "?></a>
					<a class="btn btn-primary" data-toggle="modal" href="#msgmodal">给 <?php echo $unuse->ownner->user_name; ?>发送消息</a>
				</td>
				<td style="width: 20%">估价：<?php echo $unuse->ownthing_money;?>元</td>
				<td style="width: 20%">点击量：<?php echo $unuse->ownthing_click_count;?></td>
				<td style="width: 20%">分类：<?php echo $unuse->cat->catalogue_name; ?></td>
			</tr>
		</table>
		<h4 style="font-size: 15px">封面图片：</h4>
		<p style="text-align: center;"><img src="<?php echo $unuse->ownthing_pic;?>" height=600 width=800 /></p>
		<h4 style="font-size: 15px">细节：</h4>
		<p><?php echo $unuse->ownthing_details;?></p>
		<!-- 社交化评论Begin -->
		<div id="comment">
			<?php echo View\Thing::getComment(); ?>
		</div>
		<!-- 社交化评论End -->

	</div>

	<!-- 消息弹出层Begin -->
	<div class="modal hide fade" id="msgmodal">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h3>发送消息</h3>
		</div>

		<div class="modal-body" style="text-align: center;">
			<input type="text" title="接收者用户名" placeholder="接收者用户名" id="receiver"
				style="width: 80%;" value="<?php echo $unuse->ownner->user_name; ?>" />
			<input type="text" placeholder="信息标题" id="msgtitle"
				style="width: 80%;" />
			<textarea rows="10" cols="" style="width: 80%;" placeholder="消息正文"
				id="msgcontent"></textarea>
		</div>
		<div class="modal-footer">
			<input class="btn btn-primary" type="button" id="submitForm"
				value="发送信息" /> <input class="btn btn-warning" type="button"
				value="取消" id="hidemodal" />
		</div>
	</div>
	<!-- 消息弹出层End-->
	<?php echo View\Home::getFooter();?>
	<?php echo View\Home::$scripts . "\n" . View\Home::addScript('user/user.js') . "\n"; ?>
</body>
</html>
<?php View\General::waste($start); ?>