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
				url: '/module/require/edit.php',
				type: 'POST',
				data: {
					thingtitle	: $('#thingtitle').val(),
					cat			: $('#cat').val(),
					thingdetail	: editor.html(),
					cover		: $('#cover').val(),
					money		: $('#thingvalue').val(),
					id			: $('#requireid').val()
				},
				dataType: 'json',
				success: function(result){
					if(result.status){
						Yike.message(result.message);
						setTimeout(function(){
							document.location = "/app/user/index.php";
						}, 3000);						
					} else {
						Yike.message(result.message);
					}

				},
				error: function(){
					Yike.message("遇到技术问题，提交失败，请重新提交。");					
				}
			});
		});			
	});
});