<?php
session_start();
include("config.php");

   if(isset($_POST['add_product'])){

        $productPhoto = addslashes(file_get_contents($_FILES['productPhoto']['tmp_name']));  
        $categoryID = mysqli_real_escape_string($db, $_POST['categoryID']);
        $productName = mysqli_real_escape_string($db, $_POST['productName']);
        $productQuantity = mysqli_real_escape_string($db, $_POST['productQuantity']);
        $productPrice = mysqli_real_escape_string($db, $_POST['productPrice']);
        $productDesc = mysqli_real_escape_string($db, $_POST['productDesc']);
        $productSKU = mysqli_real_escape_string($db, $_POST['productSKU']);
        $adminID = $_SESSION['adminID'];


        $user_check_query = "SELECT * FROM product WHERE productSKU='$productSKU'";
        $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
        if(mysqli_num_rows($result)>0)
        {echo " <script> alert('SKU Existed') </script> ";}
        else{
        $query = "INSERT INTO product(productID, adminID, categoryID, productName, productPhoto, productQuantity, productPrice, productDesc, productSKU, productCreatedate) VALUES ('0', '$adminID', '$categoryID', '$productName', '$productPhoto', '$productQuantity', '$productPrice' ,'$productDesc' ,'$productSKU', now())";
        $rs = mysqli_query($db, $query);
        if($rs){ 
                $_SESSION['addpsuccess'] = 'Yes';
                header('location: product_edit.php');
                }
        else {
                echo  mysqli_error($db);
             }
        }
}
else{
        echo "Error";
}
mysqli_close($db);
?>