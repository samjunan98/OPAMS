<?php
include('config.php');
//setting header to json
header('Content-Type: application/json');
//query to get data from the table
$query = sprintf("SELECT orderOption, count(*) AS orderAmount FROM orderlist GROUP BY orderOption");
//execute query
$result = $db->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

print json_encode($data);
