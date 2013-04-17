<?php
namespace View;

class Home
{
	/**
	 * 全站基础 CSS 和 JavaScript
	 * @var string
	 */
	public static $styleAndStript = <<<HTML
	<link rel="stylesheet" type="text/css" href="/static/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/scripts/artDialog/skins/aero.css" />	
	<script type="text/javascript" src="/static/scripts/jquery.min.js"></script>
	<script type="text/javascript" src="/static/scripts/jquery.form.js"></script>
	<script type="text/javascript" src="/static/scripts/artDialog/artDialog.compress.js"></script>
	<script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/scripts/global.js"></script>
HTML;
	
	/**
	 * 通用样式
	 * @var string
	 */
	public static $styles = <<<Style
	<link rel="stylesheet" type="text/css" href="/static/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/static/scripts/artDialog/skins/aero.css" />
	<link rel="stylesheet" type="text/css" href="/static/styles/global.css" />
Style;
	
	/**
	 * 通用JS
	 * @var string
	 */
	public static $scripts = <<<Script
	<script type="text/javascript" src="/static/scripts/jquery.min.js"></script>
	<script type="text/javascript" src="/static/scripts/jquery.form.js"></script>
	<script type="text/javascript" src="/static/scripts/artDialog/artDialog.compress.js"></script>
	<script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/scripts/global.js"></script>
Script;
	
	/**
	 * 添加  JavaScript 文件
	 * @param string $script
	 */
	public static function addScript($script)
	{
		return "\t" . '<script type="text/javascript" src="/static/scripts/' . $script . '"></script>' . "\n";
	}
	
	/**
	 * 添加 CSS 文件
	 * @param string $style
	 */
	public static function addStyle($style)
	{
		return "\t" . '<link rel="stylesheet" type="text/css" href="/static/styles/' . $style . '" />' . "\n";
	}
	
	/**
	 * 添加编辑器
	 */
	public static function editor()
	{
		return self::addScript("kindeditor/kindeditor-min.js") . "\n" .
			   self::addScript("kindeditor/lang/zh_CN.js") . "\n";
	}
	
	/**
	 * 通用导航条
	 * 
	 * @return string
	 */
	public static function getNav()
	{
		$dropdown = User::getNavDropdown();
		$nav = CURRENT_YIKE ? <<<Logined
						<li id="nav-my"><a href="/app/user/index.php">用户中心</a></li>
Logined
							: <<<Nologin
						<li id="nav-login"><a href="/app/user/login.php">登陆</a></li>
						<li id="nav-reg"><a href="/app/user/signup.php">注册</a></li>
Nologin;

		return <<<Nav
	<div class="navbar navbar-fixed-topa">
		<div class="navbar-inner">
			<div class="container" style="width: 1000px;">
				<a class="brand" href="/">易客</a>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="divider-vertical"></li>
						<li id="home"><a href="/">首页</a></li>
						<li id="pathsearch"><a href="/app/pathsearch.php">路径搜索</a></li>
{$nav}
					</ul>
					<form class="navbar-search pull-left" action="/app/search.php" method="post">
						<input type="text" class="search-query span2" placeholder="查找物品、需求、用户" name="keyword">
					</form>					
{$dropdown}
				</div>
			</div>
		</div>
	</div>
Nav;
	}
	
	/**
	 * 页脚
	 */
	public static function getFooter()
	{
		return <<<Footer
	<footer class="footer copy-right">
		<p>版权所有 &copy 深大易客小组         <a href="/app/aboutus.php" title="关于我们" id="aboutus">关于我们</a></p>
	</footer>
Footer;
	}
	
}