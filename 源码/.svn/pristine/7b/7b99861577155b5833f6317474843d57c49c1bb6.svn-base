<?php
namespace Model;

/**
 * 信息通知模型
 * 
 * @author gatesanye<gatesanye@gmail.com>
 * 
 * @property integer	$message_id
 * @property integer	$sender_id
 * @property integer	$receiver_id
 * @property string		$message_title
 * @property string		$message_content
 * @property boolean	$has_read
 * @property boolean	$message_is_deleted
 * @property timestamp	$message_created
 * @property \Model\User $sender
 * @property \Model\User $receiver
 */
class Message extends \ActiveRecord\Model
{
	#数据库信息
	static $table_name = 'message';
	
	static $primary_key = 'message_id';
	
	static $belongs_to = array(
		array('sender', 	'foreign_key' => 'sender_id', 	'primary_key' => 'user_id', 'class_name' => '\Model\User' ),
		array('receiver', 	'foreign_key' => 'receiver_id', 'primary_key' => 'user_id', 'class_name' => '\Model\User' )
	);
	
	/**
	 * 初始化信息
	 * 
	 * @param array $attributes
	 */
	public function init(array $attributes=array())
	{
		parent::__construct($attributes);
		$this->message_created	  = time();
		$this->has_read			  = 0;
		$this->message_is_deleted = 0;
	}
	
	/**
	 * 找出当前用户未读信息
	 * 
	 * @return array 
	 */
	public static function findUnReadMsg()
	{		
		if(CURRENT_YIKE){
			return self::find('all', array(
				'conditions' => "receiver_id = " . CURRENT_YIKE . " and has_read = 0 and message_is_deleted = 0"
			));
		} else {
			return null;
		}
	}
	
	/**
	 * 找出当前用户所有的信息
	 */
	public static function findUserMsg()
	{
		if(CURRENT_YIKE){
			return self::find('all', array(
				'conditions' => array("receiver_id = ? and message_is_deleted = 0",  CURRENT_YIKE) 
			));			
		} else {
			return null;
		}
	}
	
	/**
	 * 获取当前用户的信息条数
	 * 
	 * @param boolean $hasRead
	 */
	public static function getMsgCount($hasRead=0)
	{
		if(CURRENT_YIKE){
			return static::count(array('conditions' => "has_read = " . $hasRead . " and message_is_deleted = 0 and receiver_id = " . CURRENT_YIKE ));
		} else {
			return 0;
		}
	}
	
	/**
	 * 软删除信息
	 */
	public function softDelete()
	{		
		$this->message_is_deleted = 1;
		$this->save();
	}
	
	/**
	 * 根据主键查找
	 * 
	 * @param integer $id
	 * @return \Model\Message
	 */
	public static function findByID($id)
	{
		return self::find_by_message_id($id);
	}
}