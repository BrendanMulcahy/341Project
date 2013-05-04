<?php
require_once 'constants.php';
$username = getInput('username');
$suggestionID = getInput('suggestionid');
$vote = getInput('vote');
$dbh = new mysqli(HOST,USER,PW, DB);
$output="";
$userID="";
if(!(isset($username) && isset($suggestionID) && isset($vote))){
	echo "Error: getGuide requires the following variables [suggestionID]";
	exit;
}
if ($dbh->connect_errno) {
    echo "Failed to connect to MySQL: (" . $dbh->connect_errno . ") " . $dbh->connect_error;
	exit;
}
if (!$stmt = $dbh->prepare("SELECT U.userID FROM user U WHERE U.userName=?")) {
	echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
	exit;
}
elseif(!$stmt->bind_param("s", $username)){
	echo "bind_param returned false!";
	exit;
}
elseif (!$stmt->execute()) {
	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	exit;
}elseif(!$stmt->bind_result($a)){
	echo "Bind Result failed: (" . $stmt->errno . ") " . $stmt->error;
	exit;
}
else{
	while ($row = $stmt->fetch()) {	
		$userID=$a;
	}
}
if($userID==""){
	echo "ERROR: userID not found for ".$username;
	exit;
}
if (!$stmt = $dbh->prepare("SELECT V.vote, V.userID FROM vote V WHERE V.userID=? AND V.suggestionID=?")) {
	echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
	exit;
}
elseif(!$stmt->bind_param("ss",$userID, $suggestionID)){
	echo "bind_param returned false!";
	exit;
}
elseif (!$stmt->execute()) {
	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	exit;
}
elseif(!$stmt->bind_result($a, $b)){
	echo "Bind Result failed: (" . $stmt->errno . ") " . $stmt->error;
	exit;
}
else{
	while ($row = $stmt->fetch()) {
		$output=$a;	
		$userID=$b;
	}
}

if($output !="" && $userID != ""){
	updateVote($userID, $suggestionID, $vote, $dbh);
}else{
	createVote($userID, $suggestionID, $vote, $dbh);
}

function updateVote($userID, $suggestionID, $vote, $dbh){
	if($vote=="no"){
		if (!$stmt = $dbh->prepare("DELETE FROM vote WHERE userID=? AND suggestionID=?")) {
			echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
			exit;
		}
		elseif(!$stmt->bind_param("ii", $userID, $suggestionID)){
			echo "bind_param returned false!";
			exit;
		}
		elseif (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit;
		}
		echo "Successfully updated vote!";
	}else{	
		if (!$stmt = $dbh->prepare("UPDATE vote V SET V.vote=? WHERE V.suggestionID=? AND V.userID=?")) {
			echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
			exit;
		}
		elseif(!$stmt->bind_param("sii",$vote, $suggestionID, $userID)){
			echo "bind_param returned false!";
			exit;
		}
		elseif (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit;
		}
		echo "Successfully updated vote!";
	}
}

function createVote($userID, $suggestionID, $vote, $dbh){
	if (!$stmt = $dbh->prepare("INSERT INTO `dota2admin`.`vote` (`suggestionID`, `userID`, `vote`)
				VALUES (?,?,?)")) {
		echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
		exit;
	}
	elseif(!$stmt->bind_param("iis",$suggestionID, $userID, $vote)){
		echo "bind_param returned false!";
		exit;
	}
	elseif (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		exit;
	}
	echo "Successfully created vote!";
}

function getInput($input) {
	$temp = strip_tags(substr($_POST[$input],0, 100));
	$temp = mysql_real_escape_string($temp);
	return $temp;
}

?>
