<?php
//Used by thread.php
//Creates an insert sql query based on the data
//submitted by the user on the comment.php
//Used in an Ajax call.

require_once 'constants.php';

$mysqli = new mysqli(HOST,USER,PW, DB)
or die('Could not connect to mysql server.' );

//Get all the input data
$suggestionID = getInput('suggestionID');
$userName = getInput('userName');
$date = date("Y-m-d H:i:s");
$comment = getInput('comment');

//make the insert
$sql = "	INSERT INTO `dota2admin`.`post` (`postID`, `suggestionID`, `userName`, `dateCreated`, `comment`) 
				VALUES (NULL,
						'$suggestionID',
						'$userName',
						'$date',
						'$comment')";

if ($result = $mysqli->query ( $sql )){
	echo $mysqli->insert_id;
}
else{
	echo -1;
}
function getInput($input) {
	$temp = strip_tags(substr($_POST[$input],0, 1000));
	$temp = mysql_real_escape_string($temp);
	return $temp;
}

