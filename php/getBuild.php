<?php

require_once '../php/constants.php';

$mysqli = new mysqli(HOST,USER,PW, DB)
or die('Could not connect to mysql server.' );

$selectedHero = strip_tags(substr($_POST['hero_Name'],0, 100));
$selectedHero = mysql_real_escape_string($selectedHero);

$skillsSQL = "SELECT skillQ, skillW, skillE, skillR FROM hero WHERE heroName = '$selectedHero'";

$skillInfo = $mysqli->query ( $skillsSQL );

$string = '';

$string .= "<label for=\"heroDescription\">Hero Description:</label>";
$string .= "<textarea rows=\"4\" cols=\"50\" id=\"heroDescription\"></textarea>";	
		

list($skillQ, $skillW, $skillE, $skillR) = $skillInfo->fetch_row();
for ($i = 1; $i < 19; $i++) {
	$string .= "<p>";
	$string .= "<label for=\"skillMenu$i\">Select Skill $i:</label>";
	$string .= "<select class=\"Q\" name=\"skillMenu$i\" id=\"skillMenu$i\" size=\"1\" onchange=\"skill_change(this)\">";
	$string .= "<option class=\"Q\" value=\"Q\">$skillQ</option>";
	$string .= "<option class=\"W\" value=\"W\">$skillW</option>";
	$string .= "<option class=\"E\" value=\"E\">$skillE</option>";
	$string .= "<option class=\"R\" value=\"R\">$skillR</option>";
	$string .= "<option class=\"S\" value=\"S\">Attribute Bonus</option>";
	$string .= "</select>";
}
$string .= "<p>";
$string .= "<h2>Starting Items</h2>";
for ($i = 1; $i < 11; $i++) {
	$string .= "<p>";
	$string .= "<label for=\"startingItemMenu$i\">Select Item $i:</label>";
	$string .= "<select class=\"select\" name=\"startingItemMenu$i\" id=\"startingItemMenu$i\" size=\"1\">";
	$itemsSQL = "SELECT displayName FROM item";
	$itemInfo = $mysqli->query ( $itemsSQL );
	$string .= "<option class=\"select\" value=\"None\">None</option>";
	while(list($displayName) = $itemInfo->fetch_row()) {
		$string .= printOption($displayName, $displayName);
	}
	$string .= "</select>";
}
$string .= "<p>";
$string .= "<h2>Core Items</h2>";
for ($i = 1; $i < 11; $i++) {
	$string .= "<p>";
	$string .= "<label for=\"coreItemMenu$i\">Select Item $i:</label>";
	$string .= "<select class=\"select\" name=\"coreItemMenu$i\" id=\"coreItemMenu$i\" size=\"1\">";
	$itemsSQL = "SELECT displayName FROM item";
	$itemInfo = $mysqli->query ( $itemsSQL );
	$string .= "<option class=\"select\" value=\"None\">None</option>";
	while(list($displayName) = $itemInfo->fetch_row()) {
		$string .= printOption($displayName, $displayName);
	}
	$string .= "</select>";
}
$string .= "<p>";
$string .= "<h2>Extension Items</h2>";
for ($i = 1; $i < 11; $i++) {
	$string .= "<p>";
	$string .= "<label for=\"extensionItemMenu$i\">Select Item $i:</label>";
	$string .= "<select class=\"select\" name=\"extensionItemMenu$i\" id=\"extensionItemMenu$i\" size=\"1\">";
	$itemsSQL = "SELECT displayName FROM item";
	$itemInfo = $mysqli->query ( $itemsSQL );
	$string .= "<option class=\"select\" value=\"None\">None</option>";
	while(list($displayName) = $itemInfo->fetch_row()) {
		$string .= printOption($displayName, $displayName);
	}
	$string .= "</select>";
}

$string .= "<label for=\"heroTips\">Hero Tips:</label>";
$string .= "<textarea rows=\"4\" cols=\"50\" id=\"heroTips\"></textarea>";

echo $string;

function printOption($optionText, $optionValue) {
	$selectedHero = strip_tags(substr($_POST['hero_Name'],0, 100));
	$selectedHero = mysql_real_escape_string($selectedHero);
	if ($optionValue == $selectedHero) {
		return "<option class=\"select\" value=\"$optionValue\" selected=\"selected\">$optionText</option>";
	} else {
		return "<option class=\"select\" value=\"$optionValue\">$optionText</option>";
	}
}
?>