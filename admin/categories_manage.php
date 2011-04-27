<?php
include '1header.php';

$topic_id=$_REQUEST["cat_id"];
//echo $topic_id;

if(isset($_REQUEST["cat_title"]) ||$_REQUEST['delete']==1){
  		$cat_title=addslashes($_REQUEST["cat_title"]);

  		 if(empty($topic_id))
  		 {
   			$sql="INSERT INTO prod_cat (cat_name) VALUES ('".$cat_title."')";
     		$str = "Added Done Successfully";
     	}
     	
     	if(!empty($topic_id)){
 //  	echo "SSS".$_REQUEST['delete'];
   	   if($_REQUEST['delete']!=1)
   	   {
		   	$_SERVER["REQUEST_URI"]="categories_manage.php";
		    $sql="UPDATE prod_cat SET cat_name='$cat_title' WHERE id=$topic_id";
		    $str = "Update Done Successfully";
   	   }
    
    if($_REQUEST['delete']==1){
    	$_SERVER["REQUEST_URI"]="categories_manage.php";
       $sql ="DELETE FROM prod_cat WHERE id=$topic_id";
       $str = "Delete Done Successfully";}
          }
          if(mysql_query($sql)){
          	  
   	   echo ("<script>");
       echo ("this.location = 'update.php?head=".urlencode($_SERVER["REQUEST_URI"])."&str=$str';");
      echo ("</script>"); 

   	   } else die(mysql_error());//$error_message ="EC??EC?EC??EC";     
  	}
 $button_value="Add Category";
if (isset($_REQUEST["cat_id"])){
	$topic_row =mysql_fetch_array(mysql_query("SELECT * FROM prod_cat WHERE id=".$_REQUEST["cat_id"]));
	$cat_title = stripslashes($topic_row["cat_name"]); 	
	$button_value="Update Category";
  }
?>
<?php 
     echo " <div class='table'> <img src='img/bg-th-left.gif' width=8 height=7 alt='' class='left' /> <img src='img/bg-th-right.gif' width='7' height='7' alt='' class='right' />";
     echo "<form action=\"".$_SERVER["request"]."\" method=post>";
      echo"<table class='listing form' cellpadding='0' cellspacing='0'>";
        echo "  <tr>";
         echo "  <th class=full colspan=2>Categories mangement</th>";
          echo "</tr>";
          echo "<tr>";
           echo " <td class=first width=172><strong>Category</strong></td>";
            echo"<td class=last><input type=text class=text name='cat_title' value='".$cat_title."' /></td>";
          echo "</tr>";
          echo"<tr class='bg'>";
          echo" <td colspan=2 class=first><div align=center><input type='submit' value='".$button_value."' onclick='return validate(this.form);'/></div></td>";
          echo"</tr>";
          if(!empty($error_message))
          {
          echo"<tr>
            <td colspan=2 align=center valign=middle class=first>".$error_message."</td>
          </tr>";
          }
        echo"</table>
        <p>&nbsp;</p>
        </form>
      </div>";
 ?>
<?php 
$sql="select * from prod_cat ";
$res=mysql_query($sql);
echo "
      <div class='table'> <img src='img/bg-th-left.gif' width='8' height=7 alt='' class=left /> <img src='img/bg-th-right.gif' width=7 height=7 alt='' class='right' />
        <table class=listing cellpadding='0' cellspacing='0'>
          <tr>
            <th class=first width=177>Category Name</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>";
while ($row=mysql_fetch_array($res))
{
	echo"  <tr>
            <td class='first style2'>- ".$row['cat_name']." </td>
            <td><img src='img/hr.gif' width='16' height='16' alt='delete' style='cursor:pointer' onclick='delete_sure(".$row['id'].");'/></td>
            <td><a href='categories_manage.php?cat_id=".$row['id']."'<img style='cursor:pointer' src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a></td>
          </tr>";
	          
}
      echo"  </table>
        <div class='select'> <strong>Other Pages: </strong>
          <select>
            <option>1</option>
          </select>
        </div>
      </div></div>";
?>
<div id="right-column"> <strong class="h">INFO</strong>
      <div class="box">Detect and eliminate viruses and Trojan horses, even new
        and unknown ones. Detect and eliminate viruses and Trojan horses, even
        new and </div>
    </div>
<?php 
include '1footer.php';
?>
<script type="text/javascript">
function validate(frm)
{
if(frm.cat_title.value=="")
{
alert("you didn't insert a Category");
frm.cat_title.focus();
return false;
}
return true;
}
function delete_sure(id)
{
if(confirm("Are you sure you want to delete it"))
{	//alert("check delete"+id);
window.location = "categories_manage.php?cat_id="+id+"&delete=1";
}
}
</script>
