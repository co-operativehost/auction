<?php

include 'header.php';
 include("timetry.php");
    if(!$topic_res = mysql_query("SELECT * FROM products ORDER BY pro_id DESC"))
    { die(mysql_error());}
    $topics_number = mysql_num_rows($topic_res);
//**************************************************************************************	

$sql="select * from products";
$res=mysql_query($sql);
			               
echo"<script type='text/javascript' language='javascript'>
                        //This is the array of JSON objects from which the auction item divs are created.
                        var data =[";
								   while($row=mysql_fetch_array($res))
								   {
									   $i+=5;
								   echo"{title: '".$row['pro_name']."',
								    countdown: 'Apr 29, 2011 14:".$i.":00',
									highestBidder: 'Highest bidder 1'}, ";
								   }
								  echo" ];";
						echo"</script>";
						
						
//*****************************************************************************************	
?>
<script id='auctionItemTemplate'>
                        <div class='AuctionContainer'>
                                <div class='ItemTitle'>${title}</div>
                                <!-- Update the time here to be a time in the future, in order to test the page -->
                                <div class='Countdown'>${countdown}</div>
                                <div class='HighBidder'>${highestBidder}</div>
                                <div class='BidButton'><input type='button' value='Bid' /></div>
                        </div>
                </script>
	<?php		
    if($topics_number>0)
    {
echo "
 <div class=incontnent>
    <div><img src='images/inTop.png' width=900 height=10 /></div>
    <div style='background-image:url(images/inMid.png); width: 860px; padding: 20px;'>
      <h3>Products</h3>";
      while($row=mysql_fetch_array($topic_res))
      {
		 
      	if (empty($row['image']))
      	$img='media/products/prod1.png';
      	else 
      	$img=$row['image'];
      	echo"
<div class=product><img src='".$img."' width=330 height=400 />".$row['pro_name']."<br/>
      <span class='price'>$".$row['pro_price']."</span> <a href='#'>add to cart</a> &nbsp;&nbsp; &nbsp;<span><a href='pro_details.php?pro_id=".$row['pro_id']."'>details</a></span> ";
      if($_SESSION['main_admin'])
  			{
    		
    			echo"&nbsp;&nbsp; &nbsp;<span><input type=image src ='img/edit-icon.gif' onclick=window.location='products_manage.php?topic_id=".$row['pro_id']."' style='border=0px'>";
    echo " <input type='image' onclick='delete_sure(".$row['pro_id'].",".$row['pro_cat_id'].");' style='cursor:pointer;' src='img/hr.gif' width='16' height='16' alt='remove' /></a></span>";
	
    		}
echo"</div>";
      }
       echo "
      <div class='clear'></div>
    </div>

    <div><img src='images/inBot.png' width=900 height='20' /></div>";
	
    }
   else 
   {
   echo "no products";
   }

include("footer.php");
?>
<script>
 function delete_sure(id,cat){
  if(confirm("Are you sure you want to delete it?"))
  {
   	window.location = "products_manage.php?topic_id="+id+"&delete=1&&cat_id="+cat;
  }
 }
</script>