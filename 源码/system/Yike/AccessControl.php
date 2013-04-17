<?php
namespace Yike;

/**
 * 访问控制
 * 
 * @author gatesanye<gatesanye@gmail.com>
 *
 */
class AccessControl
{
	/**
	 * 当前用户角色
	 * 
	 * @var integer
	 */
	private static $currentUserRole;
	
	/**
	 * 非登陆用户
	 * 
	 * @var integer
	 */
	const EVERYONE	= 1;
	
	/**
	 * 普通用户
	 * 
	 * @var integer
	 */
	const USER		= 3;
	
	/**
	 * 管理员
	 * 
	 * @var integer
	 */
	const ADMIN		= 7;
	
	/**
	 * HTTP GET 请求
	 * 
	 * @var string
	 */
	const GET = "GET";
	
	/**
	 * HTTP POST 请求方式
	 * 
	 * @var string
	 */
	const POST = "POST";
	
	/**
	 * HTTP trace 请求方式（由JavaScript发出）
	 * 
	 * @var string
	 */
	const TRACE = "TRACE";
	
	/**
	 * HTTP PUT 请求方式（用于更新资源）
	 * 
	 * @var string
	 */
	const PUT = "PUT";
	
	/**
	 * HTTP DELETE 请求方式（用于删除资源）
	 * 
	 * @var string
	 */
	const DELETE = "DELETE";
	
	/**
	 * 获取当前用户角色
	 * 
	 * @return ( \Yike\AccessControl::EVERYONE | \Yike\AccessControl::User | \Yike\AccessControl::ADMIN ) $currentUserRole
	 */
	public static function getCurrentUserRole()
	{
		$user = \Model\User::getCurrentUser();
		if( !$user ){
			self::$currentUserRole = self::EVERYONE;
		} else {
			if( $user->role_id == self::ADMIN ){	//用户角色 id 为  7 时为管理员
				self::$currentUserRole = self::ADMIN;
			} else {
				self::$currentUserRole = self::USER;//其它则为 非管理员
			}
		}
		
		return self::$currentUserRole;
	}
	
	/**
	 * 检查用户是否有权限访问页面资源
	 * 
	 * @param array $role
	 * @return 允许返回true, 否则为false
	 */
	public static function roleAllow(array $role)
	{
		return in_array(self::getCurrentUserRole(), $role) ? true : false;
	}
	
	/**
	 * 检查请求方式是否被允许
	 * 
	 * @param array $methods
	 * @return 允许返回true, 否则为false
	 */
	public static function methodAllow(array $methods)
	{
		$request_method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'unknown';
		
		return in_array($request_method, $methods);
	}
	
	/**
	 * 检查用户是否有权限访问页面资源及请求方式是否被允许
	 * 
	 * @param array $mix
	 * @return array
	 */
	public static function allow(array $mix)
	{
		if(isset($mix['roles']))
			$result['roles'] = self::roleAllow($mix['roles']);
		
		if(isset($mix['methods']))
			$result['methods'] = self::methodAllow($mix['methods']);
		
		return $result;
	}
}