<?php
namespace Model;

/**
 * 用户模型
 * 
 * @author gatesanye<gatesanye@gmail.com>
 * 
 * @property integer	$user_id
 * @property string		$user_name
 * @property string		$screan_name
 * @property string		$email
 * @property string		$user_pwd
 * @property string		$avatar
 * @property string		$longphone
 * @property string		$shortphone
 * @property boolean	$sex
 * @property string 	$qq
 * @property boolean	$user_is_deleted
 * @property string		$last_login_ip
 * @property timestamp	$last_login_time
 * @property timestamp	$user_join_time
 */
class User extends \ActiveRecord\Model
{
	#数据库信息
	static $table_name = 'user';
	
	static $primary_key = 'user_id';
	
	static $has_many = array(
		array('message', 'class_name' => '\Model\Message', 'primary_key' => 'message_id')
	);

	#业务逻辑
	/**
	 * 加密密码用的盐
	 * @var string
	 */
	private static $salt;
	
	/**
	 * 对象初始化
	 * 
	 * 由于构造函数对已有的对象产生影响，所以对象的初始化由 init() 完成
	 * @param array $attributes
	 * @return void 
	 */
	public function init(array $attributes=array())
	{
		parent::__construct($attributes);
		$this->user_pwd 		= $this->hashpwd($attributes['user_pwd']);	//进行密码加密				
		$this->user_join_time 	= time();
		$this->last_login_time 	= time();
		$this->last_login_ip 	= $_SERVER['REMOTE_ADDR'];
		$this->user_is_deleted 	= 0;
		$this->role_id			= 1;
	}
	
	/**
	 * 用户登陆成功后更新信息
	 */
	public function updateUserInfo()
	{
		$this->last_login_time 	= time();
		$this->last_login_ip 	= $_SERVER['REMOTE_ADDR'];
		$this->save();
	}
	
	/**
	 * 根据名字搜索用户
	 * 
	 * @param string $username
	 * @return Ambigous <\ActiveRecord\mixed, NULL, unknown>
	 */
	public static function search($username)
	{
		return self::find('all',array(
			'conditions'	=> array("user_name LIKE ? and user_is_deleted = 0", "%{$username}%") 
		));		
	}
	
	/**
	 * 获取当前用户
	 * 
	 * @return \Model\User
	 */
	public static function getCurrentUser()
	{
		if( !CURRENT_YIKE ){
			return null;
		} else {
			$user = \Model\User::find_by_user_id(CURRENT_YIKE);
			if( !$user ){
				unset( $_SESSION['yike_id'] );	//此用户不存在则销毁 session
				return null;
			}
			return $user;
		}	
	}
	
	/**
	 * 用户登出
	 */
	public static function logout()
	{		
		if( isset($_SESSION['yike_id']) ){
			unset($_SESSION['yike_id']);
		}
		session_destroy();
	}
	
	/**
	 * 根据用户名查找
	 * 
	 * @param string $username
	 * @return \Model\User
	 */
	public static function findUserByName($username)
	{
		return self::find_by_user_name($username);
	}
	
	/**
	 * 找用户
	 * 
	 * @param integer $id
	 * @return \Model\User
	 */
	public static function findUser($id)
	{		
		return self::find_by_user_id($id);
	}
	
	/**
	 * 检查用户名是否可用
	 * 
	 * @param string $username
	 * @return 
	 * 		true  可用
	 * 		false 不可用
	 */
	public static function checkUserIsAvailable($username)
	{		
		return self::find_by_user_name($username) ? false : true;		
	}
	
	/**
	 * 检查用户密码
	 * @param string $input
	 * @return boolean
	 */
	public function checkpassword($input)
	{		
		return $this->user_pwd == $this->hashpwd($input) ? true : false;
	}
	
	/**
	 * 加密密码
	 * @param string $input
	 * @return string
	 */
	private function hashpwd($input)
	{
		self::$salt = $GLOBALS['config']['pwdsalt'];
		return md5(strtolower($input) . sha1($input . self::$salt . strtoupper($input)) . self::$salt);
	}
}