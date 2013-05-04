<?php
function getPage($page){
	require_once 'constants.php';

	if(isset($_GET['page']))
	{
		$pagenumber=$_GET['page'];	
	}else{
		$pagenumber=$page;
	}
	$dbh = new mysqli(HOST,USER,PW, DB);
	$output=array();

	if(!(isset($pagenumber) )){
		echo "Error: getGuide requires the following variables [suggestionID]";
		exit;
	}
	$first = ($pagenumber*10-10);
	$last = ($pagenumber*10);

	if ($dbh->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $dbh->connect_errno . ") " . $dbh->connect_error;
		exit;
	}

	if (!$stmt = $dbh->prepare("SELECT * FROM suggestion ORDER BY dateCreated DESC limit ?,?")) {
		echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
		exit;
	}
	elseif(!$stmt->bind_param("ii", $first, $last)){
		echo "bind_param returned false!";
		exit;
	}
	elseif (!$stmt->execute()) {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		exit;
	}
	elseif(!$stmt->bind_result($a, $b, $c, $d, $e, $f)){
		echo "Bind Result failed: (" . $stmt->errno . ") " . $stmt->error;
		exit;
	}
	else{
		$cnt=0;
		while ($row = $stmt->fetch()) {
			$output[$cnt] = json_encode(array(
						   "suggestionID" => $a,
						   "userID" => $b,
						   "dateCreated" => $c, 
						   "title" => $d, 
						   "description" => $e, 
						   "guideID" => $f
						   ));
			$cnt++;
		}
	}
	return $output;
}
function getInput($input) {
	$temp = strip_tags(substr($_POST[$input],0, 100));
	$temp = mysql_real_escape_string($temp);
	return $temp;
}
?>
