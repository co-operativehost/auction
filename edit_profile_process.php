<?php
include("header.php");
include("connect.php");
/*if(!mysql_connect("localhost","root",""))
		die(mysql_error());
	if(!mysql_select_db("auction"))
	{	
		die("Error in selection database ".mysql_error());
	}*/

 $firstName = $_REQUEST['firstName'];
  $email = $_REQUEST['uemail'];
  $adress = $_REQUEST['address'];
  $telephone= $_REQUEST['phone'];
  $notes= $_REQUEST['notes'];
  $userName = $_POST['userName'];
  $surName=$_REQUEST["surName"];
  $newpassword = md5($_POST['pass']);
  $city=$_REQUEST["city"];
  //echo $city; exit(0);
  $country_id=$_REQUEST['country'];
  $id=$_SESSION['User_ID'];
$checkformembers = mysql_query("SELECT * FROM users WHERE userName = '$userName' and id!='$id'");
if(mysql_num_rows($checkformembers) != 0)
{
	$str="no"; 
	echo "<script>window.location='/edit_profile.php?str=".$str."'; </script>";
	
}
else{
//insert the new data into the table
//echo" id=".$country_id;
if(!empty($_POST['pass']))
  	$sql="update users set userName='".$userName."', pass='".$newpassword."', firstName='".$firstName."', surName='".$surName."', email='".$email."', address='".$adress."', telephone='".$telephone."', country_id=".$country_id.", city='".$city."' where id='$id'";
else
$sql="update users set userName='".$userName."', firstName='".$firstName."', surName='".$surName."', email='".$email."', address='".$adress."', telephone='".$telephone."', country_id=".$country_id.", city='".$city."' where id='$id'";
  
  if(mysql_query($sql))
  {
     echo"    
	 
   <div class='incontnent'>
    <div><img src='images/inTop.png' width='900' height='10' /></div>
    <div style='background-image:url(images/inMid.png); width: 860px; padding: 20px;'>
      <p>Your account has been updated successfully</p>
     
    </div>
    
    <div><img src='images/inBot.png' width='900' height='20' /></div>	";
   } else die(mysql_error()); 
}
   

include("footer.php");

?>  