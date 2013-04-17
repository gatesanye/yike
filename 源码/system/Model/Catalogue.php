<?php
namespace Model;

/**
 * 物品分类模型
 * 
 * @author nonandor<nonandor@gmail.com>
 * 
 * @property integer	$catalogue_id
 * @property string		$catalogue_name
 */
class Catalogue extends \ActiveRecord\Model
{
	#数据库信息
	static $table_name = 'catalogue';

	static $primary_key = 'catalogue_id';
	
	#业务逻辑
	public function init(array $attributes=array())
	{
		parent::__construct($attributes);
	}
}
