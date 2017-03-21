	<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
<div class="header">
  <div class="container">
    <div class="header-grid">
      <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
        <ul>
          <li>
            <i class="glyphicon glyphicon-envelope" aria-hidden="true">
            </i>
            <a href="mailto:ready2help.malgadi@gmail.com">ready2help.malgadi@gmail.com
            </a> 
          </li>
		  
		  <?php
                                        //session_start();
                                        if (!isset($_SESSION['user_email'])) {
                                            // echo "without session0";
                                            echo "<li><i class='glyphicon glyphicon-log-in' aria-hidden='true'>
            </i><a href='login.php'>Login </a></li>";
                                            echo "<li><i class='glyphicon glyphicon-book' aria-hidden='true'>
            </i><a href='signup.php'>Signup</a></li>";
                                            echo "<li><a href='order_list.php'> Your Orders</a></li>";
                                        }
										else{
											if ($_SESSION['user_email'] === "guest@malgadi.co.in") {
                                                //   echo "guest session";
                                                echo "<li><i class='glyphicon glyphicon-log-in' aria-hidden='true'>
            </i><a href='login.php'>Login </a></li>";
                                                echo "<li><i class='glyphicon glyphicon-book' aria-hidden='true'>
            </i><a href='signup.php'>Signup </a></li>";
                                                echo "<li><a href='order_list.php'> Your Orders</a></li>";
                                            } else {
                                                echo "Welcome, " . $_SESSION['user_full_name'];
                                                echo "<li><a href='order_list.php'> Your Orders</a></li>";
                                                echo "<li><a href='changepassword.php'> Change Password</a></li>";
                                                echo "<li><a href='logout.php'> Logout</a></li>";
                                            }
										}
										?>
		  
		  
         
        </ul>
      </div>
      <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
        <ul class="social-icons">
          <li>
            <a href="https://www.facebook.com/Malgadi_ndd-1196438223783056" class="facebook">
            </a>
          </li>
          <li>
            <a href="https://www.youtube.com/channel/UC37swT-hpPGfXfg01CTPOBQ" class="youtube">
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/malgadi_ndd/?hl=en" class="instagram">
            </a>
          </li>
        </ul>
      </div>
      <div class="clearfix"> 
      </div>
    </div>
    <div class="logo-nav">
      <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
       
          <a href="index.php"><span style="background-image: url('images/logo.png'); width:9em; height:6.6em; display:block; background-size: 100% auto; background-repeat: no-repeat;"></span></a>
        
      </div>
      <div>
        <nav class="navbar navbar-default"  style="margin-left:15%;"> 
         <div>
	
            <ul class="nav navbar-nav">
              <li>
                <a href="index.php">Home
                </a> 
              </li>
			  
			  <?php
  $xml = new SimpleXMLElement(file_get_contents("m/malgadi.xml"));
				$cnt = 0;
				foreach ($xml->departments->department as $element) {
					?>
					<li><a href="items.php?id=<?php echo($element['id']); ?>&name=<?php echo($element); ?>" <?php if(strpos($_SERVER[ 'REQUEST_URI'], $element)===false){ } else{ echo( " class='act'"); } ?>><?php echo($element); ?></a></li>
					
					<?php
				}
  
  
  ?>
<li>
  <a href="review_us.php" 
     <?php if(strpos($_SERVER[ 'REQUEST_URI'], "review_us")===false){ } else{ echo( " class='act'"); } ?>>Review Us
</a> 
</li>

</ul>

</div>
</nav>
</div>
															<style>
															.container-1{
															  width: 120%;
															  vertical-align: middle;
															}
															#search{
															  width: 60%;
															  height: 45px;
															  background: #f3f3f3;
															  border: none;
															  font-size: 10pt;
															  float: left;
															  color: #63717f;
															  padding-left: 45px;
															  -webkit-border-radius: 5px;
															  -moz-border-radius: 5px;
															  border-radius: 5px;
															}
															.box{
																margin-top:-4.5%;
																margin-left:16%;
															}
																				</style>

															</style>
															<div class="box">
															  <div class="container-1">
															  <form action="search_result.php">
																  <input type="text" name="tag" id="search" placeholder="Search..." />

																  </form>
															  </div>
															</div>
									
