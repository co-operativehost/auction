<?php 
ob_start();
include('header.php');
@session_start();
//session_start();
//$a="1,2,3";
//$_SESSION[a]=$a;
//echo $_SESSION[a];
//$a1=array();
$current_id=$_REQUEST['current_id'];
$user_g_name;
$no_of_cards="";
//echo"<br>cc".$no_of_cards;
/*if (isset($_REQUEST['cards_no']))
{echo"yes";
	echo$cards_no."<br>card";
	$cards_no=$cards_no-$_REQUEST['cards_no'];
	echo$cards_no;
}
else 
{echo"no";
echo$cards_no."card";
}*/
$u_id=$_SESSION['User_ID'];
//$time_at_click=$_REQUEST['time_at_click'];
/*if(!isset($time_at_click))
{*/
	//$time_at_click=strftime('%c');
//}
echo $u_id;
$sql="select `group` from `game_pro_user` where user_id='$u_id'";
//echo $sql;
$myrs=mysql_query($sql) or die(mysql_error());

if(@mysql_numrows($myrs)>0) //player	at second time of playing or other time
{
	//to specify if he is the player that should play
	$row=mysql_fetch_array($myrs);
	$user_g_name=$row['group'];
	//get the cards Number from the database
	$scards="SELECT cards_no FROM game_groups WHERE game_group = '".$user_g_name."'";
	//echo $scards;
	$rcards=mysql_query($scards);
	$no_of_cards_ar=mysql_fetch_array($rcards);
	$no_of_cards=$no_of_cards_ar[0];
	echo"<br>c".$no_of_cards;
	if($current_id!="")		//first time of the game
	{
		//$no_of_cards=25;
		//echo"1";
		//$cards_no=25;
		/*********************************************************we can set here the start time*/
		$s="select user_id from game_pro_user where `group` ='".$user_g_name."'and user_id<".$current_id." ORDER BY user_id DESC";
	$r=mysql_query($s);
		//echo"row no".mysql_numrows($r);
		if(@mysql_numrows($r)!=0)
			if($myrow=mysql_fetch_array($r))
			{
				$current_id=$myrow['user_id'];
			}
			else{}
			
		else //after the players cycle finishes
			{//echo"secod cycle";
				$s="select user_id from game_pro_user where (`group`='".$user_g_name."') ORDER BY user_id DESC";
				//echo $s;
				$r=mysql_query($s)or die(mysql_error());
				if($myrow=mysql_fetch_array($r))
				{
					$current_id=$myrow['user_id'];
					//echo"first at second cycle".$current_id;
				}
			}
	}
	else //at the first time of the game
	{
		//echo"2";
		$s="select user_id from game_pro_user where (`group`='".$user_g_name."') ORDER BY user_id DESC";
		//echo $s;
		$r=mysql_query($s)or die(mysql_error());
		if($myrow=mysql_fetch_array($r))
		{
			$current_id=$myrow['user_id'];
			//echo"first".$current_id;
		}
	}
	if($current_id==$_SESSION['User_ID'])
	{
		echo"player";
		$disabled="";
	}
	else 
	{
		echo"watch";
		$disabled="disabled";
	}
	

	
}
else //watcher
{
	$user_g_name=$_SESSION['watch_group'];
	if($user_g_name=="")
	{
		$n=rand(1,10);
		$u_id="";
		$_SESSION['watch_group']="b".$n;
		/*******************set the time of start watch*/
	}
		//get the cards number for this group
	$scards="SELECT cards_no FROM game_groups WHERE game_group = '".$user_g_name."'";
	$rcards=mysql_query($scards);
	$no_of_cards_ar=mysql_fetch_array($rcards);
	$no_of_cards=$no_of_cards_ar[0];
	echo"<br>".$no_of_cards;
		//$cards_no=25;
	echo"watch";
	$disabled="disabled";
	
	//echo $user_g_name;
	
}
echo"<br>current".$current_id;
//echo	$user_g_name.",".$disabled;
function rand_no($max)
{
return $r=rand(0,$max);	
}
function random_id()
{
$sql="select user_id from game_pro_user where game_id=10";
$res=mysql_query($sql);
//$arr_id=array('11', '20','36','4','50','66','70','88','90','10');
$arr_id=array();
while ($row=mysql_fetch_array($res))
{
$arr_id[]=$row['user_id'];
}

//'echo count($arr_id);

$arr_id_no=count($arr_id);//should be 100
//echo $arr_id_no;
$arr_ran_id=array();
$check_ar=1;

while($check_ar<=$arr_id_no)
{

	$r=rand_no(99);
	if(!in_array($arr_id[$r],$arr_ran_id) )
	{
		$arr_ran_id[]=$arr_id[$r];	
		$check_ar++;
		//if($r==0)
		//echo"<br>r=".$arr_id[$r];
		
	}

}
//echo count($arr_ran_id);
//echo count($arr_ran_id);
/*foreach ($arr_ran_id as $key)
{
	echo"<br>";
	echo $key;

}*/
//echo $arr_id_no;
for($j=0;$j<$arr_id_no;$j++)
{
	/********************** insert into game_groups, game_group, cards_no values(25,b)*/
	
	if($j<=9)
	{
		//echo"<br>1";
		$group_name="b1";
	}
	else if($j>9 && $j<=19)
	{
			//echo"<br>2";
		$group_name="b2";
	}
	else if($j>19 && $j<=29)
	{
			//echo"<br>3";
		$group_name="b3";
	}
	elseif($j>29 && $j<=39)
	{
			//echo"<br>4";
		$group_name="b4";
	}
	else if($j>39 && $j<=49)
	{
			//echo"<br>5";
		$group_name="b5";
	}
	elseif($j>49 && $j<=59)
	{
			//echo"<br>6";
		$group_name="b6";
	}
	elseif($j>59 && $j<=69)
	{
			//echo"<br>7";
		$group_name="b7";
	}
	else if($j>69 && $j<=79)
	{
			//echo"<br>8";
		$group_name="b8";
	}
	elseif($j>79 && $j<=89)
	{
			//echo"<br>9";
		$group_name="b9";
	}
	elseif($j>89 && $j<100)
	{
			//echo"<br>10";
		$group_name="b10";
	}
	/*if($j+=9 || $j=19 ||$j=29 ||$j=39 ||$j=49 ||$j=59 ||$j=69 ||$j=79 ||$j=89 ||$j=99 )
	{
		
	}*/
	$sql2="UPDATE `game_pro_user` SET `group`='$group_name' WHERE (`user_id`='$arr_ran_id[$j]')";
	mysql_query($sql2) or die(mysql_error());
	
	//echo "done";
	
}
for($h=1;$h<=10;$h++)
{
	$sql3="INSERT INTO game_groups (cards_no, game_group) VALUE (100,'b$h')";
		mysql_query($sql3);
}

}

