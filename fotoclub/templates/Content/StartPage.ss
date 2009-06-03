
<div class="typography">
	
	$TopText
	
	<div class="lightbox">
		
		<h3>Neueste Fotos</h3>
		
		<div class="images">
		<% control LatestImages %>
			<div class="thumbnail"><a href="galleries/show/$ImageGalleryID" class="thumbnail">$Thumbnail</a></div>
		<% end_control %>
		</div>
		
		<br class="clear" />
	</div>
	
	$BottomText

</div>