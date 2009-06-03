<span class="edit_link">
	<a href="galleries/my/<% control CurrentProfile %>$ID<% end_control %>">« Zurück</a>
	<% if CanEditGallery %>
	<span class="separator">|</span> <a href="galleries/upload/<% control CurrentGallery %>$ID<% end_control %>">Fotos hinzufügen</a>
	<% end_if %>
</span>

$EditGalleryForm