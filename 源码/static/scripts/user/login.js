$(document).ready(function(){
	$('#nav-login').addClass('active');
	
	//提交登陆表单数据
	$('#login').submit(function(){		
		$(this).ajaxSubmit({
			url: '/module/user/login.php',
			type: 'POST',
			dataType: 'json',
			success: function(result){
				if(result.status){	//登陆成功
					Yike.message(result.message);
					setTimeout(function(){
						document.location = '/app/user/index.php';
					}, 3000);
				} else {
					Yike.message(result.message);
					reCode();	//自动重新输入验证码
				}
			},
			error: function(){
				Yike.message("提交失败，请重新提交");
			}
		});
		
		return false;
	});
});

function reCode(){
	var num1=Math.round(Math.random()*10000000);
	var num=num1.toString().substr(0,4);
	document.codeimg.src="/ValidatorCode.php?code="+num;
	form1.defValidatorCode.value=num;
}