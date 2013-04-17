$(document).ready(function(){	
	KindEditor.ready(function(K){
		editor = K.create('textarea[id="thingdetail"]', {
			allowFileManager : false
		});	
		K('#uploadimg').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl : K('#cover').val(),
					clickFn : function(url, title, width, height, border, align) {
						K('#cover').val(url);
						editor.hideDialog();
					}
				});
			});
		});
		
		$('#formSubmit').click(function(){			
			$.ajax({		
				url: '/module/require/new.php',
				type: 'POST',
				data: {
					thingtitle	: $('#thingtitle').val(),
					cat			: $('#cat').val(),
					thingdetail	: editor.html(),
					cover		: $('#cover').val(),
					value		: $('#value').val(),
				},
				dataType: 'json',
				success: function(result){
					Yike.message(result.message);
					setTimeout(function(){
						document.location = "/app/user/index.php";
					}, 3000);
				},
				error: function(){
					Yike.message("提交失败，请重新提交。");
				}
			});
		});			
	});
});