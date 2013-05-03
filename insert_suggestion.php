<?php

require_once 'constants.php';

$mysqli = new mysqli(HOST,USER,PW, DB)
or die('Could not connect to mysql server.' );

//Get all the input data
$heroName = getInput('hero_Name');
$skills = array();
$starting = array();
$core = array();
$extension = array();

//create a map for item display name to dotaID
$itemsMap = array();
$itemsSQL = "SELECT dotaID, displayName FROM item";
$itemInfo = $mysqli->query ( $itemsSQL );
while(list($dotaID, $displayName) = $itemInfo->fetch_row()) {
	$itemsMap[$displayName] = $dotaID;
}

for($i = 1; $i < 19; $i++) {
	$skills[$i] = getInput('skill_' . $i);
}

for($i = 1; $i < 11; $i++) {
	$starting[$i] = getInput('starting_' . $i);
}

for($i = 1; $i < 11; $i++) {
	$core[$i] = getInput('core_' . $i);
}

for($i = 1; $i < 11; $i++) {
	$extension[$i] = getInput('extension_' . $i);
}

$skillBuild = formatSkills($skills);
$startingBuild = formatItems($starting, $itemsMap);
$coreBuild = formatItems($core, $itemsMap);
$extensionBuild = formatItems($extension, $itemsMap);

//make the insert
$sql = "	INSERT INTO `dota2admin`.`guide` (`guideID`, `heroName`, `buildName`, `skillBuild`, `starting`, `core`, `extension`, `notes`) 
				VALUES (NULL,
						'$heroName',
						'Standard',
						'$skillBuild',
						'$startingBuild',
						'$coreBuild',
						'$extensionBuild',
						'This is a guide made with the suggestion form!')";

if ($result = $mysqli->query ( $sql ))
	echo 'Success! ' . $heroName;
else
	echo 'Failure! ' . $heroName;
	echo $mysqli->error;

function getInput($input) {
	$temp = strip_tags(substr($_POST[$input],0, 100));
	$temp = mysql_real_escape_string($temp);
	return $temp;
}

function formatSkills($skills) {
	$temp = '';
	for($i = 1; $i < 19; $i++) {
		$temp .= $skills[$i];
	}
	return $temp;
}

function formatItems($items, $itemsMap) {	
	$temp = '';
	foreach($items as $item) {
		if($item !== 'None') {
			$temp .= $itemsMap[$item].',';
		}
	}
	return $temp;
}
?>