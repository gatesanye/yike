<?php include 'base.php'; ?>
<!DOCTYPE html >
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>易客—易物于此，来者是客</title>
<?php echo View\Home::$styles. "\n"; echo View\Home::addStyle('home.css');?>
</head>

<body>
<h2 >易物于此，来者是客~~</h2>	
	<img src="/static/images/in-work.png" id="inWork" title="网站施工中，敬请期待……"/>
<?php echo View\Home::$scripts . "\n"; echo View\Home::addScript('home.js'); ?>	
</body>
</html>
<?php View\General::waste($start); ?>