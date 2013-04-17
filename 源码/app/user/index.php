<?php
include_once '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){	//检查权限
	header('HTTP/1.1 403 Forbidden');	
	header("location: /app/user/login.php");
	exit;
}

$msgs = Model\Message::findUserMsg();
$myUnuses = Model\OwnedThing::myUnuseThing(10);
$myRequires = Model\DemandThing::myRequireThing(10);
$statuses = Model\Status::all();
?>
<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>用户中心</title>
<?php echo View\Home::$styles. "\n"; echo View\Home::addStyle("user/index.css"); ?>
<style>

</style>
</head>

<body>
<?php echo View\Home::getNav(); ?>
	<div class="well container main-body">
		<div class="" id="user-msg">
			<h3>信息</h3>
			<?php if($msgs): ?>
			<table class="table table-striped table-bordered table-condensed">
				<thead><tr>
					<th>发送人</th><th>标题</th><th style="width: 50%;overflow: hidden;">内容</th><th>操作</th>
				</tr></thead>
				<tbody>
				<?php foreach ($msgs as $msg): ?>
					<tr id="msg<?php echo $msg->message_id; ?>">
						<td><a href="/app/user/user.php?id=<?php echo $msg->sender->user_id; ?>">@<?php echo $msg->sender->user_name; ?></a></td>
						<td><?php echo $msg->message_title;?></td>
						<td><?php if($msg->has_read): ?>
								<?php echo $msg->message_content; ?>
							<?php else: ?>
								<a href="javascript:;" style="font-weight: bold;" onclick="readMsg(<?php echo $msg->message_id;?>)" id="msgcon<?php echo $msg->message_id;?>"><?php echo $msg->message_content; ?></a>
							<?php endif; ?>
						</td>
						<td><a href="javascript:;" onclick="if(confirm('确定删除该信息？')) deleteMsg(<?php echo $msg->message_id;?>);" >删除</a></td>
					</tr>				
				<?php endforeach; ?>
				</tbody>
			</table>
			<?php else: ?>
				<p>暂无信息</p>
			<?php endif; ?>
			
		</div>
	
		<div class="" id="my-unuse">
			<h3>我的物品</h3>
			<?php if($myUnuses): ?>
			<table class="table table-striped">
				<thead>
					<tr><th>物品标题</th><th>状态</th><th>操作</th></tr>
				</thead>
				<tbody>
				<?php foreach ($myUnuses as $unuse): ?>
					<tr id="unuse<?php echo $unuse->ownthing_id; ?>" >
						<td><a href="/app/unuse/unuse.php?id=<?php echo $unuse->ownthing_id; ?>"><?php echo $unuse->ownthing_name; ?></a></td>
						<td>
							<div class="btn-group" data-toggle="buttons-radio">							  
							<?php foreach ($statuses as $status): ?>
								<button onclick="changeUnuseStatus(<?php echo $unuse->ownthing_id; ?>, <?php echo $status->status_id; ?>)" class="btn <?php echo $unuse->status_id == $status->status_id ? 'active' : ''; ?>"><?php echo $status->status_name; ?></button>
							<?php endforeach;?>
							</div>						
						</td>
						<td>
							<a href="javascript:;" onclick="if(confirm('确定要删除？')) deleteUnuse(<?php echo $unuse->ownthing_id;?>);" class="btn btn-danger">删除</a> | 
							<a href="/app/unuse/edit.php?id=<?php echo $unuse->ownthing_id; ?>" class="btn btn-warning">修改</a>
						</td>
					<tr>
				<?php endforeach;?>
				</tbody>
			</table>
			<div class="form-actions" style="text-align: center;">
				<a class="btn btn-primary" href="/app/unuse/new.php" >发表新闲置物品</a>
			</div>			
			<?php else: ?>
				<p>亲~你还没发表过闲置物品。<a href="/app/unuse/new.php" class="btn btn-info">点击这里</a> 开始吧。</p>				
			<?php endif; ?>
		</div>
		
		<div class="" id="my-require">
			<h3>我的需求</h3>
			<?php if($myRequires): ?>		
			<table class="table table-striped">
				<thead>
					<tr><th>物品标题</th><th>状态</th><th>操作</th></tr>
				</thead>
				<tbody>
				<?php foreach ($myRequires as $myRequire): ?>
					<tr id="require<?php echo $myRequire->demandthing_id; ?>" >
						<td><a href="/app/require/require.php?id=<?php echo $myRequire->demandthing_id; ?>"><?php echo $myRequire->demandthing_title; ?></a></td>
						<td>
							<div class="btn-group" data-toggle="buttons-radio">
							<?php foreach ($statuses as $status): ?>
								<button onclick="changeRequireStatus(<?php echo $myRequire->demandthing_id; ?>, <?php echo $status->status_id; ?>)" class="btn <?php echo $myRequire->status_id == $status->status_id ? 'active' : ''; ?>"><?php echo $status->status_name; ?></button>
							<?php endforeach;?>
							</div>						
						</td>
						<td>
							<a href="javascript:;" onclick="if(confirm('确定要删除？')) deleteRequire(<?php echo $myRequire->demandthing_id;?>);" class="btn btn-danger">删除</a> | 
							<a href="/app/require/edit.php?id=<?php echo $myRequire->demandthing_id; ?>" class="btn btn-warning">修改</a>
						</td>
					<tr>
				<?php endforeach;?>
				</tbody>
			</table>
			<div class="form-actions" style="text-align: center;">
				<a class="btn btn-primary" href="/app/require/new.php" >发表新需求</a>
			</div>						
			<?php else: ?>
			<p>亲~你还没发表过需求。<a href="/app/require/new.php" class="btn btn-info">点击这里</a> 开始吧。</p>
			<?php endif; ?>
		</div>
	</div>
	
	<?php echo View\Home::getFooter();?>
	<?php echo View\Home::$scripts . "\n"; echo View\Home::addScript('user/index.js') . "\n"; ?>
</body>
</html>
<?php View\General::waste($start); ?>
