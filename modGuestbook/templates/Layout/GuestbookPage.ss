<div class="typography">
	<h2>$Title</h2>
	$Content
	
	<% if show_list %>
	<div id="guestbook">
		<p style="text-align:right;">$LinkNewEntry</p>
	<% control show_list %>
		<% include GuestbookPage_Entry %>
	<% end_control %>
	<% if show_list.MoreThanOnePage %>
		<p style="text-align:center;">
			<% if show_list.PrevLink %><a href="$show_list.PrevLink">&lt;&lt; vorherige</a>&nbsp;|<% end_if %>		
			<% control show_list.Pages %>
			<% if CurrentBool %><strong>$PageNum</strong> 
			<% else %><a href="$Link" title="Gehe zur Seite $PageNum">$PageNum</a> 
			<% end_if %>
			<% end_control %>
			<% if show_list.NextLink %>|&nbsp;<a href="$show_list.NextLink">weitere &gt;&gt;</a><% end_if %>
		</p>
	<% end_if %>
		<p style="text-align:right;">$LinkNewEntry</p>
	</div>
	<% end_if %>
</div>