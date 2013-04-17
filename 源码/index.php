<?php include 'base.php'; 
include 'app/database.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>易客 - 校园易物平台</title>
	<?php echo View\Home::$styles . "\n"; ?>
	<?php echo View\Home::$scripts . "\n"; ?>
	<?php echo View\Home::addStyle("style.css");?>
	<!--[if IE]><link rel="stylesheet" type="text/css" href="/static/styles/ie6.css" /><![endif]-->
	<?php echo View\Home::addScript("jquery-1.2.3.pack.js");?>
	<?php echo View\Home::addScript("jquery.jcarousel.pack.js");?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
		    jQuery('#mycarousel').jcarousel({
		    	scroll: 1,
		    	animation: "slow",
		    	wrap: "both"	    		
		    });
		});		
	</script>
</head>
<body>
<!-- Header -->
<div><?php echo View\Home::getNav(); ?></div>
<div id="header">
	<div class="shell">
		<div class="cl">&nbsp;</div>
		
		<!-- Logo -->
		<div id="logo-cnt">
			<h1 id="logo">易客 - 校园易物平台</h1>
			<h2 id="slogan">易物于此，来者是客~~</h2>				
		</div>
		<!-- End Logo -->
		
		<div id="status">
			<p class="available">看一下<strong> 热门</strong> 的东西</p>
		</div>
		<div class="cl">&nbsp;</div>
		<?php 
			$sql_hot = "Select * from ownedthing order by ownthing_click_count";
			$result_hot = mysql_query($sql_hot,$conn);
		?>
		<!-- Carousel -->
			<div id="slider">
				<ul id="mycarousel">
				<?php while($hot = mysql_fetch_array($result_hot)){ ?>
				    <li>
				    <div class="img-cnt">
				    	<a href="/app/unuse/unuse.php?id=<?php echo $hot['ownthing_id'];?>"><?php echo "<img alt=" . $hot['ownthing_name'] . " title=\"" . $hot['ownthing_name'] . " \" class=\"thumb\" src=" . $hot['ownthing_pic'] . " onerror=\"src='static/images/no.png'\" width=\"220\" height=\"250\"/>"; ?></a>
			    	</div>				    	
			    	</li>
			    <?php } ?>
				</ul>
			</div>
		<!-- End Carousel -->
		
	</div>		
</div>
<!-- End Header -->

<!-- Main -->
<div id="main">
	<div class="shell">
		
		<!-- Article -->
		<div class="article" style="text-align: center;">
			<h2>Some words about Yike</h2>					
			<p>通过易客的平台，学生们可以通过原始的交易方式在网站上发布自己的闲置物品，并换到自己所需要的物品，让剩余物资重新焕发其价值.</p>
			<p style="line-height: 300%;">
				<a class="btn btn-large btn-success" href="/app/user/signup.php" style="text-decoration: none;">点击这里</a>
				<span style="font-style: italic; font-size: 18px; line-height: 300%; text-decoration: underline;">开始享受你的易物之旅吧.</span>
			</p>
		</div>
		<!-- End Article -->
		
		<!-- Gallery -->
		<div class="gallery">
			<div class="cl">&nbsp;</div>
			<h2 class="left">物品分类</h2>
			<a href="app/catalogue.php?catalog=1" class="view-all">查看所有</a>
			<div class="cl">&nbsp;</div>
			<div class="cl">&nbsp;</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=14"><img src="static/images/index/1.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=14">服装</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=3"><img src="static/images/index/2.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=3">鞋包配饰</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=4"><img src="static/images/index/3.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=4">手机、配件</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=5"><img src="static/images/index/4.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=5">电脑、配件</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=6"><img src="static/images/index/5.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=6">其他数码</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=7"><img src="static/images/index/6.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=7">二手车</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=8"><img src="static/images/index/7.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=8">生活日用</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=9"><img src="static/images/index/8.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=9">美容</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=10"><img src="static/images/index/9.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=10">图书文具</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=11"><img src="static/images/index/10.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=11">吃喝玩乐</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=12"><img src="static/images/index/11.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=12">玩具宠物</a>
			</div>
			<div class="portfolio-item">
				<a href="app/catalogue.php?catalog=13"><img src="static/images/index/12.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=13">虚拟商品</a>
			</div>
			<div class="portfolio-item last">
				<a href="app/catalogue.php?catalog=2"><img src="static/images/index/13.png" alt="" /></a>
				<a href="app/catalogue.php?catalog=2">其它</a>
			</div>

			<div class="cl">&nbsp;</div>
		</div>
		<!-- End Gallery -->
		
	</div>
</div>
<!-- End Main -->

<?php echo View\Home::getFooter();?>

</body>
</html>
<?php View\General::waste($start); ?>