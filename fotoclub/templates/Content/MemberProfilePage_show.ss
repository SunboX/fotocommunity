<% if CurrentProfile %>

<% if IsEditable %>
<a href="profile/edit/<% control CurrentProfile %>$ID<% end_control %>"class="edit_link">Profil bearbeiten</a>
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
	<h3>$Nickname´s neueste Fotos</h3>
	
	<div class="images">
	<% control LatestImages %>
		<div class="thumbnail"><a href="galleries/show-image/$ImageGalleryID/$ID" class="thumbnail">$Thumbnail</a></div>
	<% end_control %>
	</div>
	
	<br class="clear" />
</div>

<% end_control %>
<% else %>
<p>Dieses Profil wurde nicht gefunden.</p>
<% end_if %>