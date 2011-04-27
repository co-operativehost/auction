<?php include("val.php"); check("admin"); ?>
  <table width="80%" >
 <tr>
                            <td colspan="2">

  <form action="add_images.php?id=<? echo $the_id; ?>&head=<? echo urlencode($_SERVER['REQUEST_URI']); ?>" method="post" enctype="multipart/form-data" >
	<table width="85%" border="0" cellspacing="1" cellpadding="0" align="center" style="border: 1px solid rgb(232,236,213)">
      <input name=dir value='<?=$dir;?>' type=hidden>
      <tr> 
        <td background="../images/index18.gif" colspan="7" height="20">
		<div align="center"> <strong>Upload Files manager </strong> </div></td>
      </tr>
      
                            <tr> <td valign=top ><input name="str_val" type="hidden" value=""> <div id="div11" align=center > </div></td>
                              <td width="22%" align="center"> 
                                  <strong> File path   </strong> 
                                </div></td>
                              <td colspan="3"> 
                                <input type="file" name="file"  size=50></td>
    
        
      
        
        <td  align="center"><input type="button" name="Button" value=" Add File " onClick="add_to_text(this.form);"></td>
        
      </tr>
	   </table>
  </form>
	   </table>
	   
	   <script>
  function add_to_text(form){
  
  
    if (form.file.value!="" && vcheck_type(form)){ 
	  form.submit();
	 }
	
	else alert ("Select  a File ....... ");
	
	
	}
	
	function vcheck_type (form){
	//alert(ss);
	if (form.file.value.toUpperCase().lastIndexOf(".JPG")==(form.file.value.length-4) ||form.file.value.toUpperCase().lastIndexOf(".GIF")==(form.file.value.length-4) || form.file.value.toUpperCase().lastIndexOf(".PNG")==(form.file.value.length-4) )
		  return true;
	 else {
	 return false;
	 }
	}
	
 </script>
 
<script>
    function view_image (form){
	//alert(ss);
	if (form.file.value.toUpperCase().lastIndexOf(".JPG")==(form.file.value.length-4) ||form.file.value.toUpperCase().lastIndexOf(".GIF")==(form.file.value.length-4))
		  document.getElementById("div11").innerHTML="<TABLE width = 60% cellpadding=0 cellspacing=0 style='border: 1px solid #000000'> <tr></tr><tr> <td><img src= '"+form.file.value+"' width=60 height= 50></td>  </tr> </TABLE><br>";
	 else {
	 	alert("select gif or jpg files ");
		form.file.value=" ";
	 }
	}
  </script>

