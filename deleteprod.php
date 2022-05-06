<?php
	$productID=$_GET['productID'];
	include('config.php');
	$sqlquery = "DELETE FROM product WHERE productID='{$productID}'";
	mysqli_query($db,$sqlquery);
	header('location:product_edit.php');
?>