
<?php
	include('config.php');
	$productID=$_GET['productID'];
	$productName=$_POST['productName'];
	$productPhoto=$_POST['productPhoto'];
    $productQuantity=$_POST['productQuantity'];
	$productDesc=$_POST['productDesc'];
	$productSKU=$_POST['productSKU'];
 
	mysqli_query($db,"UPDATE product SET productName='$productName', productPhoto='$productPhoto', productQuantity='$productQuantity', productDesc='$productDesc', productSKU='$productSKU' WHERE productID='{$productID}'");
    header('location:product_edit.php');
?>