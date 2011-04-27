<?php
@session_start();
include 'connect.php';
$gameId=$_REQUEST['game_Id'];

//$urlRefresh = "index.php";

      $user_id=$_SESSION["User_ID"];
      $checkformembers = mysql_query("SELECT * FROM game_pro_user WHERE user_id = '$user_id'");
		if(mysql_num_rows($checkformembers) != 0)
			{
				echo "you already joined the game before";
			}
		else 
		{
     	 $s="insert into game_pro_user (user_id, game_id) values ('$user_id', '$gameId')";
     	 mysql_query($s);
     	
     	// header("Refresh: 5; URL=\"" . $urlRefresh . "\"");
     	 /*<script type="text/javascript">
     	 window.opener.location.reload( true);
		</script>*/
		
     	 echo"you have joined the game";
		}
		?>