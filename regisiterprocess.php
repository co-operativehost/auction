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
  $country_id=$_REQUEST['country'];
$checkformembers = mysql_query("SELECT * FROM users WHERE userName = '$userName'");
if(mysql_num_rows($checkformembers) != 0)
{
	$str="no"; 
	echo "<script>window.location='/regisiter.php?str=".$str."'; </script>";
	
}
else{
//insert the new data into the table
//echo" id=".$country_id;
  
  $sql="INSERT INTO users(userName, pass, firstName, surName, email, address, telephone, country_id, city) VALUES('".$userName."','".$newpassword."','".$firstName."','".$surName."','".$email."','".$adress."','".$telephone."', ".$country_id.",'".$city."')";
 // print $sql;
  if(mysql_query($sql))
  {
     echo"    
	 
   <div class='incontnent'>
    <div><img src='images/inTop.png' width='900' height='10' /></div>
    <div style='background-image:url(images/inMid.png); width: 860px; padding: 20px;'>
      <p>Your account has been initialized, Welcome to Auction</p>
     
    </div>
    
    <div><img src='images/inBot.png' width='900' height='20' /></div>	";
   } else die(mysql_error()); 
}
   

include("footer.php");

?>  