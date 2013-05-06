<?php
//Navigation Bar
echo "<head>
	  <meta name=\"description\" content=\"Dota 2 Alt-Tab is a simple site with quick and easy guides to every hero in Dota 2.  Great for players to learn the standard skill and item builds.\">
	  <meta name=\"keywords\" content=\"dota2, dota 2, guides, guide, alt-tab, alttab, builds, skills, items, dota, playdota, hero, heroes, defense, ancients\">
	  <meta name=\"author\" content=\"Brendan Mulcahy\">
	  <meta charset=\"utf-8\">
	  <title>Dota 2 Alt-Tab Guides</title>
	  <link rel=\"shortcut icon\" href=\"../images/favicon.ico\" >
	  <link rel=\"stylesheet\" href=\"../css/guide.css?v=9\" >
	  <script type=\"text/javascript\">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-34781660-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	  </script>
	</head>
	<body>
		<div id=\"textbox\">
			<div class=\"alignleft\">
				<a href=\"index.php\">Home</a>&nbsp;<a href=\"SuggestionList.php\">Suggestions Forum</a>&nbsp;<a href=\"alttab_suggestion.php\">Submit a Suggestion</a>
				
			</div>
			<div class=\"alignright\">";
				
					if(isset($_SESSION['username'])) {
						echo "Welcome, " . $_SESSION['username'] . "!&nbsp;<a href=\"changePassword.php\">Change Password</a>&nbsp;";
					}

					if (isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
						echo "<a href=\"index.php?status=loggedout\">Log Out</a>";
					} else {
						echo "<a href=\"login.php?target=index\">Log In</a>&nbsp;<a href=\"registration.php\">Register</a>";
					}
				echo"
			</div>
		</div>
		<div style=\"clear: both;\"></div>
		<h1 class=\"title\"><a href=\"./#\"><img src=\"../images/banner.png\"></a></h1>";
?>