function display_cards($g,$dis,$user_id)
{
	$scards="SELECT cards_no FROM game_groups WHERE game_group = '".$g."'";
	//echo $scards;
	$rcards=mysql_query($scards);
	$no_of_cards_ar=mysql_fetch_array($rcards);
	$no_of_cards=$no_of_cards_ar[0];
	//echo"<br>chx".$no_of_cards;
	
	//echo"mmmmmmmm". $g;
	$sql="select user_id from game_pro_user where (`group`='".$g."')";
	//echo $sql;
	$res=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_array($res))
	{
		$a1[]=$row['user_id'];
		//echo $row['user_id'];
	}
	//echo count($a1);
	
	for($k=0;$k<=100;$k++)		//at the first time should be $cards_no=100&count($a1)=10
	{
		$a1[$k]=-$k;
		//echo"<br>".$a1[$k];
	}
	/*foreach ($a1 as $key)
{
	echo"<br>";
	echo $key;
}*/
	$check_group=0;
	
	$locations=array();
	$group1=array($no_of_cards);
	for($i=0;$i<100;$i++)		//at the first time should be $cards_no=100
	{
	$group1[$i]=0;	
	
	}

	$i=0;
while($i<=100 )		//at the first time should be $cards_no=100
{
	$r=rand_no(100);
	//echo $r."<br>";
	if(!in_array($r,$locations) )
	{ 
		//echo $r."<br>";
		$locations[]=$r;
		$group1[$r]=$a1[$i];
		//echo $r;
		//echo"<br>";
		//echo $group1[$r];
		//echo"i". $a1[$i];
		//if($group1[$r]==0)
		//echo"g".$group1[$r];
		$i++;
	}
}
//echo $disabled;
//echo"////////".$_SESSION['User_ID'];
for ($j=0;$j<$no_of_cards;$j++)
	{ 
		//echo $group1[$j];
		if($group1[$j]==$user_id)
		{
			//echo"ffffffffff";
			//echo"<br>".$group1[$j];
	echo '<input type="image" class="gameButton2" src="images/girl-Button.jpg" width="56" height="55" disabled  value="'.base64_encode($group1[$j]).'" name="'.$group1[$j].'" onclick="player_click(this)"/>&nbsp&nbsp';

		}
		else
		{
			//echo"yes";
	echo '<input type="image" class="gameButton2" src="images/Games-Button.jpg" width="56" height="55" '.$dis.'  value="'.base64_encode($group1[$j]).'" name="'.$group1[$j].'" onclick="player_click(this)"/>&nbsp&nbsp';
		
		}

	}


}

