<?php
if(isset($_GET['id'])){
	$id = mysql_real_escape_string($_GET['id']);
	session_start();
		//echo($_SESSION['qty'.$id]);
	if($_SESSION['qty'.$id] >=1){
	$_SESSION['qty'.$id] = $_SESSION['qty'.$id]+1;
	
	//echo($_SESSION['qty'.$id]);
	}
	
	header("location:view_cart.php");
	
}

?>
