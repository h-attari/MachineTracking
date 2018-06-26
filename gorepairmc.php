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
    if(isset($_POST['mac_addr']) )
    {
        if ( strlen($_POST['mac_addr']) < 1 )
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: gorepairmc.php');
            return;
        }
        else
        {
            $_POST['date']=date('y-m-d',strtotime($_POST['date']));
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

                $stmt = $pdo->prepare('UPDATE complaint_book SET work_for = :wf WHERE machine_id = :mid AND work_for IS NULL');
                $stmt->execute(array(':mid' => $mid, ':wf' => $_POST['work_for']));

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
    <h1>REPAIR MACHINE</h1>
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

    <form method="POST" action="gorepairmc.php" class="col-xs-5">

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS </span>    
    <input type="text" name="mac_addr" required="" value="<?= $mac_addr ?>" class="form-control">
    </div><br/>

    <div class="input-group">
    <span class="input-group-addon">DATE</span>
    <input type="date" name="date" required="" class="form-control" required> </div><br/>


    <div class="input-group">
    <span class="input-group-addon">Work For</span>
    <select name=work_for class="form-control" required="">
        <?php
            $qr=$pdo->query("SELECT * from member WHERE member_id <> 0");
            while($row=$qr->fetch(PDO::FETCH_ASSOC))
            {
                echo '<option value = '.$row['member_id'].'>';
                echo ($row['first_name'] . " " . $row['last_name']);
                echo '</option>';
            }
         ?>
    </select>
    </div><br/>
    <input type="submit" value="Repair Machine" class="btn btn-info">
    <div class="col-xs-3 col-xs-offset-1">
          <a class ="link-no-format" href="home.php"><div class="btn btn-danger">Cancel</div></a>
      </div>
    </form>

    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript"src="script.js"></script>
</body>
</html>