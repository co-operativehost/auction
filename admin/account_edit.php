<?php
include '1header.php';
$str="";
$user_name=$_REQUEST['username'];
$password=$_REQUEST['pass1'];
$admin_id=$_SESSION['User_ID'];
if(!empty($user_name))
{
$sql="update admin set admin_user_name='$user_name', admin_pass='$password' where admin_id=$admin_id ";
$res=mysql_query($sql);
if($res)
{
 $str="Update done";
}
else
$str=""; 
}

?>
      <div class="table"> <img src="img/bg-th-left.gif" width="8" height="7" alt="" class="left" /> <img src="img/bg-th-right.gif" width="7" height="7" alt="" class="right" />
      <form action="<?php echo $_SERVER[REQUEST_URI]?>" method="post">
        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Account Mangement</th>
          </tr>
          <tr>
            <td class="first" width="172"><strong>User Name </strong></td>
            <td class="last"><input type="text" class="text" name="username" /></td>
          </tr>
          <tr class="bg">
            <td class="first"><strong>Password</strong></td>
            <td class="last"><input type="password"" class="text" name="pass1" /></td>
          </tr>
          <tr>
            <td class="first"><strong>Confirm password</strong></td>
            <td class="last"><input type="password" class="text" name="pass2" /></td>
          </tr>
          <tr class="bg">
            <td colspan="2" class="first"><div align="center"><input type="submit" value="Update" onclick="return validate(this.form);"></div></td>
          </tr>
          </table>
        </form>
        <p>&nbsp;</p>
      </div>  
    </div>
    
    
     <div id="right-column"> <strong class="h">INFO</strong>
      <div class="box">Detect and eliminate viruses and Trojan horses, even new
        and unknown ones. Detect and eliminate viruses and Trojan horses, even
        new and </div>
    </div>
    
    
    </div>
  </div>
</div>
<div style="clear:both"></div>
<script type="text/javascript">
function validate(frm)
{
if(frm.username.value=="")
{
	alert("Please Enter User Name");
	frm.username.focus();
	return false;
}
if(frm.pass1.value=="")
{
	alert("Please Enter Password");
	frm.pass1.focus();
	return false;
}
if(frm.pass2.value=="")
{
	alert("Please Enter a confirm to Password");
	frm.pass2.focus();
	return false;
}
if(frm.pass2.value!=frm.pass1.value)
{
	alert("Two Passwords not the same");
	frm.username.focus();
	return false;
}
return true;
}

</script>
<?php 
include '1footer.php';
?>


