<?php
include '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){
	$json['status'] = 0;
	$json['message'] = "请登陆";
} else {
	$json['status'] = 0;
	$id = intval($_REQUEST['id']);
	$status = intval($_REQUEST['status']);
	if(Model\Status::exists($status)){
		$unuse = Model\OwnedThing::findUnuse($id);
		if($unuse){
			if($unuse->ownner->user_id == CURRENT_YIKE){	//只能修改自己物品的状态
				$unuse->status_id = $status;
				$unuse->save();
				$json['status'] = 1;
				$json['message']= "状态成功修改为{$unuse->status->status_name}";
			} else {
				$json['message']= "无权限删除该物品";
			}
		} else {
			$json['message']= "物品{$id}不存在";
		}
	} else {
		$json['message'] = "状态{$status}不存在";
	}
}

echo json_encode($json);