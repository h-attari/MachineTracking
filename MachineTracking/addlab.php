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

    if(isset($_POST['lab_name']) )
    {
        if ( strlen($_POST['lab_name']) < 1 || strlen($_POST['department']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: addlab.php');
            return;
        }
        else
        {
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM lab WHERE name = :name');
            $stmt->execute(array(':name' => $_POST['lab_name']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['COUNT(*)'] !== '0')
            {
                $_SESSION['error'] = "This Lab already exists";
                header('Location: addlab.php');
                return;
            }
            else
            {
                $stmt = $pdo->prepare('INSERT INTO lab (name, department) VALUES (:name, :dept)');
                    $stmt->execute(array(':name' => $_POST['lab_name'], ':dept' => $_POST['department']));
                $_SESSION['success'] = "Lab Added Successfully";
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
    <?php include "navbar.php" ;?>
      <div class="container-fluid row" id="content">
        <div class="page-header">
        <h1>ADD LAB</h1>
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
        <div class="col-xs-5">
        <form method="POST" action="addlab.php">

        <div class="input-group">
        <span class="input-group-addon">Lab Name </span>
        <input type="text" name="lab_name" required class="form-control"> </div><br/>

        <div class="input-group">
        <span class="input-group-addon">Department </span>
        <input type="text" name="department" required class="form-control"> </div><br/>

        <input type="submit" value="Add Lab" class="btn btn-info">
        <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
        </form>

    </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>