<?php //include("val.php"); check("admin"); ?>



<link rel="stylesheet" type="text/css" href="/include/style.css">
<? //include ('include/conn.php'); ?>
<? if (!empty($_REQUEST["delete_file"])){
	unlink($_REQUEST["delete_file"]);
	$str = "Delete done ..............";
	 echo ("<script>");
       echo ("this.location = 'update.php?head=".urlencode($_SERVER["PHP_SELF"]."?dir=".$_REQUEST["dir"]."&input=".$_REQUEST["input"])."&str=$str';");
      echo ("</script>"); 
	}?>
<?php
$dir=$_REQUEST["dir"]."/";
$input=$_REQUEST["input"];
echo "<table width=770 bgcolor=#FFFFFF align=center><tr> <td>";
include ("upload_images.php");
//echo "<form action='' method=post name=form1>";
//$dir = "media/";

echo "<BR><table width=98% bgcolor=#444444>";
// Open a known directory, and proceed to read its contents
 echo "<tr>";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        echo "<td  valign=top align=center>  ";
		
		//echo "<select  size=30 onChange=chang_image(); name=image_select>";
		$i=0;
		//echo "<option > Images List found ..... ";
		echo "<b> <font color=white>FILES   LIST  <br><br>";
		echo "<DIV style='width:200px; height:350px; z-index:1; overflow:auto;'>";
		echo "<table cellpadding=3 cellspacing=1 width=100% bgcolor=#DDDDDD>";
	
	//	echo "<tr>";
	    $i=0;
		while (($file = readdir($dh)) !== false ) {
		//	echo $file."<br>";
				if(is_file($dir.$file))
				$files_list[]=$file;
				if(is_dir($dir.$file))
				$dir_list[]=$file;
				
			
		} //echo $images_list;
		sort($files_list);
		sort($dir_list);
		$images_list=array_merge($dir_list,$files_list);
		
		for($i=2;$i<count($images_list);$i++) {
	//	if($file!="." || $file!=".."){
		$file = $images_list[$i];
			if(is_file($dir.$file)){ 
				$image = getimagesize($dir.$file);
			 if (!empty($image)) 
			   {$idenf= 1; $im='pdf.gif';}
			 else {$idenf=2; $im='text.gif';}
			}
			if(is_dir($dir.$file)) {$idenf=3; $im='folder.gif';}
		echo "<tr bgcolor=#FFFFFF><td bgcolor=#DDDDDD align=center><img src='/".$dir.$file."' width=80 height=80></td><td onclick=chang_image('".$dir."$file',$idenf); style='border: 1px solid #ffffff; cursor: hand' onMouseover = 'over(this);' onMouseOut = 'out(this);'> $file </td></tr>";
		$images_list[$i]='$file';
	//	if($i%2!=0) echo "</tr><tr>"; 
          // echo "<input type=hidden value=$file name=$images_list[]>";
		    //echo "filename: <b>$file </b>: filetype: " . filetype($dir . $file) . "<br>"; 
		 //if ($file!="." || $file!="..")
		  //echo "<option value='$i' > $file </option>";
		//$i++; 
		//}
        } //echo "</select>";
        echo "</table></div>";
        echo "</td>"; 
       // closedir($dh);
echo "<td valign=top width=85% bgcolor=#EEEEEE><DIV name=div1 id=div1 style='width:600px; height:370px; z-index:1; overflow:auto;' align=center> </div> </td></tr>"; 
//echo "<tr><td> </td> <td align=center>";  echo "</td> </tr>";   
	}
}
echo "</tr>";
echo "</table> </form>";
echo "</td> </tr></table>";
echo "<script>opener_field='$input'; </script>";
?> 

<script>
 function chang_image(image_path,idenf){
 //alert(image_path);
 //alert(idenf);
 
 //alert (sel.options.selectedIndex);
// image_path=document.form1.image_select.options[document.form1.image_select.options.selectedIndex].text;
 str = "<table width=80% cellpadding=4 cellspacing=1>";
 str+="<tr bgcolor=#DDDDDD><td> <b>File Details </td> </tr>";
 str+="<tr><td align=center> <b>Path </b>:: <font color=red>/"+image_path+" <input type=button value='   Select    ' onclick=select_file('/"+image_path+"')>  <input type=button value=' Delete ' onClick=delete_file('"+image_path+"')></td> </tr>";
 if(idenf==1)
 str+="<tr> <td align=center bgcolor=white style='border: 1px #CCCCCC solid'><img src="+image_path+" > </td> </tr>";
 if(idenf==2)
 str+="<tr> <td align=center bgcolor=white style='border: 1px #CCCCCC solid'><img src='/images/pdf.gif' > </td> </tr>";
 if (idenf==3)
 	 this.location='/images_manager.php?dir='+image_path;
document.getElementById('div1').innerHTML=str;
 }
</script>
	
	<script>
 function over(which){ 
  which.style.background = '#DDDDDD';
  which.style.color="#000000";
  //which.style.border = '1px RGB(220,220,220) solid';
  
 }
 
 function out(which){
  which.style.background = 'white';
  which.style.color="#333333";
  which.style.border = '0px';
 }
  function select_file(image_path) {
  	  	
 window.opener.document.getElementById("<?php echo $input; ?>").value=image_path;
  alert(" Selection Done ............");
}
 function delete_file(image_path) {
  	if(confirm("Are you Sure you want to delete that File ??")){  	
 this.location="<?=$_SERVER['REQUEST_URI'].'&delete_file='?>"+image_path;
      }
}   
</script>
sfa aslkdf sakjdfh sakdjfh aksjdfksadf