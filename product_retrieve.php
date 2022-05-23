<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];
$productID = $_GET['productID'];
$query = "UPDATE product SET productDelete = 0 WHERE productID='$productID'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:product_edit.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }