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

    if(isset($_POST['spec']) )
    {
        if ( strlen($_POST['spec']) < 1 )
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: deletespec.php');
            return;
        }
        else
        {    $stmtt = $pdo->prepare('SELECT name_id FROM name WHERE name = :name');
                $stmtt->execute(array(':name' => $_POST['hardware']));
                $hardware = $stmtt->fetch(PDO::FETCH_ASSOC);

            $stmt = $pdo->prepare('SELECT COUNT(*) FROM specification WHERE spec = :spec AND name_id=:hardware');
            $stmt->execute(array(':spec' => $_POST['spec'],':hardware' => $hardware['name_id']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['COUNT(*)'] !== '0')
            {
                 $stmt = $pdo->prepare('DELETE FROM specification WHERE spec = :spec AND name_id= :hardware');
                    $stmt->execute(array(':spec' => $_POST['spec'],':hardware' => $hardware['name_id']));
                $_SESSION['success'] = "The specification was Deleted Successfully";
                header('Location: home.php');
                return;
            }
            else
            {
                $_SESSION['error'] = "Specification does not Exists";
                    header('Location: deletespec.php');
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
                <?php include "navbar.php" ;?>
    <div class="container-fluid row" id="content">
    <div class="page-header">
    <h1>DELETE LAB</h1>
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

    <form method="POST" action="deletespec.php" class="col-xs-5">

        <div class="input-group">
        <span class="input-group-addon">Hardware Type</span>
       
        <select id="drop-other" name="hardware" class="form-control" onchange="Device();" required="">
        <?php
            
            $qr=$pdo->query("SELECT * FROM name WHERE name_id<7");
            while($rowx=$qr->fetch(PDO::FETCH_ASSOC))
            {
                echo '<option>';
                echo ($rowx['name']);
                echo '</option>';
            }
         ?>
    
    </select>
    </div><br>

    <div class="input-group">
    <span class="input-group-addon">Specification </span>
    <input type="text" name="spec" required="" class="form-control"> </div><br/>



    <input type="submit" value="Delete Specification" class="btn btn-info">
    <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript"src="script.js"></script>
</body>
</html>