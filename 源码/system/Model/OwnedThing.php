<?php
namespace Model;

/**
 * 闲置物品模型
 * 
 * @author gatesanye<gatesanye@gmail.com>
 * 
 * @property integer	$ownthing_id
 * @property integer	$status_id
 * @property integer	$user_id
 * @property integer	$catalogue_id
 * @property string		$ownthing_name
 * @property string		$ownthing_details
 * @property string		$ownthing_pic
 * @property integer 	$ownthing_money
 * @property boolean	$ownthing_is_deleted
 * @property timestamp	$ownthing_time
 * @property integer	$ownthing_click_count
 * @property \Model\User 		$ownner
 * @property \Model\Status 		$status
 * @property \Model\Catalogue 	$cat
 */
class OwnedThing extends \ActiveRecord\Model
{
	#数据库信息
	static $table_name = 'ownedthing';

	static $primary_key = 'ownthing_id';
	
	static $belongs_to = array(
		array('ownner', 'foreign_key' => 'user_id', 	'primary_key' => 'user_id',   'class_name' => '\Model\User'),
		array('status', 'foreign_key' => 'status_id', 	'primary_key' => 'status_id', 'class_name' => '\Model\Status'),
		array('cat',	'foreign_key' => 'catalogue_id','primary_key' => 'catalogue_id','class_name'=> '\Model\Catalogue'),
	);
	
	#各种业务逻辑
	
	/**
	 * 新闲置物品对象初始化
	 * 
	 * @param array $attributes
	 */
	public function init(array $attributes=array())
	{
		parent::__construct($attributes);
		$this->status_id 			= 10;
		$this->ownthing_is_deleted 	= 0;
		$this->ownthing_time		= time();
		$this->ownthing_click_count = 0;
		$this->user_id				= CURRENT_YIKE;
	}
	
	/**
	 * 找出当前用户闲置物品
	 * 
	 * @param integer $n
	 * @return array
	 */
	public static function myUnuseThing($n)
	{
		return static::userUnuseThings(CURRENT_YIKE, $n);
	}
	
	/**
	 * 用户id为 $userid 的闲置物品
	 * 
	 * @param integer $userid
	 * @param integer $n
	 * @return array
	 */
	public static function userUnuseThings($userid, $n)
	{
		return static::find('all', array(
			//'conditions' => "user_id = {$userid} and ownthing_is_deleted = 0 ",
			'conditions' => array("user_id = ? and ownthing_is_deleted = 0 ", $userid)
		));
	}
	
	/**
	 * 找闲置物品
	 * 
	 * @param integer $id
	 * @return \Model\OwnedThing
	 */
	public static function findUnuse($id)
	{
		return static::find_by_ownthing_id($id);
	}
	
	/**
	 * 根据名字查找物品
	 * 
	 * @param string $name
	 */
	public static function search($name)
	{
		return static::find('all', array(			
			'conditions' => array('ownthing_name LIKE ? and ownthing_is_deleted = 0', "%{$name}%")
		));
	}
	
	/**
	 * 软删除物品
	 */
	public function softDelete()
	{
		$this->ownthing_is_deleted = 1;
		$this->save();
	}
	
	/**
	 * 点击数自增
	 */
	public function addClickCount()
	{
		$this->ownthing_click_count++;
		$this->save();
	}
	
	/**
	 * 找出最新的 n 个物品
	 * 
	 * @param integer $n
	 * @return array
	 */
	public static function findLasted($n)
	{
		return self::find('all', array(
			'conditions'	=> array(),
			'limit'			=> $n,
		));
	}
}