<?php session_start(); ?>



<!DOCTYPE html>
<html>
<head>
<title>malgadi.co.in</title>

<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>
<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location:m/');

?>






















	
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css"  />
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

</head>
	
<body>
<!-- header -->

<?php

include("starter.php"); ?>
<style>
.ssssss{
																						color:brown;
																						font-size:2em;
																						font-family: 'Roboto', sans-serif;
																					}
</style>

<?php
if(isset($_GET['item_added'])){
	?>
	<script>
	swal("Great!", "Item Added Successfully", "success");
	</script>
	
	<?php
	
	}
?>


	<div class="container" style="margin-top:3%;" >
	<div class="col-md-7">
	<div style="margin-bottom:6%;"><center><h3><u>Introduction to malgadi</u></h3></center></div>
	<iframe style="width:100%; height:330px;" src="https://www.youtube.com/embed/wFxfo6par3o" frameborder="0" allowfullscreen></iframe>
	</div>
	
	<div class="col-md-5">
	<center><h3><u>Most popular product</u></h3></center>
	<?php
	$q = "SELECT * FROM `items` WHERE `index`='81'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
	
	?>
					<div class="col-md-6 products-right-grids-bottom-grid" style="margin-down:6px;">
							<div class="new-collections-grid1 products-right-grid1 animated slideInUp" style="overflow:hidden;  margin-bottom:6px;">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image" style="min-height:180px; max-height:180px;"><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<img src="images/oos.png" style="position:absolute; z-index:80; width:100%; right:0; top:30%;">
									<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " style="width:100%; opacity:.6;" class="img-responsive">
									<?php
								}else{
								
								?>
								
								
								<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive" style="width:100%;">
								
								<?php } ?></div></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="item.php?item=<?php echo($a['index']); ?>">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><h4><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['title']); ?></a></h4></div>
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><p><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['subtitle']); ?></a></p></div>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<a class="item_add" href="click_to_notify.php?item=<?php echo($a['index']); ?>">click to notify</a>
									<?php
								}else{
									?>
								
								<a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a>
								
								<?php
								
								}
								?></p>
							</div>
						</div>
							</div>
	
		<?php
	$q = "SELECT * FROM `items` WHERE `index`='56'";
$r = mysql_query($q);
$a = mysql_fetch_array($r)
	
	?>
					<div class="col-md-6 products-right-grids-bottom-grid" style="margin-down:6px;">
							<div class="new-collections-grid1 products-right-grid1 animated slideInUp" style="overflow:hidden;  margin-bottom:6px;">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image" style="min-height:180px; max-height:180px;"><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<img src="images/oos.png" style="position:absolute; z-index:80; width:100%; right:0; top:30%;">
									<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " style="width:100%; opacity:.6;" class="img-responsive">
									<?php
								}else{
								
								?>
								
								
								<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive" style="width:100%;">
								
								<?php } ?></div></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="item.php?item=<?php echo($a['index']); ?>">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><h4><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['title']); ?></a></h4></div>
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><p><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['subtitle']); ?></a></p></div>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<a class="item_add" href="click_to_notify.php?item=<?php echo($a['index']); ?>">click to notify</a>
									<?php
								}else{
									?>
								
								<a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a>
								
								<?php
								
								}
								?></p>
							</div>
						</div>
							</div>
	
	
	
	
	</div>
	</div>
		<div class="container" style="margin-top:3%;" >

	<div class="col-md-5">
	<center><h3><u>Most popular product</u></h3></center>
	<?php
	$q = "SELECT * FROM `items` WHERE `index`='44'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
	
	?>
					<div class="col-md-6 products-right-grids-bottom-grid" style="margin-down:6px;">
							<div class="new-collections-grid1 products-right-grid1 animated slideInUp" style="overflow:hidden;  margin-bottom:6px;">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image" style="min-height:180px; max-height:180px;"><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<img src="images/oos.png" style="position:absolute; z-index:80; width:100%; right:0; top:30%;">
									<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " style="width:100%; opacity:.6;" class="img-responsive">
									<?php
								}else{
								
								?>
								
								
								<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive" style="width:100%;">
								
								<?php } ?></div></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="item.php?item=<?php echo($a['index']); ?>">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><h4><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['title']); ?></a></h4></div>
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><p><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['subtitle']); ?></a></p></div>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<a class="item_add" href="click_to_notify.php?item=<?php echo($a['index']); ?>">click to notify</a>
									<?php
								}else{
									?>
								
								<a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a>
								
								<?php
								
								}
								?></p>
							</div>
						</div>
							</div>
	
		<?php
	$q = "SELECT * FROM `items` WHERE `index`='4'";
$r = mysql_query($q);
$a = mysql_fetch_array($r)
	
	?>
					<div class="col-md-6 products-right-grids-bottom-grid" style="margin-down:6px;">
							<div class="new-collections-grid1 products-right-grid1 animated slideInUp" style="overflow:hidden;  margin-bottom:6px;">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image" style="min-height:180px; max-height:180px;"><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<img src="images/oos.png" style="position:absolute; z-index:80; width:100%; right:0; top:30%;">
									<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " style="width:100%; opacity:.6;" class="img-responsive">
									<?php
								}else{
								
								?>
								
								
								<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive" style="width:100%;">
								
								<?php } ?></div></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="item.php?item=<?php echo($a['index']); ?>">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><h4><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['title']); ?></a></h4></div>
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><p><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['subtitle']); ?></a></p></div>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<a class="item_add" href="click_to_notify.php?item=<?php echo($a['index']); ?>">click to notify</a>
									<?php
								}else{
									?>
								
								<a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a>
								
								<?php
								
								}
								?></p>
							</div>
						</div>
							</div>
	
	
	
	
	</div>
		<div class="col-md-7">
	<div class="banner">
	<div class="slider" style="margin-top:3%; width:100%;">
