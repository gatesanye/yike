<?php
namespace View;

/**
 * 物品通用视图
 * 
 * @author gatesanye<gatesanye@gmail.com>
 *
 */
class Thing
{
	/**
	 * 灯鹭网社交化评论系统
	 */
	public static function getComment()
	{
		if($_SERVER['HTTP_HOST']=='yike2012.sinaapp.com'){
			return "<script type='text/javascript' charset='utf-8' src='http://open.denglu.cc/connect/commentcode?appid=7569dengvPy3BIDALN1Iewww5lIIn3'></script>";
		} else {
			return "";
		}
	}
}