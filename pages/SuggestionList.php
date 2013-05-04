<?php

require_once '../php/Membership.php';
$membership = new Membership();

$membership->confirm_Member();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Dota 2 Alt-Tab Suggestion Form</title>
    <!--<link rel="stylesheet" type="text/css" href="common.css" /> -->
	<link rel="stylesheet" href="../css/suggestion.css" >
	<script src="../js/jquery.js"></script>
  </head>
  <body>
    <h1>Dota 2 Alt-Tab Suggestions</h1>

    <form name="suggestion" id="suggestion" action="" method="get">
      <div style="width: 25em;">
	<?php
		include("../php/GetSuggestions.php");
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}else{
			$page=1;
		}
		$result=getPage($page);
		foreach($result as $value){
			$decode=json_decode($value,true);
			echo $decode['title'];
		}
		
				
	?>
      </div>
    </form>
  </body>
</html>
