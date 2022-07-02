<?php
include("config.php");
date_default_timezone_set("Asia/Singapore");
if (isset($_POST['reg_agent'])) {
        $recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if($res['success']){
        $agentName = mysqli_real_escape_string($db, $_POST['agentName']);
        $agentAge = mysqli_real_escape_string($db, $_POST['agentAge']);
        $agentPhone = mysqli_real_escape_string($db, $_POST['agentPhone']);
        $agentEmail = mysqli_real_escape_string($db, $_POST['agentEmail']);
        $agentPw1 = mysqli_real_escape_string($db, $_POST['agentPw1']);
        $agentPw2 = mysqli_real_escape_string($db, $_POST['agentPw2']);
        $agentGender = mysqli_real_escape_string($db, $_POST['agentGender']);
        $agentDOB = mysqli_real_escape_string($db, $_POST['agentDOB']);
        $agentLocation = mysqli_real_escape_string($db, $_POST['agentLocation']);
        if(is_uploaded_file($_FILES['agentPhoto']['tmp_name'])){
        $agentPhoto = addslashes(file_get_contents($_FILES['agentPhoto']['tmp_name']));  
        $user_check_query = "SELECT * FROM agent WHERE agentEmail='$agentEmail'";
        $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
        if ($_POST["agentPw1"] == $_POST["agentPw2"]){
        if (mysqli_num_rows($result) > 0) {
                echo '<script type="text/javascript">';
                echo 'alert("Invalid Email");';
                echo 'window.location.href = "agent_register.php";';
                echo '</script>';
        } else {
                $secure_pass = password_hash($agentPw1, PASSWORD_BCRYPT);
                $query = "INSERT INTO agent(agentID,agentPhoto,agentName, agentAge, agentPhone, agentEmail, agentPw, agentGender, agentDOB, agentLocation, agentCreatedate) VALUES ('0','$agentPhoto','$agentName', '$agentAge', '$agentPhone' ,'$agentEmail' ,'$secure_pass' ,'$agentGender' ,'$agentDOB' ,'$agentLocation', now())";
                $rs = mysqli_query($db, $query);
                if ($rs) {
                        $query1 = "SELECT * FROM agent WHERE agentEmail='$agentEmail'";
                        $result1= mysqli_query($db, $query1);
                        while ($row = mysqli_fetch_array($result1)) {
                                $agentID = $row['agentID'];
                        }
                        for ($x = 1; $x <= 12; $x++){
                                $salesYear = date("Y");
                        mysqli_query($db, "INSERT into salesreport(agentID,salesMonth,salesYear) values ('$agentID', '$x', '$salesYear')");
                        };
                        $grandtotal = "0";
                        $query2 = "INSERT into cart(agentID,grandtotal) values ('$agentID','0')";
                        if ($db->query($query2) == TRUE) {
                                header('location: agent_login.php');
                        } else {
                                echo "fail" . $db->error;
                        }
                } else {
                        echo "Failed";
                }
        }
}else{
        echo '<script type="text/javascript">';
        echo 'alert("Password and Retype Password not match");';
        echo 'window.location.href = "agent_register.php";';
        echo '</script>';
    }
}
else{
        $agentPhoto = addslashes(file_get_contents('images/agentp.png'));  
        $user_check_query = "SELECT * FROM agent WHERE agentEmail='$agentEmail'";
        $result = mysqli_query($db, $user_check_query) or die('Error querying database.');

        if ($_POST["agentPw1"] == $_POST["agentPw2"]){
        if (mysqli_num_rows($result) > 0) {
                echo '<script type="text/javascript">';
                echo 'alert("Invalid Email");';
                echo 'window.location.href = "agent_register.php";';
                echo '</script>';
        } else {
                $secure_pass = password_hash($agentPw1, PASSWORD_BCRYPT);
                $query = "INSERT INTO agent(agentID,agentPhoto,agentName, agentAge, agentPhone, agentEmail, agentPw, agentGender, agentDOB, agentLocation, agentCreatedate) VALUES ('0','$agentPhoto','$agentName', '$agentAge', '$agentPhone' ,'$agentEmail' ,'$secure_pass' ,'$agentGender' ,'$agentDOB' ,'$agentLocation', now())";
                $rs = mysqli_query($db, $query);
                if ($rs) {
                        $query1 = "SELECT * FROM agent WHERE agentEmail='$agentEmail'";
                        $result1= mysqli_query($db, $query1);
                        while ($row = mysqli_fetch_array($result1)) {
                                $agentID = $row['agentID'];
                        }
                        for ($x = 1; $x <= 12; $x++){
                                $salesYear = date("Y");
                        mysqli_query($db, "INSERT into salesreport(agentID,salesMonth,salesYear) values ('$agentID', '$x', '$salesYear')");
                        };
                        $grandtotal = "0";
                        $query2 = "INSERT into cart(agentID,grandtotal) values ('$agentID','0')";
                        if ($db->query($query2) == TRUE) {
                                header('location: agent_login.php');
                        } else {
                                echo "fail" . $db->error;
                        }
                } else {
                        echo "Failed";
                }
        }
}else{
        echo '<script type="text/javascript">';
        echo 'alert("Password and Retype Password not match");';
        echo 'window.location.href = "agent_register.php";';
        echo '</script>';
    }
}
} else { echo '<script type="text/javascript">';
        echo 'alert("Failed reCAPTCHA, Please Try Again Later.");';
        echo 'window.location.href = "agent_register.php";';
        echo '</script>';}
}

function reCaptcha($recaptcha){
        $secret = "6LfKe9ofAAAAAC8s0NaYUtRKtD3fWFDsJeb1HUAG";
        $ip = $_SERVER['REMOTE_ADDR'];
      
        $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        $data = curl_exec($ch);
        curl_close($ch);
      
        return json_decode($data, true);
      }
mysqli_close($db);?>
