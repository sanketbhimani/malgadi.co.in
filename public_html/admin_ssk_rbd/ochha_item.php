<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}
?>
<?php
include("../connection.php");
$index = $_GET['index'];
$q = "SELECT `item_avil` FROM `items` WHERE `index` = '".$index."'";
$r = mysql_query($q)
	or die("select ".mysql_error());
$a = mysql_fetch_array($r);
$item_avil = $a['item_avil']-1;
$q = "UPDATE `items` SET `item_avil` = '".$item_avil."' WHERE `index` = '".$index."'";
mysql_query($q)
	or die("update ".mysql_error());
header("location:view_product.php?msg=ochha thay gyu");
?>