<?php
require_once '../php/Membership.php';
$membership = new Membership();

$membership->confirm_Member('changePassword');

// Did the user enter a password and click submit?
if($_POST && !empty($_SESSION['username']) && !empty($_POST['oldpwd']) && !empty($_POST['newpwd']) && !empty($_POST['newpwd2'])) {
	$response = $membership->change_password($_SESSION['username'], $_POST['oldpwd'], $_POST['newpwd'], $_POST['newpwd2']);
}
														

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dota 2 Alt-Tab Guides</title>
</head>

<body>
<div id="login">
	<form method="post" action="">
    	<h2>Change Password <small>for Dota 2 Alt-Tab</small></h2>
		<p>
		<h3>Hello, <?php echo $_SESSION['username'] ?>!</h3>
		
		
        <p>
        	<label for="oldpwd">Old Password: </label>
            <input type="password" name="oldpwd" />
        </p>
        
        <p>
        	<label for="newpwd">New Password: </label>
            <input type="password" name="newpwd" />
        </p>
		
		<p>
        	<label for="newpwd2">Verify Password: </label>
            <input type="password" name="newpwd2" />
        </p>
        
        <p>
        	<input type="submit" id="submit" value="Submit" name="submit" />
        </p>
    </form>
    <?php if(isset($response)) echo "<h1>" . $response . "</h1>"; ?>
</div>
</body>
</html>