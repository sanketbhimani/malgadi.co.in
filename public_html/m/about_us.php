<?php

include("starter.php"); ?>


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
<div class="footer-grid animated slideInLeft" style="float:left;">
					<h3>About Us</h3>
					<p>
					<ul><p>MALGADI is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate. Along with this, we also organize workshops and seminars in colleges to impart technical knowledge to students.</p><p>
We intend to develop this platform and extend its reach to as many students as possible; hence making technical education a bit more interesting. This is the platform which made us technically potent along with an experience of entrepreneurship.</p></ul></p>
				</div>

<h3><a href="team.php">View malgadi team</a></h3>
	<?php include("dessert.php"); ?>
	</div>
	</div>
	</body>
	</html>