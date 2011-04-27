<? 
//ob_start();
include("header.php");
$pro_100_id;
$pro_25_id;
$sql="select * from game where `open`=1";
$res=mysql_query($sql);
while($row=mysql_fetch_array($res))
{
	if($row['game_type']==25)
	{
	$pro_25_id=$row['id_pro'];
	$open_gameId_25= $row['gam_id'];
	}
	elseif($row['game_type']==100)
	{
	$pro_100_id=$row['id_pro'];
	$open_gameId_100= $row['gam_id'];
	}
	
}
//echo $open_gameId_25.",".$open_gameId_100;
$sql="select users.id, users.userName, users.user_img, products.pro_name, products.image, products.pro_price 
from users, products, game_pro_user where (game_pro_user.game_id=$open_gameId_100) and (users.id=game_pro_user.user_id) and (products.pro_id=$pro_100_id)";
//echo $sql;
$res=mysql_query($sql);
$count=1;
echo"<div class='leftColumn'>
    <div class='content'>
      <ul class='gameBoard'>";
while($row=mysql_fetch_array($res))
{
	//echo $row['userName']."<br>";
	
echo"	<li><img src='".$row['user_img']."' width='56' height='55' alt='auction name' /></li>";
     $count+=1;
}
for($j=$count;$j<=100;$j++)
{
echo"	<li><img src='images/auction001.jpg' width='56' height='55' alt='auction name' /></li>";
}

?>
<?php //echo $open_gameId_100.",".$pro_100_id ?>
  
        
        </ul> 
      <div class="clear"></div>
      <div style="width:319px; margin:0 auto;"><img src="images/100people.jpg" width="319" height="62" alt="100people" /></div>
      <input type="hidden" id="login_check" value="<?php echo $_SESSION['User_ID'];?>"/>
      <div align="center" ><input type="button" value="Join Game" id="100" name="bt_100" onclick="if(!checkLogin()){openbox('', 1);} else{join_game(<?=$open_gameId_100?>,100);}" /> </div>
    </div>
     <div id="txtHint100" align="center"></div>
  </div>

  <!-- ************************* -->
  <div id="filter"></div>
<div id="box"> <span id="boxtitle"></span>
  <form action='userlogin.php' method='post'>
    <p>User name:
      <input type="text" name="userName" value="user name" onclick="this.value=''"/>
    </p>
    <p>Password:
      <input type="password" name="pass" value="password" onclick="this.value=''"/>
    </p>
    <p>
    <div><?php $err_login?></div>
      <input type="submit" name="submit" onclick='return validate(this.form);' value='Login'/>
      <input type="button" name="cancel" value="Cancel" onClick="closebox()">
      <input type="button" name="Register" value="Register" onclick="window.location='regisiter.php'"/>
    </p>
  </form>
</div>
  <?php 
