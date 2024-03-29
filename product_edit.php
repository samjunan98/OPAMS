<?php
session_start();
include("config.php");
$adminID = $_SESSION['adminID'];
$adminSessionid = $_SESSION['adminSessionid'];
if ($_SESSION["adminID"] == NULL) {
  header("location: index.php");
} else {
  $checkk = "SELECT * FROM admin WHERE adminID='$adminID'";
  $resultt = mysqli_query($db, $checkk) or die('Error querying database. ' .  mysqli_error($db));
  foreach ($resultt as $row) {
    if ($_SESSION['adminSessionid'] != $row['adminSessionid']) {
      echo '<script type="text/javascript">';
      echo 'alert("New login is detected");';
      echo 'window.location.href = "index.php";';
      echo '</script>';
    }
  }
}
if (!empty($_SESSION['addpsuccess'])) {
  unset($_SESSION['addpsuccess']);
  $hasData1 = true;
}
if (!empty($_SESSION['editpsuccess'])) {
  unset($_SESSION['editpsuccess']);
  $hasData = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Petshop Agent Managment System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free-6.1.1-web/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
      <a href="main_admin.php" class="brand-link">
        <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Petshop</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="getImage_admin.php" class="img-circle elevation-2" alt="User Image" style="width: 40px; height:40px;">
          </div>
          <div class="info">
            <?php $adminID = $_SESSION['adminID'];
            $query = "SELECT adminName FROM admin WHERE '$adminID' = adminID";
            $query_run = mysqli_query($db, $query);
            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $row) { ?>
                <a href="info.php" class="d-block"><?php echo $row['adminName']; ?></a>
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
              <a href="main_admin.php" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="agentlist_test.php" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Agent
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fa fa-shopping-bag"></i>
                <p>
                  Product
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="product_edit.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Product</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="category_admin.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Category</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="admin_order.php" class="nav-link">
                <i class="nav-icon fa fa-check-square"></i>
                <p>
                  Order
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="salesrpt.php" class="nav-link">
                <i class="nav-icon ion ion-stats-bars"></i>
                <p>
                  Sales Report
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="analysis.php" class="nav-link">
                <i class="nav-icon fa fa-magnifying-glass-chart"></i>
                <p>
                  Analysis
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Product List</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="table-title">
            <div class="card mt-12">
              <div class="card-body">
                <form action="" method="GET">
                  <div class="form-group row">
                    <div class='col-sm-12 col-md-6 col-lg-4'>
                      <div class="input-group">
                        <input type="search" placeholder="Name" name="productName" value="<?php if (isset($_GET['productName'])) {
                                                                                            echo $_GET['productName'];
                                                                                          } ?>" class="form-control">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-info">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <form action="" method="GET">
                  <div class="row">
                    <div class='col-sm-12 col-md-4 col-lg-4'><?php
                                                              $query = "SELECT * FROM category";
                                                              $result1 = mysqli_query($db, $query);
                                                              ?>
                      <div class="input-group">
                        <select id="box1" class="form-control" name="taskOption">
                          <option disabled selected value> Category : <?php if (isset($_GET['taskOption'])) {
                                                                        $categoryID = $_GET['taskOption'];
                                                                        $query22 = "SELECT * FROM category WHERE '$categoryID' = categoryID";

                                                                        $query_run22 = mysqli_query($db, $query22);
                                                                        while ($row =  mysqli_fetch_array($query_run22)) {
                                                                          $categoryName = $row['categoryName'];
                                                                        }
                                                                        echo $categoryName;
                                                                      } else {
                                                                        echo " All ";
                                                                      } ?> </option>
                          <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
                            <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                          <?php endwhile; ?>
                        </select>
                        <div class="input-group-append">
                          <button type="submit" title="Filter" class="btn btn-info">
                            <i class="fa-solid fa-filter"></i>
                          </button>
                          <button onclick="document.location='product_edit.php'" type="button" title="Refresh" class="btn btn-secondary">
                            <i class="fa fa-refresh"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class='col-sm-12 col-md-2 col-lg-2'>
                      <br>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="text-right">
                                            <a href="add_product.php"><button type="button" title="Add Product" class="btn btn-success"><i class="fa-solid fa-add"> </i> Add New Product</button></a>
                                        </div>
                                    </div>
                  </div>
                </form>
              </div>
            </div>
            <?php
            ?>
            </form>
          </div>
        </div>
        <div class="card mt-12">
          <div class="card-body">
            <?php
            if (isset($_GET['productName'])) {
              $productName = mysqli_real_escape_string($db, $_GET['productName']);
              $query = "SELECT * FROM product WHERE productName LIKE  '%" . $productName . "%'";
              $query_run = mysqli_query($db, $query);
              if (mysqli_num_rows($query_run) > 0) {
            ?>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="example2">
                    <thead style="text-align: center">
                      <tr class="bg-dark text-white">

                        <th> Photo </th>
                        <th> Name </th>
                        <th> Quantity </th>
                        <th> Price (RM) </th>
                        <th> Description </th>
                        <th> SKU </th>
                        <th> Status </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center">
                      <?php foreach ($query_run as $row) { ?>
                        <tr>

                          <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" style="width: 70px; height:70px;">'; ?></td>
                          <td><?= $row['productName']; ?></td>
                          <td><?= $row['productQuantity']; ?></td>
                          <td><?= $row['productPrice']; ?></td>
                          <td><?= $row['productDesc']; ?></td>
                          <td><?= $row['productSKU']; ?></td>
                          <td><span <?php if ($row['productDelete'] == 1) { ?> class="badge badge-danger" <?php } else { ?> class="badge badge-success" <?php } ?>><?php if ($row['productDelete'] == 0) {
                                                                                                                                                                      echo "Listed";
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "Unlisted";
                                                                                                                                                                    } ?> </span></td>
                          <td width="50" height="40">
                            <div class="btn-group"><a href="updateprod.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Edit Product" class="btn btn-warning "><i class="fa-solid fa-pen-to-square"></i></button></a>
                              <?php if ($row['productDelete'] == 0) { ?>
                                <a href="product_delete.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Delete Product" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></a>
                              <?php } else { ?>
                                <a href="product_retrieve.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Retrieve Product" class="btn btn-success"><i class="fa-solid fa-clock-rotate-left"></i></button></a>
                              <?php } ?>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://icon-library.com/images/product-icon-png/product-icon-png-11.jpg" width="130" height="130" class="img-fluid mb-4 mr-3">
                  <h3><strong>Product Not Found</strong></h3>
                </div>
              <?php
              }
            } else if (isset($_GET['taskOption'])) {
              $categoryID = $_GET['taskOption'];
              $query = "SELECT * FROM product WHERE '$categoryID' = categoryID";
              $query_run = mysqli_query($db, $query);
              if (mysqli_num_rows($query_run) > 0) {
              ?>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="example2">
                    <thead style="text-align: center">
                      <tr class="bg-dark text-white">

                        <th> Photo </th>
                        <th> Name </th>
                        <th> Quantity </th>
                        <th> Price (RM) </th>
                        <th> Description </th>
                        <th> SKU </th>
                        <th> Status </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center">
                      <?php foreach ($query_run as $row) {
                      ?>
                        <tr>

                          <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" style="width: 70px; height:70px;">'; ?></td>
                          <td><?= $row['productName']; ?></td>
                          <td><?= $row['productQuantity']; ?></td>
                          <td><?= $row['productPrice']; ?></td>
                          <td><?= $row['productDesc']; ?></td>
                          <td><?= $row['productSKU']; ?></td>
                          <td><span <?php if ($row['productDelete'] == 1) { ?> class="badge badge-danger" <?php } else { ?> class="badge badge-success" <?php } ?>><?php if ($row['productDelete'] == 0) {
                                                                                                                                                                      echo "Listed";
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "Unlisted";
                                                                                                                                                                    } ?> </span></td>
                          <td width="50" height="40">
                            <div class="btn-group"><a href="updateprod.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Edit Product" class="btn btn-warning "><i class="fa-solid fa-pen-to-square"></i></button></a>
                              <?php if ($row['productDelete'] == 0) { ?>
                                <a href="product_delete.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Delete Product" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></a>
                              <?php } else { ?>
                                <a href="product_retrieve.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Retrieve Product" class="btn btn-success"><i class="fa-solid fa-clock-rotate-left"></i></button></a>
                              <?php } ?>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://icon-library.com/images/product-icon-png/product-icon-png-11.jpg" width="130" height="130" class="img-fluid mb-4 mr-3">
                  <h3><strong>Product Not Found</strong></h3>
                </div>
              <?php
              }
            } else {
              $query = "SELECT * FROM product";
              $query_run = mysqli_query($db, $query);
              if (mysqli_num_rows($query_run) > 0) {
              ?>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="example2">
                    <thead style="text-align: center">
                      <tr class="bg-dark text-white">

                        <th> Photo </th>
                        <th> Name </th>
                        <th> Quantity </th>
                        <th> Price (RM) </th>
                        <th> Description </th>
                        <th> SKU </th>
                        <th> Status </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center">
                      <?php foreach ($query_run as $row) {
                      ?>
                        <tr>

                          <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" style="width: 70px; height:70px;">'; ?></td>
                          <td><?= $row['productName']; ?></td>
                          <td><?= $row['productQuantity']; ?></td>
                          <td><?= $row['productPrice']; ?></td>
                          <td><?= $row['productDesc']; ?></td>
                          <td><?= $row['productSKU']; ?></td>
                          <td><span <?php if ($row['productDelete'] == 1) { ?> class="badge badge-danger" <?php } else { ?> class="badge badge-success" <?php } ?>><?php if ($row['productDelete'] == 0) {
                                                                                                                                                                      echo "Listed";
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "Unlisted";
                                                                                                                                                                    } ?> </span></td>
                          <td width="50" height="40">
                            <div class="btn-group"><a href="updateprod.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Edit Product" class="btn btn-warning "><i class="fa-solid fa-pen-to-square"></i></button></a>
                              <?php if ($row['productDelete'] == 0) { ?>
                                <a href="product_delete.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Delete Product" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></a>
                              <?php } else { ?>
                                <a href="product_retrieve.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Retrieve Product" class="btn btn-success"><i class="fa-solid fa-clock-rotate-left"></i></button> </a>
                              <?php } ?>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              <?php } else { ?>
                <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://icon-library.com/images/product-icon-png/product-icon-png-11.jpg" width="130" height="130" class="img-fluid mb-4 mr-3">
                  <h3><strong>Product Not Found</strong></h3>
                </div>
            <?php
              }
            }
            ?>
          </div>
        </div>
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
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": false,
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      <?= isset($hasData1) && $hasData1 === true ? 'run1();' : '' ?>
      <?= isset($hasData) && $hasData === true ? 'run();' : '' ?>
    });

    function run1() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Add Product Success',
        autohide: true,
        delay: 5000,
        body: 'New Product is Added!'
      })
    }
  </script>
  <script>
    function run() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Edit Product Success',
        autohide: true,
        delay: 5000,
        body: 'Product is Updated!'
      })
    }
  </script>
</body>

</html>