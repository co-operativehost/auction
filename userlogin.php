<?php
include("connect.php");
$name=$_REQUEST["userName"];
$pass=$_REQUEST["pass"];
//echo $name.",".$pass;
$sql="select * from `users` where `userName`='".$name."' and `activate`='0'";

	$res=mysql_query($sql);
	//var_dump($res);
if(!empty($name))
{

	/*if($res==true)
	print "good";
	else
	print "not";*/
	//$row=mysql_fetch_assoc($res);

while($row=mysql_fetch_assoc($res))
	{
	
		//echo $row['userName'];
		//echo $row['id'];
		$user_id=$row['id'];		
		$password=$row['pass'];
    	$level =  $row['level'];
        $first_n= $row['firstName'];
		$userName=$row['userName'];
		//echo $password.$level.$first_n.;
		//echo $first_n;
		
		if($password==md5($pass))
		{
			//echo $first_n;
			session_start();
			$_SESSION["there_is_seesion"]=1;
			$_SESSION["User_ID"]= $user_id;
			$_SESSION["active_user"]=1;
			$_SESSION["first_Name"]=$first_n;
			

		}
		else
		{
			$err_login = "  Invaild Login ";
					echo ("<script>"); 	
					//echo ("this.location='".$_SERVER['REQUEST_URI']."'");
					echo ("this.location='index.php?err_login=".$err_login."'");
				    echo ("</script>");
		}
		
	}
	
}
else
{
					$err_login = "  Invaild Login ";
					echo ("<script>"); 	
					//echo ("this.location='".$_SERVER['REQUEST_URI']."'");
					echo ("this.location='index.php?err_login=".$err_login."'");
				    echo ("</script>");	
}

					$err_login = "  Invaild Login ";
					echo ("<script>"); 	
					//echo ("this.location='".$_SERVER['REQUEST_URI']."'");
					echo ("this.location='index.php?err_login=".$err_login."'");
				    echo ("</script>");
?>