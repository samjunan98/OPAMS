<?php
session_start();
include('config.php');
$adminID = $_SESSION['adminID'];

if(isset($_POST['add_category'])){
    $categoryID = mysqli_real_escape_string($db, $_POST['categoryID']);
    $categoryName = mysqli_real_escape_string($db, $_POST['categoryName']);
    $user_check_query = "SELECT * FROM category WHERE categoryName='$categoryName'";
    $result = mysqli_query($db, $user_check_query) or die('Error querying database.');
    if(mysqli_num_rows($result)>0)
    { echo '<script type="text/javascript">';
        echo 'alert("Category Existed");';
        echo 'window.location.href = "category_admin.php";';
        echo '</script>';}
    else{
    $query = "INSERT INTO category(categoryID, categoryName) VALUES ('0', '$categoryName')";
    $rs = mysqli_query($db, $query);
    if($rs){ 
        $_SESSION['catsuccess'] = 'Yes';
            header('location:category_admin.php');
            }
    else {
            echo  mysqli_error($db);
         }
    }
}
else{
    echo "Error";
}

?>