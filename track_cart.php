<?php
$cartID=$_SESSION['agentID'];$check="SELECT * FROM cart_product WHERE cartID='$cartID'";
if ($result = mysqli_query($db, $check)) {
 $rowcount = mysqli_num_rows( $result );} echo $rowcount;
?>