<?php
    session_start();
    require_once "pdo.php";
    if( !isset($_SESSION['id']) )
    {
        die('ACCESS DENIED');
    }
?>
<html>
<head>
    <title>Machine Tracking</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="stylesheet" type="text/css" href="style5.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
</head>
<body>
        <div class="wrapper">
     <?php include "navbar.php" ;?>
           <div class="container-fluid row" id="content">

        <div class="page-header">
        <h1>TO-DO...</h1>
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

            if($_SESSION['id']=='0')
            {
                $stmtcnt = $pdo->query("SELECT COUNT(*) FROM complaint_book WHERE work_for IS NULL ");
        $row = $stmtcnt->fetch(PDO::FETCH_ASSOC);

        if($row['COUNT(*)']!=='0')
        {
            echo "<h2>Repair Requests</h2>";
            $i=1;
            $stmtread = $pdo->query("SELECT * FROM complaint_book WHERE work_for IS NULL");
            echo ("<table class=\"table table-striped\">
                <tr> <th>S.no.</th><th>Date of Complaint</th><th>MAC_ADDR</th><th>Complaint Details</th><th>Priority</th><th>Action</th> </tr>");
            while ( $row = $stmtread->fetch(PDO::FETCH_ASSOC) )
            {
                $stmtr = $pdo->prepare("SELECT MAC_ADDR FROM machine WHERE machine_id = :mid ");
                $stmtr->execute(array(':mid' => $row['machine_id']));
                $rowr = $stmtr->fetch(PDO::FETCH_ASSOC);
                echo ("<tr>");
                echo ("<td>");
                echo($i);
                echo("</td>");
                echo ("<td>");
                echo(htmlentities($row['Date_of_complaint']));
                echo ("</td>");
                echo ("<td>");
                echo(htmlentities($rowr['MAC_ADDR']));
                echo ("</td>");
                echo ("<td>");
                echo(htmlentities($row['complaint_details']));
                echo ("</td>");
                echo ("<td>");
                echo(htmlentities($row['priority']));
                echo ("</td>");
                echo ("<td>");
                echo('<a href="gorepairmc.php?mc_id='.$rowr['MAC_ADDR'].'">'. 'Assign Job' . '</a>');
                echo ("</td>");
                
                $i++;
            }
            echo('</table>');
        }
            }
        ?>

        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>