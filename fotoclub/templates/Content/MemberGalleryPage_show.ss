<span class="edit_link">
	<a href="galleries/my/<% control CurrentProfile %>$ID<% end_control %>">« Zurück</a>
	<% if CanEditGallery %>
	<span class="separator">|</span>
	<a href="galleries/edit/<% control CurrentGallery %>$ID<% end_control %>">Albuminformationen bearbeiten</a>
	<span class="separator">|</span>
	<a href="galleries/upload/<% control CurrentGallery %>$ID<% end_control %>">Fotos hinzufügen</a>
	<span class="separator">|</span>
	<a href="galleries/modify-images/<% control CurrentGallery %>$ID<% end_control %>">Reihenfolge und Titel der Fotos ändern</a>
	<% end_if %>
</span>

<div class="lightbox">
<% if CurrentGallery %>
<% control CurrentGallery %>
	
	<h1>$Title</h1>
	
	<% if Description %>
	<div class="description">$Description</div>
	<% end_if %>

	<% control EnlargableThumbnails %>
	<div class="thumbnail_container">
		$Thumbnail
		<a href="galleries/show-image/$ImageGalleryID/$ID" class="title">Hello Image World!</a>
		<span class="comments">20 Anmerkungen</span>
		<span class="clicks">100 Klicks</span>
		<a href="galleries/delete-image/$ImageGalleryID/$ID" class="delete_image_link">[Dieses Foto löschen]</a>
	</div>
	<% end_control %>
	
	<br class="clear" />

<% end_control %>
<% else %>
<p>Das Fotoalbum wurde nicht gefunden.</p>
<% end_if %>
</div>