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
		$require = Model\DemandThing::findRequire($id);
		if($require){
			if($require->asker->user_id == CURRENT_YIKE){	//只能修改自己物品的状态
				$require->status_id = $status;
				$require->save();
				$json['status'] = 1;
				$json['message']= "状态成功修改为{$require->status->status_name}";
			} else {
				$json['message']= "无权限删除该物品";
			}
		} else {
			$json['message']= "该物品不存在";
		}
	} else {
		$json['message'] = "状态{$status}不存在";
	}
}

echo json_encode($json);