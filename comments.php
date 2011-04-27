<?php
include("header.php");

?>   

<?php
if(isset($_REQUEST['str']))
$note=$_REQUEST['str'];
else
$note="";

	$sql="select * from pages where ID=4";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	echo"<h3>".$comments_word."</h3>";
	echo "<table width=96% ALIGN=center $dir> <tr> <td align=$align> <br>".stripslashes($row[$lang.'_DETIALS'])."</td></tr> </table>";
	if($_SESSION['main_admin']==1)
		echo "<br><p align=Center > <a href=public_pages/edit_pages.php?page_id=4><b> [ Edit page ] </a></br></br></p>";
?>


<div style="padding:5px 5px 5px 5px;" class="contacttitle" >

<?php echo $comment_statment; ?>

    <table  width="670" border="0" <?php echo $dir;?> >
        <tr><td>
        <form id="contactform" method=post action='commentsprocess.php' class="formborder">                
            <table   border="0" width="100%"  style="height: 300px;margin: 5px;">
     <tr>
         <td  align="<?=$align?>" width="40%"  ><?php echo $name_word; ?></td>
       <td   align="<?=$align?>" width="60%" ><input  name="fullname" id="fullname" size="20" value="" type="text" /></td>
     </tr>
   
     <tr>
       <td  align="<?=$align?>" ><label for="email"><?php echo $email_word; ?></label></td>
       <td  align="<?=$align?>"><input  name="email" size="20" value="" type="text" /></td>
     </tr>
	<tr>
    <td align="center" ><img src="/images/avatar-male.png"  width="60"/>
    <input type="radio" value="0" checked="checked" name="gender" /></td>
    <td align="center" ><img src="/images/avatar-female.png" width="60"/>
    <input type="radio" value="1" name="gender" /></td>
    </tr>
     <tr>
       <td valign="middle" align="<?=$align?>" ><label for="message"><?php echo $Comment_word; ?></label></td>
       <td   align="middle"><textarea  name="comment"  cols="40" rows="7" style="margin-right:10px;" ></textarea></td>
     </tr>
     <tr><td colspan="2" align="center">
     
      <input  name= 'action' value='sub' type='hidden'> 
      <input type='submit'  value='<?php echo $add_word;?>' onclick="return check(this.form);">
      </td></tr>
       </table></form>
    </td>
            <td>
                <div class="contactusimage">
                    <img src="/images/take-notes.jpg" width="200" height="300"/>
                </div>
    </td></tr>
    <tr><td align="center"><h4><?=$note?></h4></td></tr>
    </table>
 
