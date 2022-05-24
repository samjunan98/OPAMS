<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];
$pickupLocation = mysqli_real_escape_string($db, $_POST['pickupLocation']);
if(isset($_POST['submit']) && isset($_POST['pickupLocation'])){
    $orderID = $_GET['orderID'];
    $deliveryName = mysqli_real_escape_string($db, $_POST['deliveryName']);
    $deliveryPhone = mysqli_real_escape_string($db, $_POST['deliveryPhone']);
    $query = "UPDATE delivery SET deliveryName = '$deliveryName',deliveryPhone = '$deliveryPhone',pickupLocation = '$pickupLocation' WHERE orderID = '$orderID' ";
    $rs = mysqli_query($db, $query);
    if($rs){ 
        $orderStatus = "Completed";
        mysqli_query($db, "UPDATE orderlist SET orderStatus = '$orderStatus', orderCompletedate = now() WHERE orderID = '$orderID'") or die('Error querying database. ' .  mysqli_error($db));
            header('location:admin_order.php');
            }
    else {
            echo  mysqli_error($db);
         }
}
else{
    $orderID = $_GET['orderID'];
    $deliveryName = mysqli_real_escape_string($db, $_POST['deliveryName']);
    $deliveryPhone = mysqli_real_escape_string($db, $_POST['deliveryPhone']);
    $deliveryCourier = mysqli_real_escape_string($db, $_POST['deliveryCourier']);
    $deliveryAddress = mysqli_real_escape_string($db, $_POST['deliveryAddress']);
    $query = "UPDATE delivery SET deliveryName = '$deliveryName',deliveryPhone = '$deliveryPhone',deliveryCourier = '$deliveryCourier',deliveryAddress='$deliveryAddress' WHERE orderID = '$orderID' ";
    $rs = mysqli_query($db, $query);
    if($rs){ 
        $orderStatus = "Completed";
        mysqli_query($db, "UPDATE orderlist SET orderStatus = '$orderStatus', orderCompletedate = now() WHERE orderID = '$orderID'") or die('Error querying database. ' .  mysqli_error($db));
            header('location:admin_order.php');
            }
    else {
            echo  mysqli_error($db);
         }
}
