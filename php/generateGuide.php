<?php
require_once '../php/constants.php';

//build item map
$mysqli = new mysqli(HOST,USER,PW, DB)
or die('Could not connect to mysql server.' );

$sql = "SElECT dotaID, displayName
		FROM item";
$displayInfo = $mysqli->query ( $sql );

$itemMap = array();
while(list($dotaID, $displayName) = $displayInfo->fetch_row()) {
	$itemMap[$dotaID] = $displayName;
}

//Generates a properly formatted guide using only the guide ID
//Creates a single HTML string which is returned and can be echo'd
function generateGuide($guideID) {
	global $mysqli;
	//$mysqli = new mysqli(HOST,USER,PW, DB)
	//or die('Could not connect to mysql server.' );

	$guideSQL = "SELECT `heroName`, `description`, `buildName`, `skillBuild`, `starting`, `core`, `extension`, `tips`
				 FROM `guide`
				 WHERE `guideID` = '$guideID'";
	$guideInfo = $mysqli->query ( $guideSQL );
	list($heroName, $description, $buildName, $skillBuild, $starting, $core, $extension, $tips) = $guideInfo->fetch_row();

	$skillsSQL = "SELECT wikiName, skillQ, skillW, skillE, skillR
				  FROM hero
				  WHERE heroName = '$heroName'";

	$skillInfo = $mysqli->query ( $skillsSQL );
	list($wikiName, $skillQ, $skillW, $skillE, $skillR) = $skillInfo->fetch_row();

	$output = '';

	$output .= "<div class=\"guide\" id=\"" . getAbbreviation($heroName) . "\">";
	$output .= "<div class=\"guideHeader\">";
	$output .= "<span class=\"s_herobig si_" . getAbbreviation($heroName) . "\" title=\"$heroName\"></span>";
	$output .= "<h2>$heroName</h2>";
	$output .= "<div class=\"nav\">";
	$output .= "<a href=\"http://dota2wiki.com/wiki/$heroName\" target=\"_blank\">Detailed Info</a>";
	$output .= "<a href=\"#" . getAbbreviation($heroName) . "\">Permalink</a>";
	$output .= "<a href=\"#\">Back to top</a></div></div><div class=\"guideBody\">";
	$output .= "<div class=\"tip\">$description</div><div class=\"tabs\"><div class=\"tab active\">";
	$output .= "<h3>$buildName</h3></div><div class=\"pane visible\"><div class=\"paneContents\"><table class=\"skillBuild\">";
	$output .= "<tr>";
	$output .= "<td class=\"tn\">1</td><td class=\"" . $skillBuild{0} . "\">" . getSkillName($skillBuild{0}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">7</td><td class=\"" . $skillBuild{6} . "\">" . getSkillName($skillBuild{6}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">13</td><td class=\"" . $skillBuild{12} . "\">" . getSkillName($skillBuild{12}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "</tr><tr>";
	$output .= "<td class=\"tn\">2</td><td class=\"" . $skillBuild{1} . "\">" . getSkillName($skillBuild{1}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">8</td><td class=\"" . $skillBuild{7} . "\">" . getSkillName($skillBuild{7}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">14</td><td class=\"" . $skillBuild{13} . "\">" . getSkillName($skillBuild{13}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "</tr><tr>";
	$output .= "<td class=\"tn\">3</td><td class=\"" . $skillBuild{2} . "\">" . getSkillName($skillBuild{2}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">9</td><td class=\"" . $skillBuild{8} . "\">" . getSkillName($skillBuild{8}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">15</td><td class=\"" . $skillBuild{14} . "\">" . getSkillName($skillBuild{14}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "</tr><tr>";
	$output .= "<td class=\"tn\">4</td><td class=\"" . $skillBuild{3} . "\">" . getSkillName($skillBuild{3}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">10</td><td class=\"" . $skillBuild{9} . "\">" . getSkillName($skillBuild{9}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">16</td><td class=\"" . $skillBuild{15} . "\">" . getSkillName($skillBuild{15}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "</tr><tr>";
	$output .= "<td class=\"tn\">5</td><td class=\"" . $skillBuild{4} . "\">" . getSkillName($skillBuild{4}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">11</td><td class=\"" . $skillBuild{10} . "\">" . getSkillName($skillBuild{10}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">17</td><td class=\"" . $skillBuild{16} . "\">" . getSkillName($skillBuild{16}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "</tr><tr>";
	$output .= "<td class=\"tn\">6</td><td class=\"" . $skillBuild{5} . "\">" . getSkillName($skillBuild{5}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">12</td><td class=\"" . $skillBuild{11} . "\">" . getSkillName($skillBuild{11}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "<td class=\"tn\">18</td><td class=\"" . $skillBuild{17} . "\">" . getSkillName($skillBuild{17}, $skillQ, $skillW, $skillE, $skillR) . "</td>";
	$output .= "</tr></table></div></div></div><div class=\"tabs\"><div class=\"tab active\">";
	$output .= "<h3>Items</h3></div><div class=\"pane visible\"><div class=\"paneContents\">";
	$output .= "<table class=\"itemBuild\"><tr><th>Starting</th><td>";
	
	//generate the starting items strings
	$start = 0;
	$end = strpos($starting, ',', $start);
	while ($end !== false) {
		$dotaID = substr($starting, $start, $end - $start);
		//echo "Dota ID should be: " . $dotaID . ", and it is: ";
		$output .= "<span class=\"s_item si" . substr($dotaID, 4) . "\" title=\"" . getItemDisplay($dotaID) . "\"></span>";
		$start = $end + 1;
		$end = strpos($starting, ',', $start);
	}
	
	$output .= "</td></tr><tr><th>Core</th><td>";
	
	//generate the core items strings
	$start = 0;
	$end = strpos($core, ',', $start);
	while ($end !== false) {
		$dotaID = substr($core, $start, $end - $start);
		//echo "Dota ID should be: " . $dotaID . ", and it is: ";
		$output .= "<span class=\"s_item si" . substr($dotaID, 4) . "\" title=\"" . getItemDisplay($dotaID) . "\"></span>";
		$start = $end + 1;
		$end = strpos($core, ',', $start);
	}

	$output .= "</td></tr><tr><th>Extension</th><td>";
	
	//generate the extension items strings
	$start = 0;
	$end = strpos($extension, ',', $start);
	while ($end !== false) {
		$dotaID = substr($extension, $start, $end - $start);
		//echo "Dota ID should be: " . $dotaID . ", and it is: ";
		$output .= "<span class=\"s_item si" . substr($dotaID, 4) . "\" title=\"" . getItemDisplay($dotaID) . "\"></span>";
		$start = $end + 1;
		$end = strpos($extension, ',', $start);
	}

	$output .= "</td></tr></table></div></div></div><div class=\"tabs\"><div class=\"tab active\"><h3>Tips</h3>";
	$output .= "</div><div class=\"pane visible\"><div class=\"paneContents\">";
	$output .= "<div class=\"tip\">$tips</div>";
	$output .= "</div></div></div></div></div>";
				
	return $output;
}

//Generates a guide using a suggestionID instead of a
//Guide ID directly.  Finds the guide ID associated with
//the suggestion and then calls the generateGuide function
function generateGuideWithSuggestionID($suggestionID) {
	global $mysqli;

	$guideIDSQL = "SELECT guideID 
				   FROM suggestion
				   WHERE suggestionID = '$suggestionID'";
	$idInfo = $mysqli->query ( $guideIDSQL );
	list($guideID) = $idInfo->fetch_row();
	
	return generateGuide($guideID);
}

//Returns the commonly used abbreviation for a hero
//given that hero's name.  Uses a map and looks up the
//value.
function getAbbreviation($heroName) {
	global $heroMap;
	return $heroMap[$heroName];
}

//Outputs the appropriate skill name based on $skill, given the
//skill names listed in $skillQ, $skillW, ...
function getSkillName($skill, $skillQ, $skillW, $skillE, $skillR) {
	if ($skill === 'Q') {
		return $skillQ;
	}
	if ($skill === 'W') {
		return $skillW;
	}
	if ($skill === 'E') {
		return $skillE;
	}
	if ($skill === 'R') {
		return $skillR;
	}
	if ($skill === 'S') {
		return 'Attribute Bonus';
	}
}

//Converts an items dotaID to the user friendly
//display ID.  Looks up the value from the item map.
function getItemDisplay($dotaID) {
	global $itemMap;
	//echo "$dotaID<br>";
	if(isset($itemMap[$dotaID])) {

		return $itemMap[$dotaID];
	} else {
		return 'ERROR';
	}
}

//Contains a mapping from hero name => abbreviation
$heroMap = array(
			'Ancient Apparition' => "AA",
			'Alchemist' => "Alch",
			'Anti-mage' => "AM",
			'Axe' => "Axe",
			'Bane' => "Bane",
			'Batrider' => "Bat",
			'Beastmaster' => "Beast",
			'Bounty Hunter' => "BH",
			'Brewmaster' => "Brew",
			'Broodmother' => "Brood",
			'Bloodseeker' => "BS",
			'Centaur Warrunner' => "Cent",
			'Chen' => "Chen",
			'Chaos Knight' => "CK",
			'Clinkz' => "Clinkz",
			'Clockwerk' => "Clock",
			'Crystal Maiden' => "CM",
			'Dazzle' => "Dazzle",
			'Undying' => "Dirge",
			'Disruptor' => "Disruptor",
			'Dragon Knight' => "DK",
			'Doombringer' => "Doom",
			'Drow Ranger' => "Drow",
			'Dark Seer' => "DS",
			'Enchantress' => "Ench",
			'Enigma' => "Enigma",
			'Earthshaker' => "ES",
			'Gyrocopter' => "Gyro",
			'Huskar' => "Huskar",
			'Invoker' => "Invoker",
			'Jakiro' => "Jakiro",
			'Juggernaut' => "Jugger",
			'Keeper of the Light' => "KOTL",
			'Death Prophet' => "Krob",
			'Kunkka' => "Kunkka",
			'Lone Druid' => "LD",
			'Skeleton King' => "Leoric",
			'Leshrac' => "Lesh",
			'Lich' => "Lich",
			'Lina' => "Lina",
			'Lion' => "Lion",
			'Luna' => "Luna",
			'Lycanthrope' => "Lycan",
			'Magnus' => "Magnus",
			'Medusa' => "Medusa",
			'Meepo' => "Meepo",
			'Morphling' => "Morph",
			'Nyx Assassin' => "NA",
			'Naga Siren' => "Naga",
			'Lifestealer' => "Naix",
			'Necrolyte' => "Necro",
			'Night Stalker' => "NS",
			'Outworld Devourer' => "OD",
			'Ogre Magi' => "Ogre",
			'Omniknight' => "Omni",
			'Phantom Assassin' => "PA",
			'Phantom Lancer' => "PL",
			'Mirana' => "POTM",
			'Nature\'s Prophet' => "Prophet",
			'Puck' => "Puck",
			'Pudge' => "Pudge",
			'Pugna' => "Pugna",
			'Queen of Pain' => "QoP",
			'Razor' => "Razor",
			'Shadow Shaman' => "Rhasta",
			'Riki' => "Riki",
			'Rubick' => "Rubick",
			'Spirit Breaker' => "SB",
			'Shadow Demon' => "SD",
			'Shadow Fiend' => "SF",
			'Timbersaw' => "Shredder",
			'Silencer' => "Silencer",
			'Sand King' => "SK",
			'Slardar' => "Slardar",
			'Slark' => "Slark",
			'Sniper' => "Sniper",
			'Spectre' => "Spectre",
			'Storm Spirit' => "Storm",
			'Sven' => "Sven",
			'Templar Assassin' => "TA",
			'Tidehunter' => "Tide",
			'Tinker' => "Tinker",
			'Tiny' => "Tiny",
			'Treant Protector' => "Treant",
			'Troll Warlord' => "Troll",
			'Tusk' => "Tuskarr",
			'Ursa' => "Ursa",
			'Venomancer' => "Veno",
			'Viper' => "Viper",
			'Visage' => "Visage",
			'Faceless Void' => "Void",
			'Vengeful Spirit' => "VS",
			'Warlock' => "Warlock",
			'Witch Doctor' => "WD",
			'Weaver' => "Weaver",
			'Io' => "Wisp",
			'Windrunner' => "WR",
			'Zeus' => "Zeus"
);