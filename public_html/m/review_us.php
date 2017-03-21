<?php

include("starter.php"); ?>


<div class="container" style="margin-top:150px;">

<h3 class="center">Review Us</h3>
	<div style="color:red;" class="center"><?PHP
            if(isset($_GET['error'])){
               
                    echo $_GET['error'];
                 
            }
			
			
			
        ?></div>
		
		
		<?php
		if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['email']) && $_POST['email']!='' && isset($_POST['mobile_no']) && $_POST['mobile_no']!='' && isset($_POST['subject']) && $_POST['subject']!='' && isset($_POST['message']) && $_POST['message']!=''){
		$name = mysql_real_escape_string($_POST['name']);
		$email = mysql_real_escape_string($_POST['email']);
		$mobile_no = mysql_real_escape_string($_POST['mobile_no']);
		$subject = mysql_real_escape_string($_POST['subject']);
		$message = mysql_real_escape_string($_POST['message']);
	
		//$name = preg_replace("/[;`'><$%/,]/", "", $name);
		//$email = preg_replace("/[;`'><$%/,]/", "", $email);
	//	$mobile_no = preg_replace("/[;`'><$%/,]/", "", $mobile_no);
	//	$subject = preg_replace("/[;`'><$%/,]/", "", $subject);
	//	$message = preg_replace("/[;`'><$%/,]/", "", $message);
						
	$q = "INSERT INTO `reviews` (`name`, `email`, `mobile_no`, `subject`, `message`) VALUES('".$name."', '".$email."', '".$mobile_no."', '".$subject."', '".$message."')";
	mysql_query($q)
	or die(mysql_error());
	 include('sms/way2sms-api.php');
	sendWay2SMS ( "9409506643","123456","7069936320","rvw,".$subject.",".$name.",".$mobile_no." ");  
	?>
	<blockquote><p class="flow-text"><strong>Thank You!</strong> You successfully submited a review.</p></blockquote>

	
	<?php
		}else{
		
		?>
		<blockquote><p class="flow-text">Your review is our opportunity to learn, We are eager to read your valuable review! :)</p></blockquote>

<form action="review_us.php" method="post">
				<div class="row">
				<div class="input-field col s12">
					<input id="name" name="name" type="text" class="validate">
					<label for="name">Full Name</label>
				</div>
				<div class="input-field col s12">
					<input type="email" name="email"  required=" " id="email"  class="validate">
					<label for="email">E-mail</label>
				</div>
				<div class="input-field col s12">
					<input name="mobile_no"  id="mobile_no" required=" "  class="validate">
					<label for="mobile_no">Mobile no.</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="subject" required=" " id="subject" class="validate">
					<label for="subject">Subject</label>
				</div>
				<div class="input-field col s12">
					<input type="text" name="message" id="message" required=" " class="validate">
					<label for="message">Message</label>
				</div>
				<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
											
				
			</div>
	</form>
	
	<?php
	
		}
	?>
	
	
					<center><h3>Reviews</h3></center>
					<br>
					<?php
					$q = "SELECT * FROM `reviews` WHERE `enable` = '1'";
					$r = mysql_query($q);
					while($a=mysql_fetch_array($r)){
						echo("<div><h4 style='font-size:1.5em;'>".$a['name']."</h4><br>\n");
						?>
						<p class="animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<?php	echo($a['message']); ?>
						</p>
						
						<?php
						echo('</div><hr><br>');
					}
					

					?>



<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>