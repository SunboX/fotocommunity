<a href="$Link" class="edit_link">« Zurück zu meinem Nachrichten</a>

<% if CurrentMessage %>
<% control CurrentMessage %>

<h1>$Subject.XML</h1>

<div class="info">Von: <a href="profile/show/$From.ID">$From.FirstName.XML $From.Surname.XML</a>, $Created.Format(d.m.Y) um $Created.Format(H:i) Uhr</div>
<div class="message">
	
	$Body

</div>

<a href="#">Nachricht beantworten</a>

<% end_control %>
<% else %>
<p>Diese Nachricht konnte leider nicht gefunden werden.</p>
<% end_if %>