<?php
include '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){
	$json['status'] = 0;
	$json['message'] = "请登陆";
} else {
	$json['status'] = 0;
	$id = intval($_REQUEST['id']);
	$unuse = Model\OwnedThing::findUnuse($id);
	if($unuse){
		if($unuse->ownner->user_id == CURRENT_YIKE){	//只能删除自己的物品
			$unuse->softDelete();
			$json['status'] = 1;
			$json['message']= "删除成功";
		} else {
			$json['message']= "无权限删除该物品";
		}
	} else {
		$json['message']= "该物品已经被删除";
	}
}

echo json_encode($json);