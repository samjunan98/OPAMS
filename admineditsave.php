
<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];
$adminName = $_POST['adminName'];
$adminEmail = $_POST['adminEmail'];
$querychk = "SELECT * FROM admin WHERE adminEmail='$agentEmail' AND adminID!='$adminID'";
$result1 = mysqli_query($db, $querychk) or die('Error querying database. ' .  mysqli_error($db));
if(mysqli_num_rows($result1)==0){
if(is_uploaded_file($_FILES['adminPhoto']['tmp_name'])){
$adminPhoto = addslashes(file_get_contents($_FILES['adminPhoto']['tmp_name'])); 
$query = "UPDATE admin SET adminName='$adminName',adminPhoto='$adminPhoto', adminEmail='$adminEmail' WHERE adminID='$adminID'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:info.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }
}
else{
$query = "UPDATE admin SET adminName='$adminName', adminEmail='$adminEmail' WHERE adminID='$adminID'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:info.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }
}
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Email is registered");';
    echo 'window.location.href = "admininfoedit.php";';
    echo '</script>';
}
?>
