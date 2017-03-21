<?php
if(!isset($_GET['tag'])){
		if(isset($_SERVER['HTTP_REFERER'])){
	header("location:".$_SERVER['HTTP_REFERER']."?msg=1");
}
else{
	header("location:index.php");
}
}

?>


<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<!-- for-mobile-apps -->

	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->

<!-- animation-effect -->


<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
<?php
	session_start();
include("starter.php"); ?>	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated slideInLeft">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
	
	<div class="products">
		<div class="container" style="width:95%;">
			<div class="col-md-3 products-left" style="margin-top:-6%;">
			
			<div class="categories animated wow slideInUp" data-wow-delay=".5s" >
					<h3>Categories</h3>
					<ul class="cate">
						<li><a href="index.php">Home</a> </li>
						<?php
  $xml = new SimpleXMLElement(file_get_contents("m/malgadi.xml"));
				$cnt = 0;
				foreach ($xml->departments->department as $element) {
					?>
					<li><a href="items.php?id=<?php echo($element['id']); ?>&name=<?php echo($element); ?>" <?php if(strpos($_SERVER[ 'REQUEST_URI'], $element)===false){ } else{ echo( " class='act'"); } ?>><?php echo($element); ?></a></li>
					
					<?php
				}
  
  
  ?>
								<li><a href="review_us.php">Review Us</a> </li>
							
					</ul>
				</div>
			
			</div>
			<div class="col-md-9 products-right products-right-grids-bottom" style="margin-top:-2.4%; padding-left:24px; padding-right:12px;">
			
				

<?php



$tag =	mysql_real_escape_string($_GET['tag']);
$q = "SELECT * FROM `items` WHERE `title` REGEXP '[\\d \\D \\S \\s]*".$tag."[\\d \\D \\S \\s]*' OR `subtitle` REGEXP '[\\d \\D \\S \\s]*".$tag."[\\d \\D \\S \\s]*'";
$r = mysql_query($q)
or die(mysql_error());

	?>

	<?php include("main_course.php"); ?>

	
	
	
	</div>
</div>
</div>
	
	
	
<!-- //breadcrumbs -->
<!-- footer -->
	<?php include('dessert.php'); ?>
	<!-- //footer -->
</body>
</html>