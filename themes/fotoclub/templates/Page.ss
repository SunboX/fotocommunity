<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
		<% base_tag %>
		<title>$MetaTitle</title>
		$MetaTags(false)
		<link rel="shortcut icon" href="$BaseURL/themes/fotoclub/favicon.ico" />
		
		<% require themedCSS(layout) %> 
		<% require themedCSS(typography) %> 
		<% require themedCSS(form) %> 
		
	</head>
<body>

	<div id="wrap">
    
    	<div id="my">

            <ul class="usr">
            	<% if CurrentMember %> 
                    <li><a href="private-messages/">Nachrichten ($NumNewMessages)</a></li>
					<% if CurrentMember.IsAdmin %>
					<li><a href="admin/">Administration</a></li>
					<% end_if %>
                    <li><a href="Security/logout/">Logout</a></li>
                <% else %>
                    <li><a href="registrierung/">Registrieren</a></li>
                    <li><a href="Security/login/">Login</a></li>
                <% end_if %>
            </ul>
                                                  
        </div>
          	
        <div id="header">	
            <a href="#"><span>FotoClub</span></a>
        </div>
        
        <div id="menu">
        	<% include MainMenu %>
		</div>

		<div id="sub">
			<% include SubMenu %>
           
			<div id="mainsearch">
            	$SearchForm
            </div>
		</div>

		<div id="content">
			$Layout
		</div>

		<div id="footer">
			<% include Footer %>
		</div>
        
	</div>

</body>
</html>
