
<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<!-- for-mobile-apps -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<!-- //js -->

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->

</head>
	
<body>
<!-- header -->
<?php
	session_start();
include("starter.php"); ?>	


<?php
if(isset($_GET['item_added'])){
	?>
	<script>
	swal("Great!", "Item Added Successfully", "success");
	</script>
	
	<?php
	
	}
?>

<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated slideInLeft">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active"><?php echo($_GET['name']); ?></li>
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



	$id =  mysql_real_escape_string($_GET['id']);
$q = "SELECT * FROM `items` WHERE `department` = '".$id."' ORDER BY `index`  DESC";
$r = mysql_query($q);

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
