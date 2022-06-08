<?php
session_start();
include("config.php");
$orderOption = $_POST['orderOption'];
if (empty($_POST['deliveryAddress'])) {
    $deliveryAddress = "NULL";
} else {
    $deliveryAddress = $_POST['deliveryAddress'];
}
$deliveryPhone = $_POST['deliveryPhone'];
$deliveryName = $_POST['deliveryName'];
if (empty($_POST['pickupLocation'])) {
    $pickupLocation = "NULL";
} else {
    $pickupLocation = $_POST['pickupLocation'];
}
$deliveryName = $_POST['deliveryName'];
$agentID = $_SESSION['agentID'];
$cartID = $_SESSION['agentID'];

$query7 = "SELECT * FROM cart WHERE agentID='$agentID'";
$result7 = mysqli_query($db, $query7) or die('Error querying database. ' .  mysqli_error($db));
while ($row = mysqli_fetch_array($result7)) {
    $grandtotal = $row['grandtotal'];
}
$query = "INSERT into orderlist(orderID,agentID, orderOption, orderStatus, orderCreatedate, orderGrandtotal) VALUES ('0','$agentID','$orderOption','Pending',now(),'$grandtotal') ";
$rs = mysqli_query($db, $query);
if ($rs) {
    $query2 = "SELECT * FROM cart_product WHERE cartID='$cartID'";
    $result2 = mysqli_query($db, $query2) or die('Error querying database. ' .  mysqli_error($db));
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_array($result2)) {
            $cart_productID = $row['cart_productID'];
        }
        $query4 = "SELECT * FROM orderlist WHERE agentID='$agentID' ORDER BY orderID DESC LIMIT 1";
        $result4 = mysqli_query($db, $query4) or die('Error querying database. ' .  mysqli_error($db));
        while ($row = mysqli_fetch_array($result4)) {
            $orderID = $row['orderID'];
        }
        $query3 = "INSERT into delivery(deliveryID,orderID,deliveryName,pickupLocation,deliveryPhone,deliveryAddress) values ('0', '$orderID','$deliveryName','$pickupLocation','$deliveryPhone','$deliveryAddress') ";
        if ($db->query($query3) == TRUE) {
            $salesMonth = date("m");
            $salesYear = date("Y");
            $salesGenerated_new = $grandtotal;
            $query6 = "SELECT * FROM salesreport WHERE agentID='$agentID' AND salesMonth='$salesMonth' AND salesYear='$salesYear' ";
            $result6 = mysqli_query($db, $query6) or die('Error querying database. ' .  mysqli_error($db));
            if (mysqli_num_rows($result6) > 0) {
                $row = mysqli_fetch_array($result6);
                $salesGenerated_old = $row['salesGenerated'];
                echo $salesGenerated_old;
                $salesGenerated_new += $salesGenerated_old;
                echo $salesGenerated_new;
                $salesCommission = $salesGenerated_new * 0.1;
                $query5 = "UPDATE salesreport SET salesGenerated = '$salesGenerated_new', salesCommission = '$salesCommission' WHERE agentID ='$agentID' AND salesMonth='$salesMonth' AND salesYear='$salesYear' ";
                mysqli_query($db, $query5);
            } else {
                $salesMonth = date("m");
                $salesYear = date("Y");
                $salesGenerated_old = "0";
                $salesGenerated_new += $salesGenerated_old;
                $salesCommission = $salesGenerated_new * 0.1;
                $query5 = "INSERT into salesreport(salesreportID, agentID, salesMonth, salesYear, salesGenerated, salesCommission) values ('0','$agentID', '$salesMonth', '$salesYear', '$salesGenerated_new', '$salesCommission') ";
                mysqli_query($db, $query5);
            }
            $query_ext = mysqli_query($db, "SELECT * FROM cart_product WHERE cartID='$agentID'");
            while ($row =  mysqli_fetch_array($query_ext)) {
                $productID = $row['productID'];
                $order_productQuantity = $row['quantity'];
                $order_productSubtotal = $row['subtotal'];
                $query10 = "INSERT INTO order_product(order_productID,orderID,productID,order_productQuantity,order_productSubtotal) VALUES ('0','$orderID', '$productID','$order_productQuantity','$order_productSubtotal')";
                mysqli_query($db, $query10);
            }

            $sqlquery2 = "DELETE FROM cart_product WHERE cartID='{$agentID}'";
            mysqli_query($db, $sqlquery2);
            $sqlquery3 = "UPDATE cart SET grandtotal = $grandtotal WHERE agentID ='{$agentID}'";
            mysqli_query($db, $sqlquery3);
            mysqli_query($db, "DELETE FROM reserved_product WHERE cartID= '$agentID'") or die('Error querying database. ' .  mysqli_error($db));
            header("location:order_complete.php");
            
        } else {
            echo "cart not found" . mysqli_error($db);
        }
    } else {
        echo "Error1" . mysqli_error($db);
    }
} else {
    echo "Error2" . mysqli_error($db);
}
