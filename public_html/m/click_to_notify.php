<?php
if(!isset($_POST['item'] ) && !isset($_GET['item'])){
	header("location:index.php");
	die();
}


include("starter.php"); 
?>



	<div class="container" style="margin-top:150px;">
	
	<?php

if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['email']) && $_POST['email']!='' && isset($_POST['mobile_no']) && $_POST['mobile_no']!=''){
		$name = mysql_real_escape_string($_POST['name']);
		$email = mysql_real_escape_string($_POST['email']);
		$mobile_no = mysql_real_escape_string($_POST['mobile_no']);
		$item = mysql_real_escape_string($_POST['item']);
							
	$q = "INSERT INTO `click_to_notify` (`name`, `email`, `mobile_no`, `item`) VALUES('".$name."', '".$email."', '".$mobile_no."', '".$item."')";
	mysql_query($q)
	or die(mysql_error());
	?>
			<blockquote><p class="flow-text">
					<strong>Thank You!</strong> We have recived your details...
				</p></blockquote>
				
	<?php
	
}else{

?>
<h3 class="center">Notify Me</h3>
	<blockquote><p class="flow-text">
					We will contact you as your needed item will arrive</p></blockquote>
					<form action="click_to_notify.php" method="post">
					
					
				<div class="row">
				<div class="input-field col s12">
					<input  type="text" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="" id="name">
					<label for="name">Name</label>
				</div>
				<div class="input-field col s12">
					<input  type="text" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="" id="email">
					<label for="email">E-mail</label>
				</div>
				<div class="input-field col s12">
					<input  type="text" name="mobile_no" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="" id="mobile_no">
					<label for="mobile_no">Mobile No.</label>
				</div>
				<input type="hidden" name="item" value="<?php echo($_GET['item']); ?>">
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
				
				</div>
					</form>
				

<?php 
}
?>
<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>