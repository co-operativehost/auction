<?php 
include 'header.php';
$pro_id=$_REQUEST['pro_id'];
$sql="select * from products where pro_id='".$pro_id."'";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
//echo $pro_id;
$img=$row['image'];
echo"
<div class=incontnent>
    <div><img src='images/inTop.png' width='900' height=10 /></div>
    <div class=details style='background-image:url(images/inMid.png); width: 860px; padding: 20px;'>
      <h3>Product name </h3>
      <div class='price'>".$row['pro_price']."</div>
      <div class='clear'></div>
      <div class='proImg'>
      <img src='".$img."' width='158' height='191' />
      </div>
      <div class='proDetail'>".$row['pro_details']."</div>
      <div class='clear'></div>
      <div class='Link'><a href='#'>Bid Now</a></div>
       <div class='clear'></div>
    </div>
    <div><img src='images/inBot.png' width='900' height='20' /></div>";
  
  include 'footer.php';
  ?>