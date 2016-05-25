jQuery(document).ready(function($) {
	jQuery.each(jQuery("li.menu-item-object-megamenu .mega-menu"), function(){
		var menu_offset = jQuery(this).offset();
		jQuery(this).css("margin-left", -1 * menu_offset.left)
			.css("width", jQuery(window).width());
	});
	jQuery("li.menu-item-object-megamenu").hover(function(e){
		var target = $(e.currentTarget);
		var mega_menu = target.find(".mega-menu");
		
		if (e.type == "mouseenter" && parseInt(mega_menu.css("margin-left")) == 0) {
			var menu_offset = mega_menu.offset();
			mega_menu.css("margin-left", -1 * menu_offset.left);
			mega_menu.css("width", jQuery(window).width());
		}
	});
});
jQuery(window).on('resize', function(){
	jQuery("li.menu-item-object-megamenu .mega-menu").css("margin-left", 0);
});
