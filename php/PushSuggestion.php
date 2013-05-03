<?php
require_once 'constants.php';

$dbh = new mysqli(HOST,USER,PW, DB);
$username = getInput('username');
$title = getInput('title');	
$description = getInput('description');
$date = date('Y-m-d H:i:s');
$guideid = getInput('guideid');

if(!( isset($title) && isset($description) && isset($date) && isset($guideid) )){
	echo "Error: Not all variables set";
	exit;
}
else{
	

	if ($dbh->connect_errno) {
		echo "Failed to connect to MySQL: (" . $dbh->connect_errno . ") " . $dbh->connect_error;
		exit;
	}
	if (!$stmt = $dbh->prepare("INSERT INTO `dota2admin`.`suggestion` (`suggestionID`, `userID`, `dateCreated`, `title`, `description`, `guideID`)
					VALUES (NULL,
						(SELECT U.userID FROM `dota2admin`.`user` U WHERE U.userName=?),
						?,
						?,
						?,
						?
						)")) {
		echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
		exit;
	}
	elseif(!$stmt->bind_param("ssssi", $username, $date, $title, $description, $guideid)){
		echo "bind_param returned false!";
		exit;
	}
	elseif (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		exit;
	}
	else{
		echo $dbh->insert_id;	
	}

}
function getInput($input) {
	$temp = strip_tags(substr($_POST[$input],0, 100));
	$temp = mysql_real_escape_string($temp);
	return $temp;
}

?>
