<?php
$host = "localhost";
$uname = "root";
$pass = "YouCanWin@123";

$dbhandle = mysql_connect($host,$uname,$pass)
  or die("Unable to connect to MySQL");

mysql_select_db("csi",$dbhandle) 
  or die("Could not select examples");
?>