<?php

$result= mysqli_query($db, "SELECT * FROM reserved_product");
while ($row = mysqli_fetch_array($result)) {
$datetime_2 = $row['reserved_productTime'];
$from_time = strtotime($datetime_2); 
$start_datetime = new DateTime('now');
$start_datetime->setTimezone(new DateTimeZone('Asia/Kuala_Lumpur'));
$now = $start_datetime->format('Y-m-d H:i:s');
$to = strtotime($now); 
$diff_minutes = round(abs($from_time - $to) / 60,2);
if ($diff_minutes >= 15) {
    $quantity = $row['reserved_productQuantity'];
    $productID = $row['productID'];
    $rsid =  $row['reserved_productID'];
    $query2 = "SELECT * FROM product WHERE productID='$productID'";
    $result2 = mysqli_query($db, $query2) or die('Error querying database. ' .  mysqli_error($db));
    $row1 = mysqli_fetch_array($result2);
    $productQuantity = $row1['productQuantity'];
    $quantity_new = $productQuantity + $quantity;
    mysqli_query($db, "UPDATE product SET productQuantity='$quantity_new'WHERE productID='{$productID}'") or die('Error querying database. ' .  mysqli_error($db));
        mysqli_query($db, "DELETE FROM reserved_product WHERE reserved_productID= '$rsid'") or die('Error querying database. ' .  mysqli_error($db));
}
}

?>