<?php
include_once '../../base.php';

//$data = array_map('trim', array_map('strip_tags', $_POST));
$data = $_POST;

if($data['check']!=$_SESSION['code']){
	$json['status'] = 0;
	$json['message'] = '验证码错误。';	
} else {
	$user = Model\User::findUserByName($data['yikename']);
	
	if( !$user ){	
		$json['status'] = 0;
		$json['message'] = '用户不存在！';
	} else {
		$result = $user->checkpassword($data['yiketoken']);
		if($result){		
			$_SESSION['yike_id']	= $user->user_id;
			$user->updateUserInfo();
			$json['status'] = 1;
			$json['message'] = "{$user->user_name}, 欢迎你回来！";
		} else {
			$json['status'] = 0;
			$json['message'] = '密码错误';
		}
	}
}
unset($_SESSION['code']);
echo json_encode($json);