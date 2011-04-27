<?
	@session_start();
	if($_SESSION["main_admin"]==1)
		echo "<script>window.location='admin_index.php'</script>";
	else
		echo "<script>window.location='login.php'</script>";
?>