<?php
    session_start();
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
?>
<html>
<head>
    <title>Machine Tracking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="style5.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>
<body>
        <div class="wrapper">
     <?php include "navbar.php" ;?>
           <div class="container-fluid row" id="content">

        <div class="page-header">
        <h1>MACHINE TRACKING</h1>
        </div>

        <?php
            if ( isset($_SESSION['success']))
            {
                echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
                unset($_SESSION['success']);
            }
            if ( isset($_SESSION['error']))
            {
                echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
                unset($_SESSION['error']);
            }
        ?>

        <p>
            <a href="addlab.php" class="btn btn-info ">Add Lab</a>

            <a href="deletelab.php" class="btn btn-info ">Delete Lab</a>

            <a href="viewlab.php" class="btn btn-info ">View Labs</a>
        </p>
        <br>
        <p>
            <a href="addmc.php" class="btn btn-info">Add Machine</a>

            <a href="deletemc.php" class="btn btn-info">Delete Machine</a>

            <a href="upgrademc.php" class="btn btn-info">Upgrade Machine</a>

            <a href="viewmc.php" class="btn btn-info">View Machines</a>
        </p>
        <br>
        <p>
            <a href="posmc.php" class="btn btn-info">Position Machine</a>
        </p>
        <br>
        <p>
            <a href="gorepairmc.php" class="btn btn-info">Machine going for Repair</a>

            <a href="fromrepairmc.php" class="btn btn-info">Machine comming from Repair</a>
        </p>
        <br>
        <p>
            <a href="viewmchistory.php" class="btn btn-info">View Computer History</a>
        </p>
        </div>
        <div>
             <p>
            <a href="complaint_form.php" class="btn btn-info">Register Complaint</a>
        </p>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>