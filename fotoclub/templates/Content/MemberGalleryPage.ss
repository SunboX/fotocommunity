<% if CanAddGallery %>
<a href="galleries/new-gallery/<% control CurrentProfile %>$ID<% end_control %>"class="edit_link">Eine neues Album anlegen</a>
<% end_if %>

<h1>$CurrentMember.Nickname´s Fotoalben</h1>

<div class="galleries">
<% if Galleries %>
<% control Galleries %>

<div class="gallery">
	<div class="title"><a href="galleries/show/$ID">$Title</a></div>
	<% if Thumbnails %>
	<a href="galleries/show/$ID" class="thumbnail">$Thumbnails.First.Thumbnail</a>
	<% else %>
	<img src="$BaseHref/fotoclub/gfx/no-image.gif" class="thumbnail" />
	<% end_if %>
	<div class="date">$Date.Format(d.m.Y)</div>
	<div class="pics">$ImagesCount Fotos</div>
	<% if CanEdit %>
	<a href="galleries/edit/$ID" class="edit_link">[Album bearbeiten]</a>
	<% end_if %>
</div>

<% end_control %>
<% else %>
<p>Es wurden noch kein Fotoalbum gefunden.</p>
<% end_if %>
</div>