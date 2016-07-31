<?php session_start();
if(!isset($_SESSION['id'])){
	header('location:index.php');
}
?>

<html><head>
<title>Earn money - malgadi.co.in</title>
<!-- for-mobile-apps -->

<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
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
	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 <span>567</span> 892</li>
						<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.php">Login</a></li>
						<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.php">Register</a></li>
					</ul>
			</div>
				
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				
  <div  style="width:18%;float:left; margin-top:-3%;"><a href="../index.php"><img src="../images/logo.png" width="100%" ></a></div>
					<center><h1>	Earn Money</h1></center>
				
				
				
				
				
			</div>
		</div>
	</div>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
				<li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<li><a href="summary.php">view summary</a></li>
			<li><a href="logout.php">logout</a></li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<center>
		<h3>Hello, <?php include("../connection.php");
		$id = $_SESSION['id'];
		$q= "SELECT * FROM `earn_money` WHERE `index` = '".$id."'";
		$r = mysql_query($q);
		$a = mysql_fetch_array($r);
		echo($a['fname']);
		?><br><br>
		<h3 style="font-size:2em;"> You have earned <?php echo($a['points']); ?> points</h3><br>
		<h3 style="font-size:1.8em;">
		<?php if($a['points'] >= 0){
			
			echo('<div class="alert alert-success" role="alert">
					<strong>Congretulations!</strong> You have collected enough points please contect us on given number for reward!.
				</div>');
			
		}   ?></h3>
		<div class="well"><h3 style="font-size:1.5em;">Here you can find your refer code. You just need to share this code with your friends... <br>
		By sharing this code you will gate 5% earning of their total order price<br> and you friend will also get 5% discount on their total payment...</h3></div><br>
		<h3 style="font-size:1.8em;">This is your refer code:</h3>
		<br>
		
		<div style="padding:1% 1% 1% 1%; width:30%; border-style: solid;    border-width: 3px;"><?php  echo($a['refer_code']);?></div><br><br>
		<h3 style="font-size:1.8em;">Now, start sharring and start earning...</h3>
		</center>
		</div>
<!-- //register -->
<!-- footer -->
	<?php include("../dessert.php"); ?>
<!-- //footer -->

</body></html>