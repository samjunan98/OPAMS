<?php
include('config.php');
//setting header to json
header('Content-Type: application/json');
//query to get data from the table
$query = sprintf("SELECT category.categoryName AS cat, count(*) AS amountP FROM category INNER JOIN product ON category.categoryID = product.categoryID WHERE product.productDelete = 0 and category.categoryDelete = 0 GROUP BY category.categoryID");
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
