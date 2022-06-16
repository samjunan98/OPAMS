<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];
$categoryID = $_GET['categoryID'];
$query = "UPDATE category SET categoryDelete = 1 WHERE categoryID='$categoryID'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:category_admin.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }