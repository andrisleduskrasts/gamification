<?php if(session_status() == PHP_SESSION_NONE){
	session_start();
	}
?>
<?php
$bodyclass='';
include('includes/header.php');
?>
<?php
$cooldown = 0;
$taskno = 0;
$taskstarttime = '';
$username = "";
if (isset($_SESSION["name"])){
	$username = $_SESSION["name"];
}
if(isset($_SESSION["taskno"])){
	$taskno = $_SESSION["taskno"];
}
if(isset($_SESSION["taskstarttime"])){
	$taskstarttime = $_SESSION["taskstarttime"];
}
$starttime = date('Y-m-d H:i:s');
$responsetime = strtotime($starttime) - strtotime($taskstarttime);
$taskfile = "tasks/task".$taskno.".txt";
$fileopen = fopen($taskfile, 'r');
?>

<div class="cont">
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<p>Sveicināts, <?php echo $username;?></p>
			<p><?php print_r($_SESSION);?></p>	
		</div>
	</div>
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<?php
			while ($line = fgets($fileopen)){?>
			<span data-text='<?php echo $line?>'></span> </br>
			<?php } ?>
		</div>
	</div>
	<?php
	fclose($fileopen);
	?>
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<form action="results.php" method="post" id="contentform">
				<div class="columns medium-12">
					<label for="">Ievadiet augstāk redzamo tekstu</label>
					<textarea name="content" form="contentform" required style="width:100%; height:300px"></textarea>
					<input type="hidden" name="starttime" value="<?php echo $starttime; ?>">
					<input type="hidden" name="taskno" value="<?php echo $_SESSION["taskno"];?>">
					<input type="hidden" name="responsetime" value="<?php echo $responsetime;?>">
				</div>
				<div class="columns medium-12 text-center">
					<input type="submit" value="Send">
				</div>
			</form>
		</div>
	</div>
</div>
