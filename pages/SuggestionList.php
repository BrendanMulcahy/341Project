<?php
require_once '../php/Membership.php';
$membership = new Membership();
$membership->already_Logged_In();
$membership->confirm_Member('suggest');

include '../php/navigation.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Dota 2 Alt-Tab Suggestion Form</title>
    <!--<link rel="stylesheet" type="text/css" href="common.css" /> -->
	<link rel="stylesheet" href="../css/suggestion.css" >
	<script src="../js/jquery.js"></script>
  </head>
  <body>
    <h1>Dota 2 Alt-Tab Suggestions</h1>

    <form name="suggestion" id="suggestion" action="" method="get">
      <div style="width: 25em;">
	<?php
		include("../php/GetSuggestions.php");
		if(isset($_GET['page'])){
			$page=$_GET['page'];
		}else{
			$page=1;
		}
		if(isset($_SESSION['username'])){ 
			$username = $_SESSION['username']; 
		}else{ 
			$username=-1;;
		}
		$result=getPage($username, $page);

		foreach($result as $value){
			$decode=json_decode($value,true);

			printTitle($decode['title'], $decode['upVotes'], $decode['suggestionID'], $decode['userName'], $decode['dateCreated'], $decode['vote']);
			
			
		}
		
function printTitle($title, $upvote, $index, $userName, $dateCreated, $userVote){
//print the title of the HTML

echo "	<div style=\"width: 25em;\">
	<table>
		<div style=\"float: left;\">
			<span class=\""; 
			if($userVote==="no" || $userVote==="down"){
				echo "uvote";
			}elseif($userVote==="up" ){
				echo "uvote up";			
			}
echo "\" id=\"up".$index."\" onclick=\"voteUp('".$index."', '";

			if($userVote==="down"){
				echo $upvote+1;
			}elseif($userVote==="up" ){
				echo $upvote-1;			
			}elseif($userVote==="no"){
				echo $upvote;			
			}
echo "')\"></span>			
			<a id=\"votes".$index."\">&nbsp;&nbsp;&nbsp;&nbsp;$upvote</a>
			<span class=\"";
			if($userVote==="no" || $userVote==="up"){
				echo "dvote";
			}elseif($userVote==="down"){
				echo "dvote dn";			
			}
echo "\" id=\"down".$index."\" onclick=\"voteDown('".$index."', '";

			if($userVote==="down"){
				echo $upvote+1;
			}elseif($userVote==="up" ){
				echo $upvote-1;			
			}elseif($userVote==="no"){
				echo $upvote;			
			}
echo "')\"></span>
			
		</div>
<p>		
		<a href=\"./thread.php?id=".$index."\"><h4>".$title."</h4></a>			
		<a>".$userName." - ".$dateCreated."</a>		
</p>		
	</table>
	</div>
";

}
				
	?>
	
      </div>
    </form>
<script type='text/javascript'>
	function voteDown(index, upvote){
		var username="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; }else{ echo "0";} ?>";
		if("0"!= username){
			var uclass=document.getElementById('up'+index).className;
			var dclass=document.getElementById('down'+index).className;
			if(dclass=='dvote'){//clicked downvote and its not downvoted
				if(uclass=='uvote up'){//its already upvoted we changed our minds
					document.getElementById('down'+index).className = 'dvote dn';//add the downvote
					document.getElementById('up'+index).className = 'uvote';//remove the upvote
					document.getElementById('votes'+index).innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;"+(parseInt(upvote)-1);//minus 2
					
				}else{//not upvoted
					document.getElementById('down'+index).className = 'dvote dn';//downvote it
					document.getElementById('votes'+index).innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;"+(parseInt(upvote)-1);//minus 1
				}
					
				$.post("../php/vote.php", {username : username, suggestionid : index, vote : "down"}, function(data){	});
			}else{//its a down vote
				
					document.getElementById('down'+index).className = 'dvote';//undownvote it
					document.getElementById('votes'+index).innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;"+(parseInt(upvote));	
					$.post("../php/vote.php", {username : username, suggestionid : index, vote : "no"}, function(data){ });		
			}
			
			
		}	
	}
	function voteUp(index, upvote){
		var username="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; }else{ echo "0";} ?>";
		if("0"!=username){
			var uclass=document.getElementById('up'+index).className;
			var dclass=document.getElementById('down'+index).className;
			if(uclass=='uvote'){//clicke upvote and it was not orange
				if(dclass=='dvote dn'){//if already downvoted:
					document.getElementById('down'+index).className = 'dvote';//remove downvote
					document.getElementById('up'+index).className = 'uvote up';//add upvote
					document.getElementById('votes'+index).innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;"+(parseInt(upvote)+1);//add 2
					
				}else{//not downvoted or upvoted
					document.getElementById('up'+index).className = 'uvote up';//upvote it
					document.getElementById('votes'+index).innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;"+(parseInt(upvote)+1);//add 1
				}
					
				$.post("../php/vote.php", {username : username, suggestionid : index, vote : "up"}, function(data){ });	
			}else{//its upvoted already
				
				document.getElementById('up'+index).className = 'uvote';//remove upvote
				document.getElementById('votes'+index).innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;"+(parseInt(upvote));//-1	
				$.post("../php/vote.php", {username : username, suggestionid : index, vote : "no"}, function(data){ });	
				
			}
			
		}
	}
	
	</script>
  </body>
</html>
