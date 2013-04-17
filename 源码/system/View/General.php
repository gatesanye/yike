<?php
namespace View;

class General
{
	/**
	 * 输出框架运行耗时
	 * 
	 * @param double $start
	 */
	public static function waste($start)
	{
		echo "<!-- 运行用时 " . (microtime(true) - $start)*1000 . " 毫秒       内存使用：" . (memory_get_usage() /1024) . "KB -->"; 
	}
}