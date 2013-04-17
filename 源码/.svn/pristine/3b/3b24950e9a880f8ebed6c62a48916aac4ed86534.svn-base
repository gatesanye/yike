(function(window, $){
	var Yike = {};
	
	Yike = $.dialog;
	
	Yike.message = function(msg){		
		$.dialog({
			title:   "易客消息中心",
			content:  msg,
			lock: true,
			time: 2500
		});
	};
	
	Yike.logout = function(){
		$.ajax({
			url: '/module/user/logout.php',
			type: 'GET',
			success: function(){
				setTimeout(document.location='/', 1500);
			},
			error: function(){
				Yike.message('注销失败，请重试');
			}
		});
	};
	
	window.Yike = Yike;
})(window, jQuery);

$(document).ready(function(){
	$('#yike_logout').click(function(){
		Yike.logout();
	});
});
	
	