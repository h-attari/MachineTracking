<!DOCTYPE html>
<?php
    session_start();
    require_once "pdo.php";
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
    if( $_SESSION['id'] != '0' )
    {
        die('ACCESS DENIED');
    }
    if(isset($_POST['cancel']))
    {
        header("Location: home.php");
        return;
    }
?>
<html>
	<head>
		<title>Transfer Report</title>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width = device-width, initial-scale = 1">

    	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    	<link rel="stylesheet" type="text/css" href="style5.css">
	</head>
	<body style="margin-left: 150px; margin-right: 300px; margin-top: 100px">
		<div style="text-align: center">
			<b>
				<span>Medi-Caps University, Indore</span>
				<br>
				<span>System Transfer Report</span>
			</b>	
		</div>
		<br>
		<div class="container">
			<span class="col-xs-9">
				<b>Reciept No.: &nbsp</b>
				<?php
					$srid=$_GET['strid'];
					echo($srid);
				?>
			</span>
			<span>
				<b>Date: &nbsp</b>
				<?php
					$sdate = $pdo->prepare("SELECT date_of_assignment FROM system_transfer_report WHERE system_transfer_report_id=:srid");
					$sdate->execute(array(':srid' => $srid));
					$sdaten = $sdate->fetch(PDO::FETCH_ASSOC); 
					echo($sdaten['date_of_assignment']);
				?>
			</span>
		</div>
	<br><br><br>
		<div class="container">
			<span class="col-xs-6">
				<b>Department: &nbsp</b>
				<?php
						$sdep = $pdo->prepare("SELECT department FROM system_transfer_report WHERE system_transfer_report_id=:srid");
						$sdep->execute(array(':srid' => $srid));
						$sdepn = $sdep->fetch(PDO::FETCH_ASSOC); 
						echo ($sdepn['department']);	
					?>
			</span>
			<span>
				<b>Room/Lab No.: &nbsp</b>
				<?php
						$slab = $pdo->prepare("SELECT lab_id FROM system_transfer_report WHERE system_transfer_report_id=:srid");
						$slab->execute(array(':srid' => $srid));
						$slabn = $slab->fetch(PDO::FETCH_ASSOC); 
						echo ($slabn['lab_id']);	
					?>
			</span>
		</div>
	<br>
		<div class="container">
			<span class="col-xs-12">
				<b>Purpose: &nbsp</b>
				<?php
						$spur = $pdo->prepare("SELECT purpose FROM system_transfer_report WHERE system_transfer_report_id=:srid");
						$spur->execute(array(':srid' => $srid));
						$spurn = $spur->fetch(PDO::FETCH_ASSOC); 
						echo ($spurn['purpose']);	
					?>
			</span>
		</div>
	</body>
</html>