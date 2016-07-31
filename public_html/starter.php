	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated slideInLeft">
					<ul>
					<li  style="width:15%;"><a href="index.php"><img src="images/logo.png" width="100%" style="margin-top:-18%;"></a></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:support@malgadi.co.in">support@malgadi.co.in</a></li>
						<li>
						<center><h3 style="color:black;font-weight: 900;">Free Delivery | COD</h3>(only in nadiad)</center></li>
						<!--<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+91 987 654 3210</li>-->
					<!--	<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login.html">Login</a></li>
						<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register.html">Register</a></li>
						-->
					</ul>
				</div>
				<!--<div class="header-grid-right animated slideInRight">
					<ul class="social-icons">
						<li><a href="#" class="facebook"></a></li>
						<li><a href="#" class="twitter"></a></li>
						<li><a href="#" class="g"></a></li>
						<li><a href="#" class="instagram"></a></li>
					</ul>
				</div>-->
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
		
<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					
				
				
				</div>
				<div class="logo-nav-left1" style="width:90%;">
				
				<nav class="navbar navbar-default">
				
					<!-- Brand and toggle get grouped for better mobile display -->
					<!--<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> -->
					<ul class="nav navbar-nav">
					<!--<li  style="width:24%;"><a href="index.php"><img src="images/logo.png" width="100%" style="margin-top:-18%;"></a></li>-->
					<li>
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
						
							<li class="active"><a href="index.php" class="act">Home</a></li>
							<li><a href="basic_components.php" class="act"><div style="color:black; font-weight:600;">Basic Components</div></a></li>
							<li><a href="robotics.php" class="act"><div style="color:black;  font-weight:600;">Robotics</div></a></li>
							<li><a href="microcontrollers.php"><div style="color:black;  font-weight:600;">Microcontrollers</div></a></li>
							<li><a href="sensors.php"><div style="color:black;  font-weight:600;">Sensors</div></a></li>
							<!-- Mega Menu -->
						<!--	<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<h6>Electronics</h6>
												<li><a href="basic_components.php">Basic Components</a></li>
												<li><a href="robotics.php">Robotics</a></li>
												<li><a href="microcontrollers.php">Microcontrollers</a></li>
												<li><a href="sensors.php">Sensors</a></li>
											</ul>
										</div>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>-->
			
							<li><a href="chack_order.php"><div style="color:black;  font-weight:600;">View Your Past Order</div></a></li>
						<!--<li><a href="earn_money/index.php">Earn With Us</a></li>-->
											<li><a href="review_us.php"><div style="color:black;  font-weight:600;">Review Us</div></a></li>
						</ul>
					</div>
					</li>
					</ul>
					</nav>
				</div>
		
		
				<div class="header-right" style="margin-top:-6%; z-index:1000;">
					<div class="cart box_1">
						<a href="view_cart.php">
					<?php
					include("connection.php");
	if(isset($_SESSION['no_of_items'])){
		if(isset($_SESSION['no_item_deleted'])){
			?>		<img src="images/bag.png" style="margin-left:30%; margin-bottom:6%;"alt="" />
							<h3> <div class="total">
								<span class="simpleCart_total">total: <span id="total"><?php
								if(isset($_SESSION['no_of_items']) && ((!isset($_SESSION['no_item_deleted'])) || (isset($_SESSION['no_item_deleted']) &&  ($_SESSION['no_of_items']-$_SESSION['no_item_deleted'])!=0) )){
									$total = 0;
										for($i=1;$i<=$_SESSION['no_of_items'];$i++){
		if(isset($_SESSION['item'.$i])){
			
		
		$q = "SELECT * FROM `items` WHERE `index` = '".$_SESSION['item'.$i]."'";
		$r = mysql_query($q)
			or die("select ".mysql_error());
		$a = mysql_fetch_array($r);
								$total += $a['price']-$a['discount'];
								}}
								echo($total);
								}
								?>&#8377;</span>
								</span> <br>(<span id="hahahaasdf" class="simpleCart_quantity"><?php echo($_SESSION['no_of_items']-$_SESSION['no_item_deleted']);?></span> item(s))</div>
						
							</h3>
		<?php }else{
			?><img src="images/bag.png" style="margin-left:30%; margin-bottom:6%;"alt="" />
							<h3> <div class="total">
								<span class="simpleCart_total">total: <span id="total"><?php
								if(isset($_SESSION['no_of_items']) && ((!isset($_SESSION['no_item_deleted'])) || (isset($_SESSION['no_item_deleted']) &&  ($_SESSION['no_of_items']-$_SESSION['no_item_deleted'])!=0) )){
									$total = 0;
										for($i=1;$i<=$_SESSION['no_of_items'];$i++){
		if(isset($_SESSION['item'.$i])){
			
		
		$q = "SELECT * FROM `items` WHERE `index` = '".$_SESSION['item'.$i]."'";
		$r = mysql_query($q)
			or die("select ".mysql_error());
		$a = mysql_fetch_array($r);
								$total += $a['price']-$a['discount'];
								}}
								echo($total);
								}
		?>&#8377;</span><br> (<span id="hahahaasdf" class="simpleCart_quantity"><?php if($_SESSION['no_of_items'] == -1){ echo(0);}else{echo($_SESSION['no_of_items']);}?></span> item(s))</div>
								
							</h3>
			<?php
		}
		?></a> <?php
		
	}else{
				?>		
				<img src="images/bag.png" alt="" />
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p> 
	<?php }?>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<br><br><br><br>
						<div class="logo-nav-right" >
	
					<div class="search-box" >					
						<div id="sb-search" class="sb-search" style="margin-right:-1%;margin-top:-3%;">
							<form action="search_result.php" method="get">
								<input class="sb-search-input" placeholder="Enter your search term..." type="search" id="searchabcd"  name="tag">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
						
					</div>
						<!-- search-scripts -->
						<script src="js/classie.js"></script>
						<script src="js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
								
							</script>

						<!-- //search-scripts -->
				</div>
			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>