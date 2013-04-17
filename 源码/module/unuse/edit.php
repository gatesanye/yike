<?php
include '../../base.php';
if( !Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){
	$json['status'] = 0;
	$json['message'] = "请登陆";
} else {
	$json['status'] = 0;
	$data = array_map('trim', $_REQUEST);	
	$id 	= intval($data['id']);
	$title	= strip_tags($data['thingtitle']);
	$cat	= intval($data['cat']);
	$detail	= $data['thingdetail'];
	$cover	= strip_tags($data['cover']);
	$money	= intval($data['money']);			//过滤输入
	
	if(Model\Catalogue::exists($cat)){
		$unuse = Model\OwnedThing::findUnuse($id);
		if($unuse){
			if($unuse->ownner->user_id == CURRENT_YIKE){	//只能修改自己物品的状态
				$unuse->ownthing_details = $detail;
				$unuse->ownthing_money	 = $money;
				$unuse->ownthing_name	 = $title;
				$unuse->catalogue_id	 = $cat;
				$unuse->ownthing_pic	 = $cover;
				$unuse->save();
				$json['status'] = 1;
				$json['message']= "物品{$unuse->ownthing_name}修改成功。";
			} else {
				$json['message']= "无权限删除该物品";
			}
		} else {
			$json['message']= "物品{$id}不存在";
		}
	} else {
		$json['message'] = "分类{$cat}不存在";
	}
}

echo json_encode($json);