jQuery( document ).ready(function(){
	jQuery(".fancybox").fancybox({
		openEffect	: 'elastic',
		closeEffect	: 'elastic',
		helpers : {
		title : {
			type : 'inside'
			}
		}
	});
});



var Content = {

		operationPath: 'template/module/adminContent/inc/dbOperations.php',

		save: function(){
			$(function(){
		
		
				$('.formError').hide();
		
		
				var error = false;
		
				var id = $('#id').val();
				var title = $('#title').val();
				var text = tinyMCE.activeEditor.getContent();

				
				
				if(title == ''){
					$('#err_title').show();
					error = true;
				}
				if(text == ''){
					$('#err_text').show();
					error = true;
				}
		
		
				if(!error){
					$.post(Content.operationPath, { operation: 'edit',id: id, title: title, text: text},
						function(data){
					
							if (data=='0') {							
								window.location.href = 'adminContent.html&admin';
								$.fancybox.close();
							}
							else {
								alert('Ein Fehler ist aufgetreten.\nDie Daten konnten nicht gespeichert werden.');
							}
					});
				}
			});
		},
		
	delete: function(id){
		$(function(){
	
	
			$('.formError').hide();
			
					$.post(Content.operationPath, { operation: 'delete', id: id},
						function(data){
					
							if (data!='0') {							
								window.location.href = 'adminContent.html&admin';
								$.fancybox.close();
							}
							else {
								alert('Ein Fehler ist aufgetreten.<br />Die Daten konnten nicht gespeichert werden.');
							}
					});
		});
	},
	
	
	newPoint: function(){
		$(function(){
	
	
			$('.formError').hide();
	
	
			var error = false;
	
			
			var title = $('#title').val();
			var text = tinyMCE.activeEditor.getContent();

			if(title == ''){
				$('#err_title').show();
				error = true;
			}
			if(text == ''){
				$('#err_text').show();
				error = true;
			}
	
	
				if(!error){
					$.post(Content.operationPath, { operation: 'add', title: title, text: text},
						function(data){
					
							if (data=='0') {							
								window.location.href = 'adminContent.html&admin';
								$.fancybox.close();
							}
							else {
								alert('Ein Fehler ist aufgetreten.\nDie Daten konnten nicht gespeichert werden.');
							}
					});
				}
		});
	}
}