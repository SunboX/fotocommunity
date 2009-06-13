/**
 * @author SunboX
 */
(function($)
{
	$(document).ready(function()
	{
		$('.delete_image_link').click(function(e)
		{
			if(!confirm('Möchtest du dieses Foto wirklich löschen?'))
			{
				e.preventDefault();
			}
		});
		
		var lights_off = false;
		var the_img = $('#the_image img');
		the_img = $(the_img[0]);
		the_img.expose({
			maskId: 'lights_off_overlay', 
			loadSpeed: 'fast', 
			opacity: 0.9,
			onLoad: function()
			{
				var exp = this;
				var el = $('#switch_lights_off');
				
				// make sure element is positioned absolutely or relatively
				if(!/relative|absolute|fixed/i.test(el.css('position')))
				{
					el.css('position', 'relative');
				}					
				
				// make elements sit on top of the mask
				el.text('Licht wieder an').css({
					zIndex: exp.getConf().zIndex + 1,
					color: '#fff'
				});
			},
			onClose: function()
			{
				var exp = this;
				var el = $('#switch_lights_off');
				
				el.text('Licht aus').css('color', '#000');
			}
		});
		$('#switch_lights_off').click(function()
		{
			var el = $('#switch_lights_off');
			if(el.text() == 'Licht aus') the_img.expose().load();
			else the_img.expose().close();	
		});
	});
	
})(jQuery);