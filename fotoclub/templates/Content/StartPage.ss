
<div class="typography">
	
	$TopText
	
	<div class="lightbox">
		
		<h3>Neueste Fotos</h3>
		
		<% if LatestImages %>
		<div class="images">
		<% control LatestImages %>
			<div class="thumbnail"><a href="galleries/show-image/$ImageGalleryID/$ID" class="thumbnail">$Thumbnail</a></div>
		<% end_control %>
		</div>
		<% end_if %>
		
		<br class="clear" />
	</div>
	
	$BottomText

</div>