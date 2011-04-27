<?php
include("header.php");
?>
 <div class="incontnent">
    <div><img src="images/inTop.png" width="900" height="10" /></div>
    <div style="background-image:url(images/inMid.png); width: 860px; padding: 20px;">
      <h3>Contact us</h3>
<div id="contactform">
<form method="post" action="contactusprocess.php">
        <ol>
          <li>
            <label for="name">First Name<a href="#">*</a><br />
            </label>
            <input name="firstname" class="text" id="name" />
          </li>
          <li>
            <label for="label2">Your e-mail<a href="#">*</a><br />
            </label>
            <input id="label2" name="uemail" class="text" />
          </li>
          <li>
            <label for="email">Phone Number<br />
            </label>
            <input id="email" name="phone" class="text" />
          </li>
          <li>
            <label for="label">Subject<br />
            </label>
            <input id="label" name="sub" class="text" />
          </li>
          <li>
            <label for="message">Message<a href="#">*</a><br />
            </label>
            <textarea id="message" name="message" rows="6" cols="50"></textarea>
          </li>
          
            <input type="submit" value="Send Message" class="btn"  onclick="return check(this.form);" />
          </li>
        </ol>
        </form>
      </div>
    </div>
    <div><img src="images/inBot.png" width="900" height="20" /></div>
    <script>
	function check(frm)
{
	if(frm.firstname.value=="")
	{
		alert('please.enter your name');
		frm.firstname.focus();
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
	
	
	if(frm.message.value=="")
	{
		alert('please.enter your message');
		frm.message.focus();
		return false;
	}
	//alert(frm.firstname.value+","+frm.uemail.value+","+frm.message.value);
	return true;
}
</script>
<?php
include("footer.php");
?>