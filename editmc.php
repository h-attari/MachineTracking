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
            $os = htmlentities($row['os']);
        }
    }

    if(isset($_POST['macaddr']))
    {
        if ( strlen($_POST['macaddr']) < 1 || strlen($_POST['processor']) < 1 || strlen($_POST['ram']) < 1 || strlen($_POST['memory']) < 1 || strlen($_POST['price']) < 1 || strlen($_POST['dop']) < 1 || strlen($_POST['os']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: upgrademc.php');
            return;
        }
        else
        {
            $stmt = $pdo->prepare('UPDATE machine SET
            processor = :p, ram = :ram, memory = :mem, DOP = :dop, price = :price, os = :os
            WHERE MAC_ADDR = :ma');
            $stmt->execute(array(
            ':p' => $_POST['processor'],
            ':ram' => $_POST['ram'],
            ':mem' => $_POST['memory'],
            ':dop' => date('y-m-d',strtotime($_POST['dop'])),
            'price' => $_POST['price'],
            ':ma' => $_POST['macaddr'],
            ':os' => $_POST['os'])
            );

            $_SESSION['success']="Machine Upgraded Sucessfully";
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
        <?php include "navbar.php" ;?>
    <div class="container-fluid row" id="content">

    <div class="page-header">
    <h1>UPGRADE MACHINE</h1>
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
    ?>

    <form method="POST" action="editmc.php" class="col-xs-5">

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS </span>
    <input type="text" name="macaddr" required="" value="<?= $mac_addr ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Processor </span>
    <input type="text" name="processor" required="" value="<?= $processor ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">RAM </span>
    <input type="text" name="ram" required="" value="<?= $ram ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Storage </span>
    <input type="text" name="memory" required="" value="<?= $memory ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">OS </span>
    <input type="text" name="os" required="" value="<?= $os ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Price of Purchase </span>
    <input type="text" name="price" required="" value="<?= $price ?>" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Date of Purchase</span>
    <input type="date" name="dop" required="" value="<?= $dop ?>" class="form-control"> </div><br/>


    <input type="submit" value="Upgrade Machine" class="btn btn-info">
    <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    </form>

    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript"src="script.js"></script>
</body>
</html>