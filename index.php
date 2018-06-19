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

    <div class="wrapper" id="add-nav">
    <?php include "navbar.php" ;?>
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
    </script>
</body>
</html>