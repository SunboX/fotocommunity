<span class="edit_link">
	<a href="galleries/show/<% control CurrentGallery %>$ID<% end_control %>">« Zurück</a>
	<% if CanEditGallery %>
	<span class="separator">|</span> <a href="galleries/delete-image/<% control CurrentGallery %>$ID<% end_control %>/<% control CurrentImage %>$ID<% end_control %>">Dieses Foto löschen</a>
	<% end_if %>
</span>

<% if CurrentImage %>
	
	$CurrentImage.SetMaxWidth(920)

<% else %>
<p>Das Foto wurde nicht gefunden.</p>
<% end_if %>

$PageComments
