
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="meet/css/style.css" /> <!-- Main stylesheet /-->
	<link rel="stylesheet" type="text/css" href="meet/css/bootstrap.css"> <!-- Grid framework /-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'> <!-- Open Sans /-->
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'> <!-- PT Sans Narrow /-->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> <!-- Font Awesome /-->
	
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" /> <!-- Favicon /-->



<title>malgadi.co.in</title>
<!-- for-mobile-apps -->

	<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->

<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	
	<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	
		<!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
	
<!-- //for bootstrap working -->

<!-- animation-effect -->
<style>
.ch-item:hover{
	cursor: hand;
}
</style>

<?php
if(isset($_GET['msg'])){
	echo("<script>alert('Item successfully added to cart');</script>");
}
?>
<!-- //animation-effect -->
</head>
	
<body>
<!-- header -->
<?php
	session_start();
include("starter.php"); ?>	
<!-- //header -->
<!--<div class="breadcrumbs">
		<div class="container">
		<center>
		<h1>
				The Team Of MALGADI Organization
				</h1>
				</center>
		</div>
	</div>-->
<!-- SPEAKERS SECTION -->	
	<section id="speakers">
		<h3>Our Team</h3> <!-- Section Title -->
		<div class="separator"></div>
		<div class="container">
			<div class="col-md-8">
				<!-- Section Description -->
				<p>Contact our team to see what we can do for you. </p>
			</div>
			
			<!-- First Row of Speakers -->
			<div class="row1">
                <div class="col-md-2"></div>
                <div class="col-md-10">
				<!-- Speaker 1 -->
				<div class="col-md-4">
					<div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/kirtanbw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/kirtan.jpg" width="300" height="200" alt="" />
						</div>
						<span>Leader & Technical</span>
						<h4><span>Kirtan </span> Dudhatra</h4>
						<h5>4<sup>th</sup> sem IT</h5>
                    </div>
					
				</div>
				
				<!-- Speaker 2 -->
				<div class="col-md-4">
					<div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/vandanabw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/vandana.jpg" width="300" height="200" alt="" />
						</div>
						<span>Technical</span>
						<h4><span>Vandana</span> Choksi</h4>
						<h5>4<sup>th</sup> sem EC</h5>
					</div>
				</div>
				
				<!-- Speaker 3 -->
				<div class="col-md-4">
					<div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/jaybw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/jay.jpg" width="300" height="200" alt="" />
						</div>
						<span>Management</span>
						<h4><span>Jay</span> Chauhan</h4>
						<h5>4<sup>th</sup> sem MH</h5>
					</div>				
				</div>
				
				</div>
				
			</div> <!-- End First Row -->
			<div class="clear"></div>
			<br><br><br>
			
			<!-- Second Row of Speakers -->
			<div class="row1">
			 <div class="col-md-2"></div>
                <div class="col-md-10">
				<!-- Speaker 1 -->
				<div class="col-md-4">
					<div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/ojasbw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/ojas.jpg" width="300" height="200" alt="" />
						</div>
						<span>Management</span>
						<h4><span>Ojas </span> Gandhi</h4>
						<h5>4<sup>th</sup> sem IC</h5>
					</div>
				</div>
				
				<!-- Speaker 2 -->
				<div class="col-md-4">
					<div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/rushabhbw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/rushabh.jpg" width="300" height="200" alt="" />
						</div>
						<span>Management</span>
						<h4><span>Rushabh</span> Kamdar</h4>
						<h5>4<sup>th</sup> sem IC</h5>
                        </div>
				</div>
				
				<!-- Speaker 3 -->
				<div class="col-md-4">
                        <div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/keyuribw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/keyuri.jpg" width="300" height="200" alt="" />
						</div>
						<span>Design & Adv.</span>
						<h4><span>Keyuri</span> Darbar</h4>
						<h5>4<sup>th</sup> sem EC</h5>
						</div>		
				</div>
				
            </div>
				
			</div>	<!-- End Second Row -->	
			<div class="clear"></div>
<br><br><br>
			<div class="row1">
                 <div class="col-md-2"></div>
                <div class="col-md-10">
				<!-- Speaker 1 -->
				<div class="col-md-4">
                        <div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/vasubw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/vasu.jpg" width="300" height="200" alt="" />
						</div>
						<span>Design & Adv.</span>
						<h4><span>Vasu </span> Kadivar</h4>
						<h5>2<sup>nd</sup> sem IC</h5>
                        </div>
				</div>
				
				<!-- Speaker 2 -->
				<div class="col-md-4">
                        <div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/shalinibw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/shalini.jpg" width="300" height="200" alt="" />
						</div>
						<span>Design & Adv.</span>
						<h4><span>Shalini</span> Bhatia</h4>
						<h5>2<sup>nd</sup> sem IC</h5>
                        </div>
				</div>
				
				<!-- Speaker 3 -->
				<div class="col-md-4">
					<div class="member-profile">
						<div class="unhover_img">
						<img src="meet/img/abbasbw.jpg" width="300" height="200" alt="" />
						</div>
						<div class="hover_img">
						<img src="meet/img/abbas.jpg" width="300" height="200" alt="" />
						</div>
						<span>Design & Adv.</span>
						<h4><span>Abbas</span> Rangwala</h4>
						<h5>2<sup>nd</sup> sem IC</h5>
					</div>					
									
				</div>
				</div>
			</div>	<!-- End Third Row -->	
			<div class="clear"></div>
			
			
			
					
		</div>
	</section>
	<!-- //SPEAKERS SECTION -->	
	<?php include('dessert.php'); ?>
	<!-- //footer -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> <!-- Load jQuery -->

</body>
</html>
