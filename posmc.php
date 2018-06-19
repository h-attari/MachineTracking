<?php
    session_start();
    require_once "pdo.php";
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
    if(isset($_POST['cancel']))
    {
        header("Location: home.php");
        return;
    }

    if(isset($_POST['mac_addr']) )
    {
        if ( strlen($_POST['mac_addr']) < 1 || strlen($_POST['lab']) < 1 || strlen($_POST['from']) < 1 )
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: posmc.php');
            return;
        }
        else
        {
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM machine WHERE MAC_ADDR = :mac_addr');
            $stmt->execute(array(':mac_addr' => $_POST['mac_addr']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['COUNT(*)'] === '0')
            {
                $_SESSION['error'] = "This Machine does not exist";
                header('Location: posmc.php');
                return;
            }

            $stmt = $pdo->prepare('SELECT COUNT(*) FROM lab WHERE name = :lab');
            $stmt->execute(array(':lab' => $_POST['lab']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['COUNT(*)'] === '0')
            {
                $_SESSION['error'] = "This Lab does not exist";
                header('Location: posmc.php');
                return;
            }

            else
            {
                $stmt = $pdo->prepare('SELECT * FROM machine WHERE MAC_ADDR = :mac_addr');
                $stmt->execute(array(':mac_addr' => $_POST['mac_addr']));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $mid = $row['machine_id'];

                $stmt = $pdo->prepare('SELECT * FROM lab WHERE name = :lab');
                $stmt->execute(array(':lab' => $_POST['lab']));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $lid = $row['lab_id'];


                $stmt = $pdo->prepare('INSERT INTO position (machine_id, lab_id, initial_date, final_date) VALUES (:mid, :lid, :idate, :fdate)');
                    $stmt->execute(array(':mid' => $mid, ':lid' => $lid, ':idate' => $_POST['from'], ':fdate' => $_POST['to']));
                $_SESSION['success'] = "Machine Positioned Successfully";
                    header('Location: home.php');
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
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Machine Tracking</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Menu</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Lab</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="addlab.php">Add Lab</a></li>
                            <li><a href="viewlab.php">View Lab</a></li>
                            <li><a href="deletelab.php">Delete Lab</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#machinemenu" data-toggle="collapse" aria-expanded="false">Machine</a>
                        <ul class="collapse list-unstyled" id="machinemenu">
                            <li><a href="addmc.php">Add Machine</a></li>
                            <li><a href="deletemc.php">Delete Machine</a></li>
                            <li><a href="upgrademc.php">Upgrade Machine</a></li>
                            <li><a href="viewmc.php">View Machine</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#repairmenu" data-toggle="collapse" aria-expanded="false">Repair</a>
                        <ul class="collapse list-unstyled" id="repairmenu">
                            <li><a href="gorepairmc.php">Going for Repairing</a></li>
                            <li><a href="fromrepairmc.php">Return from Repiar</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="viewmchistory.php">Computer History</a>
                    </li>

                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </nav>
    <div class="container" id="content">
    <div class="page-header">
    <h1>POSITION MACHINE</h1>
    </div>
    <?php
    if ( isset($_SESSION['error']) )
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action="posmc.php">

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS </span>
    <input type="text" name="mac_addr" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">LAB NAME </span>
    <input type="text" name="lab" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">FROM (yyyy-mm-dd) </span>
    <input type="text" name="from" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">TO (yyyy-mm-dd) (optional)</span>
    <input type="text" name="to" class="form-control"> </div><br/>


    <input type="submit" value="Position Machine" class="btn btn-info">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-info">
    </form>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>