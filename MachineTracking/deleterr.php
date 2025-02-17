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
    
    if (!isset($_GET['cb_id']))
    {
        die('ACCESS DENIED');   
    }

    if ( isset($_POST['delete']) )
    {
        $sql = "DELETE FROM complaint_book WHERE complaint_book_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => $_GET['cb_id']));
        $_SESSION['success'] = 'Complaint deleted';
        header( 'Location: home.php' ) ;
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
    <?php include "navbar.php" ;?>
      <div class="container-fluid row" id="content">
        <div class="page-header">
    <h1>CONFIRM DELETE</h1>
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

    <form method="post" action=<?= 'deleterr.php?cb_id=' . $_GET['cb_id'] ?> class="col-xs-5">
    <p>Are you sure ?</p>
    <input type="hidden" name="id"
    value="<?= $id?>"
    />
    <input type="submit" name="delete" value="Delete" class="btn btn-info">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-info">
    <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
    </p>
    </form>

    </div>
    </div>
    <script type="text/javascript" src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>