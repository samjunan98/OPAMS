
<?php
session_start();
include('config.php');
$agentID = $_SESSION['agentID'];
$agentName = $_POST['agentName'];
$agentEmail = $_POST['agentEmail'];
$agentAge = $_POST['agentAge'];
$agentPhone = $_POST['agentPhone'];
$agentGender = $_POST['agentGender'];
$agentDOB = $_POST['agentDOB'];
$agentLocation = $_POST['agentLocation'];
$querychk = "SELECT * FROM agent WHERE agentEmail='$agentEmail' AND agentID!='$agentID'";
$result1 = mysqli_query($db, $querychk) or die('Error querying database. ' .  mysqli_error($db));
if(mysqli_num_rows($result1)==0){
if(is_uploaded_file($_FILES['agentPhoto']['tmp_name'])){
$agentPhoto = addslashes(file_get_contents($_FILES['agentPhoto']['tmp_name'])); 
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
$query = "UPDATE agent SET agentName='$agentName', agentEmail='$agentEmail', agentAge='$agentAge', agentPhone='$agentPhone', agentGender='$agentGender', agentDOB='$agentDOB', agentLocation='$agentLocation' WHERE agentID='{$agentID}'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:agentinfo.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }
}
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Email is registered");';
    echo 'window.location.href = "agentinfoedit.php";';
    echo '</script>';
}
?>
