<div id="PageComments_holder" class="typography">
	
	<h4>Anmerkungen</h4>
	
	<div id="CommentHolder">
		<% if Comments %>
			<ul id="PageComments">
				<% control Comments %>
					<li class="$EvenOdd<% if FirstLast %> $FirstLast <% end_if %> $SpamClass">
						<% include ImageCommentInterface_singlecomment %>
					</li>
				<% end_control %>
			</ul>
			
			<% if Comments.MoreThanOnePage %>
				<div id="PageCommentsPagination">
					<p>
					<% if Comments.PrevLink %>
						<a href="$Comments.PrevLink">&laquo; Zurück</a>
					<% end_if %>
					
					<% if Comments.Pages %>
						<% control Comments.Pages %>
							<% if CurrentBool %>
								<strong>$PageNum</strong>
							<% else %>
								<a href="$Link">$PageNum</a>
							<% end_if %>
						<% end_control %>
					<% end_if %>
	
					<% if Comments.NextLink %>
						<a href="$Comments.NextLink">Weiter &raquo;</a>
					<% end_if %>
					</p>
				</div>
			<% end_if %>
		<% else %>
			<p id="NoComments">Zu diesem Foto gibt es noch keine Anmerkungen.</p>
		<% end_if %>
	</div>
	
	<% if CanPostComment %>
		<h4>Eine Anmerkungen schreiben</h4>
		
		$PostCommentForm
		
	<% else %>
		<p>Du kannst erst eine Anmerkung schreiben, nachdem du dich angemeldet hast. Bitte <a href="Security/login?BackURL={$Page.URLSegment}/" title="Login to post a comment">melde dich hier an</a>.</p>
	<% end_if %>
	
	<br class="clear" />
	
	<p id="CommentsRSSFeed">
		<a class="commentrss" href="$CommentRssLink">RSS Feed von Anmerkungen zu diesem Foto</a> | 
		<a href="PageComment/rss" class="commentrss" title="Alle Anmerkungen anzeigen">RSS Feed aller Anmerkungen</a>
	</p>
</div>
	
