<a href="{$Link}post" class="edit_link">Eine Nachricht senden</a>

<h1>Deine Nachrichten</h1>

<div class="private_messages">
	<% if MyMessages %>
	<dl class="message">
		<% control MyMessages %>
		<dt><b><a href="{$Top.Link}message/$ID">$Subject.XML</a></b> von $From.FirstName.XML $From.Surname.XML</dt>
		<dd><i>Versand am $Created.Format(d.m.Y) um $Created.Format(H:i) Uhr</i></dd>
		<% end_control %>
	</dl>
	<% else %>
	<p>Du hast noch keine Nachrichten.</p>
	<% end_if %>
</div>