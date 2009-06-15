<span class="edit_link">
	<a href="galleries/show/<% control CurrentGallery %>$ID<% end_control %>">« Zurück zum Album</a>
	<% if CanEditGallery %>
	<span class="separator">|</span>
	<a href="galleries/edit/<% control CurrentGallery %>$ID<% end_control %>">Albuminformationen bearbeiten</a>
	<span class="separator">|</span>
	<a href="galleries/upload/<% control CurrentGallery %>$ID<% end_control %>">Fotos hinzufügen</a>
	<span class="separator">|</span>
	<a href="galleries/modify-images/<% control CurrentGallery %>$ID<% end_control %>" class="current">Reihenfolge und Titel der Fotos ändern</a>
	<% end_if %>
</span>

<% if CurrentGallery %>
<% control CurrentGallery %>
	
	<h1>$Title.XML</h1>
	
	<div class="sortables">
	<% control SortableThumbnails %>
		<div id="item_$ID" class="move">
			<input type="text" name="item_title_$ID" value="$Title" /><br />
			$Thumbnail
		</div>
	<% end_control %>
	</div>
	
	<div id="sortables_info">
		Um die Fotos zu sortieren, mit der Linken Mausstate darauf klicken, Taste gedrückt halten und das Foto an die richtige Stelle ziehen. Wenn die Reihenfolge stimmt, mit dem Button am Ende der Seite bestätigen.
	</div>
	
	<br class="clear" />
	
	<button id="do_modify_images">Änderungen Speichern</button>

<% end_control %>
<% else %>
<p>Das Fotoalbum wurde nicht gefunden.</p>
<% end_if %>
