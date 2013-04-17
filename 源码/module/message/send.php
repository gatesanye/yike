<?php
include '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){
	$json['status'] = 0;
	$json['message'] = "无权限";
} else {
	$data = array_map('strip_tags', $_REQUEST);		//过滤 PHP 和 HTML 标签
	$data = array_map('trim', $data);				//去除空白
	$receiver_name = $data['receiver'];
	$receiver = Model\User::find_by_user_name($receiver_name);
	
	if( !$receiver ){
		$json['status'] = 0;
		$json['message'] = "找不到该用户";
	} else {
		$msg = new Model\Message();
		$msg->init(array(
			'sender_id' 	=> CURRENT_YIKE,
			'receiver_id'	=> $receiver->user_id,
			'message_title'	=> $data['msgtitle'],
			'message_content'=> $data['msgcontent'],
		));
		$msg->save();
		$json['status'] = 1;
		$json['message'] = "消息发送成功";
	}
}

echo json_encode($json);