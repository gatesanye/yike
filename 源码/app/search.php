<?php include '../base.php'; ?>
<?php 
if(!isset($_POST['keyword'])){
	header("location: /app/user/index.php");
	exit;
}
$keyword = strip_tags($_REQUEST['keyword']);	//过滤标签
$unuses	  = Model\OwnedThing::search($keyword);
$requires = Model\DemandThing::search($keyword);
$users = Model\User::search($keyword);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>查找 <?php echo $keyword; ?></title>
<?php echo View\Home::$styles . "\n"; ?>
</head>

<body>
<?php echo View\Home::getNav(); ?>
	<div class="accordion" id="searchResult" style="width: 800px; margin: 0 auto; ">
		<!-- 闲置物品结果Begin -->
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse"
					data-parent="#searchResult" href="#unuseResult">闲置物品共 <?php echo count($unuses); ?> 条结果</a>
			</div>
			<div id="unuseResult" class="accordion-body collapse in">
				<div class="accordion-inner">
				<?php if($unuses): ?>
					<table class="table table-striped">
						<thead>
							<tr><th>物品名字</th><th>拥有者</th><th>交易状态</th><th>创建日期</th></tr>
						</thead>
						
						<tbody>
						<?php foreach ($unuses as $unuse): ?>
							<tr>
								<td><a href="/app/unuse/unuse.php?id=<?php echo $unuse->ownthing_id; ?>"><?php echo $unuse->ownthing_name;?></a></td>
								<td><a href="/app/user/user.php?id=<?php echo $unuse->ownner->user_id; ?>" ><?php echo $unuse->ownner->user_name;?></a></td>
								<td><?php echo $unuse->status->status_name;?></td>
								<td><?php echo date('Y-m-d', $unuse->ownthing_time);?></td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				<?php else: ?>
					<p>没有相关闲置物品</p>
				<?php endif;?>
				</div>
			</div>
		</div>	
		<!-- 闲置物品结果End -->
		
		<!-- 需求结果Begin -->
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse"
					data-parent="#searchResult" href="#requireResult">相关需求共 <?php echo count($requires); ?> 条结果</a>
			</div>
			<div id="requireResult" class="accordion-body collapse">
				<div class="accordion-inner">
				<?php if($requires): ?>
					<table class="table table-condensed">
						<thead>
							<tr><th>需求名称</th><th>寻问人</th><th>交易状态</th><th>创建时间</th></tr>
						</thead>
						<tbody>
						<?php foreach ($requires as $require): ?>
							<tr>
								<td><a href="/app/require/require.php?id=<?php echo $require->demandthing_id;?>"><?php echo $require->demandthing_title; ?></a></td>
								<td><a href="/app/user/user.php?id=<?php echo $require->asker->user_id;?>"><?php echo $require->asker->user_name;?></a></td>
								<td><?php echo $require->status->status_name;?></td>
								<td><?php echo date('Y-m-d', $require->demandthing_time);?></td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				<?php else: ?>
					<p>没有相关需求</p>
				<?php endif;?>
				</div>
			</div>
		</div>
		<!-- 需求结果End -->
		
		<!-- 用户结果Begin -->
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse"
					data-parent="#searchResult" href="#userResult">相关用户共 <?php echo count($users); ?> 条结果</a>
			</div>
			<div id="userResult" class="accordion-body collapse">
				<div class="accordion-inner">				
				<?php if($users):?>
					<ul>
					<?php foreach ($users as $user): ?>
						<li><a href="/app/user/user.php?id=<?php echo $user->user_id; ?>"><?php echo $user->user_name;?></a></li>
					<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<p>没有相关用户</p>
				<?php endif;?>				
				</div>
			</div>
		</div>
		<!-- 用户结果End -->
	</div>	
<?php echo View\Home::getFooter();?>
<?php echo View\Home::$scripts . "\n"; ?>
</body>
</html>
<?php View\General::waste($start); ?>