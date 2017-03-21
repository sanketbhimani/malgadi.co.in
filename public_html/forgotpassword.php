<?php
include 'connection.php';
session_start();
/*
if (!isset($_SESSION['user_email'])) {
    header("Location:login.php?error=You need to login first");
    die();
} else {
    if ($_SESSION['user_email'] === "guest@malgadi.co.in") {
        header("Location:login.php?error=You need to login first");
        die();
    }
}*/
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
	//session_start();
include("starter.php"); ?>	
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Forgot Password</li>
			</ol>
		</div>
	</div>
<div class="login">
<div class="container">
<center><h1>Forgot Password</h1></center>
<h4><?PHP
            if(isset($_GET['error'])){
               
                    echo $_GET['error'];
                 
            }
        ?></h4>
		<h4> <?PHP
                    if(isset($_GET['msg'])){
                        echo $_GET['msg'];
                    }
                ?></h4>
<p class="est animated wow zoomIn" data-wow-delay=".5s">Enter email id to recover your password</p>
<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
<form action="sendpassword.php" method="post">
					<input type="email" name="email" placeholder="Email ID" required=" " >
					
					<input type="hidden" name="redirectURL" value=<?PHP if(isset($_GET['redirectURL']))
                                            {
                                                echo $_GET['redirectURL'];
                                                
                                            }?>>
					<input type="submit" value="Change">
				</form>
				</div>
				
				
				 
</div>
</div>
<?php

	include('dessert.php');
	?>
</body>
</html>





