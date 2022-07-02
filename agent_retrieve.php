<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];
$agentID = $_GET['agentID'];
$query = "UPDATE agent SET agentDelete = 0 WHERE agentID='$agentID'";
$rs = mysqli_query($db, $query);
if($rs){ 
    header('location:agentlist_test.php');
    }
else {
    echo " <script> alert('ERROR') </script> ";
 }