function display_players($g_name,$p_now)
{
	//echo $g_name;
	$fff="SELECT users.id, users.userName FROM game_pro_user INNER JOIN users ON game_pro_user.user_id = users.id WHERE game_pro_user.group = '$g_name' ORDER BY
users.id DESC";
	//echo $fff;
	$rr=mysql_query($fff);
	$players_no=@mysql_numrows($rr);
	//echo"playersno".$players_no;
	for($i=0;$i<10;$i++)
	{
		while($row=mysql_fetch_array($rr))
		{
			if($row['id']==$p_now)
			{
			echo"<li class=playturn><div>
		    <input type=image class=gameButton value='' src=images/girl-Button.jpg />
		    <p class=playerName>Player Name: ".$row['userName']."</p>
		    <div class=clear></div>
		    </div></li>";
			}
			else 
			{
		    echo"<li class='playerIam'><div>
		    <input type='image' class='gameButton' value='' src='images/girl-Button.jpg' />
		    <div class=playerDetails>
		    <p class='playerName'>Player Name: ".$row['userName']."</p>
		    </div>
		    <div class='clear'></div>
		    </div></li>";
			}
		}
	}
}

 /*echo" <div class='incontnent'>
    <div><img src='images/inTop.png' width='900' height=10 /></div>
 
	<div class='leftColumn'>
	<div class='content'>
    <ul class='gameBoard'>";*/
	//display_items();
	//random_id(); // Tamam
	//echo$disabled;
	echo" <div class=incontnent>
    <div><img src=images/inTop.png width=900 height=10 /></div>
    <div style='background-image:url(images/inMid.png); width: 860px; padding: 20px;' >
     <div class='gameName'><img src='images/product_home-stiletto2.png' width=200 height=150 />
     <div class=proDetail>
     <h3>Product Name</h3>
     <br />
     <span class='price'>$ 42.00</span>
     </div>
     <div class='clear'></div>
     </div>

<div class='games'>";
	display_cards($user_g_name,$disabled,$u_id);
	//echo"<br>".$no_of_cards;
	/*echo"<div id='game_area'>";
	echo"</div>";
//echo"<input type='hidden' name='count' value='25' id='count'>";
echo"</ul> 
     </div>
    </div>*/
//	$players_no=5;
//echo$no_of_cards;
	$player_now_play_id=$current_id;/****************************/
	//echo"".$current_id;
	echo"</div>
<div class=names>
	<ul class=namesUL>";
	//echo $user_g_name;
	display_players($user_g_name,$player_now_play_id);
	
	echo"</ul>
    <div id='game_result'class='bidwinning'>
    <p >Bid winning: <span class='BidCount'>999</span></p>
    </div>
    <div class='downCounter'>
    <span><div id='clock1'></div></span>
    </div>
