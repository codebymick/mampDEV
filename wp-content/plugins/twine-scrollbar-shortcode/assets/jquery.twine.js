jQuery.fn.twine = function() {
	
	var animtrigger = false;
  	var windowheight = jQuery(window).height();
  	var padding = 2.0;
  	var activ = null;
	var last_element = 0;
	
	jQuery('.twine-section').each(function() {
		var section = jQuery(this);
		var container = jQuery(this).find('.horizontel');
		var activator = jQuery(this).find('.activator');
		var anker = jQuery(this).find('.anker');
		
		jQuery(window).scroll(function() {
			var viewableOffset = ((jQuery(window).scrollTop() - container.offset().top)) + (windowheight/padding);
			if(viewableOffset <= container.height()){
		      	activator.css('height', viewableOffset);
		    }else if(viewableOffset >= container.height()){
		     	activator.css('height', container.height());
		    }
		    
		    var top = ((jQuery(window).scrollTop() - anker.offset().top)) + (windowheight/padding);
		    if(top >= 0) {
				section.addClass('active');
		    } else {
				section.removeClass('active');
		    }
		});
	
	});

	init_jumps();

    return jQuery(this);
}

var init_jumps = function(){
	var windowheight = jQuery(window).height();
	var padding = 2.0;
	
	jQuery('.anker').each(function(i){
		jQuery(this).click(function(eve){
			eve.preventDefault();
			jQuery('html,body').animate({
				scrollTop: (jQuery(this).offset().top - (windowheight/padding) + 10)
			},
			'slow');
		});
	 });
}

