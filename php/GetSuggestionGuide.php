<?php
require_once 'constants.php';
$suggestionID = getInput('suggestionid');
$dbh = new mysqli(HOST,USER,PW, DB);
$output;
if ($dbh->connect_errno) {
    echo "Failed to connect to MySQL: (" . $dbh->connect_errno . ") " . $dbh->connect_error;
	exit;
}
if(!(isset($suggestionID) )){
	echo "Error: getGuide requires the following variables [suggestionID]";
	exit;
}

if (!$stmt = $dbh->prepare("SELECT G.guideID, G.heroName, G.buildName, G.skillBuild, G.starting, G.core, G.extension, G.notes FROM guide G, suggestion S WHERE G.guideID = S.guideID AND S.suggestionID=?")) {
	echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
	exit;
}
elseif(!$stmt->bind_param("s", $suggestionID)){
	echo "bind_param returned false!";
	exit;
}
elseif (!$stmt->execute()) {
	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	exit;
}
elseif(!$stmt->bind_result($a, $b, $c, $d, $e, $f, $g, $h)){
	echo "Bind Result failed: (" . $stmt->errno . ") " . $stmt->error;
	exit;
}
else{
	while ($row = $stmt->fetch()) {
		$output = json_encode(array(
					   "guideID" => $a,
					   "heroID" => $b,
					   "buildName" => $c, 
					   "skillBuild" => $d, 
					   "starting" => $e, 
					   "core" => $f, 
					   "extension" => $g, 
					   "notes" => $h
					   ));
	  }
}
return $output;

function getInput($input) {
	$temp = strip_tags(substr($_POST[$input],0, 100));
	$temp = mysql_real_escape_string($temp);
	return $temp;
}
?>