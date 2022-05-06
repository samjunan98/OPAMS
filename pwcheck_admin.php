<?php
session_start();
include("config.php");

if(isset($_POST['adminLogin']))
{
    $adminEmail = mysqli_real_escape_string($db, $_POST['adminEmail']);
    $adminPw = mysqli_real_escape_string($db, $_POST['adminPw']);
    $user_check_query = "SELECT * FROM admin WHERE adminEmail='$adminEmail' AND adminPw = '$adminPw'";
    
    $result = mysqli_query($db, $user_check_query) or die('Error querying database. ' .  mysqli_error($db));
        if(mysqli_num_rows($result)>0)
        {  $row = mysqli_fetch_array($result);
            $_SESSION['adminID']=$row['adminID'];
            header("location: main_admin.php");
            }
        else{echo " <script> alert('Invalid Login') </script> ";
        }
}
$db->close();
?>