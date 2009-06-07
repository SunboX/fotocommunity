<span class="edit_link_50l">
	<a href="galleries/show/<% control CurrentGallery %>$ID<% end_control %>">« Zurück zum Album</a>
	<% if CanEditGallery %>
	<span class="separator">|</span>
	<a href="galleries/delete-image/<% control CurrentGallery %>$ID<% end_control %>/<% control CurrentImage %>$ID<% end_control %>" class="delete_image_link">Dieses Foto löschen</a>
	<% end_if %>
</span>

<% if CurrentImage %>

	<span class="edit_link_50r">
		<% control CurrentImage %>
		
			<% if IsFirst != true %>
			<a href="galleries/show-image/$ImageGalleryID/$PrevImage.ID">« letztes Foto</a>
			<span class="separator">|</span>
			<% end_if %>
			
			<a href="#" id="switch_lights_off">Licht aus</a>
			
			<% if IsLast != true %>
			<span class="separator">|</span>
			<a href="galleries/show-image/$ImageGalleryID/$NextImage.ID">nächstes Foto »</a>
			<% end_if %>
		
		<% end_control %>
	</span>
	
	<div id="the_image">
		$CurrentImage.SetMaxWidth(920)
		<br />
		$CurrentImage.Title.XML
	</div>

<% else %>
<p>Das Foto wurde nicht gefunden.</p>
<% end_if %>

<br class="clear" />

$ImageComments
