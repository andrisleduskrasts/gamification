<?php
$bodyclass='';
include('includes/header.php');
?>


<div class="pageheader">
	<div class="pagehaderin">
		<div class="bg" id='map' ></div>
	
	</div>
</div>

<div class="cont">
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<form action="assignment.php" method="post">
				<div class="columns medium-12">
					<label for="">Name</label>
					<input type="text" name="name" required>
				</div>
				<div class="columns medium-12 text-center">
					<input type="submit" value="Send">
				</div>
			</form>
		</div>
	</div>
</div>
