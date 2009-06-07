<span class="edit_link">
	<a href="galleries/my/<% control CurrentProfile %>$ID<% end_control %>">« Zurück zu $CurrentProfile.Nickname´s Alben</a>
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
	
	<h1>$Title.XML</h1>
	
	<% if Description %>
	<div class="description">$Description</div>
	<% end_if %>

	<% control EnlargableThumbnails %>
		<div class="thumbnail_container">
			$Thumbnail
			<a href="galleries/show-image/$ImageGalleryID/$ID" class="title">$Title.XML</a>
			<span class="comments">$NumComments Anmerkung<% if NumComments != 1 %>en<% end_if %></span>
			<span class="clicks">$Clicks Klick<% if Clicks != 1 %>s<% end_if %></span>
			<% if CanEditImage %>
			<a href="galleries/modify-images/$ImageGalleryID" class="edit_image_link">[Titel ändern]</a>
			<a href="galleries/delete-image/$ImageGalleryID/$ID" class="delete_image_link">[Dieses Foto löschen]</a>
			<% end_if %>
		</div>
		<% if IsModuloThree %>
		<br class="clear" />
		<% end_if %>
	<% end_control %>
	
	<br class="clear" />

<% end_control %>
<% else %>
<p>Das Fotoalbum wurde nicht gefunden.</p>
<% end_if %>
</div>