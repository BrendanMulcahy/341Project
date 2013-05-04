<?php

//SELECT S.suggestionID, U.userName, S.dateCreated, S.title, S.description, S.guideID, UV.upVotes - DV.downVotes FROM suggestion S, user U, (SELECT S1.suggestionID, COUNT(V1.vote) AS upVotes FROM vote V1, suggestion S1 WHERE V1.suggestionID=S1.suggestionID AND V1.vote='up' GROUP BY S1.suggestionID) UV, (SELECT S2.suggestionID, COUNT(V2.vote) AS downVotes FROM vote V2, suggestion S2 WHERE V2.suggestionID=S2.suggestionID AND V2.vote='down' GROUP BY S2.suggestionID) DV WHERE U.userID=S.userID AND UV.suggestionID=DV.suggestionID AND UV.suggestionID=S.suggestionID ORDER BY dateCreated DESC limit ?,?
function getPage($username, $page){
	
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
	if (!$stmt = $dbh->prepare("SELECT S.suggestionID, U.userName, S.dateCreated, S.title, S.description, S.guideID FROM suggestion S, user U WHERE U.userID=S.userID ORDER BY dateCreated DESC limit ?,?")) {
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
		while ($row = $stmt->fetch()) {
			$output[$a] = json_encode(array(
						   "suggestionID" => $a,
						   "userName" => $b,
						   "dateCreated" => $c, 
						   "title" => $d, 
						   "description" => $e, 
						   "guideID" => $f,
						   "upVotes" => 0,
						   "vote" => "no"
						   ));
		}
	}if (!$stmt = $dbh->prepare("SELECT S.suggestionID, UV.upVotes 
				     FROM suggestion S, 
					(SELECT S1.suggestionID, COUNT(V1.vote) AS upVotes 
					FROM vote V1, suggestion S1 
					WHERE V1.suggestionID=S1.suggestionID AND V1.vote='up' GROUP BY S1.suggestionID) UV
				     WHERE UV.suggestionID=S.suggestionID")) {
		echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
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
			if(isset($output[$a])){
				$temp = json_decode($output[$a], true);
				$temp['upVotes']=$b;
				$output[$a]=json_encode($temp);
			}		
		}
	}if (!$stmt = $dbh->prepare("SELECT S.suggestionID, DV.downVotes 
				     FROM suggestion S,
					(SELECT S2.suggestionID, COUNT(V2.vote) AS downVotes 
					FROM vote V2, suggestion S2 
					WHERE V2.suggestionID=S2.suggestionID AND V2.vote='down' GROUP BY S2.suggestionID) DV 
				     WHERE DV.suggestionID=S.suggestionID")) {
		echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
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
			if(isset($output[$a])){
				$temp = json_decode($output[$a], true);
				$temp['upVotes']-=$b;
				$output[$a]=json_encode($temp);
			}		
		}
	}
	if($username!=-1){
		
		if (!$stmt2 = $dbh->prepare("SELECT V.vote, V.suggestionID FROM vote V WHERE V.userID=(SELECT U.userID FROM user U WHERE U.userName=?)")) {
			echo "Prepare failed: (" . $dbh->errno . ") " . $dbh->error;
			exit;
		}
		elseif(!$stmt2->bind_param("s", $username)){
			echo "bind_param returned false!";
			exit;
		}
		elseif (!$stmt2->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			exit;
		}
		elseif(!$stmt2->bind_result($a, $b)){
			echo "Bind Result failed: (" . $stmt->errno . ") " . $stmt->error;
			exit;
		}
		else{

			while ($row = $stmt2->fetch()) {
				
				if(isset($output[$b])){
					$temp = json_decode($output[$b], true);
					$temp['vote']=(string)$a;
				
					$output[$b]=json_encode($temp);
				}		
			}
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
