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

    if(isset($_POST['device-name']) )
    {
        if ( strlen($_POST['device-name']) < 1   || strlen($_POST['description']) < 1 || strlen($_POST['price']) < 1 || strlen($_POST['grn']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: adddevice.php');
            return;
        }
        else
        {
            if($_POST['alert-server-new-device']=='1')
            {                    
                $read=$pdo->prepare('SELECT * from name where name = :name');
                $read->execute(array(':name'=>$_POST['device-name2']));
                $rowr=$read->fetch(PDO::FETCH_ASSOC);
                if($rowr == false)
                {
                    $req=$pdo->prepare('INSERT INTO name(name) VALUES(:name)');
                    $req->execute(array(':name'=>$_POST['device-name2']));
                    $devname=$_POST['device-name2'];    
                }
                else
                {
                    $devname=$_POST['device-name2'];
                }
                
            }
            else
                $devname=$_POST['device-name'];
            $req2 = $pdo->prepare("SELECT name_id from name where name = :name");
            $req2->execute(array(":name" => $devname));
            $row = $req2->fetch(PDO::FETCH_ASSOC);
            if($row == false)
            {
                $_SESSION['error'] = "Unexpected Error occured while adding Name".$devname;
                header("Location:home.php");
                return;
            }

            $name_id=$row['name_id'];
            if($_POST['alert-server-new']=='1')
            {
                    //This will insert in company if alert server new is 1 it is alert that will be issued if other device is selected. First entry will be made then id will be selected

                    $read=$pdo->prepare('SELECT * from company where name = :name');
                    $read->execute(array(':name'=>$_POST['device-name2']));
                    $rowr=$read->fetch(PDO::FETCH_ASSOC);

                    if($rowr == false)
                    {
                        $req=$pdo->prepare('INSERT INTO company(name) VALUES(:name)');
                        $req->execute(array(':name'=>$_POST['company2']));
                        $cmn=$_POST['company2'];
                    }
                    else
                    {
                        $cmn=$_POST['company2'];
                    }
            }
            else 
             $cmn=$_POST['company'];
            $req2 = $pdo->prepare("SELECT company_id from company where name = :name");
            $req2->execute(array(":name" => $cmn));
            $row = $req2->fetch(PDO::FETCH_ASSOC);
            if($row == false)
            {
                $_SESSION['error'] = "Unexpected Error occured while adding company".$cmn;
                header("Location:home.php");
                return;
            }
            $company_id=$row['company_id'];
            $stmt = $pdo->prepare('INSERT INTO hardware (company, description, price, grn, name, state) VALUES (:company, :description, :price, :grn, :name, 0)');
            $stmt->execute(array(':company' => $company_id, ':description' => $_POST['description'], ':price' => $_POST['price'], ':grn' => $_POST['grn'], ':name' => $name_id));
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
        <select name="device-name" id="drop-name" class="form-control" onchange="Name();" required="">
        <?php
            
            $qr=$pdo->query("SELECT DISTINCT name from name");
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
            <input name="device-name2" type="text" class="form-control" disabled name="device_name" id="other-device" placeholder="Enter New Device Name">
        </div><br>
        <input type="text" name="alert-server-new-device" id="alert-server-new-device" hidden>
        
        <div class="input-group">
        <span class="input-group-addon">Company Name</span>
        <select id="drop-other" name="company" class="form-control" onchange="Device();" required="">
        <?php
            
            $qr=$pdo->query("SELECT DISTINCT name from company");
            while($rowx=$qr->fetch(PDO::FETCH_ASSOC))
            {
                echo '<option>';
                echo ($rowx['name']);
                echo '</option>';
            }
         ?>
    <option>Other</option>
    </select>
    </div><br>
    <div class="input-group">
        <span class="input-group-addon">New Company Name</span>   
        <input type="text" class="form-control" disabled name="company2" id="hide-drop-other">
    </div><br>
    <input type="text" id="alert-server-new"name="alert-server-new" hidden>
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
