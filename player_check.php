<?php
include 'connect.php';
//$count=$_REQUEST['count'];
$player_g_n=$_REQUEST['player_g_n'];
if($_REQUEST['card_Id']=="non")
{
	$sscards="UPDATE `game_groups` SET last_update_time='".strftime('%c')."' WHERE (`game_group`='".$player_g_n."')";
	$rrcards=mysql_query($sscards)or die(mysql_error());
	$msg="you didn't play";
}

else
{
$card_Id=base64_decode($_REQUEST['card_Id']);

//echo $player_g_n;
if($card_Id<=0)
{
	echo $player_g_n;
	//sql for get the cards no
	$scards="SELECT cards_no FROM game_groups WHERE game_group = '".$player_g_n."'";
	//echo $scards;
	$rcards=mysql_query($scards);
	$no_of_cards_ar=mysql_fetch_array($rcards);
	$no_of_cards=$no_of_cards_ar[0];
//sql for update the cards no on the database
//echo "sss".$no_of_cards;
$sscards="UPDATE `game_groups` SET `cards_no`=(".$no_of_cards."-1), last_update_time='".strftime('%c')."' WHERE (`game_group`='".$player_g_n."')";
$rrcards=mysql_query($sscards)or die(mysql_error());
$msg="you have wined a pid";		
//$msg=$sscards;
}
else{
$sql="select `user_id` from game_pro_user where (`group`='".$player_g_n."')";
	$res=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_array($res))
	{
		if($row['user_id']==$card_Id)
		{
			$newsql="UPDATE `game_pro_user` SET `group`='' WHERE (`user_id`='".$row['user_id']."')";
			
		}
		else
		$a1[]=$row['user_id'];
	}
	if(isset($newsql))
	{
		$res=mysql_query($newsql)or die(mysql_error());
			//sql for get the cards no
	$scards="SELECT cards_no FROM game_groups WHERE game_group = '".$player_g_n."'";
	$rcards=mysql_query($scards);
	$no_of_cards_ar=mysql_fetch_array($rcards);
	$no_of_cards=$no_of_cards_ar[0];
	echo $no_of_cards;
		//sql for update the cards no on the database
		$sscards="UPDATE `game_groups` SET `cards_no`=(".$no_of_cards."-1), last_update_time='".strftime('%c')."' WHERE (`game_group`='".$player_g_n."')";
$rrcards=mysql_query($sscards)or die(mysql_error());	
		$msg="you have wined 2 pid";
		//$msg=$scards;
	}
	//echo count($a1);
	
}
}
echo"<br>". $msg;
?>