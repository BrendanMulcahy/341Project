<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Dota 2 Alt-Tab Suggestion Form</title>
    <!--<link rel="stylesheet" type="text/css" href="common.css" /> -->
	<link rel="stylesheet" href="suggestion.css" >
	<script src="./jquery.js"></script>
  </head>
  <body>
    <h1>Dota 2 Alt-Tab Suggestion Form</h1>

    <form name="suggestion" id="suggestion" action="" method="get">
      <div style="width: 25em;">
        <label for="heroMenu">Select hero:</label>
        <select class="select" name="heroMenu" id="heroMenu" onchange="get_skills()" size="1">
		<?php
			define('HOST', 'localhost');
			define('USER', 'root');
			define('PW', 'bman90');
			define('DB', 'dota2admin');
		
			$mysqli = new mysqli(HOST,USER,PW, DB);
			$heroSQL = "SELECT heroName FROM hero";
			$heroInfo = $mysqli->query ( $heroSQL );
			while(list($heroName) = $heroInfo->fetch_row()) {
				printOption($heroName, $heroName);
			}
		?>
        </select>
		<div name="build" id="build" style="width: 25em;"></div>
		<p><p><input type="submit" value="Submit Suggestion" id="suggest_button" />
		<div name="result" id="result" style="width: 25em;"></div>
      </div>
    </form>
	
<?php
function printOption($optionText, $optionValue) {
	//$selectedHero = $_GET['heroMenu'];
	//if ($optionValue == $selectedHero) {
	//	echo ("<option value=\"$optionValue\" selected=\"selected\">$optionText</option>");
	//} else {
	echo ("<option class=\"select\" value=\"$optionValue\">$optionText</option>");
	//}
}
?>

	<script type='text/javascript'> 
	$(document).ready(function(){ 
		$("#build").slideUp();
		$("#result").slideUp();
		$("#suggest_button").hide();
		$("#suggest_button").click(function(e){ 
			e.preventDefault();
			submit_suggestion();
		}); 
	});

	function get_skills(){ 
		var hero_val=$("#heroMenu").val(); 
		$.post("./getBuild.php", {hero_Name : hero_val}, function(data){
			if (data.length>0){ 
				$("#build").html(data);
			}
		})
		$("#build").slideDown();
		$("#suggest_button").slideDown();
	}
	
	function skill_change(sel) {
		var value = sel.options[sel.selectedIndex].value;
		document.getElementById(sel.id).setAttribute("class", value);
	}
	
	function submit_suggestion(){
		var hero_val=$("#heroMenu").val(); 
		var skills = new Array();
		var starting = new Array();
		var core = new Array();
		var extension = new Array();
		
		//get the skills
		for(var i = 1; i < 19; i++) {
			skills[i] = $("#skillMenu" + i).val();
		}
		
		//get the starting items
		for(var i = 1; i < 11; i++) {
			starting[i] = $("#startingItemMenu" + i).val();
		}
		
		//get the core items
		for(var i = 1; i < 11; i++) {
			core[i] = $("#coreItemMenu" + i).val();
		}
		
		//get the extension items
		for(var i = 1; i < 11; i++) {
			extension[i] = $("#extensionItemMenu" + i).val();
		}
		
		$.post("./insert_suggestion.php", {hero_Name : hero_val,
											skill_1 : skills[1],
											skill_2 : skills[2],
											skill_3 : skills[3],
											skill_4 : skills[4],
											skill_5 : skills[5],
											skill_6 : skills[6],
											skill_7 : skills[7],
											skill_8 : skills[8],
											skill_9 : skills[9],
											skill_10 : skills[10],
											skill_11 : skills[11],
											skill_12 : skills[12],
											skill_13 : skills[13],
											skill_14 : skills[14],
											skill_15 : skills[15],
											skill_16 : skills[16],
											skill_17 : skills[17],
											skill_18 : skills[18],
											starting_1 : starting[1],
											starting_2 : starting[2],
											starting_3 : starting[3],
											starting_4 : starting[4],
											starting_5 : starting[5],
											starting_6 : starting[6],
											starting_7 : starting[7],
											starting_8 : starting[8],
											starting_9 : starting[9],
											starting_10 : starting[10],
											core_1 : core[1],
											core_2 : core[2],
											core_3 : core[3],
											core_4 : core[4],
											core_5 : core[5],
											core_6 : core[6],
											core_7 : core[7],
											core_8 : core[8],
											core_9 : core[9],
											core_10 : core[10],
											extension_1 : extension[1],
											extension_2 : extension[2],
											extension_3 : extension[3],
											extension_4 : extension[4],
											extension_5 : extension[5],
											extension_6 : extension[6],
											extension_7 : extension[7],
											extension_8 : extension[8],
											extension_9 : extension[9],
											extension_10 : extension[10]}, function(data){
			if (data.length>0){
				$("#result").html(data);
				$("#suggest_button").hide();
				$("#result").slideDown();
			}
		})
	}
	</script> 
  </body>
</html>