<!-- <div class="logo-nav-right">
  <div class="search-box">
    <div id="sb-search" class="sb-search">
      <form action="search_result.php">
        <input class="sb-search-input" name="tag" placeholder="Enter your search term..." type="search" id="search">
        <input class="sb-search-submit" type="submit" value=""> 
        <span class="sb-icon-search"> 
        </span> 
      </form>
    </div>
  </div>
  
  <script src="js/classie.js">
  </script>
  <script src="js/uisearch.js">
  </script>
  <script>
    new UISearch(document.getElementById('sb-search'));
  </script>
 
</div> -->
<div class="header-right">
  <?php include( "connection.php"); if(isset($_SESSION[ 'no_of_items'])){ if(isset($_SESSION[ 'no_item_deleted'])){ ?>
  <?php if(($_SESSION[ 'no_of_items']-$_SESSION[ 'no_item_deleted'])!=0){ ?>
  <div class="cart box_1">
    <a href="view_cart.php"   >
      <h3> 
        <div class="total">
          <span class="simpleCart_total">&#8377; 
            <?php
$total = 0;
for($i=1;$i<=$_SESSION['no_of_items'];$i++){
if(isset($_SESSION['item'.$i])){
$q = "SELECT * FROM `items` WHERE `index` = '".$_SESSION['item'.$i]."'";
$r = mysql_query($q)
or die("select ".mysql_error());
$a = mysql_fetch_array($r);
$total += ($a['price']-$a['discount'])*$_SESSION['qty'.$i];
}}
echo($total);
?>
          </span> (
          <span id="simpleCart_quantity" class="simpleCart_quantity">
            <?php echo($_SESSION['no_of_items']-$_SESSION['no_item_deleted']);?>
          </span> items)
        </div>
        <img src="images/cart.png" alt="" />
      </h3> 
    </a>
    <p>
      <a href="view_cart.php"    class="simpleCart_empty">View Cart
      </a> 
    </p>
    <div class="clearfix"> 
    </div>
  </div>
  <?php } else{ ?>
  <div class="cart box_1">
    <a href="view_cart.php"   >
      <h3> 
        <img src="images/cart.png" alt="" />
      </h3> 
    </a>
    <p>
      <a href="view_cart.php"    class="simpleCart_empty">Empty Cart
      </a> 
    </p>
    <div class="clearfix"> 
    </div>
  </div>
  <?php } }else{ ?>
  <div class="cart box_1">
    <a href="view_cart.php"   >
      <h3> 
        <div class="total">
          <span class="simpleCart_total">&#8377; 
            <?php
if(isset($_SESSION['no_of_items']) &&$_SESSION['no_of_items']!=0){
$total = 0;
for($i=1;$i<=$_SESSION['no_of_items'];$i++){
if(isset($_SESSION['item'.$i])){
$q = "SELECT * FROM `items` WHERE `index` = '".$_SESSION['item'.$i]."'";
$r = mysql_query($q)
or die("select ".mysql_error());
$a = mysql_fetch_array($r);
$total += ($a['price']-$a['discount']) *$_SESSION['qty'.$i];
}}
echo($total);
}
?>
          </span> (
          <span id="simpleCart_quantity" class="simpleCart_quantity">
            <?php if($_SESSION['no_of_items'] == -1){ echo(0);}else{echo($_SESSION['no_of_items']);}?>
          </span> items)
        </div>
        <img src="images/cart.png" alt="" />
      </h3> 
    </a>
    <p>
      <a href="view_cart.php"    class="simpleCart_empty">View Cart
      </a> 
    </p>
    <div class="clearfix"> 
    </div>
  </div>
  <?php } ?>
  <?php }else{ ?>
  <div class="cart box_1">
    <a href="view_cart.php"   >
      <h3> 
        <img src="images/cart.png" alt="" />
      </h3> 
    </a>
    <p>
      <a href="view_cart.php"    class="simpleCart_empty">Empty Cart
      </a> 
    </p>
    <div class="clearfix"> 
    </div>
  </div>
  <?php }?> 
</div>
<div class="clearfix"> 
</div>
</div>
</div>
</div>
