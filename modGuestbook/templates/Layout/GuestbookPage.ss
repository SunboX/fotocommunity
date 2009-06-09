<div class="typography">
	<h2>$Title</h2>
	$Content
	$add_entry
	<% if show_list %>
	<div id="guestbook">
	<% control show_list %>
		<div class="entry">
			<div>Name: $Name</div>
			<div>Datum $Created</div>
			<div>$Message</div>
		</div>
	<% end_control %>
	</div>
	<% end_if %>
</div>