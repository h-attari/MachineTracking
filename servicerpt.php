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
        header("Location: index.php");
        return;
    }
    if(!isset($_POST['department']))
    {
        $autoc=$pdo->prepare("SELECT department,purpose,quantity from transfer_request where transfer_request_id = :tid");
        $autoc->execute(array(':tid'=>$_GET['id']));
        $rowauto=$autoc->fetch(PDO::FETCH_ASSOC);
        $dept=$rowauto['department'];
        $pur=$rowauto['purpose']; 
        $qty=$rowauto['quantity'];         
    }
    if(!isset($_GET['id']))
    {
        $_SESSION['error']="Transfer Request not Found";
        header("Location:home.php");
        return;
    }
    else if(isset($_POST['department']) )
    {
        /*
        if ( strlen($_POST['name']) < 1 || strlen($_POST['department']) < 1 || strlen($_POST['purpose']) < 1|| strlen($_POST['quantity']) < 1)
        {
            $_SESSION['error'] = "All Fields are required";
            header('Location: servicerpt.php');
            return;
        }
        */
       // else

                 $stmt2=$pdo->prepare('SELECT lab_id from lab where name = :labid');
                 $stmt2->execute( array(':labid' => $_POST['labid'] ));
                 $row=$stmt2->fetch(PDO::FETCH_ASSOC);
                 $labid=$row['lab_id'];
                
                $stmt = $pdo->prepare('INSERT INTO system_transfer_report( department, purpose, lab_id ,date_of_assignment,trid) VALUES (:dept, :purpose, :labid, :dat,:trid)');
                    $stmt->execute(array(':dept' => $_POST['department'], ':purpose' => $_POST['purpose'], ':labid'=>$labid,':dat' => date('y-m-d'),':trid'=>$_GET['id']));
                 for($i =1 ;$i<=$_POST['totalqty'];$i++)
                        $dat=date('yyyy-mm-dd');
                        $_SESSION['success'].=$dat;
                 {
                    $getmid=$pdo->prepare('SELECT machine_id,COUNT(*) from machine where MAC_ADDR = :mid and state=:act');
                    $getmid->execute( array(':mid' => $_POST["machine".$i],':act' => 'ACTIVE'));
                    $row=$getmid->fetch(PDO::FETCH_ASSOC);
                    $mid=$row['machine_id'];
                    if($row['COUNT(*)']!=0)
                    {
                        $stmt3= $pdo->prepare("UPDATE position set final_date=". $dat." where machine_id = :mid and final_date='0000-00-00'");
                        $stmt3->execute(array(':mid' => $mid ));
                        $insdata=$pdo->prepare("INSERT INTO position (machine_id,lab_id,initial_date,final_date) VALUES(:mid,:labid,:idate,:fdate)");
                        $insdata->execute(array(':mid'=>$mid,':labid' =>$labid ,':idate' => $dat,':fdate' =>'0000-00-00'));
                        $_SESSION['success'] .= "Machine".$_POST['machine'].$i." Sent Successfully";
                    }
                    else
                    {
                        $_SESSION['error'].="Unable to transfer machine ".$_POST['machine'.$i].". Machine is either inactive or does not exsists";
                    }
                }
                        header('Location: home.php');
                        return;
            

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

    <div class="container" id="content">
    <div class="page-header">
    <h1>SYSTEM TRANSFER REPORT</h1>
    </div>
    <?php
    if ( isset($_SESSION['error']) )
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST" action=<?= "servicerpt.php?id=".$_GET['id']?> >

    <div class="input-group">
    <span class="input-group-addon">Department </span>
    <input type="text" name="department" class="form-control" required value="<?= $dept ?>"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Purpose</span>
    <input type="text" name="purpose" class="form-control" required value ="<?= $pur ?>"> </div><br/>
    <div class="input-group">
    <span class="input-group-addon">Lab no.</span>
    <select name="labid" required>
        <?php
            $read=$pdo->query('select name,lab_id from lab order by name');
            while($row = $read->fetch(PDO::FETCH_ASSOC))
            {
                $labname=$row['name'];
                $labid=$row['lab_id'];
                echo '<option name = $labid>';
                echo    $labname;
                echo '</option>';
            }
        ?>
    </select>   
    </div><br>
        <div>Choose number of PC</div><input type="Number" name="totalqty" id="totalqty" value = "<?php echo $qty; ?>" min=1 required>
           <a class="link-black" href="#" onclick="addtags()">Add Machines</a>
            <br>
        <div id="add-machine" class="input-group"></div>
        <script type="text/javascript">
                    var total=document.getElementById("totalqty").value;
        var addimg=document.getElementById("add-machine");
        while (addimg.hasChildNodes()) 
        {
            addimg.removeChild(addimg.lastChild);
        }   
        for (i=1;i<=total;i++)
        {
            addimg.appendChild(document.createTextNode("mac" + i));
            var ipt = document.createElement("input");
            ipt.type = "text";
            ipt.name = "machine"+ i;
            ipt.class="form-control";
            var att=document.createAttribute("required");
            ipt.setAttributeNode(att);
            //              addimg.appendChild(ipt); 
            //                addimg.appendChild(document.createElement("br"));
            document.getElementById("add-machine").appendChild(ipt);
            document.getElementById("add-machine").innerHTML+='<br><br>';
        }
        </script>

    <input type="submit" value="Register Transfer Request" class="btn btn-info">
    <input type="submit" name="cancel" value="Cancel" class="btn btn-info">
    </form>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript">
    function addtags()
           {
               var total=document.getElementById("totalqty").value;
               var addimg=document.getElementById("add-machine");
                while (addimg.hasChildNodes()) 
               {
                   addimg.removeChild(addimg.lastChild);
               }   
                  for (i=1;i<=total;i++)
                  {
                     addimg.appendChild(document.createTextNode("mac" + i));
                   var ipt = document.createElement("input");
                   ipt.type = "text";
                   ipt.name = "machine"+ i;
                   ipt.class="form-control";
                   var att=document.createAttribute("required");
                   ipt.setAttributeNode(att);
     //              addimg.appendChild(ipt); 
   //                addimg.appendChild(document.createElement("br"));
                   document.getElementById("add-machine").appendChild(ipt);
                    document.getElementById("add-machine").innerHTML+='<br><br>';
             }  
         }

       
    </script>
</body>
</html>
