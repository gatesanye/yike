<?php
namespace Util;

class Util
{
	/**
	 * 运行环境
	 * DEVELOPMENT 为本地测试用，PRODUCTION 为服务器环境用
	 * @var string
	 */
	public static $env = 'PRODUCTION';
	
	/**
	 * 获取某目录下的所有文件及目录
	 * @param string $path
	 * @return NULL|array $dir
	 */
	public static function recurDir($path)
	{
		$result = array();
		$temp = array();
		
		if( !is_dir($path) || !is_readable($path) ) return null;
		
		$allFiles = scandir($path);
		foreach($allFiles as $file){
			if( in_array($file, array('.', '..'))) continue;
			$fullname = $path . DIRECTORY_SEPARATOR . $file;
			if( is_dir($fullname)){
				$result[$file] = self::recurDir($fullname);
			} else {
				$temp[] = $file;
			}
			
			foreach ($temp as $f) {
				$result[] = $f;
			}
			
			return $result;
		}
	}
}