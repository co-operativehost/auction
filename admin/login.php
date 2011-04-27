<?php
include("../connect.php");
$err_login="";
$admin_name= $_REQUEST['username'];
$admin_pass= $_REQUEST['pass'];
if(!empty($admin_name))
{ 

$sql="SELECT * FROM admin WHERE admin_user_name = '".$admin_name."'";

$res=mysql_query($sql) or die(mysql_errno());
if($row=mysql_fetch_array($res))
{
		 $admin_id=$row['admin_id'];
		 $pass=$row['admin_pass'];

if($pass==$admin_pass)
	{
			session_start();
			$_SESSION["there_is_seesion"]=1;
			$_SESSION["User_ID"]= $admin_id;
			$_SESSION["main_admin"]=1;
			$_SESSION["admin_name"]=$row['admin_user_name'];
			
			echo ("<script>");
			echo ("this.location='index.php'");
			echo ("</script>");
		
	
	}
	else
	{
		$err_login = "  Invaild Login ";    
				
	
	}
}

else
{
	$err_login = "  Invaild Login ";   
	
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Admin</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<style media="all" type="text/css">
@import "../css/all.css";
</style>
</head>
<body>
<div id="main">
  <div id="header">
    <div class="logo"><img src="../img/logo.jpg" width="345" height="133" alt="logo" /></div>
    
  </div>
  <div id="middle">
  <div id="left-column">
</div>
    <div id="center-column">
    <div id="login">
    <form method="post" action="<?php  echo $_SERVER['REQUEST_URI'];?>"  name="contact">
   
<fieldset>
             <legend>Admin login</legend>
		<div class="formlabel"> User Name:</div><label><?php echo $err_login; ?></label>
	    <input name="username" type="text" />
<br class="spacer" />
			<div class="formlabel">Password:</div>
            <input name="pass" type="password" />
<br class="spacer" />
<input name="input3" type="submit" class="submit" value="submit"/>
<br />
<br class="spacer" />
      </fieldset>

	  </form>
      </div>
  
   </div>
    <div id="right-column"></div>
  </div>
    
  </div>
</div>
<div style="clear:both"></div>

<div id="bottom">
  <div id="footer">
    <div id="copyrights">
      <p>Â© Copyright <a href="http://www.co-operativehost.com" target="_blank">Co-operativehost.com</a></p>
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