</div>
<!--****************************************************************************************************-->
<?
	$page_NO = $_REQUEST["page_NO"];
	$interval=6;
    if(empty($page_NO)) $page_NO=0;
    $total = mysql_num_rows(mysql_query("SELECT * FROM comments order by id DESC"));
    if(!$topic_res = mysql_query("SELECT * FROM comments ORDER BY id DESC LIMIT $page_NO,$interval")){die(mysql_error());}
    $topics_number = mysql_num_rows($topic_res);
    ?>

    <?php
	if($_SESSION['main_admin'])
{
	echo"<h3>".$oldComments_word."</h3>";
    if ($topics_number>0)
    {
    	
    	echo "<table align=center width=100% border=0 cellpadding=3 cellspacing=3>";
    
    	$i=0;
    	while($row=mysql_fetch_array($topic_res))
    	{
			
    		echo "<tr>";
    		echo "<td valign=top>";
    		echo "<table width=100% border=1 $dir>";
    		if($row['gender']==0)
    			$img="../images/avatar-male.png";
    		else
    			$img="../images/avatar-female.png";
    		echo "<tr><td rowspan=3 valign=top width=100><img class='subimage' src='".$img."' height=100 width=100></td>
    		<td valign=top height=30  align=$align>".stripslashes($row['name'])."<br/>".stripslashes($row['email'])."</td>
			<td>".stripslashes($row['comment_date'])."</td>
			</tr>";
    		echo "<tr>";
    		echo "<td valign=top align=$align $dir class='subdetails'>";
    		echo strip_tags($row['comment']);
                //echo $row['part_details'];
    		echo "</td>";
    		echo "</tr>";
    			echo "<tr><td valign=top >";
    			echo "<table align=center width=100%>";
    			echo "<TR><TD align=center> <input width=20px hight=30px type=image src ='../images/accept.jpg' onclick=window.location='manage_comments.php?topic_id=".$row['id']."' title='  $accepting_word  ' style='border=0px'>";
    echo " <input type=image src ='../images/delete.gif' onclick='delete_sure(".$row['id'].");' title=' $remove_word  ' style='border=0px'></TD></TR>";
    			echo "</table>";
    			echo "</td></tr>";
    		
    		echo "</table>";
    		echo "</td>";
    		echo "</tr>";
    		echo "<tr><td align=left><hr style='color:#cccccc'></td></tr>";
    	}
    	
    	echo "</table>";
    	
    	//include("navi.php");
    }
}	
else
{
$page_NO = $_REQUEST["page_NO"];
	$interval=6;
    if(empty($page_NO)) $page_NO=0;
    $total = mysql_num_rows(mysql_query("SELECT * FROM comments where confirm='1' order by id DESC "));
    if(!$topic_res = mysql_query("SELECT * FROM comments where confirm='1' ORDER BY id DESC LIMIT $page_NO,$interval")){die(mysql_error());}
    $topics_number = mysql_num_rows($topic_res);
    ?>

    <?php
	echo"<h3>".$oldComments_word."</h3>";
    if ($topics_number>0)
    {
    	
    	echo "<table align=center width=100% border=0 cellpadding=3 cellspacing=3>";
    
    	$i=0;
    	while($row=mysql_fetch_array($topic_res))
    	{
			
    		echo "<tr>";
    		echo "<td valign=top>";
    		echo "<table width=100% border=1 $dir>";
    		if($row['gender']==0)
    			$img="../images/avatar-male.png";
    		else
    			$img="../images/avatar-female.png";
    		echo "<tr><td rowspan=3 valign=top width=100><img class='subimage' src='".$img."' height=100 width=100></td>
    		<td valign=top height=30  align=$align>".stripslashes($row['name'])."<br/>".stripslashes($row['email'])."</td>
			<td>".stripslashes($row['comment_date'])."</td>
			</tr>";
    		echo "<tr>";
    		echo "<td valign=top align=$align $dir class='subdetails'>";
    		echo strip_tags($row['comment']);
                //echo $row['part_details'];
    		echo "</td>";
    		echo "</tr>";

    		echo "</table>";
    		echo "</td>";
    		echo "</tr>";
    		echo "<tr><td align=left><hr style='color:#cccccc'></td></tr>";
    	}
    	
    	echo "</table>";
    	
    	//include("navi.php");
    }

}

?>
<script>
 function delete_sure(id){
  if(confirm("Are you sure you want to delete it?")){
   	window.location = "manage_comments.php?topic_id="+id+"&delete=1";
  }
 }
</script>

<script>
function check(frm)
{
	if(frm.fullname.value=="")
	{
		alert('please.enter your name');
		frm.fullname.focus();
		return false;
	}
	
	if(frm.email.value=="")
	{
		alert('please.enter your email');
		frm.email.focus();
		return false;
	}
	
	var apos=frm.email.value.indexOf("@");
	var dotpos=frm.email.value.lastIndexOf(".");
	if(apos<1||dotpos-apos<2)
	{
		alert("please, enter your email in correct format");
		frm.email.focus();
		return false;
	}

	
	if(frm.comment.value=="")
	{
		alert('please.enter your Comment');
		frm.comment.focus();
		return false;
	}
	
	//alert(frm.fullname.value+","+frm.email.value+","+frm.comment.value+","+frm.gender[0].value);
	return true;
}
</script>

<?php include("footer.php"); ?>   