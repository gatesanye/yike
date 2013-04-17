<?php 
if(isset($_SERVER['HTTP_APPNAME'])){
	$hostname = SAE_MYSQL_HOST_M . ":" . SAE_MYSQL_PORT; //主机名,可以用IP代替
	$database = SAE_MYSQL_DB; //数据库名
	$username = SAE_MYSQL_USER; //数据库用户名
	$password = SAE_MYSQL_PASS; //数据库密码
} else {
	$hostname = 'localhost'; //主机名,可以用IP代替
	$database = 'yike2012'; //数据库名
	$username = 'root'; //数据库用户名
	$password = 'anye'; //数据库密码	
}
$conn = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error() , E_USER_ERROR); 
mysql_select_db($database, $conn); 
$db = @mysql_select_db($database, $conn) or die(mysql_error());
mysql_query('set names utf8',$conn);

$sql_catalogue = "select * from catalogue";
?>