<?php
if(isset($_GET['item'])){
	session_start();
	include("connection.php");
$item = mysql_real_escape_string($_GET['item']);
//print_r($_SESSION);
if(isset($_SESSION['item'.$item])){
unset($_SESSION['item'.$item]);
unset($_SESSION['qty'.$item]);
if(isset($_SESSION['no_item_deleted'])){
	$_SESSION['no_item_deleted'] = $_SESSION['no_item_deleted']+1;
}
else{
	$_SESSION['no_item_deleted'] = 1;
}
	
}
}
header("location:view_cart.php");

?>