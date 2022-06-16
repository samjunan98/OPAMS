<?php
session_start();
include("config.php");
if (isset($_POST['agentLogin'])) {
    $agentEmail = mysqli_real_escape_string($db, $_POST['agentEmail']);
    $agentPw = mysqli_real_escape_string($db, $_POST['agentPw']);
    $user_check_query = "SELECT * FROM agent WHERE agentEmail='$agentEmail'";
    $result = mysqli_query($db, $user_check_query) or die('Error querying database.' . mysqli_error($db));
    if (mysqli_num_rows($result) > 0) {
    while ($row =  mysqli_fetch_array($result)) {
        $savedpw = $row['agentPw'];
        $agentID = $row['agentID'];
    }
    $verify = password_verify($agentPw, $savedpw);
    if ($verify) {
        $_SESSION['agentID'] = $agentID;
        session_regenerate_id();
        $agentSessionid = session_id();
        mysqli_query($db, "UPDATE agent SET agentSessionid='$agentSessionid' WHERE agentID='{$agentID}'");
        $_SESSION['agentSessionid'] = $agentSessionid;
        $_SESSION['success'] = 'Yes';
        header('location: main_agent.php');
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid Login");';
        echo 'window.location.href = "agent_login.php";';
        echo '</script>';
    }
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Invalid Login");';
    echo 'window.location.href = "agent_login.php";';
    echo '</script>';
}
}

$db->close();
