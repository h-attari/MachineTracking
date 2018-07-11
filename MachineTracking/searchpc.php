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
        <form method="GET" class="form-inline">
            <label id="processor">Processor</label>
                <select class="form-control" id="processor" name="processor">
                    <option>Any</option>
                    <?php
                        $qr=$pdo->query("SELECT DISTINCT(description) from hardware where name = $processoriddb");
                        while($row=$qr->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<option>". $row['description']."</option>";
                        }
                    ?>    
                </select>
            <label id="ram">RAM</label>
                <select class="form-control" id="ram" name="ram">
                    <option>Any</option>           
                    <?php
                        $qr=$pdo->query("SELECT DISTINCT(description) from hardware where name = $ramiddb");
                        while($row=$qr->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<option>". $row['description']."</option>";
                        }
                    ?>    
                </select>
            <label id="memory">Memory</label>
                <select class="form-control" id="memory" name="memory">
                    <option>Any</option> 
                    <?php
                        $qr=$pdo->query("SELECT DISTINCT(description) from hardware where name = $memoryiddb");
                        while($row=$qr->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<option>". $row['description']."</option>";
                        }
                    ?>    
                </select>
            <label id="os">OS</label>
                <select class="form-control" id="os" name="os">
                    <option>Any</option>
                    <?php
                        $qr=$pdo->query("SELECT distinct(os) from machine where os is not null");
                        while($row=$qr->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<option>". $row['os']."</option>";
                        }
                    ?>    
                </select>
            <input class="btn btn-my"type="submit" name="submit">
        </form>
    <h1>MACHINES</h1>
    </div>
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
        if(isset($_GET['processor'])||isset($_GET['ram'])||isset($_GET['memory'])||isset($_GET['os']))
            if($_GET['processor']!="Any"||$_GET['ram']!="Any"||$_GET['memory']!="Any"||$_GET['os']!="Any")
            {
                //echo('<p><a href="logout.php">Logout</a></p>');
                $stmtcnt = $pdo->query("SELECT COUNT(*) FROM machine ");
                $row = $stmtcnt->fetch(PDO::FETCH_ASSOC);

                if($row['COUNT(*)']!=='0')
                {
                    $i=1;
                    $cond="";
                    $inj="";
                    $f=0;
                    if($_GET['processor']!="Any")
                    {
                        if($f!='1')
                            $cond.="where processor = "."'".$_GET['processor']."'"." ";
                        else
                            $cond.=" AND processor = "."'".$_GET['processor']."'"." ";
                        $f=1;
                        $inj.=" ':proc' =>". $_GET['processor'] ;
                    }
                    if($_GET['memory']!="Any")
                    {
                        if($f==0)
                            $cond.=" where memory = "."'".$_GET['memory']."'"." ";
                        else
                            $cond.=" AND memory = "."'".$_GET['memory']."'"." ";
                        $f=1;
                        $inj.=" ':proc' =>". $_GET['memory'] ;
                    }
                    if($_GET['ram']!="Any")
                    {
                        if($f==0)
                            $cond.=" where ram = "."'".$_GET['ram']."'"." ";
                        else
                            $cond.=" AND ram = "."'".$_GET['ram']."'"." ";
                        $f=1;
                        $inj.=" ':proc' =>". $_GET['ram'] ;
                    }
                    if($_GET['os']!="Any")
                    {
                        if($f==0)
                            $cond.=" where os = "."'".$_GET['os']."'"." ";
                        else
                            $cond.=" AND os = "."'".$_GET['os']."'"." ";
                        $f=1;
                        $inj.=" ':proc' =>". $_GET['os'] ;
                    }
                    $query="SELECT * FROM machine ".$cond."ORDER BY MAC_ADDR";
                    //echo $query;
                    $stmtread = $pdo->query($query);
                    echo ("<table class=\"table table-striped\">
                        <tr> <th>S.no.</th><th>MAC ADDRESS</th><th>Processor</th><th>RAM</th><th>Storage</th><th>OS</th><th>DOP</th><th>Price</th><th>Location</th> <th>State</th></tr>");
                    while ( $row = $stmtread->fetch(PDO::FETCH_ASSOC) )
                    {
                        $stmtn = $pdo->prepare("SELECT lab_id FROM position where machine_id = :mid AND final_date = '1970-01-01'");
                        $stmtn->execute(array(':mid' => $row['machine_id']));
                        $rown = $stmtn->fetch(PDO::FETCH_ASSOC);
                        $stmtn2 = $pdo->prepare("SELECT name FROM lab where lab_id = :lid");
                        $stmtn2->execute(array(':lid' => $rown['lab_id']));
                        $rown2 = $stmtn2->fetch(PDO::FETCH_ASSOC);

                        echo ("<tr>");
                        echo ("<td>");
                        echo($i);
                        echo("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['MAC_ADDR']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['processor']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['ram']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['memory']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['os']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['DOP']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['price']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($rown2['name']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['state']));
                        echo ("</td>");                
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