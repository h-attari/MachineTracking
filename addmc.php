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
                $mcid=($_POST['mac_addr']);
                for($i = 0;$i<$_POST['qty'];$i++)
                {
                    $_POST['dop']=date('y-m-d',strtotime($_POST['dop']));
                    //RAM PROCESSOR HARDDISK MOUSE KEYBOARD monitor LIZARD
                    $stmt= $pdo->prepare("INSERT INTO hardware ( `company`, `description`, `grn`, `name`, `state`) values 
                        ('inbuilt',:description_ram,:grn,'ram',1 ),
                        ('inbuilt',:description_processor,:grn,'processor',1),
                        ('inbuilt',:description_hd,:grn,'harddisk',1),
                        ('inbuilt',:description_mouse,:grn,'mouse',1),
                        ('inbuilt',:description_keyboard,:grn,'keyboard',1),
                        ('inbuilt',:description_monitor,:grn,'monitor',1)
                    ");
                    $stmt->execute(array(
                        ':description_ram'=>$_POST['ram'],
                        ':description_processor'=>$_POST['processor'],
                        ':description_hd'=>$_POST['memory'],
                        ':description_mouse'=>$_POST['mouse'],
                        ':description_keyboard'=>$_POST['keyboard'],
                        ':description_monitor'=>$_POST['monitor'],
                        ':grn'=>$_POST['grn']
                        ));
                    $ramid=$pdo->lastInsertId();
                    $keyboardid=$ramid+4;
                    $mouseid=$ramid+3;
                    $hdid=$ramid+2;
                    $processorid=$ramid+1;
                    $monitorid=$ramid+5;
                    $stmt = $pdo->prepare('INSERT INTO machine (MAC_ADDR, processor, ram, memory, dop, price, state, os, monitor, keyboard, mouse, grn) VALUES (:mac_addr, :processorid, :ramid, :hdid, :dop, :price, :state, :os, :monitorid, :keyboardid, :mouseid, :grn)');
                        $stmt->execute(array(':mac_addr' => $mcid, ':grn' => $_POST['grn'], ':dop' => $_POST['dop'], ':price' => $_POST['price'], ':state' => "ACTIVE", ':os' => $_POST['os'], ':processorid' => $processorid, ':ramid' => $ramid, ':hdid' => $hdid, ':monitorid' => $monitorid, ':keyboardid' => $keyboardid, ':mouseid' => $mouseid));
                    $mcid++;
                }
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
    <h1>ADD MACHINE</h1>
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

    <form method="POST" action="addmc.php" class="col-xs-5">

    <div class="input-group">
    <span class="input-group-addon">MAC ADDRESS </span>
    <input type="text" name="mac_addr" required="" class="form-control"> </div>
    <span style="color:#7386D5">If adding multiple PC then enter starting machine ID and rest will be assigned in succession</span>
    
    <br/>
    <div class="input-group">
    <span class="input-group-addon">GR Number</span>
    <input type="text" name="grn" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Processor </span>
    <input type="text" name="processor" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">RAM </span>
    <input type="text" name="ram" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Storage </span>
    <input type="text" name="memory" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Mouse</span>
    <input type="text" name="mouse" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Keyboard</span>
    <input type="text" name="keyboard" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Monitor</span>
    <input type="text" name="monitor" required="" class="form-control"> </div><br/>
    
    <div class="input-group"> 
    <span class="input-group-addon">OS </span>
    <input type="text" name="os" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Price of Purchase </span>
    <input type="text" name="price" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Date of Purchase</span>
    <input type="date" name="dop" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Other Details</span>
    <input type="text" name="other" class="form-control"> </div><br/>   
    
    <span class="input-group">
    <span class="input-group-addon">Enter Quantity</span>
    <input type="number" required="" class="form-control" name="qty" min="1"></span>
    <br>
    <input type="submit" value="Add Machine" class="btn btn-info">
    <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    </form>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
