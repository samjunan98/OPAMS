<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/register.css" rel="stylesheet">
   <title>Product Adding</title> 
</head>
<body>
<div class="center"> 
      <h1> Add Product</h1>
      <form method="POST" action="product_store.php" enctype="multipart/form-data">
                <div class="forminput-DOB">
                <label>Photo:</label>
                  <input type="file" class="form-control" name="productPhoto" required>
               </div>
               <div class="forminput">
                  <label>Name:</label>
                  <input type="text" class="form-control" name="productName" required>
               </div>

               <div class="forminput">
                  <label>Quantity:</label>
                  <input type="number" class="form-control" name="productQuantity" required>
               </div>
               <div class="forminput">
                  <label>Description:</label>
                  <input type="text" class="form-control" name="productDesc">
               </div>
               <div class="forminput">
                  <label>SKU:</label>
                  <input type="text" class="form-control"name="productSKU" required>
               </div>
               <div class="forminput-DOB">
                  <label>Product Category:</label>
                    <?php
                    include("config.php");
                    $query = "SELECT * FROM category";
                    $result1= mysqli_query($db, $query);
                    ?>
                    <select name="categoryID" required>
                    <option disabled selected value> -- select an option -- </option>
                    <?php while($row1= mysqli_fetch_array($result1)):;?>
                    <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                    <?php endwhile;?>
                    </select>
                    </div>
               <div class="btn">
                  <input type="submit" value="Add" name="add_product">
               </div>
            </form>
    </div>
</html>

