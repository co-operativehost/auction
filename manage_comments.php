<?
include("include/conn.php");
$com_id=$_REQUEST['topic_id'];
if($_REQUEST['delete']==1)
{
$sql="DELETE FROM comments WHERE id=$com_id";
$res=mysql_query($sql);
}
else
{
$sql="UPDATE comments SET confirm='1'where id=$com_id";
$res=mysql_query($sql);
}
echo "<script>	window.location = '/comments.php';</script>";
?>