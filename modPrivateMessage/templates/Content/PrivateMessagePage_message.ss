<p><a href="$Link">Back to my messages</a></p>

<% if CurrentMessage %>
<% control CurrentMessage %>

<h2>$Subject</h2>
<p>From: $From.FirstName $From.Surname</p>
<p>Sent on: $Created.Date $Created.Time</p>

<p>$Body</p>

<% end_control %>
<% else %>
<p>Sorry, I can't find that message</p>
<% end_if %>