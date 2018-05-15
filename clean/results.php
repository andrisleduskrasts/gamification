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
$responsetime = "";
if (isset($_SESSION["name"])){
	$username = $_SESSION["name"];
}
if(isset($_POST["taskno"])){
	$taskno = $_POST["taskno"];
}
if(isset($_SESSION["taskstarttime"])){
	$taskstarttime = $_SESSION["taskstarttime"];
}
if(isset($_POST["responsetime"])){
	$responsetime = $_POST["responsetime"];
}
$curtime = date('Y-m-d H:i:s');
$tasktime = strtotime($curtime) - strtotime($_POST["starttime"]);
$taskfile = "tasks/task".$taskno.".txt";
$fileopen = fopen($taskfile, 'r');
$resultpath = "results/".$username.".txt";
$resultfile = fopen($resultpath, "a");
$correct = 0;
$wrong = 0;


fwrite($resultfile, $responsetime);
fwrite($resultfile, "\r\n");
fwrite($resultfile, $tasktime);
fwrite($resultfile, "\r\n");

$source = file_get_contents($taskfile);
$input = $_POST["content"];
	while($source != ''){
		if(preg_replace('/(^.+?(?:\s+|\n|$)).*$/', '$1', $source) == preg_replace('/(^.+?(?:\s+|\n|$)).*$/', '$1', $input)){
			$correct++;
		}
		else{
		$wrong++;
		}
		$source = preg_replace('/^.+?(?:\s+|\n|$)/', '', $source);
		$input = preg_replace('/^.+?(?:\s+|\n|$)/', '', $input);
		?>
	<?php 
	}
$accuracy = $correct/($correct+($wrong-1))*100;
fwrite($resultfile, $accuracy);
fwrite($resultfile, "\r\n");
fwrite($resultfile, "\r\n");
?>

<div class="cont">
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<p>Sveicināts, <?php echo $username;?></p>
			<p>Tavs atbildes laiks: <?php echo $responsetime;?></p>
			<p>Tavs izpildes laiks: <?php echo $tasktime;?></p>
			<p>Tava precizitāte: <?php echo $accuracy;?>% </p>
			<p>Pareizie vārdi: <?php echo $correct;?> </p>
			<p>Nepareizie vārdi: <?php echo $wrong-1;?> </p>
		</div>
	</div>
	<?php
	fclose($fileopen);
	?>
	<div class="row">
		<div class="columns medium-8 medium-offset-2">
			<a href="assignment.php">Atpakaļ uz jauna uzdevuma gaidīšanas atvērumu</a>
			<?php
				$_SESSION["new"] = "yes";
			?>
		</div>
	</div>
</div>
