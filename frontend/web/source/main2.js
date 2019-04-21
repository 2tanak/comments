/*price range*/

 //$('#sl2').slider();

    $('.catalog').dcAccordion({
        speed: 300
    });
/*------------------------------------------------------------*/
     $('body').on('click', '.add-to-cart', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
		var qty = $('#qty').val();
		var vlad = $(this).data('vlad');
		//alert(vlad);return false;
		var url = $(this).data('url');
		
        $.ajax({
            url: url,
            data: {id: id, qty: qty, vlad:vlad},
            type: 'POST',
            success: function(res){
				//alert(res);return false;
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });

	
	
	
	
	
	   function showCart(cart){
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }
	
	
	  $('#cart .modal-body').on('click', '.del-item', function(){
		 
        var id = $(this).data('id');
        $.ajax({
            url: '/cart/cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    });
	
	
	    function clearCart(){
        $.ajax({
            url: '/cart/cart/clear',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
    }
	
	    function getCart(){
        $.ajax({
            url: '/cart/cart/show',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    }
	
/*-----------------------------------------*/	
	
	
	
	
	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
	
	
	
	
	
	
	
$('.ajax li ul li').on('click',function(e){
	e.preventDefault();
	var menu_id = $(this).data('menu_id');
	var vlad_id = $('input[name=vlad_id]').val();
    var category_id = $('input[name=category_id]').val();
      $.ajax({
            url: 'menucategory',
            data: {'menu_id': menu_id, 'vlad_id': vlad_id,'category_id':category_id},
            type: 'POST',
			 beforeSend:function(){
			$('.ooo').addClass('overlay_active');
			
                        },
            success: function(res){
				//alert(res)
                if(!res) alert('Ошибка!');
				$('.col-md-9.col-md-push-3').html(res);
				
                $('.ooo').removeClass('overlay_active');
			
            },
            error: function(){
                alert('Error!');
            }
        });
	
	
	
})	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});
