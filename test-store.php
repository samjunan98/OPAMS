<?php
include("config.php");

   if(isset($_POST['reg_agent'])){
        $agentName = $_POST['agentName'];
        $agentAge = $_POST['agentAge'];
        $agentPhone =  $_POST['agentPhone'];
        $agentEmail = $_POST['agentEmail'];
        $agentPw = $_POST['agentPw'];
        $agentGender = $_POST['agentGender'];
        $agentDOB = $_POST['agentDOB'];
        $agentLocation = $_POST['agentLocation'];
        $query = "INSERT INTO agent (agentID, agentName, agentAge, agentPhone, agentEmail, agentPw, agentGender, agentDOB, agentLocation) VALUES ('0', '$agentName', '$agentAge', '$agentPhone' ,'$agentEmail' ,'$agentPw' ,'$agentGender' ,'$agentDOB' ,'$agentLocation)";
        $rs = mysqli_query($db, $query);
  	    if($db)
          {header('location: login2.php');}
        else {echo"Failed";}
        }
mysqli_close($db);
?>