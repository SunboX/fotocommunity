<span class="edit_link_50l">
	<a href="galleries/show/<% control CurrentGallery %>$ID<% end_control %>">« Zurück</a>
	<% if CanEditGallery %>
	<span class="separator">|</span>
	<a href="galleries/delete-image/<% control CurrentGallery %>$ID<% end_control %>/<% control CurrentImage %>$ID<% end_control %>" class="delete_image_link">Dieses Foto löschen</a>
	<% end_if %>
</span>
<span class="edit_link_50r">
	<a href="#">« letztes Foto</a>
	<span class="separator">|</span>
	<a href="#" id="switch_lights_off">Licht aus</a>
	<span class="separator">|</span>
	<a href="#">nächstes Foto »</a>
</span>

<% if CurrentImage %>
	
	<div id="the_image">$CurrentImage.SetMaxWidth(920)</div>

<% else %>
<p>Das Foto wurde nicht gefunden.</p>
<% end_if %>

<br class="clear" />

$ImageComments
