<?php
    session_start();
    include("config.php");
  $agentID = $_GET['agentID'];
  $query = "SELECT agentPhoto FROM agent WHERE '$agentID' = agentID";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  mysqli_close($db);

  header("Content-type: image/jpeg");
  echo $row['agentPhoto'];
?>