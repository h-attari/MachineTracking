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

    if(isset($_POST['device_name']) )
    {
        if ( strlen($_POST['device_name']) < 1 || strlen($_POST['company']) < 1 || strlen($_POST['description']) < 1 || strlen($_POST['price']) < 1 || strlen($_POST['grn']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: adddevice.php');
            return;
        }
        else
        {
            $stmt = $pdo->prepare('INSERT INTO hardware (company, description, price, grn, name, state) VALUES (:company, :description, :price, :grn, :name, 0)');
            $stmt->execute(array(':company' => $_POST['company'], ':description' => $_POST['description'], ':price' => $_POST['price'], ':grn' => $_POST['grn'], ':name' => $_POST['device_name']));
            $_SESSION['success'] = "Device Added Successfully";
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
    <?php include "navbar.php" ;?>
      <div class="container-fluid row" id="content">
        <div class="page-header">
        <h1>ADD DEVICE</h1>
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
        <form method="POST" action="adddevice.php">

        <!--<div class="input-group">
        <span class="input-group-addon">Device Name </span>
        <input type="text" name="device_name" required class="form-control"> </div><br/>-->

        <div class="input-group">
        <span class="input-group-addon">Device Name </span>
        <select name=device_name id="device-drop" class="form-control" onchange="Device();" required="">
        <?php
            
            $qr=$pdo->query("SELECT DISTINCT name from hardware");
            while($rowx=$qr->fetch(PDO::FETCH_ASSOC))
            {
                echo '<option>';
                echo ($rowx['name']);
                echo '</option>';
            }
         ?>
        <option>Other</option>
        </select>
        </div><br/>
        <div class="input-group">
            <span class="input-group-addon">New Device Name </span>
            <input type="text" class="form-control" disabled name="device_name" id="other-device" placeholder="Enter New Device Name">
        </div><br>
        <div class="input-group">
        <span class="input-group-addon">Company </span>
        <input type="text" name="company" required class="form-control"> </div><br/>

        <div class="input-group">
        <span class="input-group-addon">Description </span>
        <input type="text" name="description" required class="form-control"> </div><br/>

        <div class="input-group">
        <span class="input-group-addon">Price </span>
        <input type="text" name="price" required class="form-control"> </div><br/>

        <div class="input-group">
        <span class="input-group-addon">GR No. </span>
        <input type="text" name="grn" required class="form-control"> </div><br/>

        <input type="submit" value="Add Device" class="btn btn-info">
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