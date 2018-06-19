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
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Machine Tracking</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Menu</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Lab</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="addlab.php">Add Lab</a></li>
                            <li><a href="viewlab.php">View Lab</a></li>
                            <li><a href="deletelab.php">Delete Lab</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#machinemenu" data-toggle="collapse" aria-expanded="false">Machine</a>
                        <ul class="collapse list-unstyled" id="machinemenu">
                            <li><a href="addmc.php">Add Machine</a></li>
                            <li><a href="deletemc.php">Delete Machine</a></li>
                            <li><a href="upgrademc.php">Upgrade Machine</a></li>
                            <li><a href="viewmc.php">View Machine</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="#repairmenu" data-toggle="collapse" aria-expanded="false">Repair</a>
                        <ul class="collapse list-unstyled" id="repairmenu">
                            <li><a href="gorepairmc.php">Going for Repairing</a></li>
                            <li><a href="fromrepairmc.php">Return from Repiar</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="viewmchistory.php">Computer History</a>
                    </li>

                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </nav>
    <div class="container" id="content">
    <div class="page-header">
    <button type="button" id="sidebarCollapse" class="navbar-btn">
        <span></span>
        <span></span>
        <span></span>
    </button>
           <div class="container" id="content">
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
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>