<?php
session_start();
include("config.php");
$agentID = $_SESSION['agentID'];
$cartID = $_SESSION['agentID'];


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
        if ($productQuantity >= $quantity) {
            $quantity_new = $productQuantity - $quantity;
            mysqli_query($db, "UPDATE product SET productQuantity='$quantity_new'WHERE productID='{$productID}'") or die('Error querying database. ' .  mysqli_error($db));
        } else {
            $dltcart = "DELETE FROM agent WHERE productID='{$productID}'";
	        mysqli_query($db,$dltcart);
            echo '<script type="text/javascript">';
            echo 'alert("There is Product Out of Stock in cart ");';
            echo 'window.location.href = "cart.php";';
            echo '</script>';
            exit();
        }
    }
    
    header("location:checkout.php");
}
