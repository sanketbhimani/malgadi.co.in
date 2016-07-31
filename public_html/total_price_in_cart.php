


<?php
session_start();
include("connection.php");
								if(isset($_SESSION['no_of_items']) && ((!isset($_SESSION['no_item_deleted'])) || (isset($_SESSION['no_item_deleted']) &&  ($_SESSION['no_of_items']-$_SESSION['no_item_deleted'])!=0) )){
									$total = 0;
										for($i=1;$i<=$_SESSION['no_of_items'];$i++){
		if(isset($_SESSION['item'.$i])){
			
		
		$q = "SELECT * FROM `items` WHERE `index` = '".$_SESSION['item'.$i]."'";
		$r = mysql_query($q)
			or die("select ".mysql_error());
		$a = mysql_fetch_array($r);
								$total += $a['price']-$a['discount'];
								}}
								echo($total);
								}
								else{
									echo('0');
								}
								?>