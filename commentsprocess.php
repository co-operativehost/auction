<?php
include("header.php");
 $fullname = $_REQUEST['fullname'];
  $email = $_REQUEST['email'];
  $gender = $_REQUEST['gender'];
  $comment= $_REQUEST['comment'];
  
  $sql="INSERT INTO comments(name,email, comment, gender) VALUES('".$_REQUEST['fullname']."','".$_REQUEST['email']."','".$_REQUEST['comment']."','".$_REQUEST['gender']."')";
  if(mysql_query($sql))
  {
          	  
	$str="Your Comment has been entered and waiting for accepting";
   } else die(mysql_error()); 
   
echo "<script>window.location='/comments.php?str=".$str."'; </script>";

?>  