<img src="images/p5.jpg" style="width:100%;" />
</div>
	</div>
	</div>
	</div>
	
	
	
	
	
	
	<div class="container products-right products-right-grids-bottom" style="margin-top:-6%;">
	<?php
	$list_item = array("0"=>"44","1"=>"41","2"=>"54","3"=>"56","4"=>"58","5"=>"28");
	
	?>
	<center><h3><u>Recommended for you</u></h3></center>
	<div class="row" style="margin-top:3%;">
	
	<?php
	$cnt = 0;
	while($cnt<6){
		$item = 0;
		if(isset($_COOKIE['item'.$cnt])){
			$item = mysql_real_escape_string($_COOKIE['item'.$cnt]);
		}
		else{
			$item = $list_item[$cnt];
		}
		$q = "SELECT * FROM `items` WHERE `index`='".$item."'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
$cnt++;
		?>
		
		<div class="col-md-2	 products-right-grids-bottom-grid" style="margin-down:6px;">
							<div class="new-collections-grid1 products-right-grid1 animated slideInUp" style="overflow:hidden;  margin-bottom:6px;">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image" style="min-height:180px; max-height:180px;"><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<img src="images/oos.png" style="position:absolute; z-index:80; width:100%; right:0; top:30%;">
									<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " style="width:100%; opacity:.6;" class="img-responsive">
									<?php
								}else{
								
								?>
								
								
								<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive" style="width:100%;">
								
								<?php } ?></div></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="item.php?item=<?php echo($a['index']); ?>">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><h4><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['title']); ?></a></h4></div>
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><p><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['subtitle']); ?></a></p></div>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<a class="item_add" href="click_to_notify.php?item=<?php echo($a['index']); ?>">click to notify</a>
									<?php
								}else{
									?>
								
								<a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a>
								
								<?php
								
								}
								?></p>
							</div>
						</div>
							</div>
		
		
		<?php
		
		
		
	}
	
	?>
	
	
	
	</div>
	</div>
	
		<div class="container products-right products-right-grids-bottom" style="margin-top:6%; margin-bottom:3%;">
	
	<center><h3><u>Newly arrived</u></h3></center>
	<div class="row" style="margin-top:3%;">
	
	<?php
	$cnt = 0;
	$q = "SELECT * FROM `items` ORDER BY `index`  DESC";
$r = mysql_query($q);

	while($a = mysql_fetch_array($r)){
		if($cnt == 6){
			break;
		}
$cnt++;
		?>
		
		<div class="col-md-2	 products-right-grids-bottom-grid" style="margin-down:6px;">
							<div class="new-collections-grid1 products-right-grid1 animated slideInUp" style="overflow:hidden;  margin-bottom:6px;">
							<div class="new-collections-grid1-image" style="overflow:hidden;">
								<a href="item.php?item=<?php echo($a['index']); ?>" ><div class="product-image" style="min-height:180px; max-height:180px;"><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<img src="images/oos.png" style="position:absolute; z-index:80; width:100%; right:0; top:30%;">
									<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " style="width:100%; opacity:.6;" class="img-responsive">
									<?php
								}else{
								
								?>
								
								
								<img src="product_images/<?php echo($a['index'].'1.jpeg'); ?>" alt=" " class="img-responsive" style="width:100%;">
								
								<?php } ?></div></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="item.php?item=<?php echo($a['index']); ?>">Quick View</a>
								</div>
												</div>
												
												<?php
												for($i=1;$i<=$a['avg_star'];$i++){
													?>
														<img src="images/2.png">
													<?php
												}
													for(;$i<=5;$i++){
													?>
														<img src="images/1.png">
													<?php
												}
												?>
												
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><h4><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['title']); ?></a></h4></div>
							<div style="overflow-y:hidden; max-height:54px; min-height:54px;"><p><a href="item.php?item=<?php echo($a['index']); ?>"><?php echo($a['subtitle']); ?></a></p></div>
							<div class="simpleCart_shelfItem products-right-grid1-add-cart">
								<p><i><?php echo($a['price']); ?>&#8377;</i><span class="item_price"><?php echo(($a['price'])-($a['discount'])); ?>&#8377;</span><?php
								if($a['item_avil']<=0 ||  $a['out_of_stock']==1){
									?>
									<a class="item_add" href="click_to_notify.php?item=<?php echo($a['index']); ?>">click to notify</a>
									<?php
								}else{
									?>
								
								<a class="item_add" href="add_to_cart.php?index=<?php echo($a['index']); ?>">add to cart </a>
								
								<?php
								
								}
								?></p>
							</div>
						</div>
							</div>
		
		
		<?php
		
		
		
	}
	
	?>
	
	
	
	</div>
	</div>
	
	
<?php include('dessert.php');?>
<!-- //footer -->
</body>
</html>