$ssql="select users.id, users.userName, users.user_img, products.pro_id, products.pro_name, products.image, products.pro_price 
from users, products, game_pro_user where (game_pro_user.game_id=$open_gameId_25) and (users.id=game_pro_user.user_id) and (products.pro_id=$pro_25_id)";
$rres=mysql_query($ssql);
$ccount=1;
  echo"
  <div class='rightColumn'>
    <div class='content'>
      <ul class='gameBoard'>";
  while($rrow=mysql_fetch_array($rres))
{
	
	echo"
        <li><img src='".$rrow['user_img']."' width='56' height='55' alt='auction name' /></li>";
	$ccount+=1;
}
        for($j=$ccount;$j<=25;$j++){
        echo"<li><img src=images/auction001.jpg width=56 height=55 alt=auction name /></li>";
        }
        ?>
        
      </ul>
      <div class="clear"></div>
      <div style="width:256px; margin:0 auto;"><img src="images/50people.jpg" width="256" height="62" alt="100people" /></div>
      <!-- <input type="hidden" id="login_check" value="<?php echo $_SESSION['User_ID'];?>"/>-->
      <div align="center" ><input type="submit" value="Join Game" id="25" name="bt_25" onclick="if(!checkLogin()){openbox('', 1);} else{join_game(<?=$open_gameId_25?>,25);}"> </div>
    <div id="txtHint25" align="center"></div>
    </div>
  </div>
  
  <div class="clear"></div>
  <div class="leftColumn">
    <div class="content">
      <ul class="people">
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image001.jpg" width="164" height="115" alt="image" /></div>
            <div class="details"><br />
              <h4>Official Yummm Card</h4>
              <br />
              <div>
                <h2>1</h2>
                <span>Chip entry fee</span></div>
            </div>
            <div class="joinNow"><br />
              <a href="#"><img src="images/joinNow.jpg" width="182" height="44" alt="Join Now" /></a>
              <div class="time">
                <h3>00:24:60</h3>
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image001.jpg" width="164" height="115" alt="image" /></div>
            <div class="details"><br />
              <h4>Official Yummm Card</h4>
              <br />
              <div>
                <h2>1</h2>
                <span>Chip entry fee</span></div>
            </div>
            <div class="joinNow"><br />
              <a href="#"><img src="images/joinNow.jpg" width="182" height="44" alt="Join Now" /></a>
              <div class="time">
                <h3>00:24:60</h3>
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image001.jpg" width="164" height="115" alt="image" /></div>
            <div class="details"><br />
              <h4>Official Yummm Card</h4>
              <br />
              <div>
                <h2>1</h2>
                <span>Chip entry fee</span></div>
            </div>
            <div class="joinNow"><br />
              <a href="#"><img src="images/joinNow.jpg" width="182" height="44" alt="Join Now" /></a>
              <div class="time">
                <h3>00:24:60</h3>
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image001.jpg" width="164" height="115" alt="image" /></div>
            <div class="details"><br />
              <h4>Official Yummm Card</h4>
              <br />
              <div>
                <h2>1</h2>
                <span>Chip entry fee</span></div>
            </div>
            <div class="joinNow"><br />
              <a href="#"><img src="images/joinNow.jpg" width="182" height="44" alt="Join Now" /></a>
              <div class="time">
                <h3>00:24:60</h3>
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image001.jpg" width="164" height="115" alt="image" /></div>
            <div class="details"><br />
              <h4>Official Yummm Card</h4>
              <br />
              <div>
                <h2>1</h2>
                <span>Chip entry fee</span></div>
            </div>
            <div class="joinNow"><br />
              <a href="#"><img src="images/joinNow.jpg" width="182" height="44" alt="Join Now" /></a>
              <div class="time">
                <h3>00:24:60</h3>
              </div>
            </div>
            <div class="clear"></div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="rightColumn">
    <div class="content">
      <ul class="people">
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image002.jpg" width="104" height="73" alt="image" /> </div>
            <div class="details">
              <h4>Official Yummm Card</h4>
              <div class="joinNow"><a href="#"><img src="images/joinNow2.jpg" width="129" height="29" alt="Join Now" /></a></div>
            </div>
            <div class="clear"></div>
            <div style="float:left">
              <h2>100</h2>
              <span>Chip entry fee</span></div>
            <div class="time">
              <h3>00:24:60</h3>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image002.jpg" width="104" height="73" alt="image" /> </div>
            <div class="details">
              <h4>Official Yummm Card</h4>
              <div class="joinNow"><a href="#"><img src="images/joinNow2.jpg" width="129" height="29" alt="Join Now" /></a></div>
            </div>
            <div class="clear"></div>
            <div style="float:left">
              <h2>100</h2>
              <span>Chip entry fee</span></div>
            <div class="time">
              <h3>00:24:60</h3>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image002.jpg" width="104" height="73" alt="image" /> </div>
            <div class="details">
              <h4>Official Yummm Card</h4>
              <div class="joinNow"><a href="#"><img src="images/joinNow2.jpg" width="129" height="29" alt="Join Now" /></a></div>
            </div>
            <div class="clear"></div>
            <div style="float:left">
              <h2>100</h2>
              <span>Chip entry fee</span></div>
            <div class="time">
              <h3>00:24:60</h3>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image002.jpg" width="104" height="73" alt="image" /> </div>
            <div class="details">
              <h4>Official Yummm Card</h4>
              <div class="joinNow"><a href="#"><img src="images/joinNow2.jpg" width="129" height="29" alt="Join Now" /></a></div>
            </div>
            <div class="clear"></div>
            <div style="float:left">
              <h2>100</h2>
              <span>Chip entry fee</span></div>
            <div class="time">
              <h3>00:24:60</h3>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="onePeople">
            <div class="thumb"><img src="images/image002.jpg" width="104" height="73" alt="image" /> </div>
            <div class="details">
              <h4>Official Yummm Card</h4>
              <div class="joinNow"><a href="#"><img src="images/joinNow2.jpg" width="129" height="29" alt="Join Now" /></a></div>
            </div>
            <div class="clear"></div>
            <div style="float:left">
              <h2>100</h2>
              <span>Chip entry fee</span></div>
            <div class="time">
              <h3>00:24:60</h3>
            </div>
            <div class="clear"></div>
          </div>
        </li>
      </ul>
    </div>
  
 <?
 include("footer.php");
 //ob_end_flush(); 
 ?>
    
 <script type="text/javascript">
function join_game(gameId,id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
  {
  document.getElementById("txtHint"+id).innerHTML="you have joined the game";
  }
}
xmlhttp.open("GET","joingame.php?game_Id="+gameId);
xmlhttp.send();
}

function checkLogin()
{ if(document.getElementById('login_check').value)
{
	//alert("loged in");
	return true;
}
else
{
	//alert("not loged in");
	return false;
}

}

</script>

 