/**
 * @author SunboX
 */
(function($)
{
	$(document).ready(function()
	{
		$('#delete_image_link').click(function(e)
		{
			if(!confirm('Möchtest du dieses Bild wirklich löschen?'))
			{
				e.preventDefault();
			}
		});
		
		$('#switch_lights_off').click(function(e)
		{
			e.preventDefault();
			
			var img = $('#the_image img');
			var pos = $(img[0]).offset();
			
			var overlay1 = $('<div class="lights_off_overlay"></div>').css(
			{
				height: $(document.body).height()
			});
			var overlay2 = $('<div class="lights_off_overlay_content"></div>').css(
			{
				position: 'absolute',
				top: pos.top, 
				left: pos.left
			});
			overlay1.click(function(e)
			{
				e.preventDefault();
				
                overlay1.remove();
				overlay2.remove();
				overlay1 = overlay2 = null;
            });
			overlay2.append($('<a href="#" id="switch_lights_on">Licht an</a>').click(function(e)
			{
				e.preventDefault();
				
                overlay1.remove();
				overlay2.remove();
				overlay1 = overlay2 = null;
            }));
			overlay2.append($('<img src="' + img[0].src + '" />'));
			
			overlay1.css('opacity', 0.9); 
			overlay1.appendTo('body');
			overlay2.appendTo('body');
		});
	});
	
})(jQuery);