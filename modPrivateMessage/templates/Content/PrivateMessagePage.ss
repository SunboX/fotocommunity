<h2>Your messages</h2>

<% if MyMessages %>
<dl>
	<% control MyMessages %>
	<dt><b><a href="{$Top.Link}message/$ID">$Subject</a></b> from $From.FirstName $From.Surname</dt>
	<dd><i>Sent on $Created.Date $Created.Time</i></dd>
	<% end_control %>
</dl>
<% else %>
<p>You have no messages.</p>
<% end_if %>

<p><a href="{$Link}post">Send a message</a></p>