</div>
 <div class='clear'></div>
    </div>";
	
  echo"  <div><img src='images/inBot.png' width=900 height=20 /></div>";

$stime="SELECT last_update_time FROM game_groups WHERE game_group = '".$user_g_name."'";
$restime=mysql_query($stime);
$time_at_click_ar=mysql_fetch_array($restime);
$time_at_click=$time_at_click_ar[0];
//echo$time_at_click;
echo "time=".$time_at_click;
echo"after10".strftime('%c') ;

include('footer.php');
?>
 <!--<script>alert(new Date("<?= strftime('%c') ?>"));
alert(new Date());
</script>-->
<script type="text/javascript">
function player_click(btn)
{
	//document.getElementById("count").value=document.getElementById("count").value-1;
	//var count=document.getElementById("count").value;
var xmlhttp;
if(btn="non")
	btn_value="non";	
else
var btn_value=btn.value;
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

  if(btn_value!="non")
  {
	  //refresh the page
	  window.location='newgame100.php?current_id=<?= $_SESSION['User_ID']; ?>';
	  document.getElementById("game_result").innerHTML=xmlhttp.responseText;
 	  btn.type='hidden';
  }
  else
	  //ref
  window.location='newgame100.php?current_id=<?= $current_id; ?>';

 //*$urlRefresh = "game.php";*/
 /* header("Refresh: 5; URL=\"" . $urlRefresh . "\"");?> // redirect in 5 seconds*/
 
  }
}
xmlhttp.open("GET","player_check.php?card_Id="+btn_value+"&player_g_n=<?=$user_g_name; ?>",true);
xmlhttp.send();
}
</script>
<script language="JavaScript">

 StartCountDown("clock1","<?=$time_at_click;?>")
 
  function StartCountDown(myDiv,start_time)
  {
	//alert(start_time); 	
	    var dthen	=new Date(start_time).valueOf() +20*1000; 
	    var dnow	= new Date("<?= strftime('%c') ?>");
	    ddiff		= new Date(dthen-dnow);
	   // alert(ddiff);
	    gsecs		= Math.floor(ddiff.valueOf()/1000);
	  //  alert(gsecs);
	    CountBack(myDiv,gsecs);
  }
  
  function Calcage(secs, num1, num2)
  {
    s = ((Math.floor(secs/num1))%num2).toString();
    if (s.length < 2) 
    {	
      s = "0" + s;
    }
    return (s);
  }
  
  function CountBack(myDiv, secs)
  {
    var DisplayStr;
    var DisplayFormat = "%%S%%";
    DisplayStr = DisplayFormat.replace(/%%D%%/g,	Calcage(secs,86400,100000));
    DisplayStr = DisplayStr.replace(/%%H%%/g,		Calcage(secs,3600,24));
    DisplayStr = DisplayStr.replace(/%%M%%/g,		Calcage(secs,60,60));
    DisplayStr = DisplayStr.replace(/%%S%%/g,		Calcage(secs,1,60));
    if(secs > 0)
    {	
    	/*alert(new Date("<?= strftime('%c') ?>"));*/
      document.getElementById(myDiv).innerHTML = DisplayStr;
      setTimeout("CountBack('" + myDiv + "'," + (secs-1) + ");", 990);
    }
    else
    {
        //ref
      document.getElementById(myDiv).innerHTML = "Auction Game Over";
      //alert("<?=strftime('%H:%M:%S')?>");
      //refresh the page after finish the counting no action recieved
      player_click("non");
     /********window.location='newgame100.php?current_id=<?= $current_id; ?>&time_at_click=<?= strftime('%c') ?>';********/
      //CALL AJAX FUNCTION TO UPDATE THE DATABASE WITH TIME NOW
      
    }
  //  alert(new Date("<?= strftime('%c') ?>"));
    //alert(new Date());
  }

</script>


<?php ob_end_flush();?>