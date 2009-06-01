$Content

<div class="members">
<% if Members %>

<h3>Mitglieder ($MembersCount)</h3>

<table width="100%" border="0">
  <% control Members %>
  <tr>
    <td>
    	<a href="profil/show/$ID">$FirstName $Surname</a>
    	<% if IsOnline %>
		<span class="on">(online)</span>
		<% else %>
		<span class="off">(offline)</span>
		<% end_if %>
	</td>
    <td><a href="#">Bilder (0)</a></td>
  </tr>
  <% end_control %>
</table>

<% else %>
<p>Es wurden keine Mitglieder gefunden.</p>
<% end_if %>
</div>