<?php

if(isset($_GET['star']) && isset($_GET['item'])){
	include("connection.php");
	$star = mysql_real_escape_string($_GET['star']);
	$item = mysql_real_escape_string($_GET['item']);
	$q = "SELECT `avg_star`,`total_people` FROM `items` WHERE `index`='".$item."'";
	$r = mysql_query($q)
	or die(mysql_error());
	$a = mysql_fetch_array($r);
	$q = "UPDATE `items` SET `avg_star`='".((($a['avg_star']*$a['total_people'])+$star)/($a['total_people']+1))."', `total_people`='".($a['total_people']+1)."' WHERE `index`='".$item."'";
	//mysql_query($q);
}
if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']."?msg=1");
}
else{
	header("location:index.php");
}
?>