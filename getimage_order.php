<?php
    session_start();
    include("config.php");
  $productID = $_GET['productID'];
  $query = "SELECT productPhoto FROM product WHERE '$productID' = productID";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  mysqli_close($db);
  ob_clean();
  header("Content-type: image/jpeg");
  echo $row['productPhoto'];
?>