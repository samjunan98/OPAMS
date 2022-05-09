<?php
include('config.php');
session_start();
$adminID = $_SESSION['adminID'];
$adminSessionid = $_SESSION['adminSessionid'];
if ($_SESSION["adminID"] == NULL) {
   header("location: index.html");
} else {
   $checkk = "SELECT * FROM admin WHERE adminID='$adminID'";
   $resultt = mysqli_query($db, $checkk) or die('Error querying database. ' .  mysqli_error($db));
   foreach ($resultt as $row) {
      if ($_SESSION['adminSessionid'] != $row['adminSessionid']) {
         echo '<script type="text/javascript">';
         echo 'alert("New login is detected");';
         echo 'window.location.href = "index.html";';
         echo '</script>';
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>AdminLTE 3 | Widgets</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free-6.1.1-web/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
   <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <!-- Left navbar links -->
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
         <!-- Brand Logo -->
         <a href="index3.html" class="brand-link">
            <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Petshop</span>
         </a>
         <!-- Sidebar -->
         <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                  <img src="" class="img-circle elevation-2" alt="User Image" style="width: 40px; height:40px;">
               </div>
               <div class="info">
                  <?php $adminID = $_SESSION['adminID'];
                  $query = "SELECT adminName FROM admin WHERE '$adminID' = adminID";
                  $query_run = mysqli_query($db, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                     foreach ($query_run as $row) { ?>
                        <a href="#" class="d-block"><?php echo $row['adminName']; ?></a>
                  <?php }
                  } else {
                     echo "error";
                  } ?>
               </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                     <a href="main_admin.php" class="nav-link active">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                           Home
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="agentlist.php" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                           Agent
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="agentlist.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>View Agent List</p>
                           </a>
                        </li>
                     </ul>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="agentlist.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Modify Agent</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  </li>
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <p>
                           Product
                           <i class="right fas fa-angle-left"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="product_edit.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>View Product List</p>
                           </a>
                        </li>
                     </ul>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="add_product.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add Product</p>
                           </a>
                        </li>
                     </ul>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="product_edit.php" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Manage Category</p>
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li class="nav-item">
                     <a href="agentlist.php" class="nav-link">
                        <i class="nav-icon fa fa-check-square"></i>
                        <p>
                           Order
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="agentlist.php" class="nav-link">
                        <i class="nav-icon ion ion-stats-bars"></i>
                        <p>
                           Sales Report
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="info.php" class="nav-link">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <p>
                           Info
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="logout.php" class="nav-link">
                        <i class="nav-icon ion ion-log-out"></i>
                        <p>
                           Logout
                        </p>
                     </a>
                  </li>
               </ul>
            </nav>
            <!-- /.sidebar-menu -->
         </div>
         <!-- /.sidebar -->
      </aside>

      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Product Edit</h1>
                  </div>
               </div>
            </div><!-- /.container-fluid -->
         </section>
         <!-- /.content-wrapper -->
         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                     <div class="card card-primary card-outline">
                        <div class="card-info">
                           <?php $productID = $_GET['productID'];
                           $query = mysqli_query($db, "SELECT * FROM product WHERE productID='$productID'");
                           $row = mysqli_fetch_array($query); ?>
                           <form class="form-horizontal" method="POST" action="edit_product.php?productID=<?php echo $productID; ?>" enctype="multipart/form-data">
                              <div class="card-body">
                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Photo</label>
                                    <div class="col-sm-10">
                                       <?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" id="blah" style="width: 200px; height:200px;">'; ?><br>

                                       <input type="file" class="form-control" name="productPhoto" style="height:50px" onchange="readURL(this);">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                       <input type="text" name="productName" class="form-control" value="<?php echo $row['productName']; ?>" placeholder="Enter Product Name">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Quantity</label>
                                    <div class="col-sm-10">
                                       <input type="number" name="productQuantity" value="<?php echo $row['productQuantity']; ?>" class="form-control" placeholder="Enter Product Quantity">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Price</label>
                                    <div class="col-sm-10">
                                       <input type="number" min="1" name="productPrice" value="<?php echo $row['productPrice']; ?>" class="form-control" placeholder="Enter Product Price">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Description</label>
                                    <div class="col-sm-10">
                                       <input type="text" name="productDesc" class="form-control" value="<?php echo $row['productDesc']; ?>" placeholder="Enter Product Description">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product SKU</label>
                                    <div class="col-sm-10">
                                       <input type="text" name="productSKU" class="form-control" value="<?php echo $row['productSKU']; ?>" placeholder="Enter Product SKU">
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Category</label>
                                    <div class="col-sm-10">
                                       <select class="form-control" name="categoryID" required>
                                          <option disabled selected value> -- Select Category -- </option>
                                          <?php $query111 = "SELECT * FROM category";
                                          $result111 = mysqli_query($db, $query111);
                                          while ($row1 = mysqli_fetch_array($result111)) :; ?>
                                             <option value="<?php echo $row1[0]; ?>" <?php if ($row['categoryID'] == $row1[0]) { ?> selected <?php } ?>><?php echo $row1[1]; ?></option>
                                          <?php endwhile; ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                 <button type="submit" class="btn btn-info" name="edit_product">Save Changes</button>
                                 <button type="button" onclick="document.location='product_edit.php'" class="btn btn-default float-right">Cancel</button>
                              </div> <!-- /.card-footer -->
                           </form>
                        </div>

                     </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                  <div class="col-md-2"></div>
               </div>
               <!-- /.col -->
            </div>
         </section>

         <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
         </a>
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
         <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
         </div>
         <strong>SAM JUN AN 181021172</a></strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
         <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
   </script>
   <!-- bootstrap 4 popper js -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
   </script>
   <!-- bootstrap 4 js -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
   </script>
   <script src="dist/js/adminlte.min.js"></script>
   <script>
      function readURL(input) {
         if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
               $('#blah').attr('src', e.target.result).width(200).height(200);
            };

            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>

</body>

</html>