<?php
include_once '../../base.php';
if( Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){	//检查权限
	$data = array_map("trim", $_REQUEST);
	$json['status'] = 0;
	if( Model\Catalogue::exists(intval($data['cat'])) ){	//检查分类是否存在
		$ownthing = new Model\OwnedThing();
		$ownthing->init(array(
			'ownthing_name'	=> strip_tags($data['thingtitle']),
			'ownthing_details' => $data['thingdetail'],
			'catalogue_id'	=> $data['cat'],
			'ownthing_pic'	=> strip_tags($data['cover']),
			'ownthing_money'=> intval($data['money']),
		));
		$result = $ownthing->save();
		if($result){
			$json['status'] = 1;
			$json['message'] = "物品 {$ownthing->ownthing_name} 发布成功。";
		} else {			
			$json['message'] = "保存失败，请重试。";
		}
	} else {
		$json['message'] = "分类选择错误哦~";
	}	
} else {
	$json['status'] = 0;
	$json['message'] = "你无权限进行此操作";
}

echo json_encode($json);