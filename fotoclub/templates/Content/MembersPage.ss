$Content

<div class="members">
<% if Members %>

<h3>Mitglieder ($MembersCount)</h3>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <% control Members %>
  
  <tr class="$EvenOdd">
    <td>
    	<a href="profil/show/$ID">$FirstName $Surname</a>
    	<% if IsOnline %>
		<span class="on">(online)</span>
		<% else %>
		<span class="off">(offline)</span>
		<% end_if %>
	</td>
	<td>
		Spitzname: $Nickname
	</td>
    <td><a href="galleries/my/$ID">$NumImages Fotos</a></td>
  </tr>
  <% end_control %>
</table>

<% else %>
<p>Es wurden keine Mitglieder gefunden.</p>
<% end_if %>
</div>