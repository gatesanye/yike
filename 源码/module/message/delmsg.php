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
		if($msg->receiver->user_id == CURRENT_YIKE){	//只能删除自己的信息
			$msg->softDelete();
			$json['status'] = 1;
			$json['message']= "删除成功";
		} else {
			$json['message']= "无权限删除该信息";
		}
	} else {
		$json['message']= "该信息已经被删除";
	}
}

echo json_encode($json);