
<?php
session_start();
include('config.php');
$agentID = $_GET['agentID'];
$agentName = $_POST['agentName'];
$agentEmail = $_POST['agentEmail'];
$agentAge = $_POST['agentAge'];
$agentPhone = $_POST['agentPhone'];
$agentGender = $_POST['agentGender'];
$agentDOB = $_POST['agentDOB'];
$agentLocation = $_POST['agentLocation'];
$user_check_query = "SELECT * FROM agent WHERE agentEmail='$agentEmail' AND agentID!='$agentID'";
$result = mysqli_query($db, $user_check_query) or die('Error querying database.');
if (mysqli_num_rows($result) == 0) {
if(is_uploaded_file($_FILES['agentPhoto']['tmp_name'])){
$agentPhoto = addslashes(file_get_contents($_FILES['agentPhoto']['tmp_name'])); 
$query = "UPDATE agent SET agentName='$agentName',agentPhoto='$agentPhoto', agentEmail='$agentEmail', agentAge='$agentAge', agentPhone='$agentPhone', agentGender='$agentGender', agentDOB='$agentDOB', agentLocation='$agentLocation' WHERE agentID='{$agentID}'";
$rs = mysqli_query($db, $query);
if($rs){ 
    $_SESSION['agsuccess'] = 'Yes';
    header('location:agentlist_test.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }
}
else{
$query = "UPDATE agent SET agentName='$agentName', agentEmail='$agentEmail', agentAge='$agentAge', agentPhone='$agentPhone', agentGender='$agentGender', agentDOB='$agentDOB', agentLocation='$agentLocation' WHERE agentID='{$agentID}'";
$rs = mysqli_query($db, $query);
if($rs){ 
    $_SESSION['agsuccess'] = 'Yes';
    header('location:agentlist_test.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }
}
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Invalid Email");';
    echo 'window.location.href = "javascript:history.go(-1)"';
    echo '</script>';
}
?>