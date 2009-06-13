/**
 * @author André Fiedler
 */

(function($)
{
	$(document).ready(function()
	{	
		// initialize scrollable 
		$('div.vertical_image_scroller_scrollables').scrollable({
			size: 4,
			items: 'div.thumbs',  
			hoverClass: 'hover'
		});	
		$('div.vertical_image_scroller_scrollables div.thumbs div').click(function()
		{
	        document.location = this.getElementsByTagName('a')[0].href;
	    }); 
	});
	
})(jQuery);