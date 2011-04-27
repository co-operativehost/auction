<?php
include '1header.php';
include_once("fckeditor/fckeditor.php") ; ?>
<script>
	function validate(frm){ //alert("yes");
	 if(frm.topic_en_title.value=="")
	 {
	   alert("Please Enter product name in English");
	   frm.topic_en_title.focus();
	   return false; 
	 }
	
	   if(frm.topic_image.value=="")
	 {
	   alert("Please choose product image");
	   frm.topic_en_title.focus();
	   return false; 
	 }
    if(frm.topic_en_price.value=="" || frm.topic_en_price.value==0)
    {
        alert("Please Enter product Price");
        frm.topic_en_price.focus();
        return false;
    }
	if(frm.topic_en_type[0].checked == false)
	{
		
		//if(frm.gametype.value=="")
		//{alert("Please select the Game Type"); frm.gametype.focus(); return false;}
		if(frm.auction_st_price.value=="" || frm.auction_st_price.value==0)
		{alert("Please insert the Auction start Price"); frm.auction_st_price.focus(); return false;}
		if(frm.click_amount.value==""|| frm.click_amount.value==0)
		{alert("please insert the pids No per click"); frm.click_amount.focus(); return false;}
		if(frm.days_no.value=="" || frm.days_no.value==0)
		{alert("please insert No of days for the Game to be available"); frm.days_no.focus(); return false;}
	}
	return true;
	}

	function display(area_id)
	{
	
		document.getElementById(area_id).style.display = 'block';
		//document.getElementById(area_id).style.visibility = 'hidden';
		//alert("display");
	}
	
	function hide(area_id)
	{
		document.getElementById(area_id).style.display = 'none';
		//alert("hide");
	}
</script>
<?php
$flag;
  	  		
$module_title="products";
$topic_id=$_REQUEST['topic_id'];
$auction_st_price;
//echo $auction_st_price.",".$gametype.",".$click_amount.",".$days_no;
$button_value="Add Product";
if (isset($_REQUEST["topic_id"])){
	$topic_row =mysql_fetch_array(mysql_query("SELECT * FROM products WHERE pro_id=".$_REQUEST["topic_id"]));
	$game_pro=mysql_query("select * from game where id_pro=".$_REQUEST["topic_id"]);
	
	$topic_en_title = stripslashes($topic_row["pro_name"]); 
	$topic_en_price= stripslashes($topic_row["pro_price"]);	
	$topic_en_summary = stripslashes($topic_row["pro_details"]); 
	$topic_image = stripslashes($topic_row["image"]);
	$topic_type= stripslashes($topic_row["pro_type"]);
	$cat_id=$topic_row['pro_cat_id'];
	
	if(mysql_num_rows($game_pro) != 0)
	{
		$game_fetch=mysql_fetch_array($game_pro);
			$auction_st_price=addslashes($game_fetch["auction_start_price"]);
  			$gametype=addslashes($game_fetch["game_type"]);
  			$click_amount=addslashes($game_fetch["click_amount"]);
  			$days_no=addslashes($game_fetch["days_no"]);
  	  		
	}
	
	$button_value="Update Product";
  }
if(isset($_REQUEST["topic_en_title"]) ||$_REQUEST['delete']==1){
  		$topic_en_title=addslashes($_REQUEST["topic_en_title"]);
  		$topic_en_summary=addslashes($_REQUEST["topic_en_summary"]);
  		$topic_en_price=addslashes($_REQUEST["topic_en_price"]);
  		$topic_image=$_REQUEST["topic_image"];
  		$topic_type=$_REQUEST[""];
  		$cat_id=$_REQUEST['cat_id'];
  		//data for auction will be saved at the game table
  			$auction_st_price=addslashes($_REQUEST["auction_st_price"]);
  			$gametype=addslashes($_REQUEST["gametype"]);
  			$click_amount=addslashes($_REQUEST["click_amount"]);
  			$days_no=addslashes($_REQUEST["days_no"]);
  		
  		 if(empty($topic_id))
  		 {
   			$sql="INSERT INTO products (pro_name,pro_details,image,pro_price,pro_type,pro_cat_id) VALUES('$topic_en_title','$topic_en_summary', '$topic_image', '$topic_en_price', '$topic_type','$cat_id')";
     		$str = "Added Done Successfully";
     		$flag="insert";
     	}
     	
     	if(!empty($topic_id)){
   	//echo "SSS".$_REQUEST['delete'];
   	   if($_REQUEST['delete']!=1)
   	   {
   	   	$_SERVER["REQUEST_URI"]="products_manage.php";
	    $sql="UPDATE products SET pro_name='$topic_en_title', pro_details='$topic_en_summary', image='$topic_image', pro_price='$topic_en_price',pro_cat_id='$cat_id' WHERE pro_id=$topic_id";
	    $str = "Update Done Successfully"; 
	    $flag="update";
   	   }
    
    if($_REQUEST['delete']==1)
    {
    	$_SERVER["REQUEST_URI"]="products.php?cat_id=".$_REQUEST['cat_id']."";
       $sql ="DELETE FROM products WHERE pro_id=$topic_id";
       //mysql_query("DELETE FROM $SUB_TABLE WHERE topic_id=$topic_id");
       //mysql_query("delete from books_without where id=$topic_id");
       $str = "Delete Done Successfully";
       $flage="delete";
    }
          }
          if(mysql_query($sql)){
          	if($flag=="insert")
          	{
     			$other_sql=" INSERT INTO game (game_type,auction_start_price,click_amount,days_no,id_pro) VALUE('$gametype','$auction_st_price','$click_amount','$days_no',".mysql_insert_id().")";		
         	 	mysql_query($other_sql) or die(mysql_error());
          	}
          if($flag=="update")
          {
          	$other_sql="update game set game_type='$gametype', auction_start_price='$auction_st_price', click_amount='$click_amount', days_no='$days_no' where id_pro=$topic_id";
          	mysql_query($other_sql);
          }
          if($flag=="delete")
          {
          	$other_sql="DELETE FROM game where id_pro=$topic_id";
          	mysql_query($other_sql);
          }
   	   echo ("<script>");
           echo ("this.location = 'update.php?head=".urlencode($_SERVER["REQUEST_URI"])."&str=$str';");
           echo ("</script>"); 

   	   } else die(mysql_error());
  	}
 
