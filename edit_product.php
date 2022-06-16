
<?php
session_start();
include('config.php');

if (isset($_POST['edit_product'])) {
	$productID = $_GET['productID'];
	$categoryID = mysqli_real_escape_string($db, $_POST['categoryID']);
	$productName = mysqli_real_escape_string($db, $_POST['productName']);
	$productPhoto = mysqli_real_escape_string($db, $_POST['productPhoto']);
	$productQuantity = mysqli_real_escape_string($db, $_POST['productQuantity']);
	$productPrice = mysqli_real_escape_string($db, $_POST['productPrice']);
	$productDesc = mysqli_real_escape_string($db, $_POST['productDesc']);
	$productSKU = mysqli_real_escape_string($db, $_POST['productSKU']);
	if(is_uploaded_file($_FILES['productPhoto']['tmp_name'])){
	$productPhoto = addslashes(file_get_contents($_FILES['productPhoto']['tmp_name']));
	$user_check_query = "SELECT * FROM product WHERE productSKU='$productSKU' AND productID != '$productID'";
        $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
        if(mysqli_num_rows($result)>0)
        {echo " <script> alert('SKU Existed') </script> ";}
        else{
	mysqli_query($db, "UPDATE product SET categoryID='$categoryID', productName='$productName', productPhoto='$productPhoto', productPrice='$productPrice', productQuantity='$productQuantity', productDesc='$productDesc', productSKU='$productSKU' WHERE productID='{$productID}'");
	$_SESSION['editpsuccess'] = 'Yes';
	header('location:product_edit.php');
}
}
else{
	$user_check_query = "SELECT * FROM product WHERE productSKU='$productSKU' AND productID != '$productID'";
        $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
        if(mysqli_num_rows($result)>0)
        {echo " <script> alert('SKU Existed') </script> ";}
        else{
	mysqli_query($db, "UPDATE product SET categoryID='$categoryID', productName='$productName', productQuantity='$productQuantity', productPrice='$productPrice', productDesc='$productDesc', productSKU='$productSKU' WHERE productID='{$productID}'");
	$_SESSION['editpsuccess'] = 'Yes';
	header('location:product_edit.php');
}
}
}


