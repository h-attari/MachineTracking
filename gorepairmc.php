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
        if ( strlen($_POST['mac_addr']) < 1 || strlen($_POST['date']) < 1 )
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: gorepairmc.php');
            return;
        }
        else
        {
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM machine WHERE MAC_ADDR = :mac_addr');
            $stmt->execute(array(':mac_addr' => $_POST['mac_addr']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['COUNT(*)'] !== '0')
            {
                $stmt = $pdo->prepare('SELECT * FROM machine WHERE MAC_ADDR = :mac_addr');
                $stmt->execute(array(':mac_addr' => $_POST['mac_addr']));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $mid = $row['machine_id'];

                $stmt = $pdo->prepare('SELECT COUNT(*) FROM repair_history WHERE machine_id = :mid AND final_date = "0000-00-00"');
                $stmt->execute(array(':mid' => $mid));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['COUNT(*)'] !== '0')
                {
                    $_SESSION['error'] = "Machine already in Repair";
                    header('Location: gorepairmc.php');
                    return;
                }


                 $stmt = $pdo->prepare('UPDATE machine SET state = "INACTIVE" WHERE machine_id = :mid');
                    $stmt->execute(array(':mid' => $mid));

                $stmt = $pdo->prepare('UPDATE position SET final_date = :fdate WHERE machine_id = :mid AND final_date = "0000-00-00"');
                    $stmt->execute(array(':mid' => $mid, ':fdate' => $_POST['date']));

                $stmt = $pdo->prepare('INSERT INTO repair_history (machine_id, initial_date, final_date) VALUES (:mid, :idate, "0000-00-00")');
                    $stmt->execute(array(':mid' => $mid, ':idate' => $_POST['date']));

                $_SESSION['success'] = "Machine sent to Repair Successfully";
                header('Location: home.php');
                return;
            }
            else
            {
                $_SESSION['error'] = "Machine does not Exists";
                    header('Location: gorepairmc.php');
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

    <style>
        .input-group-addon {
        min-width:150px;
        text-align:left;
    }
    </style>
</head>
<body>
    <div class="container">
    <div class="page-header">
    <h1>REPAIR MACHINE</h1>
    </div>
    <?php
    if ( isset($_SESSION['error']) )
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action="gorepairmc.php">

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS </span>
    <input type="text" name="mac_addr" class="form-control"> </div><br/>

    <div class="input-group">
    <span class="input-group-addon">DATE (yyyy-mm-dd) </span>
    <input type="text" name="date" class="form-control"> </div><br/>

    <input type="submit" value="Repair Machine" class="btn btn-info">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-info">
    </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>