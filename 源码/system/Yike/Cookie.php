<?php
namespace Yike;

/**
 * 
 * Cookie 
 * 
 * 采用 PHP 加密和分拆Cookie的方法升高伪造Cookie的难度，提高网站安全
 *
 * @author gatesanye<gatesanye@gmail.com>
 *
 */
class Cookie
{
	/**
	 * 浏览器 user agent
	 * 
	 * @var string
	 */
	private static $user_angent;
	
	/**
	 * Cookie 加密盐
	 * 
	 * @var string
	 */
	private static $salt;
	
	/**
	 * Cookie 被分成的数目
	 * 
	 * @var integer
	 */
	public static $parts;
	
	/**
	 * Cookie 持续时间
	 * 
	 * @var integer
	 */
	public static $expiration;
	
	/**
	 * 加密模式
	 * 
	 * @var string
	 */
	private static $mode;
	
	/**
	 * 加密类型
	 * 
	 * @var string
	 */
	private static $cipher;
	
	/**
	 * 设置 Cookie
	 * 
	 * @param string $key
	 * @param string $value
	 * @param integer $expiration 单位：秒
	 */
	public static function set($key, $value, $expiration=0)
	{
		$hash_key = self::hashKey($key);
		$cname = str_split($hash_key, ceil( strlen($hash_key) / self::$parts));
		
		$value = self::hash($key, $value);
		$cvalue = str_split($value, ceil( strlen($value) / self::$parts));
		
		for($i=0; $i<self::$parts; $i++)
			setcookie($cname[$i], $cvalue[$i], time()+$expiration);
	}
	
	/**
	 * 获得 Cookie 值
	 * 
	 * @param string $kay
	 * @return string
	 */
	public static function getValue($key)
	{
		$hash_key = self::hashKey($key);
		$cname = str_split($hash_key, ceil( strlen($hash_key) / self::$parts));
		$value = "";
		
		for($i=0;$i<self::$parts; $i++){
			if(isset($_COOKIE["{$cname[$i]}"])){
				$value .= $_COOKIE["{$cname[$i]}"];
			} else {
				self::delete($key);
				return null;
			}
		}
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(self::$cipher, self::$mode), MCRYPT_RAND);
		$data = mcrypt_decrypt(self::$cipher, self::$salt, $value . "@" . self::$user_angent, self::$mode, $iv);
		if(strpos($data, "@")!==FALSE){		
			list($cookie_value, $user_angent) = explode("@", $data);		
			if( $user_angent != self::$user_angent){
			 	return $cookie_value;
			} else {
			 	 self::delete($key);
			}
		} else {
			self::delete($key);
		}
	}
	
	private static function hash($key, $value)
	{
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(self::$cipher, self::$mode), MCRYPT_RAND);
				
		return mcrypt_encrypt(self::$cipher, self::$salt, $value . "@" . self::$user_angent, self::$mode, $iv);
	}
	
	public static function init()
	{
		self::$user_angent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "No User Agent";
		self::$salt = $GLOBALS['config']['cookie'];
		self::$expiration = 0;
		self::$parts = 2;
		self::$mode = MCRYPT_MODE_ECB;
		self::$cipher = MCRYPT_DES;
	}
	
	/**
	 * 删除 Cookie
	 * 
	 * @param string $key
	 */
	public static function delete($key)
	{
		$key = self::hashKey($key);
		$cname = str_split($key, ceil( strlen($key) / self::$parts));		
		for($i=0; $i<self::$parts; $i++)
			setcookie($cname[$i], null, time()-3600);
	}
	
	private static function hashKey($key)
	{
		return md5($key);
	}
} Cookie::init();