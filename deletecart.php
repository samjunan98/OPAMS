<?php
session_start();
include('config.php');
$productID = $_GET['productID'];
$agentID = $_SESSION['agentID'];
$cartID = $_SESSION['agentID'];
$sqlquery = "DELETE FROM cart_product WHERE productID='{$productID}' AND cartID='{$agentID}'";
mysqli_query($db, $sqlquery);
$grandtotal = "0";
$r4 = mysqli_query($db, "SELECT * FROM cart_product WHERE cartID='$cartID'");
if (mysqli_num_rows($r4 ) > 0)
{
while ($row = mysqli_fetch_array($r4)) {
    $grandtotal += $row['subtotal'];
    mysqli_query($db, "UPDATE cart SET grandtotal='$grandtotal' WHERE agentID='{$agentID}'");
    echo "RM" . $grandtotal;
    header('location:cart.php');
}
}
else
{
    mysqli_query($db, "UPDATE cart SET grandtotal='$grandtotal' WHERE agentID='{$agentID}'");
    echo "RM" . $grandtotal;
    header('location:cart.php');
}

