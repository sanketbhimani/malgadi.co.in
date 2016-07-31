<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}
?>
<?php
include("../connection.php");
$index = $_GET['index'];
$q = "DELETE FROM `items` WHERE `index` = '".$index."'";
$r = mysql_query($q)
	or die("delete ".mysql_error());
header("location:view_product.php?msg=delete thay gyu");
?>