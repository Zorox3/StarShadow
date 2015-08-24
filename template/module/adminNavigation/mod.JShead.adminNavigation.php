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





var NaviPoints = {

	operationPath: 'template/module/adminNavigation/inc/dbOperations.php',

	save: function(){
		$(function(){
	
	
			$('.formError').hide();
	
	
			var error = false;
	
			var id = $('#id').val();
			var name = $('#name').val();
			var link = $( "#link option:selected" ).val();
			var parent = $( "#parent option:selected" ).val();
			var position = $('#position').val();
			var admin = $("input[name='admin']:checked").val();
			var visible = $("input[name='visible']:checked").val();
			
			
			if(name == ''){
				$('#err_name').show();
				error = true;
			}
			if(position == ''){
				$('#err_position').show();
				error = true;
			}
	
	
			if(!error){
				$.post(NaviPoints.operationPath, { operation: 'edit',id: id, name: name, admin: admin, link: link, parent: parent, position: position, visible:visible},
					function(data){
				
						if (data=='0') {							
							window.location.href = 'adminNavigation.html&admin';
							$.fancybox.close();
						}
						else {
							alert('Ein Fehler ist aufgetreten.<br />Die Daten konnten nicht gespeichert werden.');
						}
				});
			}
	
	
	
		});
	},
	
	delete: function(id){
		$(function(){
	
	
			$('.formError').hide();
			
					$.post(NaviPoints.operationPath, { operation: 'delete', id: id},
						function(data){
					
							if (data!='0') {							
								window.location.href = 'adminNavigation.html&admin';
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
	
			
			var name = $('#name').val();
			var link = $( "#link option:selected" ).val();
			var parent = $( "#parent option:selected" ).val();
			var position = $('#position').val();
			var admin = $("input[name='admin']:checked").val();
			var visible = $("input[name='visible']:checked").val();
	
	
			if(name == ''){
				$('#err_name').show();
				error = true;
			}
			if(position == ''){
				$('#err_position').show();
				error = true;
			}
	
	
			if(!error){
				$.post(NaviPoints.operationPath, { operation: 'add', name: name, admin: admin, link: link, parent: parent, position: position, visible: visible},
					function(data){
				
						if (data=='0') {							
							window.location.href = 'adminNavigation.html&admin';
							$.fancybox.close();
						}
						else {
							alert('Ein Fehler ist aufgetreten.\n Die Daten konnten nicht gespeichert werden.');
						}
				});
			}
	
	
	
		});
	}
}