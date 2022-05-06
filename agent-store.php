<?php
include("config.php");

if (isset($_POST['reg_agent'])) {
        $agentName = mysqli_real_escape_string($db, $_POST['agentName']);
        $agentAge = mysqli_real_escape_string($db, $_POST['agentAge']);
        $agentPhone = mysqli_real_escape_string($db, $_POST['agentPhone']);
        $agentEmail = mysqli_real_escape_string($db, $_POST['agentEmail']);
        $agentPw = mysqli_real_escape_string($db, $_POST['agentPw']);
        $agentGender = mysqli_real_escape_string($db, $_POST['agentGender']);
        $agentDOB = mysqli_real_escape_string($db, $_POST['agentDOB']);
        $agentLocation = mysqli_real_escape_string($db, $_POST['agentLocation']);

        $user_check_query = "SELECT * FROM agent WHERE agentEmail='$agentEmail'";
        $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
        if (mysqli_num_rows($result) > 0) {
                echo '<script type="text/javascript">';
                echo 'alert("User Existed");';
                echo 'window.location.href = "register.php";';
                echo '</script>';
        } else {
                $secure_pass = password_hash($agentPw, PASSWORD_BCRYPT);
                $query = "INSERT INTO agent(agentID,agentName, agentAge, agentPhone, agentEmail, agentPw, agentGender, agentDOB, agentLocation, agentCreatedate) VALUES ('0','$agentName', '$agentAge', '$agentPhone' ,'$agentEmail' ,'$secure_pass' ,'$agentGender' ,'$agentDOB' ,'$agentLocation', now())";
                $rs = mysqli_query($db, $query);
                if ($rs) {
                        $query1 = "SELECT * FROM agent WHERE agentEmail='$agentEmail'";
                        $result1= mysqli_query($db, $query1);
                        while ($row = mysqli_fetch_array($result1)) {
                                $agentID = $row['agentID'];
                        }
                        $grandtotal = "0";
                        $query2 = "INSERT into cart(agentID,grandtotal) values ('$agentID','0')";
                        if ($db->query($query2) == TRUE) {
                                header('location: login2.php');
                        } else {
                                echo "fail" . $db->error;
                        }
                } else {
                        echo "Failed";
                }
        }
}
mysqli_close($db);
