<?php
include '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){
	$json['status'] = 0;
	$json['message'] = "请登陆";
} else {
	$json['status'] = 0;
	$id = intval($_REQUEST['id']);
	$msg = Model\Message::findByID($id);
	if($msg){
		if($msg->receiver->user_id == CURRENT_YIKE){	//只能标记自己的信息
			$msg->has_read = 1;
			$msg->save();
			$json['status'] = 1;
			$json['message']= "标记成功";
		} else {
			$json['message']= "无权限标记该信息";
		}
	} else {
		$json['message']= "该信息已经被标记";
	}
}

echo json_encode($json);