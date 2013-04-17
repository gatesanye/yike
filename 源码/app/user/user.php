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
$user = Model\User::findUser($id);
if(!$user){	
	header('HTTP/1.1 404 Not Found');
	exit;
}

$unuses = Model\OwnedThing::userUnuseThings($id, 10);
$requires = Model\DemandThing::userRequireThings($id, 10);

?>
<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php echo $user->user_name; ?> 的空间</title>
<?php echo View\Home::$styles. "\n"; echo View\Home::addStyle("user/user.css"); ?>
</head>

<body>
<?php echo View\Home::getNav() . "\n"; ?>
	<div class="well container main-body">
		<table style="width:100%">
			<tr>
				<td style="width:10%"><img src="/static/images/real.jpg" alt="" /></td>
			</tr>
			<tr>
				<td style="width:10%"><?php echo $user->user_name; ?></td>
				<td style="width:20%"><a class="btn btn-primary" data-toggle="modal" href="#msgmodal" >给 <?php echo $user->user_name; ?> 发送消息</a><td>
			</tr>
		</table>
		<div class="" id="ta-unuse">
			<h3>TA的物品</h3>
			<?php if($unuses): ?>
			<table class="table table-striped" style="width:100%">
				<tr>			
					<td style="width:50%">物品名称</td>
					<td style="width:30%">创建日期</td>
					<td style="width:20%">交易状态</td>
				</tr>		
				<?php foreach ($unuses as $unuse): ?>
				<tr>
					<td style="width:50%"><a href="/app/unuse/unuse.php?id=<?php echo $unuse->ownthing_id; ?>"><?php echo $unuse->ownthing_name; ?></a></td>				
					<td style="width:30%"><?php echo date("Y-m-d",$unuse->ownthing_time);?></td>
					<td style="width:20%"><?php echo $unuse->status->status_name;?></td>
				</tr>
				<?php endforeach; ?>
			</table>
			<?php else: ?>
				<p>这家伙有点懒~还没公布闲置物品。</p>
			<?php endif; ?>
		</div>
		
		<div class="" id="ta-require">
			<h3>TA的需求</h3>
			<?php if($requires): ?>
			<table class="table table-striped" style="width:100%">
				<tr>			
					<td style="width:50%">物品名称</td>
					<td style="width:30%">创建日期</td>
					<td style="width:20%">交易状态</td>
				</tr>
				<?php foreach ($requires as $require): ?>
				<tr>			
					<td style="width:50%">
						<a href="/app/require/require.php?id=<?php echo $require->demandthing_id; ?>"><?php echo $require->demandthing_title; ?></a>
					</td>
					<td style="width:30%"><?php echo date("Y-m-d",$require->demandthing_time);?></td>
					<td style="width:20%"><?php echo $require->status->status_name;?></td>
				</tr>
				<?php endforeach; ?>
			</table>
			<?php else: ?>
			<p>这家伙有点懒~还没发布TA的需求</p>
			<?php endif; ?>
		</div>
	</div>
	
	

<!-- 消息弹出层Begin -->
	<div class="modal hide fade" id="msgmodal">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">x</button>
			<h3>发送消息</h3>
		</div>
		
		<div class="modal-body" style="text-align: center;">
			<input type="text" title="接收者用户名" placeholder="接收者用户名" id="receiver" style="width: 80%;" value="<?php echo $user->user_name;?>" />
			<input type="text" placeholder="信息标题" id="msgtitle" style="width: 80%;"/>
			<textarea rows="10" cols="" style="width: 80%;" placeholder="消息正文" id="msgcontent"></textarea>
		</div>
		<div class="modal-footer">
			<input class="btn btn-primary" type="button" id="submitForm" value="发送信息" />
			<input class="btn btn-warning" type="button" value="取消" id="hidemodal"/>
		</div>
	</div>
<!-- 消息弹出层End-->
<?php echo View\Home::getFooter();?>
<?php echo View\Home::$scripts . "\n" . View\Home::addScript('user/user.js') . "\n"; ?>
</body>
</html>
<?php View\General::waste($start); ?>