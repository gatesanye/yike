$(document).ready(function(){
	$('#nav-reg').addClass('active');
	
	//检查用户名是否可用
	$('#checkUser').click(function(){
		$.ajax({
			url: '/module/user/checkuser.php',
			type: 'POST',
			data: {
				username: $('#username').val()
			},
			success: function(message){				
				if(message){
					$("#userIsAveilable").html('恭喜，用户名可用！');
				} else {
					$("#userIsAveilable").html('该用户名已被注册~');
				}
			},
			error: function(){
				Yike.message("数据提交失败，请重试");
			}
		});		
	});
	
	//提交数据
	$('#reg').submit(function(){		
		$(this).ajaxSubmit({
			url: '/module/user/adduser.php',
			type: 'POST',
			dataType: 'json',
			success: function(result){
				if(result.status){
					Yike.message(result.message);
					setTimeout(function(){ 
						document.location='/app/user/login.php';
					}, 3000);
				} else {
					Yike.message(result.message);
				}
			},
			error: function(){
				Yike.message("数据提交失败，请重试");		
			}
		});
		
		return false;
	});
});