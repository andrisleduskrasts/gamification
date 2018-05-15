<?php
if(isset($_SESSION)){
	session_destroy();
}
$bodyclass='';
include('includes/header.php');
?>
<?php
$cooldown = 0;
$username = "";

$_SESSION = array();
?>

<div class="cont">
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<p>Jūs beidzāt darbu un jūsu rādītāji ir noslēgti.</p>
		</div>
	</div>
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
				<a href="form.php">Uz sākumu!</a>
		</div>
	</div>
</div>
