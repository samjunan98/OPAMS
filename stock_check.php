<?php
session_start();
date_default_timezone_set("Asia/Singapore");
include("config.php");
$agentID = $_SESSION['agentID'];
$cartID = $_SESSION['agentID'];
$_SESSION['checkout'] = "YES";


$query = "SELECT * FROM cart_product WHERE cartID='$agentID'";
$result = mysqli_query($db, $query) or die('Error querying database. ' .  mysqli_error($db));
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $quantity = $row['quantity'];
        $productID = $row['productID'];
        $query2 = "SELECT * FROM product WHERE productID='$productID'";
        $result2 = mysqli_query($db, $query2) or die('Error querying database. ' .  mysqli_error($db));
        $row = mysqli_fetch_array($result2);
        $productQuantity = $row['productQuantity'];
        $datenow = date("Y-m-d H:i:s");
        if ($productQuantity >= $quantity) {
            $quantity_new = $productQuantity - $quantity;
            mysqli_query($db, "UPDATE product SET productQuantity='$quantity_new'WHERE productID='{$productID}'") or die('Error querying database. ' .  mysqli_error($db));
            mysqli_query($db, "INSERT into reserved_product(cartID,productID,reserved_productQuantity,reserved_productTime) values ('$cartID','$productID','$quantity','$datenow')");
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Product Quantity Exceeded Product Stock ");';
            echo 'window.location.href = "cart.php";';
            echo '</script>';
            exit();
        }
    }
    
    header("location:checkout.php");
}
else echo "error" .   mysqli_error($db);
