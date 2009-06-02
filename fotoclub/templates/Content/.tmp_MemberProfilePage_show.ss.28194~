<% if CurrentProfile %>

<% if IsEditable %>
<a href="profil/edit/<% control CurrentProfile %>$ID<% end_control %>"class="edit_link">Profil bearbeiten</a>
<% end_if %>

<% control CurrentProfile %>
<div class="profile">
	
	<div class="left">
		
		<span class="nick">
			$Nickname
			<% if IsOnline %>
			<span class="on">(online)</span>
			<% else %>
			<span class="off">(offline)</span>
			<% end_if %>
		</span>
		
		<img src="$GetAvatar" class="avatar" width="80" />
	</div>
	<div class="right">
		<div class="signature">$Signature</div>
	</div>
	
</div>

<br class="clear" />

<div class="lightbox">
	<h3>$Nickname´s neueste Bilder</h3>
	
	<div class="pictures"></div>
</div>

<% end_control %>
<% else %>
<p>Dieses Profil wurde nicht gefunden.</p>
<% end_if %>