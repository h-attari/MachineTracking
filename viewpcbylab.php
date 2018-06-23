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
        //echo('<p><a href="logout.php">Logout</a></p>');
        $stmtcnt = $pdo->query("SELECT COUNT(*) FROM machine");
        $row = $stmtcnt->fetch(PDO::FETCH_ASSOC);

        if($row['COUNT(*)']!=='0')
        {
            $i=1;
            $stmtread = $pdo->prepare("SELECT * FROM position where lab_id = :lid and final_date='0000-00-00'");
            $stmtread->execute(array(':lid' => $_GET['lab'] ));
            echo ("<table class=\"table table-striped\">
                <tr> <th>S.no.</th><th>MAC ADDRESS</th><th>Processor</th><th>RAM</th><th>Storage</th><th>DOP</th><th>Price</th> <th>State</th> </tr>");
            while ( $row = $stmtread->fetch(PDO::FETCH_ASSOC) )
            {
                $mid=$row['machine_id'];
                $read2= $pdo -> query("SELECT * FROM machine where machine_id='$mid'");
                while($row2 = $read2->fetch(PDO::FETCH_ASSOC))
                {
                    echo ("<tr>");
                    echo ("<td>");
                    echo($i);
                    echo("</td>");
                    echo ("<td>");
                    echo(htmlentities($row2['MAC_ADDR']));
                    echo ("</td>");
                    echo ("<td>");
                    echo(htmlentities($row2['processor']));
                    echo ("</td>");
                    echo ("<td>");
                    echo(htmlentities($row2['ram']));
                    echo ("</td>");
                    echo ("<td>");
                    echo(htmlentities($row2['memory']));
                    echo ("</td>");
                    echo ("<td>");
                    echo(htmlentities($row2['DOP']));
                    echo ("</td>");
                    echo ("<td>");
                    echo(htmlentities($row2['price']));
                    echo ("</td>");
                    echo ("<td>");
                    echo(htmlentities($row2['state']));
                    echo ("</td>");
                    $i++;
                }
            }
            echo('</table>');
        }
    ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>