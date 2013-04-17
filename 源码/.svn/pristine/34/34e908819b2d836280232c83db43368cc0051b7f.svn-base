<?php
include '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){
	$json = array(
		'status'	=> 0,
		'message'	=> "请登陆哦~亲"
	);	
} else {
	$msgs = Model\Message::findUserMsg();
	$json['status'] = 1;
	if($msgs){
		foreach ($msgs as $msg)	
			$json['message'][] = array(
					'id'	 => $msg->message_id,
					'sender' => $msg->sender->user_name,
					'title'	 => $msg->message_title,
					'content'=> $msg->message_content,
					'isread' => $msg->has_read,
			);
	} else {
		$json['message'] = '没有信息';
	}
}

echo json_encode($json);