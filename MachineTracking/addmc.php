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
    //ID OF NAMES
    
    $qr=$pdo->query("SELECT * from name where name = 'keyboard'");
    $rowtmp=$qr->fetch(PDO::FETCH_ASSOC);
    $keyboardiddb=$rowtmp['name_id'];

    $qr=$pdo->query("SELECT * from name where name = 'mouse'");
    $rowtmp=$qr->fetch(PDO::FETCH_ASSOC);
    $mouseiddb=$rowtmp['name_id'];

    $qr=$pdo->query("SELECT * from name where name = 'harddisk'");
    $rowtmp=$qr->fetch(PDO::FETCH_ASSOC);
    $memoryiddb=$rowtmp['name_id'];

    $qr=$pdo->query("SELECT * from name where name = 'processor'");
    $rowtmp=$qr->fetch(PDO::FETCH_ASSOC);
    $processoriddb=$rowtmp['name_id'];

    $qr=$pdo->query("SELECT * from name where name = 'ram'");
    $rowtmp=$qr->fetch(PDO::FETCH_ASSOC);
    $ramiddb=$rowtmp['name_id'];

    $qr=$pdo->query("SELECT * from name where name = 'monitor'");
    $rowtmp=$qr->fetch(PDO::FETCH_ASSOC);
    $monitoriddb=$rowtmp['name_id'];

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
                if($_POST['alert-server-new']=='1')
                {
                    //This will insert in company if alert server new is 1 it is alert that will be issued if other device is selected. First entry will be made then id will be selected

                     $read=$pdo->prepare('SELECT * from company where name = :name');
                    $read->execute(array(':name'=>$_POST['company2']));
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

//Adding suppierrrrrrrr

                if($_POST['alert-server-new-supplier']=='1')
                {
                    //This will insert in company if alert server new is 1 it is alert that will be issued if other device is selected. First entry will be made then id will be selected


                    $req=$pdo->prepare('SELECT * from supplier where supname = :supname');
                $req->execute(array(':supname'=>$_POST['supplier2']));
                $rowrr=$req->fetch(PDO::FETCH_ASSOC);
                if($rowrr == false)
                {
                    $req=$pdo->prepare('INSERT INTO supplier(supname) VALUES(:name)');
                    $req->execute(array(':name'=>$_POST['supplier2']));
                    $supname=$_POST['supplier2'];    
                }
                else
                {
                    $supname=$_POST['supplier'];
                }

                }
                else 
                    $smn=$_POST['supplier'];
                $req2 = $pdo->prepare("SELECT sup_id from supplier where supname = :name");
                $req2->execute(array(":name" => $smn));
                $row = $req2->fetch(PDO::FETCH_ASSOC);
                $supplier_id=$row['sup_id'];

                for($i = 0;$i<$_POST['qty'];$i++)
                {
                    $_POST['dop']=date('y-m-d',strtotime($_POST['dop']));
                    //RAM PROCESSOR HARDDISK MOUSE KEYBOARD monitor LIZARD
                    $stmt= $pdo->prepare("INSERT INTO hardware ( `company`, `description`, `grn`, `name`, `state`,`supplier`) values 
                        (:company,:description_ram,:grn,:ram,1, :smn ),
                        (:company,:description_processor,:grn,:processor,1, :smn),
                        (:company,:description_hd,:grn,:memory,1, :smn),
                        (:company,:description_mouse,:grn,:mouse,1, :smn),
                        (:company,:description_keyboard,:grn,:kb,1, :smn),
                        (:company,:description_monitor,:grn,:monitor,1, :smn)
                    ");
                    $stmt->execute(array(
                        ':description_ram'=>$_POST['ram'],
                        ':description_processor'=>$_POST['processor'],
                        ':description_hd'=>$_POST['memory'],
                        ':description_mouse'=>$_POST['mouse'],
                        ':description_keyboard'=>$_POST['keyboard'],
                        ':description_monitor'=>$_POST['monitor'],
                        ':grn'=>$_POST['grn'],
                        ':ram' => $ramiddb,
                        ':processor' => $processoriddb,
                        ':memory' => $memoryiddb,
                        ':mouse' => $mouseiddb,
                        ':kb' => $keyboardiddb,
                        ':monitor'=> $monitoriddb,
                        ':company'=>$company_id,
                        ':smn'=>$supplier_id
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
    <div id="error" style="color: red; margin-left: 90px; margin-bottom: 20px;">
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
    <input type="text" name="mac_addr" required="" class="form-control" id="mac_addr" onchange="Number('mac_addr')"> </div>
    <span style="color:#7386D5">If adding multiple PC then enter starting machine ID and rest will be assigned in succession</span>
    
    <br/>
    <div class="input-group">
    <span class="input-group-addon">GR Number</span>
    <input type="text" name="grn" required="" class="form-control" id="grn" onchange="Number('grn')"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Processor </span>
    <input type="text" name="processor" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">RAM </span>
    <input type="text" name="ram" required="" class="form-control" id="ram" onchange="Size('ram')"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Storage </span>
    <input type="text" name="memory" required="" class="form-control" id="memory" onchange="Size('memory')"> </div><br/>
    
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
    <input type="text" name="price" required="" class="form-control" id="price" onchange="Number('price')"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Date of Purchase</span>
    <input type="date" name="dop" required="" class="form-control"> </div><br/>
    
    <div class="input-group">
    <span class="input-group-addon">Other Details</span>
    <input type="text" name="other" class="form-control"> </div><br/>   

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
    <option selected="">Other</option>
    </select>
    </div><br>
    <div class="input-group">
        <span class="input-group-addon">New Company Name</span>   
        <input type="text" class="form-control" name="company2" id="hide-drop-other" onchange="Other('hide-drop-other')">
    </div><br>
    <input type="text" id="alert-server-new"name="alert-server-new" value="1" hidden>


    <div class="input-group">
        <span class="input-group-addon">Supplier</span>
        <select id="drop-supplier" name="supplier" class="form-control" onchange="Supplier();" required="">
        <?php
            
            $qr=$pdo->query("SELECT DISTINCT supname from supplier");
            while($rowx=$qr->fetch(PDO::FETCH_ASSOC))
            {
                echo '<option>';
                echo ($rowx['supname']);
                echo '</option>';
            }
         ?>
    <option selected="">Other</option>
    </select>
    </div><br>
    <div class="input-group">
        <span class="input-group-addon">New Supplier Name</span>   
        <input type="text" class="form-control" name="supplier2" id="other-supplier" onchange="Other('other-supplier')">
    </div><br>
    <input type="text" id="alert-server-new-supplier"name="alert-server-new-supplier" value="1" hidden>



    
    <span class="input-group">
    <span class="input-group-addon">Enter Quantity</span>
    <input type="number" required="" class="form-control" name="qty" min="1"></span>
    <br>
    <input type="submit" value="Add Machine" name="add" id="go" class="btn btn-info">

    <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    </form>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
