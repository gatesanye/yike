<?php include '../base.php'; 
include 'database.php';
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php echo View\Home::$styles . "\n"; ?>
	<?php echo View\Home::addStyle("index.css");?>
	<?php echo View\Home::addScript("common.js");?>
</head>

<body>
<div id="container" style="clear:both;"><!--页面层容器-->
<?php echo View\Home::getNav(); ?>
    <div id="header" style="clear:both;"><!--页面头部-->  	
    </div>
    <div id="PageBody"> <!--页面主体-->
    	<div id="Sidebar"><!--侧边栏--> 
        	<div id="Classify">
        	   	<ul class="nav nav-list">
  					<li class="nav-header">
   						物品分类
  					</li>
  					<li><a href="?catalog=1"><i class="icon-home"></i>全部物品</a></li>
  					<li><a href="?catalog=14"><i class="icon-leaf"></i>服装</a></li>
  					<li><a href="?catalog=3"><i class="icon-briefcase"></i>鞋包配饰</a></li>
  					<li><a href="?catalog=4"><i class="icon-headphones"></i>手机、配件</a></li>
  					<li><a href="?catalog=5"><i class="icon-inbox"></i>电脑、配件</a></li>
  					<li><a href="?catalog=6"><i class="icon-facetime-video"></i>其他数码</a></li>
  					<li><a href="?catalog=7"><i class="icon-hdd"></i>二手车</a></li>
  					<li><a href="?catalog=8"><i class="icon-fire"></i>生活日用</a></li>
  					<li><a href="?catalog=9"><i class="icon-tint"></i>美容</a></li>
  					<li><a href="?catalog=10"><i class="icon-list-alt"></i>图书文具</a></li>
  					<li><a href="?catalog=11"><i class="icon-camera"></i>吃喝玩乐</a></li>
  					<li><a href="?catalog=12"><i class="icon-filter"></i>玩具宠物</a></li>
  					<li><a href="?catalog=13"><i class="icon-off"></i>虚拟商品</a></li>
  					<li><a href="?catalog=2"><i class="icon-qrcode"></i>其他</a></li>
				</ul>
        	</div>
        	<div id="Status">
        		<a>易客——以物换物</a>
        		<li>学生们交换的物品十分丰富，既有服装、书包、鞋帽等生活用品，也有MP3、优盘等数码产品，还有书籍、词典等学习用品，甚至连自行车、电脑、数码相机等高价物品也在交换之列。~~</li>
        		<li>本平台希望通过推行“以物易物”形式，鼓励大家将闲置物品进行交换，各取所需，实现资源利用最大化， 让大家切身体会什么是“需求决定价值”，充分享受原始交易的乐趣。</li>
        		<a>-- 换得开心 --</a>
			</div>
        </div>
        <div id="MainBody"> <!--主体内容-->
        	<div class="top">
			</div>
        	<div id="Hot" style="clear:both;"><!-- 物品基本信息 -->
        		<?php $id = $_GET['catalog'];
        		if($id==1){include 'All.php';} else {include 'catalogue_show.php';} ?>
        	</div>
        </div> 
    </div> 
    <div id="Slide" style="clear:both;">跑马灯
    	<div id="New" style="clear:both;">最新加入</div><!-- 物品详细信息 -->
    </div>
    
</div>
<?php echo View\Home::getFooter();?>
<?php echo View\Home::$scripts . "\n"; ?>
</body>

</html>