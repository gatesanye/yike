<?php
include_once '../../base.php';
$data = array_map('trim', $_POST);
$username = trim(strip_tags($data['username']));
$email	  = trim(strip_tags($data['email']));
$json['status'] = 0;
if($username){
	$user = Model\User::findUserByName($username);
	if(!$user){		
		$pwd	  = $data['password'];
		$new_user = new Model\User();
		$new_user->init(array('user_name' => $username,
						  'user_pwd'  	=> $data['password'],
							'email'		=> $email));
		$new_user->save();
		$json['status']  = 1;
		$json['message'] = "用户 {$username} 注册成功！";
	} else {
		$json['message'] = "该用户名已被注册。 ";
	}
} else {
	$json['message'] = "用户名无效，请重新输入。";
}

echo json_encode($json);