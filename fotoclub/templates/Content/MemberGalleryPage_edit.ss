<span class="edit_link">
	<a href="galleries/show/<% control CurrentGallery %>$ID<% end_control %>">« Zurück zum Album</a>
	<% if CanEditGallery %>
	<span class="separator">|</span>
	<a href="galleries/edit/<% control CurrentGallery %>$ID<% end_control %>" class="current">Albuminformationen bearbeiten</a>
	<span class="separator">|</span>
	<a href="galleries/upload/<% control CurrentGallery %>$ID<% end_control %>">Fotos hinzufügen</a>
	<span class="separator">|</span>
	<a href="galleries/modify-images/<% control CurrentGallery %>$ID<% end_control %>">Reihenfolge und Titel der Fotos ändern</a>
	<% end_if %>
</span>

$EditGalleryForm