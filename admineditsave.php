
<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];
$adminName = $_POST['adminName'];
if(is_uploaded_file($_FILES['adminPhoto']['tmp_name'])){
$adminPhoto = addslashes(file_get_contents($_FILES['adminPhoto']['tmp_name'])); 
$adminEmail = $_POST['adminEmail'];
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
$adminEmail = $_POST['adminEmail'];
$query = "UPDATE admin SET adminName='$adminName', adminEmail='$adminEmail' WHERE adminID='$adminID'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:info.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }
}
?>
