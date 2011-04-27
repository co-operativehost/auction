<?php
include '1header.php';

	$TABLE_NAME="galary";
	$module_title="galary";
	echo $topic_image;
	$topic_id=$_REQUEST["topic_id"];
	if(isset($_REQUEST["submit"]) ||$_REQUEST['delete']==1){
		$topic_image=$_REQUEST["topic_image"];
		//$gal_cat=$_REQUEST['gal_cat'];
		if(empty($topic_id))
  		{
  			$sql="INSERT INTO $TABLE_NAME (img) VALUES('$topic_image')";
     		$str = "Added Done Successfully";
  		}
  		if(!empty($topic_id)){
  			if($_REQUEST['delete']!=1)
  			{
  				$_SERVER["REQUEST_URI"]="galary_manage.php";
  				$sql="UPDATE $TABLE_NAME SET img='$topic_image' WHERE id=$topic_id";
  				$str = "Update Done Successfully";
  			}
  			if($_REQUEST['delete']==1)
  			{
  				$_SERVER["REQUEST_URI"]="galary_manage.php";
  				$sql ="DELETE FROM $TABLE_NAME WHERE id=$topic_id";
  				$str = "Delete Done Successfully";
  			}
  		}
  		 if(mysql_query($sql)){
   	   		echo ("<script>");
       		echo ("this.location ='update.php?head=".urlencode($_SERVER["REQUEST_URI"])."&str=$str';");
      		echo ("</script>"); 
   	   } else die(mysql_error());
	}


 $button_value="Add Picture";
if (isset($_REQUEST["topic_id"])){
	$topic_row =mysql_fetch_array(mysql_query("SELECT * FROM $TABLE_NAME WHERE id=".$_REQUEST["topic_id"]));
	$topic_image = stripslashes($topic_row["img"]);
	//$gal_cat=$topic_row['cat_id'];
	$button_value="Update Picture";
  }
	
echo "
<form action=\"".$_SERVER['REQUEST_URI']."\" method=post>
  <div class=table> <img src='img/bg-th-left.gif' width=8 height=7 alt='' class='left' /> <img src='img/bg-th-right.gif' width=7 height=7 alt='' class='right' />
        <table class=listing form cellpadding=0 cellspacing=0>
          <tr>
            <th class=full colspan=2>Gallery Mangement </th>
          </tr>
          <tr>
            <td class=first width=172><strong>Picture</strong></td>
            <td class=last>   
            <input type=text name='topic_image' id='topic_image' value=\"$topic_image\" />
            <input type='button' value='Browse' onclick=window.open('images_manager.php?dir=media/$module_title&input=topic_image','insert_image','width=770,height=500,scrollbars=1'); />
            </td>
          </tr>
          <tr class=bg>
            <td colspan=2 class=first align=center><div  align=center> 
			<input type='submit' name='submit' value='".$button_value."' onclick='return validate(this.form);'/>
            </div></td>
          </tr>
         </table>
        <p>&nbsp;</p>
      </div>
      </form>";

	$sql="select * from galary"; 
	$res=mysql_query($sql);     
      echo"
      <div class=table> <img src='img/bg-th-left.gif' width=8 height=7 alt='' class=left /> <img src='img/bg-th-right.gif' width=7 height=7 alt='' class=right />
        <table class=listing cellpadding=0 cellspacing=0>
          <tr>
            <th class=first width=177>Galary Pictures</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>";
      while ($row=mysql_fetch_array($res))
      {
      echo"
          <tr>
            <td><img src='".$row['img']."' width=100 height=100 /></td>
             <td><input type=image src='img/hr.gif' width='16' height='16' alt='delete' style='cursor:pointer;' onclick=delete_sure(".$row['id']."); /></td>
            <td><a href='galary_manage.php?topic_id=".$row['id']."'><img style='cursor:pointer;' src='img/edit-icon.gif' width='16' height='16' alt='edit' /></a></td>
          </tr>";
      }
          echo "
        </table>
        <div class=select> <strong>Other Pages: </strong>
          <select>
            <option>1</option>
          </select>
        </div>
      </div>
      
        
       
    </div>
     <div id=right-column> <strong class=h>INFO</strong>
      <div class=box>Detect and eliminate viruses and Trojan horses, even new
        and unknown ones. Detect and eliminate viruses and Trojan horses, even
        new and </div>
    </div>
    </div>
    
  </div>
</div>
<div style='clear:both'></div>";


include '1footer.php';
?>
<script>
function delete_sure(id)
{
	if(confirm("Are you sure you want to delete it"))
	{	//alert("check delete"+id);
	window.location = "galary_manage.php?topic_id="+id+"&delete=1";
	}
}

function validate(frm)//alert("yes");
{	
	   if(frm.topic_image.value=="")
	 {
	   alert("Please choose image");
	   return false; 
	 }
   
	
	return true;
	}

	
</script>