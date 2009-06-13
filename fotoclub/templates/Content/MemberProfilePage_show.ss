<% if CurrentProfile %>

<% if IsEditable %>
<a href="profile/edit/<% control CurrentProfile %>$ID<% end_control %>"class="edit_link">Dein Profil bearbeiten</a>
<% end_if %>

<% control CurrentProfile %>
<div class="profile">
	
	<div class="left">
		
		<span class="nick">
			$FirstName.XML $Surname.XML
			<% if IsOnline %>
			<span class="on">(online)</span>
			<% else %>
			<span class="off">(offline)</span>
			<% end_if %>
		</span>
		
		<img src="$GetAvatar" class="avatar" width="80" />
		
		<br />
		
		<a href="$GetPMLink">$Nickname.XML eine Nachricht schicken</a><br />
		<a href="$GetImageGalleriesLink">Zu $Nickname.XML´s Fotoalben ($NumImageGalleries)</a><br />
		
		
	</div>
	<div class="right">
		<div class="signature">$Signature</div>
	</div>
	
</div>

<br class="clear" />

<hr />

<h3>$Nickname.XML´s neueste Fotos</h3>

<% include latest_images %>
	


<% end_control %>
<% else %>
<p>Dieses Profil wurde nicht gefunden.</p>
<% end_if %>