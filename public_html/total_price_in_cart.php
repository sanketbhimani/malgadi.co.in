	

<?php
session_start();
include ("connection.php");

if (isset($_SESSION['no_of_items']) && ((!isset($_SESSION['no_item_deleted'])) || (isset($_SESSION['no_item_deleted']) && ($_SESSION['no_of_items'] - $_SESSION['no_item_deleted']) != 0))) {
	$total = 0;
	for ($i = 1; $i <= $_SESSION['no_of_items']; $i++) {
		if (isset($_SESSION['item' . $i])) {
			
			
			$q = "SELECT * FROM `items` WHERE `index` = '" . $_SESSION['item' . $i] . "'";
			$r = mysql_query($q) or die("select " . mysql_error());
			$a = mysql_fetch_array($r);
			if($a['item_avail']<$_SESSION['qty'.$i])
			{
			$qty_more=$_SESSION['qty'.$i] -  $a['item_avail'];
			$total += $a['price']-$a['discount'])*$a['item_avail'];
			$total += $a['price']-$a['discount'])*$qty_more;
			}
			else{
				$total+= (($a['price'] - $a['discount']) * $_SESSION['qty' . $i]);
			}
		}
	}

	echo ($total);
}
else {
	echo ('0');
} ?>
