<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>
<!-- for-mobile-apps -->


<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->

<script src="sss/sss.js"></script>
<link rel="stylesheet" href="sss/sss.css" type="text/css" media="all">

<script>
jQuery(function($) {
$('.slider').sss();
});
</script>

<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->

<!-- timer -->
<link rel="stylesheet" href="css/jquery.countdown.css" />
<!-- //timer -->
<!-- animation-effect -->

<!--
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
-->
<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->

<?php

include("starter.php"); ?>
<center>
<h1>Some Thing Went Wrong!</h1><br>
It was just because of pressing back on wrong place or making page reload at wrong place. It will not affect your purchase :)<br>
<a href="index.php">Click here</a> for home page
</center>
<br>
<?php include('dessert.php');?>
<!-- //footer -->
</body>
</html>