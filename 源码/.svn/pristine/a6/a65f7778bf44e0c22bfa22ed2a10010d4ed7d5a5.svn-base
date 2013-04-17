$(document).ready(function(){
	$('#hidemodal').click(function(){
		$('#msgmodal').modal('hide');
	});
	
	//检查用户是否有效
	$('#receiver').blur(function(){
		$.ajax({
			url: '/module/user/checkuser.php',
			type: 'POST',
			data: {
				username: $('#receiver').val()
			},
			success: function(message){				
				if(message){					
					Yike.message("该用户不存在。请重新输入。");
				}
			},
			error: function(){
				Yike.message("检查用户名失败。请重新输入。");
			}
		});
	});
	
	//提交信息
	$('#submitForm').click(function(){
		$(this).ajaxSubmit({
			url: '/module/message/send.php',
			type: 'POST',
			data: {				
				receiver: $('#receiver').val(),
				msgtitle: $('#msgtitle').val(),
				msgcontent: $('#msgcontent').val()
			},
			dataType: 'json',
			success: function(result){
				if(result.status){
					$('#msgtitle').val = '';
					$('#msgcontent').val = '';
					$('#msgmodal').modal('hide');
				}
				Yike.message(result.message);
			},
			error: function(){
				alert("失败");
			}
		});
	});	
});
