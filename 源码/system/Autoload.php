<?php
/**
 * 获取该目录下所有的子目录
 * @param string $dir
 * @return array $result
 */
function getSubDir($dir)
{
	$result[] = '';
	$allfiles = scandir($dir);
	foreach ($allfiles as $file){
		if( @is_dir($file) && !in_array($file, array('.', '..'))){
			$result[] = $file;
		}
	}
	
	return $result;
}

/**
 * 自动加载类函数
 * @param string $className
 */
function loadClassFile($className)
{	
	// 延迟加载 ActiveRecord，使得
	if($className=="ActiveRecord\Model"){
		require_once LIBPATH . 'PHPActiveRecord' . DIRECTORY_SEPARATOR . 'ActiveRecord.php';
		ActiveRecord\Config::initialize(function($cfg){
			$cfg->set_model_directory($GLOBALS['config']['moddir']);
			$cfg->set_connections($GLOBALS['config']['dbconfig']);
			$cfg->set_default_connection(!isset($_SERVER['HTTP_APPNAME']) ? 'local' : 'sae');
		});
		return ;
	}
	
	$file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	$dirs = getSubDir(SYSPATH);	//加载 sytem 下的所有目录作为候选目录
	
	foreach ($dirs as $dir){
		$filename = SYSPATH . $dir . DIRECTORY_SEPARATOR . $file . '.php';		
		if( file_exists($filename) ){
			require_once $filename;
			return ;
		}
	}
}

/**
 * 自动加载模型层
 * @param string $className
 */
function loadModel($className)
{
	$file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
	$filename = MODEL . $file . '.php';	
	
	if( file_exists( $filename )){
		require $filename;
	}	
}