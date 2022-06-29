<?php
session_start();
include('config.php');
ob_start(); //turn on output buffering
//query to get data from the table
$joinYear = date("Y");
$query = sprintf("SELECT count(*) AS agentno,MONTH(agentCreatedate) AS joinMonth FROM agent WHERE YEAR(agentCreatedate) = '$joinYear' GROUP BY MONTH(agentCreatedate)");

//execute query
$result = $db->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $row['joinMonth'] = date("F", mktime(0, 0, 0,$row['joinMonth'] , 10));
  $data[] = $row;
}

//free memory associated with result
$result->close();
//setting header to json
header('Content-Type: application/json');
print json_encode($data);
