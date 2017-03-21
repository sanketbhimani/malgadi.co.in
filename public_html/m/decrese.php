<?php
if(isset($_GET['id'])){
	$id = mysql_real_escape_string($_GET['id']);
	session_start();
	if($_SESSION['qty'.$id] > 1){
	$_SESSION['qty'.$id] = $_SESSION['qty'.$id]-1;
	}else{
		unset($_SESSION['qty'.$id]);
		unset($_SESSION['item'.$id]);
		$_SESSION['no_item_deleted'] = $_SESSION['no_item_deleted']+1;
	}
	
	header("location:view_cart.php");
	
}

?>