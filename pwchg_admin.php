
<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];
$newpw1 = $_POST["newpw1"];
$newpw2 = $_POST["newpw2"];
$oldpw = $_POST["oldpw"];

if ($_POST["newpw1"] == $_POST["newpw2"]) {
    // success!
    $user_check_query = "SELECT adminPw FROM admin WHERE adminID = '$adminID'";
    $rst = mysqli_query($db, $user_check_query) or die('Error querying database.' . mysqli_error($db));
    while ($row =  mysqli_fetch_array($rst)) {
        $savedpw = $row['adminPw'];
    }
    $verify = password_verify($oldpw, $savedpw);
    if ($verify) {
        $secure_pass = password_hash($newpw1, PASSWORD_BCRYPT);
        $sqlquery = "UPDATE admin SET adminPw = '$secure_pass' WHERE adminID = '$adminID'";
        $result = mysqli_query($db, $sqlquery);
        if ($result) {
            header('location: info.php');
        } else {
            echo "error" . mysqli_error($db);
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Incorrect Old Password");';
        echo 'window.location.href = "passwordchg_admin.php";';
        echo '</script>';
    }
} else {
    // failed :(
    echo '<script type="text/javascript">';
    echo 'alert("New Password and Confirm New Password not match");';
    echo 'window.location.href = "passwordchg_admin.php";';
    echo '</script>';
}

?>