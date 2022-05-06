<?php
include("config.php");

if (isset($_POST['reg_admin'])) {
    $adminName = mysqli_real_escape_string($db, $_POST['adminName']);
    $adminEmail = mysqli_real_escape_string($db, $_POST['adminEmail']);
    $adminPw = mysqli_real_escape_string($db, $_POST['adminPw']);
    $user_check_query = "SELECT * FROM admin WHERE adminEmail='$adminEmail'";
    $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
    if (mysqli_num_rows($result) > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("User Existed");';
        echo 'window.location.href = "admin_register.php";';
        echo '</script>';
    } else {
        $secure_pass = password_hash($adminPw, PASSWORD_BCRYPT);
        $query = "INSERT INTO admin(adminID,adminName, adminEmail, adminPw, adminCreatedate) VALUES ('0','$adminName','$adminEmail' ,'$secure_pass' ,now())";
        $rs = mysqli_query($db, $query);
        if ($rs) {
            $query1 = "SELECT * FROM admin WHERE adminEmail='$adminEmail'";
            $result1 = mysqli_query($db, $query1);
            while ($row = mysqli_fetch_array($result1)) {
                $adminID = $row['adminID'];
            }

            header('location: login1.php');
        } else {
            echo mysqli_error($db);
        }
    }
}
mysqli_close($db);
