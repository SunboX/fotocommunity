/**
 * @author enrico.meinel
 * @author André Fiedler
 */

(function($)
{
	$(document).ready(function()
	{
		$("div[class^='sortables']").sortable({
			items : 'div.move',
			containment : 'document',
			tolerance : 'intersect'
		});
	});
	
	$('#do_modify_images').click(function()
	{
		$.post(url_segment + '/doModifyImages', $("div[class^='sortables']").sortable('serialize'));
		alert('Änderungen wurden gespeichert!');
	});
})(jQuery);