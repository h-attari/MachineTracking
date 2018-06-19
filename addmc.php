<?php
    session_start();
    require_once "pdo.php";
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
    if(isset($_POST['cancel']))
    {
        header("Location: home.php");
        return;
    }

    if(isset($_POST['mac_addr']) )
    {
        if ( strlen($_POST['mac_addr']) < 1 || strlen($_POST['processor']) < 1 || strlen($_POST['ram']) < 1 || strlen($_POST['memory']) < 1 || strlen($_POST['price']) < 1 || strlen($_POST['dop']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: addmc.php');
            return;
        }
        else
        {
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM machine WHERE MAC_ADDR = :mac_addr');
            $stmt->execute(array(':mac_addr' => $_POST['mac_addr']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row['COUNT(*)'] !== '0')
            {
                $_SESSION['error'] = "This Machine already exists";
                header('Location: addmc.php');
                return;
            }
            else
            {
                $_POST['dop']=date('y-m-d',strtotime($_POST['dop']));
                $stmt = $pdo->prepare('INSERT INTO machine (MAC_ADDR, processor, ram, memory, dop, price, state) VALUES (:mac_addr, :processor, :ram, :memory, :dop, :price, :state)');
                    $stmt->execute(array(':mac_addr' => $_POST['mac_addr'], ':processor' => $_POST['processor'], ':ram' => $_POST['ram'], ':memory' => $_POST['memory'], ':dop' => $_POST['dop'], ':price' => $_POST['price'], ':state' => "ACTIVE"));
                $_SESSION['success'] = "Machine Added Successfully";
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

    <style>
        .input-group-addon {
        min-width:150px;
        text-align:left;
    }
    </style>
</head>
<body>
    <div class="container">
    <div class="page-header">
    <h1>ADD MACHINE</h1>
    </div>
    <?php
    if ( isset($_SESSION['error']) )
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action="addmc.php">

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS </span>
    <input type="text" name="mac_addr" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Processor </span>
    <input type="text" name="processor" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">RAM </span>
    <input type="text" name="ram" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Storage </span>
    <input type="text" name="memory" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Price of Purchase </span>
    <input type="text" name="price" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Date of Purchase (yyyy-mm-dd)</span>
    <input type="date" name="dop" class="form-control"> </div><br/>


    <input type="submit" value="Add Machine" class="btn btn-info">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-info">
    </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>