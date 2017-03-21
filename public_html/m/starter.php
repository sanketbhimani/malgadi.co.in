<?php
if(!isset($_GET['c'])){
	include("connection.php");
}
if(!isset($_GET['s'])){
	session_start();
}



?>
<html>
	<head>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script src="js/unslider-min.js"></script>
		<link rel="stylesheet" href="css/unslider.css">
		<link rel="stylesheet" href="css/unslider-dots.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

	</head>
	<body>
		<div id="main">
		<ul id="slide-out" class="side-nav" style="position:fixed; z-index:1000;">
				
				<li><div class="userView">
      <div class="background red lighten-1">
       
      </div>
      <a href="#!user"><img class="circle" src="img/logo.png"></a>
      <a href="#!name"><span class="white-text name" id="name">
	  <?php if(isset($_SESSION['user_full_name'])){
		  echo($_SESSION['user_full_name']);
	  }
	  else{
		  echo("Guest");
	  }
	  
	  ?>
	 </span></a>
      <a href="#!email"><span class="white-text email" id="email"> <?php if(isset($_SESSION['user_email'])){
		  echo($_SESSION['user_email']);
	  }
	  else{
		  echo("guest@malgadi.co.in");
	  }
	  
	  ?></span></a>
    </div></li>
	<?php if(!isset($_SESSION['user_email'])){
			
		?>
		<li><a href="login.php">Login/SignUp</a></li>
		<?php
			
	}
	else if($_SESSION['user_email']=="guest@malgadi.co.in"){
		?>
		<li><a href="login.php">Login/SignUp</a></li>
		<?php
	}
	?>
	 
	 <li><a href="index.php">Home</a></li>
  <?php
  $xml = new SimpleXMLElement(file_get_contents("malgadi.xml"));
				$cnt = 0;
				foreach ($xml->departments->department as $element) {
					?>
					
					<li><a href="items.php?id=<?php echo($element['id']); ?>&name=<?php echo($element); ?>"><?php echo($element); ?></a></li>
					<?php
				}
  
  
  ?>
  <li><a href="order_list.php">View Your Past Orders</a></li>
	<?php if(isset($_SESSION['user_email'])){
			if($_SESSION['user_email']!="guest@malgadi.co.in"){
				
			
		?>
		<li><a href="logout.php">Logout</a></li>
		<?php
		}	
	}
	?>
  <li><a href="review_us.php">Review Us</a></li>
  
	<li><a href="about_us.php">About Us</a></li>
			</ul>
			<div class="header" style="position:fixed; width:100%; margin-top:-3px;top:0; z-index:500;">
				<nav class="red lighten-1" style="padding-right:3%;">
					<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
					<a href="index.php"><span style="font-size:1.5em;">malgadi.co.in</span></a>
					<a href="view_cart.php"><span style="float:right;" class="white-text" ><span style="font-size:18px;"><?php if(isset($_SESSION['no_of_items'])){
		if(isset($_SESSION['no_item_deleted'])){
			echo($_SESSION['no_of_items']-$_SESSION['no_item_deleted']);
		}else{
			echo($_SESSION['no_of_items']);
			}
		}else{
			echo('0');
		}

?> item(s) <?php include("total_price_in_cart.php"); ?>&#8377; </span><i class="material-icons" style="display:inline-block;">shopping_cart</i></span></a>
				</nav>
				<form action="search_result">
				<div class="red lighten-1 row center"  style="height:60px; padding:3%; margin-top:-1px;">
					<input id="tag" type="sanket" style="height:36px;" placeholder="Search" class="validate center col s9 m9">
					<script>
					function search_abc(){
						location.href = 'search_result.php?tag='+$('#tag').val();
					}
					</script>
					<a class="waves-effect waves-light btn col s2 m2" style="margin-left:1%;" onclick="search_abc();"><i class="material-icons white-text">search</i></a>
				</div>
				</form>
			</div>
			<script>
				$('.button-collapse').sideNav({
					menuWidth: 300, // Default is 240
					edge: 'left', // Choose the horizontal origin
					closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
					draggable: true // Choose whether you can drag to open on touch screens
				});
				
			</script>
