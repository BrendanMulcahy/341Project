<?php

require_once '../php/Membership.php';
$membership = new Membership();

$membership->confirm_Member();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dota 2 Alt-Tab Guides</title>
</head>

<body>

<div id="container">
	<p>
    	WELCOME <?php echo $_SESSION['username'] ?> TO DOTA 2 ALT-TAB.COM ~~~ THE BEST WEBSITE EVER!!!!
    </p>
	<a href="changePassword.php">Change Password</a>
    <a href="login.php?status=loggedout">Log Out</a>
</div>

</body>
</html>
