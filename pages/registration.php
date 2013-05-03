<?php
session_start();
require_once '../php/Membership.php';
$membership = new Membership();

$membership->already_Logged_In();

// Did the user enter a password/username and click submit?
if($_POST && !empty($_POST['username']) && !empty($_POST['pwd']) && !empty($_POST['pwd2']) && !empty($_POST['email'])) {
	$response = $membership->register_user($_POST['username'], $_POST['pwd'], $_POST['pwd2'], $_POST['email']);
}
														

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dota 2 Alt-Tab Registration</title>
</head>

<body>
<div id="login">
	<form method="post" action="">
    	<h2>Register <small>for Dota 2 Alt-Tab</small></h2>
        <p>
        	<label for="username">Username: </label>
            <input type="text" name="username" />
        </p>
        
        <p>
        	<label for="pwd">Password: </label>
            <input type="password" name="pwd" />
        </p>
		
		<p>
        	<label for="pwd2">Verify Password: </label>
            <input type="password" name="pwd2" />
        </p>
		
		<p>
        	<label for="email">Email: </label>
            <input type="text" name="email" />
        </p>
        
        <p>
        	<input type="submit" id="submit" value="Submit" name="submit" />
        </p>
    </form>
    <?php if(isset($response)) echo "<h1>" . $response . "</h1>"; ?>
</div>
</body>
</html>