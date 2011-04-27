<?php include('connect.php');
session_start();
$_SESSION["there_is_seesion"]=1;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auction</title>
<link type="text/css" rel="stylesheet" href="css/mainstyle.css" />
<link type="text/css" rel="stylesheet" href="css/lightbox.css"/>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/easySlider1.7.js"></script>
<script src="js/lightbox-form.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){	
	$("#slider").easySlider({
		auto: true, 
		continuous: true
	});
	
});
	//*********************************************************************** timer code
	

//******************************************************************************
</script>
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- start top -->
<div id="top">
  <div id="header">
    <div id="logo"><img src="images/logo.jpg" width="335" height="133" alt="Auction" /></div>
  </div>
</div>
<!-- EndTop -->
<!-- start Navigation -->
<div id="navigation">
  <div id="menu">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="regisiter.php">Regisiter</a></li>
      <li><a href="help.php">FAQ</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="contactus.php">Contact us</a></li>
    </ul>
  </div>
</div>
<!-- End Navigation -->
<div id="container">
  <div id="container2">
    <div id="content">
      <div id="slider">
       <ul>
       <!-- <marquee behavior="scroll" scrollamount="60" scrolldelay="1000">
        
      <img src="images/banner001.jpg" width='694' height='281' />
	   <img src="images/headerBG.jpg" width="694" height="281"/>
        
        </marquee>-->
       
       <?php
      $sql="select * from galary";
        $res=mysql_query($sql);
        while($row=mysql_fetch_array($res))
        {
        	echo "
          <li><img src=".$row['img']." alt='C' width='694' height='281' /></li>";
        }
          ?>
        </ul>
      </div>
    </div>
  </div>

<?php
if(!empty($_REQUEST["err_login"]))
$err_login=$_REQUEST["err_login"];
else
$err_login="";
if($_SESSION["there_is_seesion"]==1)
{
	if($_SESSION["active_user"]==1)
	{
		echo "
		<div id=login>
    <div class=boxheader>
      <p>Welcome</p>
    </div>
    <div class=boxbody>
      <p>Welcome ".$_SESSION['first_Name']." ...</p>
      <p>you have ..... points ..</p>
      <p>&nbsp; </p>
      <br /><a href='signout.php'>LogOut</a>
      <br />
      <p>&nbsp;</p>
      <br />
      <br />
    </div>
    <div class=boxfooter></div>
  </div>
  <div style='float:right'></div>
  <div class='clear'></div>";
	}
	else if($_SESSION["main_admin"]==1)
	{
		echo"
	<div id=login>
    <div class='boxheader'>
      <p>Welcome</p>
    </div>
    <div class='boxbody'>
      <p>Welcome ".$_SESSION["admin_name"]." ...</p>
      <p>you have ..... points ..</p>
      <p>&nbsp; </p>
      <br />
      <a href='admin/'>Control Panel</a>
      <br /><br />
      <a href='signout.php'>LogOut</a>
      <p>&nbsp;</p>
      <br />
      <br />
    </div>
    <div class='boxfooter'></div>
  </div>
  <div style='float:right'></div>
  <div class='clear'></div>";
	}
	else 
	{
	echo"
  <div id=login>
    <div class=boxheader>
      <p>User Login</p>
    </div>
	<form action='userlogin.php' method='post'>
    <div class=boxbody>
      <p>User Name:</p>
      <input name='userName' type='text' value='User Name' onclick=\"this.value=''\" style='width:150px; margin:0 auto;' />
      <br />
      <br />
      <p>Password:</p>
      <input name='pass' type='password' value='Password' onclick=\"this.value=''\" style='width:150px; margin:0 auto;' />
      <br />
	  <div>".$err_login."</div>
      <br />
      <input name='' type='submit' value='Login' class='subbtn' onclick='return validate(this.form);' />
    </div>
	</form>
    <div class='boxfooter'></div>
  </div>
  <div style='float:right'><img src='images/signinAD.jpg' width=196 height=118 alt='Sign in' /></div>
  <div class='clear'></div>";	
	}
}

?>