<?php
require '../php/generateGuide.php';
require_once '../php/Membership.php';
$membership = new Membership();
$membership->already_Logged_In();
$membership->confirm_Member('suggest');

include '../php/navigation.php';

if(isset($_GET['id'])) {
	$id = (int)$_GET['id'];
}

?>
<html>
<head>
	<link rel="stylesheet" href="../css/guide.css?v=9" >
	<script src="../js/jquery.js"></script>
</head>
<body>
<div class="section">
<?php
	echo generateGuideWithSuggestionID($id);
	echo findPosts($id);
?>
<br><br>
<label for="comment">Leave a comment:</label><br><hr>
<textarea rows="4" cols="50" id="comment"></textarea>
<br><input type="submit" value="Submit Comment" id="comment_button" />
</div>
	<script type='text/javascript'> 
	var username=<?php echo "\"".$_SESSION['username']."\""; ?>;
	$(document).ready(function(){
		$("#comment_button").click(function(e){ 
			e.preventDefault();
			submit_comment();
		}); 
	});
	
	function submit_comment(){
		var comment_val=$("#comment").val();
		var id = <?php echo $id ?>;
		
		$.post("../php/insert_comment.php", {comment : comment_val,
											 userName : username,
											 suggestionID : id}, function(data){
			if (data.length>0){
				window.location.reload();
			}
		})
		
	}
	</script>
</body>
</html>
