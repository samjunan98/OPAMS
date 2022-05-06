
<?php
session_start();
include('config.php');
$agentID = $_SESSION['agentID'];
$newpw1 = $_POST["newpw1"];
$newpw2 = $_POST["newpw2"];
$oldpw = $_POST["oldpw"];

if ($_POST["newpw1"] == $_POST["newpw2"]) {
    // success!
    $user_check_query = "SELECT agentPw FROM agent WHERE agentID = '$agentID'";
    $rst = mysqli_query($db, $user_check_query) or die('Error querying database.' . mysqli_error($db));
    while ($row =  mysqli_fetch_array($rst)) {
        $savedpw = $row['agentPw'];
    }
    $verify = password_verify($oldpw, $savedpw);
    if ($verify) {
        $secure_pass = password_hash($newpw1, PASSWORD_BCRYPT);
        $sqlquery = "UPDATE agent SET agentPw = '$secure_pass' WHERE agentID ='{$agentID}'";
        $result = mysqli_query($db, $sqlquery);
        if ($result) {
            header('location: agentinfo.php');
        } else {
            echo "error" . mysqli_error($db);
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Incorrect Old Password");';
        echo 'window.location.href = "passwordchg_agent.php";';
        echo '</script>';
    }
} else {
    // failed :(
    echo '<script type="text/javascript">';
    echo 'alert("New Password and Confirm New Password not match");';
    echo 'window.location.href = "passwordchg_agent.php";';
    echo '</script>';
}

?>