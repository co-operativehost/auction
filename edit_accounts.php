<? include ("val.php"); check("session");?>
<? include ("include/conn.php");?>
<? include ("1header.php");?>

<?  
 $user_name=$_REQUEST["user_name"];
$id=$_SESSION["User_ID"];
if (!empty($user_name)){
 $brith_date = "$reg_Year";
 
 $pass1=$_REQUEST["pass1"];
$res=  mysql_query ("select * from members where USER_NAME='$user_name' and ID!=$id");
echo "select * from members where USER_NAME='$user_name' and ID!=$id";
if(mysql_fetch_array($res)){ if ($lang=="en") $err = "User name already exist <br>";else $err="C?? C???EII? ????I EC???? <br>"; }

if (empty ($err)){
$sq = "update  members set USER_NAME='$user_name',PASS='$pass1' where ID=$id";
//echo "<font color=red size=2 ><b>".$sq; 
if ($lang=="en")$str="Update done";
else $str="E? C???I??";
 mysql_query ($sq);
 echo "<script>";
 echo ("this.location = 'update.php?head=".$_SERVER['REQUEST_URI']."&str=$str';");
 echo "</script>";
 
 }
 }
$rr = mysql_query("select * from members where ID=$id");
 while ($row = mysql_fetch_array($rr)){
    
	$user_name = $row["USER_NAME"];
	$pass = $row["PASS"];
	
 }
 
 ?>
<form name="expireselect" method="post" action="<? echo $_SERVER['REQUEST_URI']; ?>">


<table width="98%" border="0" bgcolor= #A0C3E1 cellpadding=5 cellspacing=1 align=center>
                   
  
                    <tr> 
                      <td bgcolor="#00ABFF"  colspan="2" height=25 style=color:#ffffff> <? echo $CONTACT_INFORMATION; ?>  </td>
                    </tr>
                    <tr> 
                      <td colspan="2" align="center" bgcolor="#ffffff"><font color="#990033"><? echo $err; ?>  </font></td>
                    </tr>
                    <tr> 
                      <td width="24%" bgcolor="#ffffff"><? echo $User_name; ?> <font color=red>* </td>
                      <td width="76%" bgcolor="#ffffff"><input type="text" name="user_name" value="<? echo $user_name; ?>"></td>
                    </tr>
                    <tr> 
                      <td bgcolor="#ffffff"><? echo $Password; ?> <font color=red>* </td>
                      <td bgcolor="#ffffff"><input type="password" name="pass1" onChange="if(this.value!=this.form.pass2.value&&this.form.pass2.value!='') alert('Passwords not equal');" size="15" value="<? echo $pass;?>"></td>
                    </tr>
                    <tr> 
                      <td bgcolor="#ffffff"><? echo $confim_Password; ?> <font color=red>* </td>
                      <td bgcolor="#ffffff"><input type="password" name="pass2" onChange="if(this.value!=this.form.pass1.value) alert('Passwords not equal');" size="15" value="<? echo $pass;?>"></td>
                    </tr>
                   
                   
					<tr>
                      
                      <td colspan="2" align="center" bgcolor="#ffffff">  <input type="submit"  value="  <? echo $update_word; ?>    " onClick="return validate(this.form);" class="button">
            </td>
                    </tr>
                  </table>
</form>
<script>
function validate(form)
{
	if(form.user_name.value=="")
	{
		alert("Please Enter User name");
		return false;
	}
	if(form.pass1.value=="")
	{
		alert("Please Enter Password");
		return false;
	}
	if(form.pass2.value=="")
	{
		alert("Please Enter a confim to user name");
		return false;
	}
	if(form.pass1.value!= form.pass2.value)
	{
		alert(" Tow password not the same ");
		return false;
	}
	
	
	
	
	
}
</script>

<? include ("1footer.php");?>
