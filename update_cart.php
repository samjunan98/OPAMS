<?php
session_start();
include("config.php");
$productID = $_POST['productID'];
$cart_quantity = $_POST['cart_quantity'];
$agentID = $_SESSION['agentID'];
$cartID = $_SESSION['agentID'];

foreach (array_combine($_POST['productID'], $_POST['cart_quantity']) as $productID => $cart_quantity) {

    $query = "SELECT * FROM product WHERE productID='$productID'";
    $result1 = mysqli_query($db, $query) or die('Error querying database. ' .  mysqli_error($db));
    while ($row = mysqli_fetch_array($result1)) {
        $subtotal = $row['productPrice'];
        $productQuantity = $row['productQuantity'];
    }
    $query3 = "SELECT * FROM cart WHERE agentID='$agentID'";
    $result = mysqli_query($db, $query3) or die('Error querying database. ' .  mysqli_error($db));
    if (mysqli_num_rows($result) > 0) {
        $check = "SELECT * FROM cart_product WHERE productID='$productID' AND cartID='$cartID'";
        $result2 = mysqli_query($db, $check) or die('Error querying database. ' .  mysqli_error($db));
        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_array($result2)) {
                $cart_productID = $row['cart_productID'];
            }
            if ($cart_quantity > $productQuantity) {
                echo '<script type="text/javascript">';
                echo 'alert("Maximum Quantity Reached");';
                echo 'window.location.href = "product.php";';
                echo '</script>';
                exit();
            } else {
                $quantity_new = $cart_quantity;
                $subtotal_new = $subtotal * $quantity_new;
                mysqli_query($db, "UPDATE cart_product SET quantity='$quantity_new', subtotal='$subtotal_new' WHERE cart_productID='{$cart_productID}'");
            }
        } else {
            $query2 = "INSERT into cart_product(cart_productID,cartID,productID,quantity,subtotal ) values ('0','$cartID','$productID','$quantity_new','$subtotal') ";
            if ($db->query($query2) == TRUE) {
                mysqli_query($db, "SELECT * FROM cart WHERE agentID='$agentID'");
            } else {
                echo "fail" . $db->error;
            }
        }
        $grandtotal = "0";
        $r4 = mysqli_query($db, "SELECT * FROM cart_product WHERE cartID='$cartID'");
        while ($row = mysqli_fetch_array($r4)) {
            $grandtotal += $row['subtotal'];
            header('location:cart.php');
        }
        mysqli_query($db, "UPDATE cart SET grandtotal='$grandtotal' WHERE agentID='{$agentID}'");
        echo "RM" . $grandtotal;
    } else {
        $query2 = "INSERT into cart(agentID,grandtotal) values ('$agentID','0')";
        if ($db->query($query2) == TRUE) {
            header("location: product.php");
        } else {
            echo "fail" . $db->error;
        }
    }
}
