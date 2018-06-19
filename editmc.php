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
        if ( strlen($_POST['mac_addr']) < 1 )
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: upgrademc.php');
            return;
        }
        else
        {
            $stmtread = $pdo->prepare("SELECT * FROM machine where MAC_ADDR = :xyz");
            $stmtread->execute(array(":xyz" => $_POST['mac_addr']));
            $row = $stmtread->fetch(PDO::FETCH_ASSOC);
            if ( $row === false )
            {
                $_SESSION['error'] = 'Could not load machine details';
                header( 'Location: upgrademc.php' ) ;
                return;
            }
            $mac_addr = htmlentities($row['MAC_ADDR']);
            $processor = htmlentities($row['processor']);
            $ram = htmlentities($row['ram']);
            $memory = htmlentities($row['memory']);
            $price = htmlentities($row['price']);
            $dop = htmlentities($row['DOP']);
        }
    }

    if(isset($_POST['macaddr']))
    {
        if ( strlen($_POST['macaddr']) < 1 || strlen($_POST['processor']) < 1 || strlen($_POST['ram']) < 1 || strlen($_POST['memory']) < 1 || strlen($_POST['price']) < 1 || strlen($_POST['dop']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: upgrademc.php');
            return;
        }
        else
        {
            $stmt = $pdo->prepare('UPDATE machine SET
            processor = :p, ram = :ram, memory = :mem, DOP = :dop, price = :price
            WHERE MAC_ADDR = :ma');
            $stmt->execute(array(
            ':p' => $_POST['processor'],
            ':ram' => $_POST['ram'],
            ':mem' => $_POST['memory'],
            ':dop' => $_POST['dop'],
            'price' => $_POST['price'],
            ':ma' => $_POST['macaddr'])
            );

            $_SESSION['success']="Machine upgraded Sucessfully";
            header("Location: home.php");
            return;
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
    <button type="button" id="sidebarCollapse" class="navbar-btn">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <div class="container" id="content">
    <div class="page-header">
    <h1>UPGRADE MACHINE</h1>
    </div>
    <?php
    if ( isset($_SESSION['error']) )
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action="editmc.php">

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS </span>
    <input type="text" name="macaddr" value="<?= $mac_addr ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Processor </span>
    <input type="text" name="processor" value="<?= $processor ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">RAM </span>
    <input type="text" name="ram" value="<?= $ram ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Storage </span>
    <input type="text" name="memory" value="<?= $memory ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Price of Purchase </span>
    <input type="text" name="price" value="<?= $price ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Date of Purchase (yyyy-mm-dd)</span>
    <input type="text" name="dop" value="<?= $dop ?>" class="form-control"> </div><br/>


    <input type="submit" value="Upgrade Machine" class="btn btn-info">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-info">
    </form>

    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript"src="script.js"></script>
</body>
</html>