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

    $processor = $pdo->query("SELECT name_id FROM name where name = 'processor'");
    $processorn = $processor->fetch(PDO::FETCH_ASSOC);
    $processorn=$processorn['name_id'];

    $ram= $pdo->query("SELECT name_id FROM name where name = 'ram'");
    $ramn = $ram->fetch(PDO::FETCH_ASSOC);
    $ramn=$ramn['name_id'];

    $memory = $pdo->query("SELECT name_id FROM name where name = 'memory'");
    $memoryn = $memory->fetch(PDO::FETCH_ASSOC);
    $memoryn=$memoryn['name_id'];

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
        <form method="POST" class="form-inline">
            <label id="processor">Processor</label>
                <select class="form-control" id="processor" name="processor">
                    <option value="-1">Any</option>
                    <?php
                        $qr=$pdo->query("SELECT DISTINCT(description) from hardware AS G1 JOIN(SELECT hardware_id,description as g2d from hardware where name = $processorn.) AS G2 ON G1.description=G2.g2d");
                        while($row=$qr->fetch(PDO::FETCH_ASSOC))
                        {

                            echo "<option>". $row['description']."</option>   ";
                        }
                    ?>    
                </select>
            <label id="ram">RAM</label>
                <select class="form-control" id="ram" name="ram">
                    <option value='-1'>Any</option>           
                    <?php
                        $qr=$pdo->query("SELECT DISTINCT(description) from hardware AS G1 JOIN(SELECT hardware_id,description as g2d from hardware where name = $ramn.) AS G2 ON G1.description=G2.g2d");
                        while($row=$qr->fetch(PDO::FETCH_ASSOC))
                        {

                            echo "<option>". $row['description']."</option>";
                        }
                    ?>    
                </select>
            <label id="memory">Memory</label>
                <select class="form-control" id="memory" name="memory">
                    <option value='-1'>Any</option> 
                    <?php
                        $qr=$pdo->query("SELECT DISTINCT(description) from hardware AS G1 JOIN(SELECT hardware_id,description as g2d from hardware where name = $memoryn.) AS G2 ON G1.description=G2.g2d");
                       // $qr=$pdo->query("SELECT distinct(os) from machine");
                        while($row=$qr->fetch(PDO::FETCH_ASSOC))
                        {
                            echo "<option>". $row['description']."</option>";
                            //echo "<option>". $row['memory']."</option>";
                        }
                    ?>    
                </select>
            <label id="os">OS</label>
                <select class="form-control" id="os" name="os">
                    <option value='-1'>Any</option>
                    <?php
                        $qr=$pdo->query("SELECT distinct(os) from machine");
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
        if(isset($_POST['processor'])||isset($_POST['ram'])||isset($_POST['memory'])||isset($_POST['os']))
            if($_POST['processor']!="Any"||$_POST['ram']!="Any"||$_POST['memory']!="Any"||$_POST['os']!="Any")
            {
                //echo('<p><a href="logout.php">Logout</a></p>');
                $stmtcnt = $pdo->query("SELECT COUNT(*) FROM machine ");
                $row = $stmtcnt->fetch(PDO::FETCH_ASSOC);

                if($row['COUNT(*)']!=='0')
                {
                    $i=1;
                    $cond="";
                    $join="";
                    $ans="";
                    $f=0;
                    if($_POST['processor']!=-1)
                    {
                        if($f!='1')
                        {
                            $join.=" INNER JOIN hardware ";
                            $cond.=" WHERE machine.processor= hardware.hardware_id ";
                            $ans.=" AND hardware.description = "."'".$_POST['processor']."'";
                        }
                        else
                        {
                            $cond.=" AND machine.processor=hardware.hardware_id ";
                            $ans.=" OR hardware.description = ".$_POST['processor']."' ";
                        }
                        $f=1;
                    }
                    if($_POST['memory']!=-1)
                    {
                        if($f!='1')
                        {
                            $join.=" INNER JOIN hardware ";
                            $cond.=" WHERE machine.memory=hardware.hardware_id ";
                            $ans.=" AND hardware.description = "."'".$_POST['memory']."' ";
                        }
                        else
                        {
                            $cond.=" AND machine.memory=hardware.hardware_id ";
                            $ans.=" OR hardware.description = "."'".$_POST['memory']."' ";
                        }
                        $f=1;
                    }
                    if($_POST['ram']!=-1)
                    {
                        if($f!='1')
                        {
                            $join.=" INNER JOIN hardware ";
                            $cond.=" WHERE machine.ram=hardware.hardware_id ";
                            $ans.=" AND hardware.description = "."'".$_POST['ram']."' ";
                        }
                        else
                        {
                            $cond.="AND machine.ram=hardware.hardware_id ";
                            $ans.=" OR hardware.description = "."'".$_POST['ram']."' ";
                        }
                        $f=1;
                    }
                    if($_POST['os']!=-1)
                    {
                        if($f==0)
                            $cond.=" where os = "."'".$_POST['os']."'"." ";
                        else
                            $cond.=" AND os = "."'".$_POST['os']."'"." ";
                        $f=1;
                        $inj.=" ':proc' =>". $_POST['os'] ;
                    }


                    $query="SELECT * FROM machine ".$join.$cond.$ans."ORDER BY MAC_ADDR";
                    echo $query;
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

                        $stmtn3=$pdo->prepare("SELECT description from hardware where hardware_id=:hid");
                        $stmtn3->execute(array(':hid' => $row['processor']));
                        $rown3 = $stmtn3->fetch(PDO::FETCH_ASSOC);

                           

                        echo ("<tr>");
                        echo ("<td>");
                        echo($i);
                        echo("</td>");
                        echo ("<td>");
                        echo(htmlentities($row['MAC_ADDR']));
                        echo ("</td>");
                        echo ("<td>");
                        echo(htmlentities($rown3['description']));
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
    <script src="https://ajax.googleapis.com                        $stmtn3->execute(array(':hid' => $_POST['processor']));
/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>