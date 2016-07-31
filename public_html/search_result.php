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
<link href="css/animate.min.css" rel="stylesheet"> 

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
		<div class="container">
			<div class="col-md-8 products-right">
				<div class="products-right-grids-bottom">

<?php
	
$tag =	mysql_real_escape_string($_GET['tag']);
$q = "SELECT * FROM `items` WHERE `title` REGEXP '[\\d \\D \\S \\s]*".$tag."[\\d \\D \\S \\s]*' OR `subtitle` REGEXP '[\\d \\D \\S \\s]*".$tag."[\\d \\D \\S \\s]*'";
$r = mysql_query($q);

	?>
	
	<?php include("main_course.php"); ?>
	
	
<!-- //breadcrumbs -->
<!-- footer -->
	<?php include('dessert.php'); ?>
	<!-- //footer -->
</body>
</html>