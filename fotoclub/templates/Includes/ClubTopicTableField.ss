<div id="$id" class="$CSSClasses">
	<div class="CommentFilter filterBox">
		$SearchForm
	</div>
	<% include TableListField_PageControls %>
	<table class="data">
		<thead>
			<tr>
				<% control Headings %>
				<th class="$Name">
					$Title
				</th>
				<% end_control %>
				<% if Can(edit) %><th width="18">&nbsp;</th><% end_if %>
				<% if Can(delete) %><th width="18">&nbsp;</th><% end_if %>
			</tr>
		</thead>
		<tfoot>
			<% if can(add) %>
			 <tr class="addtogrouprow">
				$AddRecordForm.CellFields
				<td class="actions" colspan="3">$AddRecordForm.CellActions</td>
			</tr>
			<% end_if %>
		</tfoot>
		<tbody>
			<% if Items %>
			<% control Items %>
				<tr id="record-$Parent.id-$ID"<% if HighlightClasses %> class="$HighlightClasses"<% end_if %>>
					<% control Fields %>
					<td>$Value</td>
					<% end_control %>
					<% if Can(edit) %>
						<td width="18"><a class="popuplink editlink" href="$EditLink" target="_blank"><img src="cms/images/edit.gif" alt="<% _t('EDIT', 'edit') %>" /></a></td>
					<% end_if %>
					<% if Can(delete) %>
						<td width="18"><a class="deletelink" href="$DeleteLink" title="<% _t('DELETEROW', 'Delete this row') %>"><img src="cms/images/delete.gif" alt="<% _t('DELETE', 'delete') %>" /></a></td>
					<% end_if %>
				</tr>
			<% end_control %>
			<% end_if %>
		</tbody>
	</table>
</div>
