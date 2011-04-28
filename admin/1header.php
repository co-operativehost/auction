<?php
session_start(); 
include('../connect.php');
include("val.php"); check("admin"); 
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
      <h3>Main</h3>
      <ul class="nav">
      	<li><a href="index.php">Home Page</a></li>
        <li><a href="categories_manage.php">Categories Management</a></li>
        <li><a href="products_manage.php">Add Product</a></li>
        <li><a href="galary_manage.php">Gallery Management</a></li>
        <li><a href="keywords_manage.php">Keywords Management</a></li>
        <li class="last"><a href="keywords_manage.php">Offers Management</a></li>
        
      </ul>
      <a href="account_edit.php" class="link">Edit Admin Account</a> <a href="signout.php" class="link">Log Out</a> </div>
    <div id="center-column">