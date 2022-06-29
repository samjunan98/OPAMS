<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];
  $query = "SELECT adminPhoto FROM admin WHERE '$adminID' = adminID";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  mysqli_close($db);

  header("Content-type: https://petshopagentmanagementsystem.herokuapp.com/image/jpeg");
  echo $row['adminPhoto'];
?>