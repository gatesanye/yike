<?php
include_once '../../base.php';
if( Yike\AccessControl::roleAllow(array(Yike\AccessControl::USER)) ){	//检查权限
	$data = array_map("trim", $_REQUEST);
	$json['status'] = 0;
	if( Model\Catalogue::exists(intval($data['cat'])) ){	//检查分类是否存在
		$require = new Model\DemandThing();
		$require->init(array(
			'demandthing_title'	=> strip_tags($data['thingtitle']),
			'demandthing_detail'=> $data['thingdetail'],
			'catalogue_id'		=> $data['cat'],
			'demandthing_pic'	=> strip_tags($data['cover']),
			'demandthing_money'	=> intval($data['value']),
		));
		$result = $require->save();
		if($result){
			$json['status'] = 1;
			$json['message'] = "需求 {$require->demandthing_title} 发布成功。";		
		} else {			
			$json['message'] = "保存失败，请重试。";
		}
	} else {
		$json['message'] = "分类选择错误哦~";
	}	
} else {	
	$json['message'] = "请登陆哦~亲";
}

echo json_encode($json);