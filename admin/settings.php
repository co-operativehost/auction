<?php
// Setting Page
// Here admin can setup some data like twitter accounts and facebook etc...

// Header
include ('1header.php');

if (isset($_REQUEST['update_setings'])){
	$a = $_REQUEST['site_active'];
	$f = $_REQUEST['facebook'];
	$e = $_REQUEST['main_email'];
	$t = $_REQUEST['twitter'];
	if(mysql_query("update `settings` set main_email = '$e' , twitter = '$t' , facebook = '$f' , site_active = '$a'  where `id` = 1 ")){
		$msg = "<center><font style='font-weight: bold;color: Green'>Done.</font></center>";
	}

}

$setings = mysql_query("select * from `settings` where `id` = 1");
$seting  = mysql_fetch_assoc($setings);


extract($seting);

?>

<?=$msg?>

<form name="setting" action="" method="post">
<table width="100%" cellpadding="5" cellspacing="5" border="0">
	<tbody>
		<tr>
			<td width="20%">Site Acitve:</td>
			<td>
			<select name="site_active">
				<option <?php if ($site_active == '1'){ echo "selected"; }?> value="1">Yes</option>
				<option <?php if ($site_active == '0'){ echo "selected"; }?> value="0">No</option> 		
			</select>
			</td>
		</tr>

		<tr>
			<td>Twitter Account:</td>
			<td><input type="text" name="twitter" value="<?php echo $twitter; ?>" /> </td>
		</tr>

		<tr>
			<td>Facebook Page:</td>
			<td><input type="text" name="facebook" value="<?php echo $facebook; ?>" /> </td>
		</tr>

		<tr>
			<td>Default Site Email:</td>
			<td><input type="text" name="main_email" value="<?php echo $main_email; ?>"/> </td>
		</tr>

		<tr>
			<td colspan="2">
				<input type="submit" value="Update" id="update_setings" name="update_setings" />
			</td>
		</tr>



	</tbody>
</table>
</form>








<?php 
// Footer
include ('1footer.php');
?>