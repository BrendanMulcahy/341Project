<?php
require '../php/generateGuide.php';
require_once '../php/Membership.php';
$membership = new Membership();
$membership->already_Logged_In();
$membership->confirm_Member('suggest');

include '../php/navigation.php';

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
}

?>
<html>
<head>
	<link rel="stylesheet" href="../css/guide.css?v=9" >
</head>
<body>
<div class="section">
<?php echo generateGuideWithSuggestionID($id); ?>
</div>
</body>
</html>
