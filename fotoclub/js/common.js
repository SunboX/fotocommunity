/**
 * @author altima
 */

(function($)
{
	$(document).ready(function()
	{
 		defaultValue = $('div#Search .middleColumn input.text').val(); //laden des boxinhaltes
		$('div#Search .middleColumn input.text').focus(function() { if ($(this).val() == defaultValue) { $(this).val(''); } }); //leeren des boxinhaltes
		$('div#Search .middleColumn input.text').blur(function() { if ($(this).val() == '') { $(this).val(defaultValue); } }); //zurücksetzen des boxinhaltes 
		});
	
})(jQuery);