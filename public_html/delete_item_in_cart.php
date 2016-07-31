<?php
if(isset($_GET['item'])){
	session_start();
	include("connection.php");
$item = mysql_real_escape_string($_GET['item']);
unset($_SESSION['item'.$item]);
if(isset($_SESSION['no_item_deleted'])){
	$_SESSION['no_item_deleted'] = $_SESSION['no_item_deleted']+1;
}
else{
	$_SESSION['no_item_deleted'] = 1;
}
	
}
if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']."?msg=1");
}
else{
	header("location:index.php");
}

?>