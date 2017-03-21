<?php
if(isset($_GET['index'])){
	$index = $_GET['index'];
	//echo($index.'<br>');
	include("connection.php");
	$index = mysql_real_escape_string($index);
	$q="select `out_of_stock` from `items` where `index`='".$index."'";
	$r=mysql_query($q);
	$a=mysql_fetch_array($r);
	if($a['out_of_stock']==1){
		header("location:index.php");
		die();
	}
	
	//echo($index);
	session_start();
	for($i=1;$i<=$_SESSION['no_of_items'];$i++){
	if(isset($_SESSION['item'.$i])){
			if($_SESSION['item'.$i]==$index){
				$_SESSION['qty'.$i]=$_SESSION['qty'.$i]+1;
				if(isset($_SESSION['no_of_items'])){
					$current_item = $_SESSION['no_of_items'];
				}
				else{
					$current_item = 1;
				}
				$_SESSION['no_of_items'] = $current_item;
					header("location:view_cart.php");
				die();
			}
		}
	}
	if(isset($_SESSION['no_of_items'])){
		$current_item = $_SESSION['no_of_items']+1;
	}
	else{
		$current_item = 1;
	}
	//echo($_SESSION['item'.$current_item]);
	$_SESSION['no_of_items'] = $current_item;
	$_SESSION['item'.$current_item] = $index;
	$_SESSION['qty'.$current_item] = 1;
}
if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']."?item_added=1");
}
else{
	header("location:view_cart.php?item_added=1");
}
?>