<?php
namespace Model;

/**
 * 物品姿态模型
 * 
 * @author gatesanye<gatesanye@gmail.com>
 * 
 * @property integer	$status_id
 * @property string		$status_name
 * @property string		$status_describe
 */
class Status extends \ActiveRecord\Model
{
	#数据库信息
	static $table_name = 'status';

	static $primary_key = 'status_id';
	
	#业务逻辑
	public function init(array $attributes=array())
	{
		parent::__construct($attributes);
	}
}