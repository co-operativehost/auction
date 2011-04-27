<?php
session_start();
//ini_set("error_reporting","E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR");	

function check($flage)
{
if ($flage=="session")
{
	if($_SESSION["there_is_seesion"]!=1)
	{
	echo ("<script>");echo ("this.location = '/index.php'");echo ("</script>");
	}
}

if ($flage=="admin")
{
if($_SESSION["main_admin"]!=1)
{
echo ("<script>");echo ("this.location = '/index.php'");echo ("</script>");}}
}