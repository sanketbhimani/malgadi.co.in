

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
		<h3>Your Summary</h3>
		<div class="bs-docs-example animated wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 500ms; animation-name: fadeInUp; width:70%;">
				<table class="table table-bordered">
					<thead>
				
					<tr>
							<th>#</th>
							<th>Name</th>
							<th>Item</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
				<?php
				include("../connection.php");
				$id = $_SESSION['id'];
		$q= "SELECT * FROM `earn_money` WHERE `index` = '".$id."'";
		$r = mysql_query($q);
		$a = mysql_fetch_array($r);
		
				$q = "SELECT * FROM `orders` WHERE `refer_code`='".$a['refer_code']."'";
				$r = mysql_query($q);
				$cnt = 0;
				while($a = mysql_fetch_array($r)){
					$cnt++;
					echo("<tr>");
					echo("<td>".$cnt."</td>");
					echo("<td>".$a['fname']."</td>");
					$q = "SELECT * FROM `items` WHERE `index` = '".$a['item']."'";
					$r1 = mysql_query($q);
					$a1 = mysql_fetch_array($r1);
					echo("<td>".$a1['title']."</td>");
					echo("<td>".$a['date']."</td>");
					echo("</tr>");
				}
				
				
				?>
						
					
					
					
					</tbody>
				</table>
			</div>
		</center>
		</div>
<!-- //register -->
<!-- footer -->
	<?php include("../dessert.php"); ?>
<!-- //footer -->

</body></html>