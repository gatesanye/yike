$(document).ready(function(){	
	
});

/**
 * 把信息标记为已读
 * @param msgid
 */
function readMsg(msgid)
{
	$.ajax({
		url: '/module/message/readmsg.php',
		type: 'GET',
		data: {
			id: msgid
		},
		dataType: 'json',
		success: function(result){
			if(result.status){				
				$("#msgcon"+msgid).css('font-weight', 'normal');	//点击后，字体取消加粗
			} else {
				
			}
		},
		error: function(){	}
	});
}

function deleteUnuse(id)
{
	var url = '/module/unuse/delete.php';
	var data = {id: id};
	var okay = function(){ $("#unuse"+id).hide(1200); };
	
	del(url, data, okay);
}

function deleteRequire(id)
{
	var url = '/module/require/delete.php';
	var data = {id: id};
	var okay = function(){$("#require"+id).hide(1200);};
	
	del(url, data, okay);
}

function deleteMsg(msgid)
{
	var targetUrl = '/module/message/delmsg.php';
	var data = {id: msgid};
	var okay = function(){$("#msg"+msgid).hide(1200);	};
	
	del(targetUrl, data, okay);
}

function changeUnuseStatus(id, status)
{
	var url='/module/unuse/status.php';
	var data = {
		id: id,
		status: status
	};
	changeStatus(url, data);
}

function changeRequireStatus(id, status)
{
	var url = '/module/require/status.php';
	var data= {
		id: id,
		status: status,
	};
	changeStatus(url, data);
}

/**
 * 修改状态
 * 
 * @param url
 * @param data
 */
function changeStatus(url, data)
{
	$.ajax({
		url: url,
		type: "GET",
		data: data,
		dataType: 'json',
		success: function(result){
			if(result.status){
				
			} else {
				//Yike.message(result.message);
				Yike.alert(result.message, function(){
					location.reload();
				});
			}
		},
		error: function(){
			Yike.message("发生技术问题，物品状态修改失败。请重试。");
		}
	});
}

/**
 * 删除通用函数
 * 
 * @param string targetUrl
 * @param array data
 * @param function okay
 */
function del(targetUrl, data, okay)
{
	$.ajax({
		url: targetUrl,
		type: 'GET',
		data: data,
		dataType: 'json',
		success: function(result){
			if(result.status){
				okay();
			} else {
				Yike.message(result.message);
			}
		},
		error: function(){
			Yike.message("删除失败，请重试。");
		}
	});
}