<?php
    session_start();
    require_once "pdo.php";
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
    if(isset($_POST['cancel']))
    {
        header("Location: index.php");
        return;
    }

    if(isset($_POST['name']) )
    {
        if ( strlen($_POST['name']) < 1 || strlen($_POST['department']) < 1 || strlen($_POST['purpose']) < 1|| strlen($_POST['quantity']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: request_form.php');
            return;
        }
        else
        {
                 
                
                $date=date('y-m-d');
                $stmt = $pdo->prepare('INSERT INTO transfer_request(date_of_request, name, department, purpose, processor, ram, hdd, os, quantity) VALUES (:dat, :name, :department, :purpose, :processor, :ram, :hdd, :os, :quantity)');
                    $stmt->execute(array(':dat' => date('y-m-d'), ':name' => $_POST['name'], ':department' => $_POST['department'], ':purpose' => $_POST['purpose'], ':processor' => $_POST['processor'], ':ram' => $_POST['ram'], ':hdd' => $_POST['hdd'], ':os' => $_POST['os'], ':quantity' => $_POST['quantity']));
                $_SESSION['success'] = "Request Sent Successfully";
                    header('Location: index.php');
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

    <div class="container" id="content">
    <div class="page-header">
    <h1>Register Complaint</h1>
    </div>
    <?php
    if ( isset($_SESSION['error']) )
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action="request_form.php">

    <div class="input-group">
    <span class="input-group-addon">Name </span>
    <input type="text" name="name" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Department </span>
    <input type="text" name="department" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Purpose</span>
    <input type="text" name="purpose" class="form-control"> </div><br/>
    <p>Required Specifications</p>
    <div class="input-group">
    <span class="input-group-addon">Processor </span>
    <input type="text" name="processor" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">RAM </span>
    <input type="text" name="ram" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">HDD</span>
    <input type="text" name="HDD" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">OS </span>
    <input type="text" name="os" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Quantity</span>
    <input type="text" name="quantity" class="form-control"> </div><br/>
    
    

    <input type="submit" value="Register Transfer Request" class="btn btn-info">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-info">
    </form>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>