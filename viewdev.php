<?php
    session_start();
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
    if( $_SESSION['id'] != '0' )
    {
        die('ACCESS DENIED');
    }
    require_once "pdo.php";
?>
<html>
<head>
    <title>Machine Tracking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="style5.css">
</head>
<body>
            <div class="wrapper">
     <?php include "navbar.php" ;?>
         <div class="container-fluid row" id="content">

    <div class="page-header">
    <h1>MACHINES</h1>
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
    <form method="post" class="form-inline">
            <label id="processor">Device Name</label>
                <select class="form-control" id="chillana" name="chillana">
                    <?php
                        $qr=$pdo->query("SELECT DISTINCT(name) from name");
                        while($row=$qr->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<option>". $row['name']."</option>";
                        }
                    ?>    
                </select>

            <label id="state">State</label>
                <select class="form-control" id="state" name="state">           
                    <option value="0">Unpositioned</option>
                    <option value="1">Positioned</option>
                    <option value="2">Issued</option> 
                </select>

            <input class="btn btn-my"type="submit" name="submit">
        </form>    
    </div>
    <?php

        
        //echo('<p><a href="logout.php">Logout</a></p>');
        if(isset($_POST['chillana']))
        {
            $stmtcnt = $pdo->query("SELECT COUNT(*) FROM hardware");
            $row = $stmtcnt->fetch(PDO::FETCH_ASSOC);
            if($row['COUNT(*)']!=='0')
            {
                $i=1;
                $stmtread=$pdo->prepare("SELECT name_id from name where name =:name");
                $stmtread->execute(array(":name"=>$_POST['chillana']));
                $nameid=$stmtread->fetch(PDO::FETCH_ASSOC);

                $stmtread = $pdo->prepare("SELECT * FROM hardware  where name= :name AND state=:state ORDER BY name");
                $stmtread->execute(array(":name"=>$nameid['name_id'],":state"=>$_POST['state']));
                echo ("<table class=\"table table-striped\">
                    <tr> <th>S.no.</th><th>Name</th><th>description</th><th>Company</th><th>GRN</th><th>Supplier</th><th>State</th><th>Action</th></tr>");
                while ( $row = $stmtread->fetch(PDO::FETCH_ASSOC) )
                {
                    $stmtn = $pdo->prepare("SELECT name FROM company where company_id = :cname ");
                    $stmtn->execute(array(':cname' => $row['company']));
                    $cname = $stmtn->fetch(PDO::FETCH_ASSOC);

                    $supplier = $pdo->prepare("SELECT supname FROM supplier where sup_id = :sid");
                    $supplier->execute(array(':sid' => $row['supplier']));
                    $supplierid = $supplier->fetch(PDO::FETCH_ASSOC);

                    $spec = $pdo->prepare("SELECT spec FROM specification where spec_id = :spec_id");
                    $spec->execute(array(':spec_id' => $row['description']));
                    $specn = $spec->fetch(PDO::FETCH_ASSOC);

                    echo ("<tr>");
                    echo ("<td>");
                    echo($i);
                    echo("</td>");
                    
                    echo ("<td>");
                    echo(htmlentities($_POST['chillana']));
                    echo ("</td>");

                
                    echo ("<td>");
                    echo($specn['spec']);
                    echo ("</td>");
               

                   // echo ("<td>");
                   // echo(htmlentities($row['description']));
                    //echo ("</td>");

                    echo ("<td>");
                    echo(htmlentities($cname['name']));
                    echo ("</td>");
                    echo ("<td>");
                    echo(htmlentities($row['grn']));
                    echo ("</td>");
                    echo ("<td>");
                    echo(htmlentities($supplierid['supname']));
                    echo ("</td>");
                    echo ("<td>");
                    if($_POST['state']==0)
                        echo "Unpositoned";
                    else if($_POST['state']==1)
                        echo "Positioned";
                    else if($_POST['state']==2)
                        echo "Issued";
                    echo ("</td>")  ; 
                    echo ("<td>");
                    if($_POST['state']==0)
                    {
                        echo('<a class="link-black" href="deletedev.php?dev_id='.$row['hardware_id'].'">'. 'Delete Device ' . '</a>');
                    }
                    else if($_POST['state']==2)
                    {
                        echo('<a class="link-black" href="returndev.php?dev_id='.$row['hardware_id'].'">'. 'Return Device ' . '</a>');
                    }
                    else if($_POST['state']==1)
                        echo "No Action";
                    echo("</td>");    
                    $i++;
                }
                echo('</table>');
            }
        }
    ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>