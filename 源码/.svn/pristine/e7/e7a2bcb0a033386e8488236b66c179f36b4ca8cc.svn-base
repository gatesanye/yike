<?php
$start = microtime(true);
//开启会话
session_start();

// 定义系统常量
define("DOCROOT", __DIR__ . DIRECTORY_SEPARATOR);
define("SYSPATH", DOCROOT . "system" . DIRECTORY_SEPARATOR);
define("APPPATH", DOCROOT . "app" . DIRECTORY_SEPARATOR);
define("MODEL", SYSPATH);
define("LIBPATH", SYSPATH . 'libs' . DIRECTORY_SEPARATOR);
define("CONFILE", SYSPATH . "config.php");

//加载库 PHPActiveRecord TODO: 按需加载库
require_once LIBPATH . 'PHPActiveRecord' . DIRECTORY_SEPARATOR . 'ActiveRecord.php';

//自动加载类
require_once SYSPATH . 'Autoload.php';
spl_autoload_register('loadClassFile');

//获取配置
$GLOBALS['config'] = include CONFILE;

//根据配置文件进行设置
Util\Util::$env = $GLOBALS['config']['env'];

//PHPActiveRecord 配置
ActiveRecord\Config::initialize(function($cfg){
	$cfg->set_model_directory($GLOBALS['config']['moddir']);
	$cfg->set_connections($GLOBALS['config']['dbconfig']);
	$cfg->set_default_connection(!isset($_SERVER['HTTP_APPNAME']) ? 'local' : 'sae');
});

// CURRENT_YIKE 为当前用户的 id
define('CURRENT_YIKE', isset($_SESSION['yike_id']) ? intval($_SESSION['yike_id']) : null); 