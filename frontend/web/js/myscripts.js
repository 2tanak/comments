jQuery(document).ready(function($) {
$('.ozenka').on('change',function(e){
	
	e.preventDefault();
	var ozenka= $(this).val();
	var id = $(this).data('commentsid');
	
	$('.wrap_result').
					css('color','green').
					text('Сохранение оценки').
					fadeIn(500,function() {
		                  $.ajax({
							
							url:'/testcomments/ajax/send2',
							data:{'ozenka':ozenka,'id':id},
						    type:'POST',
							datatype:'JSON',
							
							success: function(res) {
							
								var html = JSON.parse(res);
								
								if(html.error) {
									$('.wrap_result').css('color','red').append('<br /><strond>Ошибка: заполните обязательные поля<strond>');
									$('.wrap_result').delay(3000).fadeOut(500);
								}
								else if(html.success) {
									$('.wrap_result')
													.append('<br /><strong>Сохранено!</strong>')
													.delay(500)
													.fadeOut(200,function() {
														
												
													})
													
								}
								
								
							},
							error:function() {
								$('.wrap_result').css('color','red').append('<br /><strond>Ошибка: </strong>');
								$('.wrap_result').delay(2000).fadeOut(500, function() {
									$('#cancel-comment-reply-link').click();
								});
								
							}
							
						});
	
	
					})
	
	
	
})
	
	$('.commentlist li').each(function(i) {
		i
		$(this).find('div.commentNumber').text('#' + (i + 1));
		
	});
	
	$('#commentform').on('click','#submit',function(e) {
	
	
		
		//alert($('#commentform').attr('action'));return false;
		
		
		var comParent = $(this);
	    var token = $('#token').val();
		//var cat_id = $('#comment_post_ID').val();
		
		var parent_id = $('#comment_parent').val();
		var text = $('#comment').val();
		var name = $('#name').val();
		var email = $('#email').val();
		var url = $('#url').val();
	
	if(name!='' && email!=''){
		e.preventDefault();
	$('.wrap_result').
					css('color','green').
					text('Сохранение комментария').
					fadeIn(500,function() {
					$.ajax({
							
							url:'/testcomments/ajax/send',
							data:{'parent':parent_id,'text':text,'name':name,'url':url,'email':email},
							//headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
							type:'POST',
							datatype:'JSON',
							
							success: function(res) {
								//alert(res);return false;
								var html = JSON.parse(res);
								
								if(html.error) {
									$('.wrap_result').css('color','red').append('<br /><strond>Ошибка: заполните обязательные поля<strond>');
									$('.wrap_result').delay(3000).fadeOut(500);
								}
								else if(html.success) {
									$('.wrap_result')
													.append('<br /><strong>Сохранено!</strong>')
													.delay(500)
													.fadeOut(200,function() {
														
														if(html.data.parent_id > 0) {
															comParent.parents('div#respond').prev().after('<ul class="children">' + html.comment + '</ul>');
														}
														else {
															if($.contains('#comments','ol.commentlist')) {
																$('ol.commentlist').append(html.comment);
															}
															else {
																
																$('#respond').before('<ol class="commentlist group">' + html.comment + '</ol>');
																
															}
														}
														
														
														
														
														$('#cancel-comment-reply-link').click();
													})
													
								}
								
								
							},
							error:function() {
								$('.wrap_result').css('color','red').append('<br /><strond>Ошибка: </strong>');
								$('.wrap_result').delay(2000).fadeOut(500, function() {
									$('#cancel-comment-reply-link').click();
								});
								
							}
							
						});
					});
	}
	});
	
});