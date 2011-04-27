<?
include("header.php");
$sql="select * from countries";
$result= mysql_query($sql);
$str="";
if(isset($_REQUEST['str']))
$note="Username already in use. Please try again.";
else
$note="";
?>  
  <div class="incontnent">
    <div><img src="images/inTop.png" width="900" height="10" /></div>
    <div style="background-image:url(images/inMid.png); width: 860px; padding: 20px;">
      <h3 align="center">Rigister Now</h3>
<div id="contactform">
<form method="post" action="regisiterprocess.php">

        <ol>
        <li>
      <br />  <h4>Login Details<h4><br />
        </li>
        <li><h6 align="center"><?=$note?></li>
        <li>
            <label for="name">User Name<a href="#">*</a><br />
            </label>
            <input name="userName" class="text" id="name" /><span id="un" style="color: red; visibility:visible;">should enter letters </span> 
         </li>
         <li>
         
            <label for="label2">Password<a href="#">*</a><br />
            </label>
            <input  type="password" id="label2" name="pass" class="text" />
          
            
            </li>
            <li>
            <label for="label2">Confirm Password<a href="#">*</a><br />
            </label>
            <input type="password" id="label2" name="conpass" class="text" />
            </li>
        <li>
       <br /> <h4> Personal Details</h4><br />
            <label for="name">First Name<a href="#">*</a><br />
            </label>
            <input name="firstName" class="text" id="name" />
         </li>
         <li>
            <label for="name">Surname<a href="#">*</a><br />
            </label>
            <input name="surName" class="text" id="name" />
         </li>
         <li>
         
            <label for="label2">Your e-mail<a href="#">*</a><br />
            </label>
            <input id="label2" name="uemail" class="text" />
            </li>
            <li>
            <label for="label">Phone<br />
            </label>
            <input id="label" name="phone" class="text" />
          </li>
            <li>
           <br /> <h4>Address</h4><br />
            </li>
          
          <li>
            <label for="email">Address<br />
            </label>
            <input id="email" name="address" class="text" />
          </li>
          
          <li>
            <label for="email">Country </label>
            <select  name="country">
            <?php
			while($row=mysql_fetch_array($result))
			{
			
			?>
            <option value="<?php echo $row['country_id']; ?>">
            <?php
			echo $row['country_name'];
			?>
            </option>
            <?php
			}
			?>
            </select>
          </li>
          <li>
            <label for="email">City<br />
            </label>
            <input id="email" name="city" class="text" />
          </li>

       <li>
            <input type="submit" value="Regisiter Now" class="btn"  onclick="return check(this.form);"/>
          </li>
        </ol>
        </form>
      </div>
    </div>
    
    <div><img src="images/inBot.png" width="900" height="20" /></div>
    
<script>
function check(frm)
{
	if(frm.userName.value=="")
	{
	//document.getElementById("un").style.visibility:hidden;
	alert('please enter the user Name');
	frm.userName.focus();
	return false;
	}
	  if(frm.userName.value.length < 5) 
	  {   
	  	
	 		frm.userName.focus();
	  	alert("Too short User Name");    
	  		return false; 
	  }
 if(frm.userName.value.length > 25) 
 {     
 		alert("Too Longe User Name");    
		frm.userName.focus();
 		return false; 
 }

	
	if(frm.pass.value=="")
	{	
	alert('please enter the password');
	frm.pass.focus();
	return false;
	}
	 if(frm.pass.value.length > 15) 
 {     
 		alert("Too Longe Password");    
 		return false; 
 }
  if(frm.pass.value.length < 5) 
 {     
 		alert("Too short User Password");    
 		return false; 
 }
	if(frm.conpass.value=="")
	{
	alert("please enter the confirm password");
	frm.pass.focus();
	return false;
	}
	if(frm.conpass.value!=frm.pass.value)
	{
	alert('no match between Confirm password and the password');	
	frm.conpass.focus();
	return false;
	}
	 if(frm.firstName.value.length > 25) 
 {     
 		alert("Too Longe first Name");  
		frm.firstName.focus();
 		return false; 
 }
	 if(frm.firstName.value.length<3) 
 {     
 		alert("Too short first Name");  
		frm.firstName.focus();
 		return false; 
 }
	if(frm.firstName.value=="")
	{
		alert('please.enter your name');
		frm.firstName.focus();
		return false;
	}
	var alphaExp = /^[a-zA-Z]+$/;
	if(frm.firstName.value.match(alphaExp))
	{
	}else
	{
		alert("your name shouldn't contain numbers");
		frm.firstName.focus();
		return false;
	}
	
	if(frm.surName.value=="")
	{
		alert('please.enter your Surname');
		frm.surName.focus();
		return false;
	}
	
	 if(frm.surName.value.length > 25) 
 {     
 		alert("Too Longe Surname");  
		frm.surName.focus();
 		return false; 
 }
	 if(frm.surName.value.length<3) 
 {     
 		alert("Too short Surname");  
		frm.surName.focus();
 		return false; 
 }
	
	var alphaExp = /^[a-zA-Z]+$/;
	if(frm.surName.value.match(alphaExp))
	{
	}else
	{
		alert("your Surname shouldn't contain numbers");
		frm.surName.focus();
		return false;
	}
	
	if(frm.uemail.value=="")
	{
		alert('please.enter your email');
		frm.uemail.focus();
		return false;
	}
	
	var apos=frm.uemail.value.indexOf("@");
	var dotpos=frm.uemail.value.lastIndexOf(".");
	if(apos<1||dotpos-apos<2)
	{
		alert("please, enter your email in correct format");
		frm.uemail.focus();
		return false;
	}
	
		if(frm.phone.value=="")
	{
		alert('please.enter your Telephone');
		frm.phone.focus();
		return false;
	}
		var alphaExp = /[a-z]/gi;
		if(frm.phone.value.match(alphaExp))
		{
			alert('please.enter your Telephone without letters');
			frm.phone.focus();
			return false;
		}
		
	if(frm.address.value=="")
	{
		alert('please.enter your address');
		frm.address.focus();
		return false;
	}
	
		
	if(frm.city.value=="")
	{
		alert('please.enter your city');
		frm.city.focus();
		return false;
	}
	

	var alphaExp = /[a-z]/gi;
	if(frm.phone.value=="")
	{
		alert('please.enter your Phone');
		frm.phone.focus();
		return false;
	}
	
	
	alert(frm.userName.value+","+frm.pass.value+","+frm.conpass.value+","+frm.firstName.value+","+frm.uemail.value+","+frm.address.value+","+frm.country.value+","+frm.city.value);
	return true;
}
</script>
  
<?
include("footer.php");
?>