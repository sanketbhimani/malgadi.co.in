<?php

include("starter.php"); ?>

<script>
if (navigator.userAgent.indexOf('UC') >= 0) {
   alert("UCBrowser is no longer supported by malgadi.co.in");
}
</script>
<?php
if(isset($_GET['item_added'])){
	?>
	<script>
	swal("Great!", "Item Added Successfully", "success");
	</script>
	
	<?php
	
	}
?>


	<div class="container" style="margin-top:150px;">
				<div class="slider">
					<ul>
						
						<li><img src="img/p5.jpg" class="poster"></li>
						<li><img src="img/p3.jpg" class="poster"></li>
					</ul>
				</div>
				
	<script>
					$('.slider').unslider({
					animation: 'fade',
					autoplay: true,
					arrows: false
					});
								
				</script>
				
				
				<table class="striped centered">
				
				<?php
				
				$xml = new SimpleXMLElement(file_get_contents("malgadi.xml"));
				$cnt = 0;
				foreach ($xml->departments->department as $element) {
					//print_r($element);
					if($cnt == 0){
						echo("<tr class='row'><td class='col s6 m6' style='padding-top:12px; padding-bottom:12px;'><a href='items.php?id=".$element['id']."&name=".$element."'>".$element."</a></td>");
						$cnt = 1;
					}
					else{
						echo("<td class='col s6 m6' style='padding-top:12px; padding-bottom:12px;'><a href='items.php?id=".$element['id']."&name=".$element."'>".$element."</a></td></tr>");
						$cnt = 0;
					}
				}
				
				?>
				<!--<tr>
				<td>Basic Components</td>
				<td>Kits</td>
				
				</tr>
				<tr>
				<td>Robotics</td>
				<td>Micro Controller</td>
				
				</tr>
				<tr>
				<td>Sensors</td>
<td></td>				
				</tr>-->
				</table>
	
	<br>
	<h4 class="center"><u>Most Popular Products</u></h4>
	<br>
	<div class="products">
	<?php
$q = "SELECT * FROM `items` WHERE `index`='81'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);

	 include("product.php");
$q = "SELECT * FROM `items` WHERE `index`='56'";
$r = mysql_query($q);
$a = mysql_fetch_array($r);
 include("product.php"); ?>
	
	</div><br>
	<h4 class="center"><u>Newly Arrived Products</u></h4>
	<br>
	<div class="products">
		<?php
	$cnt = 0;
	$q = "SELECT * FROM `items` ORDER BY `index`  DESC";
$r = mysql_query($q);

	while($a = mysql_fetch_array($r)){
		if($cnt == 3){
			break;
		}
$cnt++;
include("product.php"); 

		}	?>
		</div>
		
		<br>
	<h4 class="center"><u>Recommended For You</u></h4>
	<br>
	<div class="products">
		<?php
		
			$list_item = array("0"=>"12","1"=>"41","2"=>"54","3"=>"56","4"=>"58","5"=>"28");
			$cnt = 0;
	while($cnt<3){
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
include("product.php"); 

		}	?>
		</div>
		
	
	<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>
