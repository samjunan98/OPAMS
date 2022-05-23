
<?php
session_start();
include("config.php");
if (isset($_POST['adminLogin'])) {
    $adminEmail = mysqli_real_escape_string($db, $_POST['adminEmail']);
    $adminPw = mysqli_real_escape_string($db, $_POST['adminPw']);
    $user_check_query = "SELECT * FROM admin WHERE adminEmail='$adminEmail'";
    $result = mysqli_query($db, $user_check_query) or die('Error querying database.' . mysqli_error($db));
    if (mysqli_num_rows($result) > 0) {
    while ($row =  mysqli_fetch_array($result)) {
        $adminpw = $row['adminPw'];
        $adminID = $row['adminID'];
    }
    $verify = password_verify($adminPw, $adminpw);
    if ($verify) {
        $_SESSION['adminID'] = $adminID;
        session_regenerate_id();
        $adminSessionid = session_id();
        mysqli_query($db, "UPDATE admin SET adminSessionid='$adminSessionid' WHERE adminID='{$adminID}'");
        $_SESSION['adminSessionid'] = $adminSessionid;
        header('location: main_admin.php');
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid Login");';
        echo 'window.location.href = "admin_login.php";';
        echo '</script>';
    }
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Invalid Login");';
    echo 'window.location.href = "admin_login.php";';
    echo '</script>';
}
}
$db->close();
?>