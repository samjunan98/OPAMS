
<?php
session_start();
include('config.php');
$agentID = $_SESSION['agentID'];
$agentName = $_POST['agentName'];
if(is_uploaded_file($_FILES['agentPhoto']['tmp_name'])){
$agentPhoto = addslashes(file_get_contents($_FILES['agentPhoto']['tmp_name'])); 
$agentEmail = $_POST['agentEmail'];
$agentAge = $_POST['agentAge'];
$agentPhone = $_POST['agentPhone'];
$agentGender = $_POST['agentGender'];
$agentDOB = $_POST['agentDOB'];
$agentLocation = $_POST['agentLocation'];

$query = "UPDATE agent SET agentName='$agentName',agentPhoto='$agentPhoto', agentEmail='$agentEmail', agentAge='$agentAge', agentPhone='$agentPhone', agentGender='$agentGender', agentDOB='$agentDOB', agentLocation='$agentLocation' WHERE agentID='{$agentID}'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:agentinfo.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }
}
else{
$agentEmail = $_POST['agentEmail'];
$agentAge = $_POST['agentAge'];
$agentPhone = $_POST['agentPhone'];
$agentGender = $_POST['agentGender'];
$agentDOB = $_POST['agentDOB'];
$agentLocation = $_POST['agentLocation'];

$query = "UPDATE agent SET agentName='$agentName', agentEmail='$agentEmail', agentAge='$agentAge', agentPhone='$agentPhone', agentGender='$agentGender', agentDOB='$agentDOB', agentLocation='$agentLocation' WHERE agentID='{$agentID}'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:agentinfo.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }
}
?>
