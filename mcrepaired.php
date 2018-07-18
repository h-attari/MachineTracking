<?php
    session_start();
    require_once "pdo.php";
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
    if( $_SESSION['id'] == '0' )
    {
        die('ACCESS DENIED');
    }
    if(isset($_POST['cancel']))
    {
        header("Location: index.php");
        return;
    }

    if(isset($_GET['mc_id']))
    {
        $mc_id = $_GET['mc_id'];
    }
    elseif (isset($_POST['mc_id']))
    {
        $mc_id = $_POST['mc_id'];
    }


    if(isset($_POST['remarks']) )
    {
        if ( strlen($_POST['remarks']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: mcrepaired.php');
            return;
        }
        else
        {
                $stmtc = $pdo->prepare('SELECT * FROM temp WHERE machine_id = :mid');
                $stmtc->execute(array(':mid' => $mc_id));
                $c = $stmtc->fetch(PDO::FETCH_ASSOC);

                if($c != false)
                {
                    $stmtreadu = $pdo->prepare("SELECT * FROM machine where machine_id = :xyz");
                    $stmtreadu->execute(array(":xyz" => $mc_id));
                    $row = $stmtreadu->fetch(PDO::FETCH_ASSOC);

                    //$_SESSION['success']=$row['processor'];

                    if(!is_null($c['processor']))
                    {
                        $stmtu = $pdo->prepare('UPDATE hardware SET state = -1 where hardware_id = :hid');
                        $stmtu->execute(array(':hid' => $row['processor']));

                        $stmt = $pdo->prepare('UPDATE machine SET processor = :p WHERE machine_id = :ma');
                        $stmt->execute(array( ':p' => $c['processor'], ':ma' => $mc_id));
                    }

                    if(!is_null($c['ram']))
                    {
                        $stmtu = $pdo->prepare('UPDATE hardware SET state = -1 where hardware_id = :hid');
                        $stmtu->execute(array(':hid' => $row['ram']));
                        
                        $stmt = $pdo->prepare('UPDATE machine SET ram = :p WHERE machine_id = :ma');
                        $stmt->execute(array( ':p' => $c['ram'], ':ma' => $mc_id));
                    }

                    if(!is_null($c['harddisk']))
                    {
                        $stmtu = $pdo->prepare('UPDATE hardware SET state = -1 where hardware_id = :hid');
                        $stmtu->execute(array(':hid' => $row['memory']));

                        $stmt = $pdo->prepare('UPDATE machine SET memory = :p WHERE machine_id = :ma');
                        $stmt->execute(array( ':p' => $c['harddisk'], ':ma' => $mc_id));
                    }

                    if(!is_null($c['keyboard']))
                    {
                        $stmtu = $pdo->prepare('UPDATE hardware SET state = -1 where hardware_id = :hid');
                        $stmtu->execute(array(':hid' => $row['keyboard']));

                        $stmt = $pdo->prepare('UPDATE machine SET keyboard = :p WHERE machine_id = :ma');
                        $stmt->execute(array( ':p' => $c['keyboard'], ':ma' => $mc_id));
                    }

                    if(!is_null($c['mouse']))
                    {
                        $stmtu = $pdo->prepare('UPDATE hardware SET state = -1 where hardware_id = :hid');
                        $stmtu->execute(array(':hid' => $row['mouse']));

                        $stmt = $pdo->prepare('UPDATE machine SET mouse = :p WHERE machine_id = :ma');
                        $stmt->execute(array( ':p' => $c['mouse'], ':ma' => $mc_id));
                    }

                    if(!is_null($c['monitor']))
                    {
                        $stmtu = $pdo->prepare('UPDATE hardware SET state = -1 where hardware_id = :hid');
                        $stmtu->execute(array(':hid' => $row['monitor']));

                        $stmt = $pdo->prepare('UPDATE machine SET monitor = :p WHERE machine_id = :ma');
                        $stmt->execute(array( ':p' => $c['monitor'], ':ma' => $mc_id));
                    }

                    /*$stmtug = $pdo->prepare('INSERT INTO upgrade_history (machine_id, processori, rami, memoryi, processorf, ramf, memoryf, dateofupgrade) VALUES (:mid, :pi, :ri, :mi, :pf, :rf, :mf, :d)');
                    $stmtug->execute(array(
                        ':mid' => $mc_id,
                     ':pi' => $row['processor'], 
                     ':ri' => $row['ram'], 
                     ':mi' => $row['memory'],
                     ':pf' => $c['processor'],
                        ':rf' => $c['ram'],
                        ':mf' => $c['memory'],
                        ':d' => date('y-m-d')
                        ));*/

                    $stmtug = $pdo->prepare('INSERT INTO upgrade_history (machine_id, processori, rami, memoryi, dateofupgrade) VALUES (:mid, :pi, :ri, :mi, :d)');
                    $stmtug->execute(array(
                        ':mid' => $mc_id,
                     ':pi' => $row['processor'], 
                     ':ri' => $row['ram'], 
                     ':mi' => $row['memory'],
                       ':d' => date('y-m-d')
                        ));

                    $last_id = $pdo->lastInsertId();

                    if(!is_null($c['processor']))
                    {
                        $stmtu = $pdo->prepare('UPDATE upgrade_history SET processorf = :pf where upgrade_history_id = :uhid');
                        $stmtu->execute(array(':pf' => $c['processor'], ':uhid' => $last_id));
                    }
                    else
                    {
                        $stmtu = $pdo->prepare('UPDATE upgrade_history SET processorf = :pf where upgrade_history_id = :uhid');
                        $stmtu->execute(array(':pf' => $row['processor'], ':uhid' => $last_id));

                    }

                    if(!is_null($c['ram']))
                    {
                        $stmtu = $pdo->prepare('UPDATE upgrade_history SET ramf = :rf where upgrade_history_id = :uhid');
                        $stmtu->execute(array(':rf' => $c['ram'], ':uhid' => $last_id));
                    }
                    else
                    {
                        $stmtu = $pdo->prepare('UPDATE upgrade_history SET ramf = :rf where upgrade_history_id = :uhid');
                        $stmtu->execute(array(':rf' => $row['ram'], ':uhid' => $last_id));

                    }

                    if(!is_null($c['harddisk']))
                    {
                        $stmtu = $pdo->prepare('UPDATE upgrade_history SET memoryf = :mf where upgrade_history_id = :uhid');
                        $stmtu->execute(array(':mf' => $c['harddisk'], ':uhid' => $last_id));
                    }
                    else
                    {
                        $stmtu = $pdo->prepare('UPDATE upgrade_history SET memoryf = :mf where upgrade_history_id = :uhid');
                        $stmtu->execute(array(':mf' => $row['memory'], ':uhid' => $last_id));

                    }

                    $stmtdelete = $pdo->prepare("DELETE FROM temp where machine_id = :xyz");
                    $stmtdelete->execute(array(":xyz" => $mc_id));


                }
                
                $stmt = $pdo->prepare('UPDATE complaint_book SET remarks = :rem, completed = 1 WHERE machine_id = :mid AND remarks IS NULL');
                $stmt->execute(array(':rem' => $_POST['remarks'], ':mid' => $mc_id));

                $_SESSION['success'] = "Machine Repaired";
                    header('Location: home.php');
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
                <?php if (isset($_SESSION['id'])&&$_SESSION['id']=='0') include "navbar.php"; else include "navbar_index.php" ;?>

    <div class="container" id="content">
    <div class="page-header">
    <h1>MACHINE FIXED</h1>
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

    <form method="POST" action="mcrepaired.php" class="col-xs-5">

    <div class="input-group">
    <span class="input-group-addon">Remarks</span>
    <input type="text" name="remarks" required class="form-control"> </div><br/>
    
    <input type="submit" value="Done" class="btn btn-info">
    <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    <input type="hidden" name="mc_id" value="<?= $_GET['mc_id'] ?>">
    
    </form>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>