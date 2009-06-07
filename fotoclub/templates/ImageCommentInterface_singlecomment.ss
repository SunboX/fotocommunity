<p class="info">
	
	<% if AuthorID %>
	<a href="profile/show/$AuthorID" class="author">$Name.XML</a>, $Created.Format(d.m.Y) ($Created.Ago)
	<% else %>
	<span class="author">$Name.XML</span>, $Created.Format(d.m.Y) ($Created.Ago)
	<% end_if %>
	
</p>
<p class="comment" id="PageComment_$ID">
	<% if bbCodeEnabled %>
		$ParsedBBCode	
	<% else %>
		$Comment.XML	
	<% end_if %>
</p>

<!--% if ApproveLink || SpamLink || HamLink || DeleteLink  TdDo: FIX THIS! %-->
<!-- See: http://silverstripe.org/general-questions/show/261934?showPost=261934 -->
<% if SpamLink || DeleteLink %>

	<div class="links">

	<% if ApproveLink %>
		<a href="$ApproveLink" class="approvelink edit_link">[Anmerkung bestätigen]</a>
	<% end_if %>
	<% if SpamLink %>
		<a href="$SpamLink" class="spamlink edit_link">[Spam melden]</a>
	<% end_if %>
	<% if HamLink %>
		<a href="$HamLink" class="hamlink edit_link">[Diese Anmerkung ist kein Spam]</a>
	<% end_if %>
	<% if DeleteLink %>
		<a href="$DeleteLink" class="deletelink edit_link">[Anmerkung löschen]</a>
	<% end_if %>
	
	</div>

<% end_if %>