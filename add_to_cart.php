<?php
session_start();
include("config.php");
$productID = $_GET['productID'];
$quantity_new = $_POST['quantity'];
$agentID = $_SESSION['agentID'];
$cartID = $_SESSION['agentID'];
$query = "SELECT * FROM product WHERE productID='$productID'";
$result1 = mysqli_query($db, $query) or die('Error querying database. ' .  mysqli_error($db));
$row1 = mysqli_fetch_array($result1);
$subtotal = $row1['productPrice'];
$productQuantity = $row1['productQuantity'];
$query3 = "SELECT * FROM cart WHERE agentID='$agentID'";
$result = mysqli_query($db, $query3) or die('Error querying database. ' .  mysqli_error($db));
if (mysqli_num_rows($result) > 0) {
    $check = "SELECT * FROM cart_product WHERE productID='$productID' AND cartID='$cartID'";
    $result2 = mysqli_query($db, $check) or die('Error querying database. ' .  mysqli_error($db));
    if (mysqli_num_rows($result2) > 0) {
        $row = mysqli_fetch_array($result2);
        $quantity_old = $row['quantity'];
        $cart_productID = $row['cart_productID'];
        $quantity_chk = $quantity_old+$quantity_new;
        if ($quantity_chk > $productQuantity) {
            echo '<script type="text/javascript">';
            echo 'alert("Maximum Quantity Added to Cart");';
            echo 'window.location.href = "product.php";';
            echo '</script>';
        } else {
            $quantity_new += $quantity_old;
            $subtotal_new = $subtotal * $quantity_new;
            mysqli_query($db, "UPDATE cart_product SET quantity='$quantity_new', subtotal='$subtotal_new' WHERE cart_productID='{$cart_productID}'");
            $grandtotal = "0";
            $r4 = mysqli_query($db, "SELECT * FROM cart_product WHERE cartID='$cartID'");
            while($row = mysqli_fetch_array($r4)){
                $grandtotal += $row['subtotal'];
                }
            mysqli_query($db, "UPDATE cart SET grandtotal='$grandtotal' WHERE agentID='{$agentID}'");
            header("location: product.php");
        }
    } else {
        if ($quantity_new > $productQuantity) {
            echo '<script type="text/javascript">';
            echo 'alert("Maximum Quantity Added to Cart");';
            echo 'window.location.href = "product.php";';
            echo '</script>';
        } else {
            $subtotal_new = $subtotal * $quantity_new;
            $query2 = "INSERT into cart_product(cart_productID,cartID,productID,quantity,subtotal ) values ('0','$cartID','$productID','$quantity_new','$subtotal_new') ";
            if ($db->query($query2) == TRUE) {
                mysqli_query($db, "SELECT * FROM cart WHERE agentID='$agentID'");
            } else {
                echo "fail" . $db->error;
            }
            $grandtotal = "0";
            $r4 = mysqli_query($db, "SELECT * FROM cart_product WHERE cartID='$cartID'");
            while($row = mysqli_fetch_array($r4)){
            $grandtotal += $row['subtotal'];
            }
            mysqli_query($db, "UPDATE cart SET grandtotal='$grandtotal' WHERE agentID='{$agentID}'");
            header("location: product.php");
        }
    }
} else {
    echo "ERROR";
}
