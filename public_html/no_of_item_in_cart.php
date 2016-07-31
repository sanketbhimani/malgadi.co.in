	<?php
	
	session_start();
include("connection.php");
	if(isset($_SESSION['no_of_items'])){
		if(isset($_SESSION['no_item_deleted'])){
			
			echo($_SESSION['no_of_items']-$_SESSION['no_item_deleted']);
			
			 }else{
				 echo($_SESSION['no_of_items']);
			 }
	}
	else{
		echo('0');
	}
	?>