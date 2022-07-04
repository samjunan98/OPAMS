<?php
session_start();
include("config.php");
date_default_timezone_set("Asia/Singapore");
if (isset($_POST['add_product'])) {
        $categoryID = mysqli_real_escape_string($db, $_POST['categoryID']);
        $productName = mysqli_real_escape_string($db, $_POST['productName']);
        $productQuantity = mysqli_real_escape_string($db, $_POST['productQuantity']);
        $productPrice = mysqli_real_escape_string($db, $_POST['productPrice']);
        $productDesc = mysqli_real_escape_string($db, $_POST['productDesc']);
        $productSKU = mysqli_real_escape_string($db, $_POST['productSKU']);
        $adminID = $_SESSION['adminID'];
        $datenow = date("Y-m-d H:i:s");
        if (is_uploaded_file($_FILES['productPhoto']['tmp_name'])) {
                $productPhoto = addslashes(file_get_contents($_FILES['productPhoto']['tmp_name']));
                $user_check_query = "SELECT * FROM product WHERE productSKU='$productSKU'";
                $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
                if (mysqli_num_rows($result) > 0) {
                        echo '<script type="text/javascript">';
                        echo 'alert("SKU EXISTED");';
                        echo 'window.location.href = "javascript:history.go(-1)";';
                        echo '</script>';
                } else {
                        $query = "INSERT INTO product(productID, adminID, categoryID, productName, productPhoto, productQuantity, productPrice, productDesc, productSKU, productCreatedate) VALUES ('0', '$adminID', '$categoryID', '$productName', '$productPhoto', '$productQuantity', '$productPrice' ,'$productDesc' ,'$productSKU', $datenow())";
                        $rs = mysqli_query($db, $query);
                        if ($rs) {
                                $_SESSION['addpsuccess'] = 'Yes';
                                header('location: product_edit.php');
                        } else {
                                echo  mysqli_error($db);
                        }
                }
        } else {
                $productPhoto = addslashes(file_get_contents('images/product.png'));
                $user_check_query = "SELECT * FROM product WHERE productSKU='$productSKU'";
                $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
                if (mysqli_num_rows($result) > 0) {
                        echo '<script type="text/javascript">';
                        echo 'alert("SKU EXISTED");';
                        echo 'window.location.href = "javascript:history.go(-1)";';
                        echo '</script>';
                } else {
                        $query = "INSERT INTO product(productID, adminID, categoryID, productName, productPhoto, productQuantity, productPrice, productDesc, productSKU, productCreatedate) VALUES ('0', '$adminID', '$categoryID', '$productName', '$productPhoto', '$productQuantity', '$productPrice' ,'$productDesc' ,'$productSKU', '$datenow')";
                        $rs = mysqli_query($db, $query);
                        if ($rs) {
                                $_SESSION['addpsuccess'] = 'Yes';
                                header('location: product_edit.php');
                        } else {
                                echo  mysqli_error($db);
                        }
                }
        }
} else {
        echo "Error";
}
mysqli_close($db);
