<?php
///***************************************
// RSS send the Games data to the user
///***************************************

// Conniction To Data Base
include ('../connect.php');

// Getting the data from Database
$sql ="SELECT
game.gam_id,
products.pro_name,
game.game_date,
game.game_type,
products.image,
products.pro_details
FROM
game
INNER JOIN products ON products.pro_id = game.id_pro
WHERE
game.`open` = '1'
";

$link = $_SERVER['HTTP_HOST'];
$rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
$rssfeed .= '<rss version="2.0">';
$rssfeed .= '<channel>';
$rssfeed .= '<title>Auction Feed Service</title>';
$rssfeed .= '<link>http://auction.host-reg.com</link>';
$rssfeed .= '<description>Auction Games</description>';
$rssfeed .= '<language>en-us</language>';
$rssfeed .= '<copyright>Copyright (C) 2011 Auction</copyright>';



$result = mysql_query($sql) or die ("Could not execute query");

while($row = mysql_fetch_array($result)) {
	//extract($row);

	$rssfeed .= '<item>';
	$rssfeed .= '<title>' . $row['pro_name'] . '</title>';
	$rssfeed .= '<description>' . "Game Type: ". $row['game_type'] .' - '.strip_tags($row['pro_details']) . '</description>';
	$rssfeed .= '<link>http://' .$_SERVER['SERVER_NAME'] . '/</link>';
	//$rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($row['game_date'])) . '</pubDate>';
	$rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($row['game_date'])) . '</pubDate>';
	$rssfeed .= '</item>';
}

$rssfeed .= '</channel>';
$rssfeed .= '</rss>';

echo $rssfeed;


?>