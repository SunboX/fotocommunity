<% if LatestImages %>
<div class="vertical_image_scroller">

<!-- prev link -->
<a class="prev"><span>« Vorhergehendes Foto</span></a>

<!-- next link -->
<a class="next"><span>Nächstes Foto »</span></a>

<!-- root element for scrollable -->
<div class="vertical_image_scroller_scrollables">
	
	<div class="thumbs">
	<% control LatestImages %>
	<div>
		
		<a href="galleries/show-image/$ImageGalleryID/$ID" class="thumbnail" style="background-image:url($Thumbnail)"></a>
		
		<h3><em>$Number. </em>$Title</h3>
			
	</div>
	<% end_control %>
	</div>

<br class="clear" />

</div>
<% end_if %>