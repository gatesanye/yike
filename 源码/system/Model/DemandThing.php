<?php
namespace Model;

/**
 * 需求物品模型
 * 
 * @author
 * 
 * @property integer $demandthing_id
 * @property integer $user_id
 * @property integer $status_id
 * @property integer $catalogue_id
 * @property string	 $demandthing_title
 * @property string  $demandthing_detail
 * @property string  $demandthing_pic
 * @property integer $demandthing_money
 * @property boolean $demandthing_is_deleted
 * @property time	 $demandthing_time
 * @property integer $demandthing_click_count
 * @property \Model\User 		$asker
 * @property \Model\Status		$status
 * @property \Model\Catalogue	$cat
 */
class DemandThing extends \ActiveRecord\Model
{
	#数据库信息
	static $table_name = 'demandthing';

	static $primary_key = 'demandthing_id';
	
	static $belongs_to = array(
		array('asker', 	'foreign_key' => 'user_id', 	'primary_key' => 'user_id',   'class_name' => '\Model\User'),
		array('status', 'foreign_key' => 'status_id', 	'primary_key' => 'status_id', 'class_name' => '\Model\Status'),
		array('cat',	'foreign_key' => 'catalogue_id','primary_key' => 'catalogue_id', 'class_name'=> '\Model\Catalogue'),
	);
	
	public function init(array $attributes=array())
	{
		parent::__construct($attributes);
		$this->demandthing_is_deleted 	= 0;
		$this->demandthing_click_count	= 0;
		$this->demandthing_time 		= time();
		$this->user_id 					= CURRENT_YIKE;
		$this->status_id				= 10;
	}
	
	/**
	 * 找出当前用户需求
	 *
	 * @param integer $n
	 * @return array
	 */
	public static function myRequireThing($n)
	{
		return static::userRequireThings(CURRENT_YIKE, $n);
	}
	
	/**
	 * 用户id为$userid的需求
	 * 
	 * @param integer $userid
	 * @param integer $n
	 */
	public static function userRequireThings($userid, $n)
	{
		return static::find("all", array(
			//'conditions' => "user_id = {$userid} and demandthing_is_deleted = 0 ",
			'conditions' => array("user_id = ? and demandthing_is_deleted = 0 ", $userid)
		));
	}
	
	/**
	 * 找出 id 为 $id 的需求
	 * 
	 * @param integer $id
	 * @return \Model\DemandThing
	 */
	public static function findRequire($id)
	{
		return self::find_by_demandthing_id($id);
	}
	
	/**
	 * 根据名字查找物品
	 *
	 * @param string $name
	 */
	public static function search($name)
	{
		return static::find('all', array(
				'conditions' => array('demandthing_title LIKE ? and demandthing_is_deleted = 0', "%{$name}%")
		));
	}	
	
	/**
	 * 软删除物品
	 */
	public function softDelete()
	{
		$this->demandthing_is_deleted = 1;
		$this->save();
	}
	
	/**
	 * 点击数自增
	 */
	public function addClickCount()
	{
		$this->demandthing_click_count++;
		$this->save();
	}	
}