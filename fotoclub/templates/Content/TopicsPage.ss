$Content

<div class="club_topics">
<% if Topics %>

<h3>Club Themen</h3>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <% control Topics %>
  <tr class="topic_$State">
    <td>$Title.XML</td>
    <td><a href="#$ID">0 Fotos</a></td>
	<% if CurrentMember %> 
	<td><a href="clubtopics/upload/#$ID">[Fotos zu diesem Thema hochladen]</a></td>
	<% end_if %>
  </tr>
  <% end_control %>
</table>

<% else %>
<p>Es wurden keine Themen gefunden.</p>
<% end_if %>
</div>

<h4>Legende</h4>

<div class="legend_active"><div>aktuelles Thema</div></div>
<div class="legend_past"><div>Thema ist bereits vorbei</div></div>