?>

<?php 
$check_s="";
$check_a="";
$check_sa="";
echo "
    <form action='".$_SERVER['REQUEST_URI']."' method=post>
      <div class=table> <img src='img/bg-th-left.gif' width=8 height=7 alt='' class='left' /> <img src='img/bg-th-right.gif' width='7' height='7' alt='' class='right' />
        <table class='listing form' cellpadding=0 cellspacing='0'>
          <tr>
            <th class=full colspan='2'>Products Mangement</th>
          </tr>
          <tr>
            <td width=172 class=first><strong>Category</strong></td>
            <td class=last><select name='cat_id'>";
		$sql="select * from prod_cat";
		$res_cat=mysql_query($sql);
	
		while($row_cat=mysql_fetch_array($res_cat))
		{
			if($cat_id==$row_cat['id'])
			$sel="selected";
			else 
			$sel="";
           echo " <option value='".$row_cat['id']."' $sel>".$row_cat['cat_name']."</option>";
		}
         echo "</select></td>
          </tr>
          <tr class=bg>
            <td class=first><strong>Product name</strong></td>
            <td class=last><input type=text class=text name=topic_en_title value='$topic_en_title' /></td>
          </tr>
          <tr>
            <td class=first><strong>picture</strong></td>
            <td class=last>
              <input name='topic_image' type='text' class=file ID='topic_image'  value='".$topic_image."' />
              <input type='button' onclick=window.open('../images_manager.php?dir=media/$module_title&input=topic_image','insert_image','width=770,height=500,scrollbars=1'); value='Browse' />
            </td>
          </tr>
          <tr class=bg>
            <td class=first><strong>Product Price</strong></td>
            <td class=last><input type=text class=text name=topic_en_price value='$topic_en_price' />$</td>
          </tr>
          <tr>
          <td class=first><strong>Product Type</strong></td>
         	<td class=last>";
			if($topic_type=="S"){ $check_s="checked"; echo"<script>display('auctionData');</script>";}
			elseif($topic_type=="A") {$check_a="checked"; echo"<script>display('auctionData');</script>";}
			else {$check_sa="checked"; echo"<script>display('auctionData');</script>";}
			        
         	echo"<INPUT TYPE=RADIO NAME='topic_type' VALUE='S' $check_s onclick=\"hide('auctionData');\" >Store<BR>";
			echo"<INPUT TYPE=RADIO NAME='topic_type' VALUE='A' $check_a onclick=\"display('auctionData');\">Auction<BR>";
			echo"<INPUT TYPE=RADIO NAME='topic_type' VALUE='SA' $check_sa onclick=\"display('auctionData');\">Store and Auction</td>";
	
		 
			echo"</tr><tr><td colspan='2'>";
         
			//*****************************************
			echo "<span id='auctionData' style='display: none;' >
			<table width=100%>
			<tr>
            <th class=full colspan='2'>Auction Details</th>
          </tr>
			<tr>
			<td class=first ><strong>Auction Game Type<strong></td>
			<td class=last><select name='gametype'>";
			$sql_g="select game_type from game";
			$res_game=mysql_query($sql_g);
	
		while($row_g=mysql_fetch_array($res_game))
		{
			if($gametype==$row_g['game_type'])
			$sel="selected";
			else 
			$sel="";
           echo " <option value='".$row_cat['game_type']."' $sel>".$row_g['game_type']."</option>";
		}
	
			echo"</select>&nbsp;&nbsp; Player</td>
			</tr>
			<tr>
			<td class=first><strong>Auction start Price</strong></td>
			<td class=last><input type='text' name='auction_st_price' value='$auction_st_price'>&nbsp;$</td>
			</td>
			</tr>
			<tr>
			<td class=first><strong>Click amount</strong></td>
			<td class=last><input type='text' name='click_amount' value='$click_amount'>&nbsp;Pid</td>
			</tr>
			<tr>
			<td class=first><strong>Game Available Days</strong></td>
			<td class=last><input type='text' name=days_no value='$days_no'>&nbsp; Day</td>
			</tr>
			</table>
			</span>
			</tr></td>
          <tr  class=bg>
          <td class='first' colspan=2><strong>Product Details</strong></td></tr> 
          <tr><td class='first' colspan=2>";
        $oFCKeditor = new FCKeditor('topic_en_summary') ; 
		$oFCKeditor->BasePath = 'fckeditor/' ;
		$oFCKeditor->Value = $topic_en_summary ;
		$oFCKeditor->Height = 400 ;
		$oFCKeditor->Create() ; 
         echo " </td></tr>        
         <tr><td class='first' colspan=2 align='center'><div align=center><input type='submit' value='$button_value' onclick='return validate(this.form);'/></div></td></tr> 
        </table>
        </div>
        </form>
 </div>";
          
 ?>

    
     <div id="right-column"> <strong class="h">INFO</strong>
      <div class="box">Detect and eliminate viruses and Trojan horses, even new
        and unknown ones. Detect and eliminate viruses and Trojan horses, even
        new and </div>
    </div>
<?php 
include '1footer.php';?>

