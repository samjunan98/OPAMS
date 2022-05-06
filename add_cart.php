
<?php
include('config.php');
if(isset($_POST['add_to_cart'])){
   
   $productID = $_POST['productID'];
   $product_price = $_POST['product_price'];
   $product_quantity = $_POST['product_quantity'];
   $sub_total = ($product_price * $product_quantity);

   $select_cart = mysqli_query($db, "SELECT * FROM cart WHERE name = '$productID' AND agentID = '$agentID'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($db, "INSERT INTO cart(agentID) VALUES('$agentID')") or die('query failed');
      mysqli_query($db, "INSERT INTO cart_product(cart_productID, cartID, productID, quantity, subtotal) VALUES('0', '$cartID', '$productID', '$quantity', '$sub_total')") or die('query failed');
      $message[] = 'product added to cart!';
   }
}
?>