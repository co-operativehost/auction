<?php
include '1header.php';

$topic_id=$_REQUEST["cat_id"];
echo $topic_id;

if(isset($_REQUEST["keyword_title"]) ||$_REQUEST['delete']==1){
  		$keyword_title=addslashes($_REQUEST["keyword_title"]);

  		 if(empty($topic_id))
  		 {
   			$sql="INSERT INTO key_words (key_word) VALUES ('".$keyword_title."')";
     		$str = "Added Done Successfully";
     	}
     	
     	if(!empty($topic_id)){
   //	echo "SSS".$_REQUEST['delete'];
   	   if($_REQUEST['delete']!=1)
    $sql="UPDATE key_words SET key_word='$keyword_title' WHERE id=$topic_id";
       
    $str = "Update Done Successfully";
    
    if($_REQUEST['delete']==1){
    	$_SERVER["REQUEST_URI"]="keywords_manage.php";
       $sql ="DELETE FROM key_words WHERE id=$topic_id";
       echo"we are on the delete";
       //mysql_query("DELETE FROM $SUB_TABLE WHERE topic_id=$topic_id");
       //mysql_query("delete from books_without where id=$topic_id");
       $str = "Delete Done Successfully";}
          }
          if(mysql_query($sql)){
          	  
   	   echo ("<script>");
       echo ("this.location = 'update.php?head=".urlencode($_SERVER["REQUEST_URI"])."&str=$str';");
      echo ("</script>"); 

   	   } else die(mysql_error());//$error_message ="EC??EC?EC??EC";     
  	}
 $button_value="Add key word";
if (isset($_REQUEST["cat_id"])){
	$topic_row =mysql_fetch_array(mysql_query("SELECT * FROM key_words WHERE id=".$_REQUEST["cat_id"]));
	$keyword_title = stripslashes($topic_row["key_word"]); 	
	$button_value="Update key word";
  }
?>
<?php 
     echo " <div class='table'> <img src='img/bg-th-left.gif' width=8 height=7 alt='' class='left' /> <img src='img/bg-th-right.gif' width='7' height='7' alt='' class='right' />";
     echo "<form action=\"".$_SERVER["request"]."\" method=post>";
      echo"<table class='listing form' cellpadding='0' cellspacing='0'>";
        echo "  <tr>";
         echo "  <th class=full colspan=2>Keywords mangement</th>";
          echo "</tr>";
          echo "<tr>";
           echo " <td class=first width=172><strong>KeyWord</strong></td>";
            echo"<td class=last><input type=text class=text name='keyword_title' value='".$keyword_title."' /></td>";
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
$sql="select * from key_words ";
$res=mysql_query($sql);
echo "
      <div class='table'> <img src='img/bg-th-left.gif' width='8' height=7 alt='' class=left /> <img src='img/bg-th-right.gif' width=7 height=7 alt='' class='right' />
        <table class=listing cellpadding='0' cellspacing='0'>
          <tr>
            <th class=first width=177>keywords</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>";
while ($row=mysql_fetch_array($res))
{
	echo"  <tr>
            <td class='first style2'>- ".$row['key_word']." </td>
            <td><img src='img/hr.gif' width='16' height='16' alt='delete' style='cursor:pointer' onclick='delete_sure(".$row['id'].");'/></td>
            <td><a href='keywords_manage.php?cat_id=".$row['id']."'<img style='cursor:pointer' src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a></td>
          </tr>";
	          
}
      echo"  </table>
        <div class='select'> <strong>Other Pages: </strong>
          <select>
            <option>1</option>
          </select>
        </div>
      </div>";
?>
<?php 
include '1footer.php';
?>
  <script type="text/javascript">
function validate(frm)
{
if(frm.keyword_title.value=="")
{
alert("you didn't insert a keyword");
frm.keyword_title.focus();
return false;
}
return true;
}
function delete_sure(id)
{
if(confirm("Are you sure you want to delete it"))
{	//alert("check delete"+id);
window.location = "keywords_manage.php?cat_id="+id+"&delete=1";
}
}
</script> 
