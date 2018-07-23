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
    if(isset($_GET['mc_id']))
    {
        $mac_addr=$_GET['mc_id'];
    }
    if(isset($_POST['hid']))
    {
        if ( strlen($_POST['hid']) < 1 || strlen($_POST['fault']) < 1 || strlen($_POST['cost']) < 1 )
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: fromrepairmc.php');
            return;
        }
        else
        {
            $_POST['date']=date('y-m-d',strtotime($_POST['date']));
            $stmt = $pdo->prepare('SELECT * FROM hardware WHERE hardware_id = :hid');
            $stmt->execute(array(':hid' => $_POST['hid']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row === FALSE)
            {
                $_SESSION['error'] = "Invalid Hardware ID";
                header('Location: fromrepairmc.php?hid='.$_GET['hardware_id']);
                return;
            }
 
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM device_repair_history WHERE hardware_id = :hid AND fault IS NULL');
            $stmt->execute(array(':hid' => $_POST['hid']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['COUNT(*)'] !== '0')
            {

                 $stmt = $pdo->prepare('UPDATE hardware SET state = 0 WHERE hardware_id = :hid');
                    $stmt->execute(array(':hid' => $_POST['hid']));

                $stmt = $pdo->prepare('UPDATE device_repair_history SET final_date = :fdate, fault = :fault, cost = :cost WHERE hardware_id = :hid AND final_date = "0000-00-00"');
                    $stmt->execute(array(':hid' => $_POST['hid'], ':fdate' => $_POST['date'], ':fault' => $_POST['fault'], ':cost' => $_POST['cost']));

                $_SESSION['success'] = "Hardware returned from Repair Successfully";
                header('Location: home.php');
                return;
            }
            else
            {
                $_SESSION['error'] = "Hardware does not Exist in Repair House";
                    header('Location: fromrepairmc.php');
                    return;
            }

        }
    }
?>
<html>
<head>
    <title>Machine Tracking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="style5.css">

    <style>
        .input-group-addon {
        min-width:150px;
        text-align:left;
    }
    </style>
</head>
<body>
                     <div class="wrapper">
         <?php include "navbar.php" ;?>
    <div class="container-fluid row" id="container">
    <div class="page-header">
    <h1>MACHINE REPAIRED</h1>
    </div>
    <div id="error" style="color: red; margin-left: 90px; margin-bottom: 20px;">
        </div>
    <?php
    if ( isset($_SESSION['error']) )
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    if ( isset($_SESSION['success']))
        {
            echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
                unset($_SESSION['success']);
        }

         $checkinactive=$pdo ->query("SELECT count(*) from machine where state='INACTIVE'");
        $rowcheck=$checkinactive->fetch(PDO::FETCH_ASSOC);
        if($rowcheck['count(*)']==0)
        {
            $_SESSION['error']="None of the machines are sent for repairing";
            header('Location: home.php');
            return;
        }
    ?>

    <form method="POST" class="col-xs-5">

    <div class="input-group">
    <span class="input-group-addon">Hardware ID</span>    
    <input type="text" disabled="" required="" value="<?= $_GET['hid'] ?>" class="form-control">
    </div><br/>
    <input type="text" name='hid' hidden required="" value="<?= $_GET['hid'] ?>">

    <div class="input-group">
    <span class="input-group-addon">DATE </span>
    <input type="date" name="date"  required="" class="form-control" required> </div><br/>

    <div class="input-group">
    <span class="input-group-addon">Fault </span>
    <input type="text" name="fault" required="" class="form-control"> </div><br/>

    <div class="input-group">
    <span class="input-group-addon">COST OF REPAIR </span>
    <input type="text" name="cost" required="" class="form-control" id="cost" onchange="Number('cost')"> </div><br/>

    <input type="submit" value="Place Machine" class="btn btn-info">
        <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    </form>

    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript"src="script.js"></script>
</body>
</html>