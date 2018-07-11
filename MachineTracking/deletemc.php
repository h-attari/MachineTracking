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
            header('Location: deletemc.php');
            return;
        }
        else
        {
            $flag=0;
            for($i=$_POST['mac_addr'];$i<=$_POST['mac_addr2'];$i++)
            {
                $stmt = $pdo->prepare('SELECT COUNT(*) FROM machine WHERE MAC_ADDR = :mac_addr');
                $stmt->execute(array(':mac_addr' => $i));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['COUNT(*)'] !== '0')
                {
                     $stmt = $pdo->prepare('DELETE FROM machine WHERE mac_addr = :mac_addr');
                        $stmt->execute(array(':mac_addr' => $i));
                    $_SESSION['success'].="Machine".$i." deleted Successfully\n";
                }
                else
                {
                    $_SESSION['error'] .= "Machine".$i." does not Exists\n";
                    $flag++;
                }
            }
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
            <!-- Sidebar Holder -->
       <?php include "navbar.php" ;?>
   <div class="container-fluid row" id="content">

    <div class="page-header">
    <h1>DELETE MACHINE in range</h1>
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

    <form method="POST" action="deletemc.php" class="col-xs-5">

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS (from)</span>
    <input type="text" name="mac_addr" class="form-control" required="" placeholder="Starting machine id"> </div><br/>

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS (to)</span>
    <input type="text" name="mac_addr2" class="form-control" placeholder="Ending machine id"> </div><br/>


    <input type="submit" value="Delete Machine" class="btn btn-info">
    <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
