<?php
session_start();
include('config.php');
$agentID = $_SESSION['agentID'];
//setting header to json
header('Content-Type: application/json');
//query to get data from the table
$query = sprintf("SELECT salesGenerated, salesMonth FROM salesreport WHERE '$agentID'= agentID ORDER BY salesMonth");

//execute query
$result = $db->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $row['salesMonth'] = date("F", mktime(0, 0, 0,$row['salesMonth'] , 10));
  $data[] = $row;
}
//free memory associated with result
$result->close();

print json_encode($data);
