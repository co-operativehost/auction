<?php include("val.php"); check("admin"); ?>
<?include("connect.php");?>
<?include("func.php");?>
	<head>
<link href="../images/default.css" rel="stylesheet" type="text/css">
 </head> 
<?php 
$dir = $_REQUEST["dir"];
$file = $_FILES['file']['name'] ;  
$new_file=random(5);
$ext=explode('.',$file);
$new_file=$new_file.".".$ext[1];
if (!empty($file)){
   
 	if(move_uploaded_file($_FILES['file']['tmp_name'], "$dir/".$new_file)){
     $str = "<b> The image added ....... </b><br> the image path :/ <br> <br><font color=red>$ROOT/media/$file </font> <br> <img src='$ROOT/media/$file'><br>" ;
     $str.= "<br><br> <font size =1> Copy the path and use it in the editor ........ ";
     $str = "Uploading done .......";
	 
	 }
	else $str = "error uploding File : try to use another File name : ";
	$head = urlencode($head);
	//header("Location: update.php?head=$head&str=$str");
	echo ("<script>");
 echo("this.location='update.php?head=".urlencode($_REQUEST["head"])."&str=$str'");
 echo ("</script>");
	}
   
  


?>

<table width="100%" cellspacing="2" cellpadding="0" style="border: 1px solid rgb(220,226,190)">
            <tr > 
              <td background="../images/index18.gif" height="22" colspan="2" ><div align="center"><strong> Action taken </strong></font> </div></td>
            </tr>

 <tr> <td align=center> <b>	<br> <? echo "$str"; ?>
  </font></b> <br> </td> </tr> </table>
