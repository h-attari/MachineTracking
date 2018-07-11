<?php
    session_start();
    require_once "pdo.php";
    
    if(isset($_POST['cancel']))
    {
        header("Location: index.php");
        return;
    }

    if(isset($_POST['department']) )
    {
        if ( strlen($_POST['department']) < 1 || strlen($_POST['purpose']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: issue_request.php');
            return;
        }
        else
        {
                 
                
                $date=date('y-m-d');
                $stmt=$pdo->prepare("SELECT name_id from name where name = :name");
                $stmt->execute(array(':name'=>$_POST['chillana']));
                $hid=$stmt->fetch(PDO::FETCH_ASSOC);
                echo $hid['name_id'];
                $stmt = $pdo->prepare('INSERT INTO `issue_request`( `department`, `id`, `purpose`, `date_of_request`, `name_of_hardware`) VALUES (:department,:id,:purpose, :dat,:hardware)');
                    $stmt->execute(array(':dat' => date('y-m-d'),
                      ':department' => $_POST['department'],
                       ':purpose' => $_POST['purpose'],
                       ':id'=>$_SESSION['id'],
                       ':hardware'=>$hid['name_id']
                   ));
                $_SESSION['success'] = "Issue Request Sent Successfully";
                    if(isset($_SESSION['id']))
                        header("Location:home.php");
                    else
                        header('Location: index.php');
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
         <?php if ($_SESSION['id']=='0') include "navbar.php"; else include "navbar_index.php" ;?>
    <div class="container-fluid row" id="content">
    <div class="page-header">
    <h1>ISSUE HARDWARE REQUEST</h1>
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

    <form method="POST" class="col-xs-5">

    <div class="input-group">
    <span class="input-group-addon">Department </span>
    <input type="text" name="department" required="" class="form-control"> </div><br/>

    <div class="input-group">
    <span class="input-group-addon">Purpose</span>
    <input type="text" name="purpose" required="" class="form-control"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Hardware Name</span>
    <select name="chillana" class="form-control">
           <?php
                $qr=$pdo->query("SELECT DISTINCT(name) from name");
                while($row=$qr->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<option>". $row['name']."</option>";
                }
            ?>   
    </select>
    </div><br/>
    

    <input type="submit" value="Register Issue Request" class="btn btn-info">
    <a class ="link-no-format" href="home.php"><div class="btn btn-my">Cancel</div></a>
    </form>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>