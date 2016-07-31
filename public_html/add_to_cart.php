<?php
if(isset($_GET['index'])){
	$index = $_GET['index'];
	//echo($index.'<br>');
	include("connection.php");
	$index = mysql_real_escape_string($index);
	//echo($index);
	session_start();
	if(isset($_SESSION['no_of_items'])){
		//print_r($_SESSION);
		$current_item = $_SESSION['no_of_items']+1;
	}
	else{
		$current_item = 1;
	}
	//echo($_SESSION['item'.$current_item]);
	$_SESSION['no_of_items'] = $current_item;
	$_SESSION['item'.$current_item] = $index;
	
}
if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']."?msg=1");
}
else{
	header("location:index.php");
}
?>