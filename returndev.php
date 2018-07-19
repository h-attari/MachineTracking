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
        header("Location: viewdev.php");
        return;
    }
    if(isset($_POST['submit']) )
    {
        
                $stmt = $pdo->prepare('SELECT COUNT(*) FROM hardware WHERE hardware_id = :hid');
                $stmt->execute(array(':hid' => $_POST['dev_id']));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['COUNT(*)'] !== '0')
                {
                     $stmt = $pdo->prepare('UPDATE hardware SET state=0 WHERE hardware_id = :hid');
                        $stmt->execute(array(':hid' => $_POST['dev_id']));
                    $_SESSION['success'] ="Device Returned Successfully\n";
                }
                else
                {
                    $_SESSION['error'] = "Device does not Exists\n";
                }
            
            header('Location: viewdev.php');
            return;
        
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
    <h1>Are You Sure?</h1>
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
    <?php
        $stmt=$pdo->prepare("SELECT * FROM hardware_position WHERE hardware_id = :hid AND final_date = '0000-00-00' OR final_date = '1970-01-01'");
        $stmt->execute(array(":hid"=>$_GET['dev_id']));
        $member=$stmt->fetch(PDO::FETCH_ASSOC);
        $member=$member['member_id'];
        $stmt=$pdo->prepare("SELECT first_name,last_name FROM member WHERE id =:id");
        $stmt->execute(array(":id"=>$member));
        $name=$stmt->fetch(PDO::FETCH_ASSOC);
        $name=$name['first_name'].' '.$name['last_name'];
    ?>
    <form method="POST" class="col-xs-5">
    <input type="hidden" name="dev_id" value="<?= $_GET['dev_id'] ?>" class="btn btn-info">
    <input type="text" disabled="" value = "<?= $name ?>" class="form-control">
    <input type="submit" name="submit" value="submit" class="btn btn-info">
    <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
