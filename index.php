<?php
    session_start();
    require_once "pdo.php";

    $pass="alphanumeric";

    if(isset($_POST['cancel']))
    {
        header("Location: index.php");
        return;
    }

    if(isset($_POST['pass']))
    {
        unset($_SESSION['id']);
        if ( strlen($_POST['pass']) < 1 )
        {
            $_SESSION['error'] = "Password is required to Log In";
            header('Location: login.php');
            return;
        }
        else
        {
            if($_POST['pass']===$pass)
            {
                $_SESSION['id']=1;
                header("Location: home.php");
            }
            else
            {
                $_SESSION['error']="Invalid Password";
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
    <h1>Machine Tracking</h1>
    </div>
    <?php
    if ( isset($_SESSION['error']) )
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    ?>
    <div class="row">
        <p class ="col-xs-12"style="font-size:22px">Please Log In</p>
            <form method="POST" action="index.php">
            <div class="col-xs-4">
            <div class="input-group">
            <span class="input-group-addon">Password</span>
            <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password">
            </div>
            <br>
        </div>
        <div class="col-xs-3">
            <input type="submit" value="Log In" class="btn btn-info">
        </div>
            </form>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>