<?php
session_start();
if(!isset($_SESSION['you_can_logged_in'])){
	header('location:../index.php');
}
?>
<?php

include("../connection.php");

?>
<html>
<body>
<?php
$index = $_GET['index'];
$q = "SELECT `description` FROM `items` WHERE `index` = '".$index."'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
echo($a['description']);
?>
<br>
<a href="view_product.php">back</a>
</body>
</html>