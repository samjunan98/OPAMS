<?php
    $productID=$_GET['productID'];
    include('config.php');
	$query=mysqli_query($db,"SELECT * FROM product WHERE productID='$productID'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/register.css" rel="stylesheet">
   <title>Product Edit</title> 
</head>
<body>
<div class="center"> 
      <h1> Update</h1>
      <form method="POST" action="edit_product.php?agentID=<?php echo $productID; ?>">
                <div class="forminput-DOB">
                <label>Photo:</label>
                <?php echo '<img src="data:image;base64,'.base64_encode($row['productPhoto']).'"alt="Image" style="width: 100px; height:100px;">';?>
                  <input type="file" class="form-control" name="productPhoto">
               </div>
               <div class="forminput">
                  <label>ID:</label>
                  <input type="number" class="form-control" value="<?php echo $row['productID']; ?>" name="productID" disabled>
               </div>
               <div class="forminput">
                  <label>Name:</label>
                  <input type="text" class="form-control" value="<?php echo $row['productName']; ?>" name="productName">
               </div>

               <div class="forminput">
                  <label>Quantity:</label>
                  <input type="number" class="form-control" value="<?php echo $row['productQuantity']; ?>" name="productQuantity">
               </div>
               <div class="forminput">
                  <label>Description::</label>
                  <input type="text" class="form-control" value="<?php echo $row['productDesc']; ?>" name="productDesc">
               </div>
               <div class="forminput">
                  <label>SKU:</label>
                  <input type="text" class="form-control" value="<?php echo $row['productSKU']; ?>" name="productSKU">
               </div>
               <div class="forminput-DOB">
                  <label>Product Category:</label>
                    <?php
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
                  <input type="submit" value="Update">
               </div>
            </form>
    </div>
</html>

