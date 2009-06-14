<span class="edit_link">
	<a href="galleries/my/<% control CurrentProfile %>$ID<% end_control %>">« Zurück zu $CurrentProfile.Nickname´s Alben</a>
	<% if CanEditGallery %>
	<span class="separator">|</span>
	<a href="galleries/edit/<% control CurrentGallery %>$ID<% end_control %>">Albuminformationen bearbeiten</a>
	<span class="separator">|</span>
	<a href="galleries/upload/<% control CurrentGallery %>$ID<% end_control %>">Fotos hinzufügen</a>
	<span class="separator">|</span>
	<a href="galleries/modify-images/<% control CurrentGallery %>$ID<% end_control %>"><b>Reihenfolge und Titel der Fotos ändern</b></a>
	<% end_if %>
</span>

<div class="lightbox">
<% if CurrentGallery %>
<% control CurrentGallery %>
	
	<h1>$Title.XML</h1>
	
	<div class="sortables">
	<% control SortableThumbnails %><div id="item_$ID" class="move">$Thumbnail</div><% end_control %>
	</div>
	
	<br class="clear" />
	
	<button id="do_modify_images">Änderungen Speichern</button>

<% end_control %>
<% else %>
<p>Das Fotoalbum wurde nicht gefunden.</p>
<% end_if %>
</div>