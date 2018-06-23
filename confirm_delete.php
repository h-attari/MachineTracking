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
    
    if (isset($_POST['id']))
    {
        $id = $_POST['id'];
    }

    if ( isset($_POST['delete']) && isset($_POST['id']) )
    {
        $sql = "DELETE FROM member WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(':id' => $_POST['id']));
        $_SESSION['success'] = 'Record deleted';
        header( 'Location: home.php' ) ;
        return;
    }
    $stmtread = $pdo->prepare("SELECT * FROM member where id = :id");
    $stmtread->execute(array(":id" => $_POST['id']));
    $row = $stmtread->fetch(PDO::FETCH_ASSOC);
    if ( $row === false )
    {
        $_SESSION['error'] = 'No Member Found';
        header( 'Location: delete_member.php' ) ;
        return;
    }
    $first_name = htmlentities($row['first_name']);
    $last_name = htmlentities($row['last_name']);
    $email = htmlentities($row['email']);
    $id = $row['id'];
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
    <h1>Confirm Remove</h1>
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

    <form method="post" action="confirm_delete.php">
    <p>First Name:
    <?= $first_name ?></p>
    <p>Last Name:
    <?= $last_name ?></p>
    <p>Email:
    <?= $email ?></p>
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