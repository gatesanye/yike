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
		$require = Model\DemandThing::findRequire($id);
		if($require){
			if($require->asker->user_id == CURRENT_YIKE){	//只能修改自己物品的状态
				$require->demandthing_detail = $detail;
				$require->demandthing_money	 = $money;
				$require->demandthing_title	 = $title;
				$require->catalogue_id	 	 = $cat;
				$require->demandthing_pic	 = $cover;
				$require->save();
				$json['status'] = 1;
				$json['message']= "需求 {$require->demandthing_title} 修改成功。";
			} else {
				$json['message']= "无权限删除该需求";
			}
		} else {
			$json['message']= "需求{$id}不存在";
		}
	} else {
		$json['message'] = "分类{$cat}不存在";
	}
}

echo json_encode($json);