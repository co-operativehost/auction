<?php
ini_set("error_reporting","E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR");
	session_start();
	 session_destroy();
	session_start();
	$_SESSION["there_is_seesion"]=1;
?>
<head>
<meta http-equiv="refresh" content="1;url=index.php" />
</head>
	