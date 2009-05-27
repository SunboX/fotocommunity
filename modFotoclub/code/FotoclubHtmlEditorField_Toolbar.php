<?

class FotoclubHtmlEditorField_Toolbar extends HtmlEditorField_Toolbar
{	
	function Buttons()
	{
		return new DataObjectSet(
			new HtmlEditorField_button("Bold","bold",_t('HtmlEditorField.BUTTONBOLD', "Bold (Ctrl+B)")),
			new HtmlEditorField_button("Italic","italic",_t('HtmlEditorField.BUTTONITALIC', "Italic (Ctrl+I)")),
			new HtmlEditorField_button("Underline","underline", _t('HtmlEditorField.BUTTONUNDERLINE', "Underline (Ctrl+U)")),
			new HtmlEditorField_button("Strikethrough","strikethrough", _t('HtmlEditorField.BUTTONSTRIKE', "strikethrough")),
			
			new HtmlEditorField_separator(),
			
			new HtmlEditorField_button("Undo","undo",_t('HtmlEditorField.UNDO', "Undo (Ctrl+Z)")),
			new HtmlEditorField_button("Redo","redo",_t('HtmlEditorField.REDO', "Redo (Ctrl+Y)")),
			new HtmlEditorField_button("mceCharMap","charmap",_t('HtmlEditorField.CHARMAP', "Insert symbol")),
			
			new HtmlEditorField_break(),
			
			new HtmlEditorField_button("Cut","cut",_t('HtmlEditorField.CUT', "Cut (Ctrl+X)")),
			new HtmlEditorField_button("Copy","copy",_t('HtmlEditorField.COPY', "Copy (Ctrl+C)")),
			
			new HtmlEditorField_separator(),
			
			new HtmlEditorField_button("ssLink","link",_t('HtmlEditorField.LINK', "Insert/edit link for highlighted text")),
			new HtmlEditorField_button("unlink","unlink",_t('HtmlEditorField.UNLINK', "Remove link"))
		);
	}
}

?>