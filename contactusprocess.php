<?php
include("header.php");

?>   
<?php 
error_reporting(0);


function sendcontact($email,$subject,$message)
{

$replaydmin=$email;

	
$to      = 'mary.mehany@gmail.com';
$email   = $email;
$name    = "Auction";
$subject = $subject;
$comment =$message; 

$To          = strip_tags($to);
$TextMessage =strip_tags(nl2br($comment),"<br>");
$HTMLMessage =nl2br($comment);
$FromName    =strip_tags($name);

$FromEmail   =strip_tags($replaydmin);
$Subject     =strip_tags($subject);


$headers = "From: $FromName <$email>"."\r\n";
$headers.="MIME-Version: 1.0\r\n";
$headers.= "Content-type: text/html; charset=windows-1256-1\r\n";

$Body =$message ;

$ok=mail($to, $subject, $message, $headers);
return $ok;
}

echo"<h3>Contact Us</h3><br/>";
  $fullname = $_REQUEST['firstname'];
  $email = $_REQUEST['uemail'];
  $phone = $_REQUEST['phone'];
  $message = $_REQUEST['message'];
  if(isset($_REQUEST['sub']))
  $subject=$_REQUEST['sub'];
  else
  $subject="Contact us mail from Auction Website";
  
  $message="fullname : $fullname  <br>  email : $email <br> telephone : $phone <br> comments contains :  $message " ;
 if( sendcontact($email,$subject,$message))
echo "
   <div class='incontnent'>
    <div><img src='images/inTop.png' width='900' height='10' /></div>
    <div style='background-image:url(images/inMid.png); width: 860px; padding: 20px;'>
      <p>Thank you for interest<br>you will receive our feed back on your Mail <u>$uemail</u></p>
     
    </div>
    
    <div><img src='images/inBot.png' width='900' height='20' /></div>	"; 
else
{
echo "
   <div class='incontnent'>
    <div><img src='images/inTop.png' width='900' height='10' /></div>
    <div style='background-image:url(images/inMid.png); width: 860px; padding: 20px;'>
      <p>Can't send mail please try again."
     
   

?>
<meta http-equiv="refresh" content="5;url=/" />
<?
echo"
<br/><p>You will be re-directed in 5 seconds...</p>
 </div>
    
    <div><img src='images/inBot.png' width='900' height='20' /></div>";
}
?>

<?php include("footer.php"); ?>  
