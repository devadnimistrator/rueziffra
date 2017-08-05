jQuery(function(){
		 jQuery('.ui-accordion-header').click(function () {
			jQuery('.ui-accordion-header').removeClass('ui-state-active');
			jQuery('.ui-accordion-content').slideUp('slow');
			jQuery(this).addClass('ui-state-active');
			jQuery(this).next().slideDown('fast');
		});
	
	
			var pull        = jQuery('.btn-navbar');  
				menu        = jQuery('.nav-collapse');  
				menuHeight  = menu.height();  
		  
			jQuery(pull).on('click', function(e) { 
				e.preventDefault();  
				menu.slideToggle(); 
			}); 
			
		jQuery(window).resize(function(){  
			var w = jQuery(window).width();  
			if(w > 1150 && menu.is(':hidden')) {  
				menu.removeAttr('style');  
			}  
		});
		
		jQuery( ".menu-item-has-children" ).append( "<span class='op'></span>" );
 		
		jQuery('.menu-item-has-children .op').on('click', function() { 
				jQuery(this).parent().find('.sub-menu').slideToggle(); 
			}); 
			
		jQuery(window).resize(function(){  
			var w = jQuery(window).width();  
			if(w > 1150) {  
				jQuery('.sub-menu').removeAttr('style');  
			}  
		});
  });


