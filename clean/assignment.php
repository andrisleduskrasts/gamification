<?php if(session_status() == PHP_SESSION_NONE){
	session_start();
	}
?>
<?php
$bodyclass='';
include('includes/header.php');
?>
<?php
$number = 0;
$cooldown = 0;
$username = "";
$waittime = 0;
if( isset($_POST["name"])){
	$username = $_POST["name"];
	$_SESSION["name"] = $username;
	$_SESSION["cooldown"] = 0;
	$waittime = 1;
	$_SESSION["waittime"] = 1;
}
else if (isset($_SESSION["name"])){
	$username = $_SESSION["name"];
}

if(isset($_SESSION["new"])){
	$_SESSION["cooldown"] = 120;
	unset($_SESSION["new"]);
}
else if (isset($_SESSION["cooldown"]) AND $_SESSION["cooldown"] > 0){
	$_SESSION["cooldown"] -= 5;
}
if(isset($_SESSION["cooldown"])){
$cooldown = $_SESSION["cooldown"];
}

if(isset($_SESSION["waittime"])){
	$waittime = 1;
}

if($cooldown == 5){
	$waittime = 1;
	$_SESSION["waittime"] = 1;
}
?>

<div class="cont">
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<p>Sveicināts, <?php echo $username;?></p>
		</div>
	</div>
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<?php 
			if($cooldown > 0){?>			
			<h2>Iepriekšējā uzdevuma apstrāde</h2>
			<?php } 
			else {
				if($waittime == 1){
					$number = rand(1, 100);
					//echo $number;
					if($number <= 90){?>
						<p> Tiek gaidīts jaunais uzdevums </p>
					<?php }
					else { 
						if(isset($_SESSION["waittime"])){
							unset($_SESSION["waittime"]);
						}?>
					<a href="task.php">jauns uzdevums!</a>
					<?php
					$_SESSION["taskstarttime"] = date('Y-m-d H:i:s');
					$_SESSION["taskno"] = rand(1, 15);
					}
				}
				else{?>
					<a href="task.php">jauns uzdevums!</a>
				<?php }
			}
			?>

		</div>
	</div>
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<a href="stop.php">Beigt Darbu </a>
		</div>
	</div>
</div>
