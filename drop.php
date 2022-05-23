<?php
session_start();
include("config.php");
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
    <link rel="stylesheet" href="css/agentlist_test.css">
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="main_agent.php" class="nav-link">
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
                                    <a href="agentlist_test.php" class="nav-link">
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
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fa fa-shopping-bag"></i>
                                <p>
                                    Product
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="product.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Product List</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="product_edit.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modify Product</p>
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
                            <a href="agentlist.php" class="nav-link">
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
                            <h1>Product</h1>
                        </div>


                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="table-title">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="text" placeholder="Name" name="productName" value="<?php if (isset($_GET['productName'])) {
                                                                                                        echo $_GET['productName'];
                                                                                                    } ?>" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" title="Search" class="btn btn-primary"><i class="fa fa-search"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="product.php"><button type="button" title="Refresh" class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i></button>
                                </div>
                                <div class="col-sm-4">
                                    <a href="cart.php"><button type="button" title="Cart" class="btn btn-info add-new"><i class="fa-solid fa-cart-shopping"></i>Cart <span class='badge badge-danger' id='lblCartCount'> <?php include('track_cart.php'); ?> </span></button></a>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="row">
                            <div class="col-sm-auto">
                                <label for="category">Product Categories:</label>
                            </div>
                            <div class="col-sm-3">
                                <?php

                                $query = "SELECT * FROM category";
                                $result1 = mysqli_query($db, $query);
                                ?>
                                <select class="form-control">
                                    <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
                                        <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-sm-auto">
                                <a href="cat_filter.php"><button type="button" title="Filter" class="btn btn-block bg-gradient-primary btn"></i> <i class="fa-solid fa-filter"></i> </button></a>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-12">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table border table-hover">
                                    <thead style="text-align: center">
                                        <tr class="bg-dark text-white">
                                        <tr>
                                            <th style="width:13%"> Photo </th>
                                            <th> Name </th>
                                            <th style="width:15%"> Quantity </th>
                                            <th style="width:30%"> Description </th>
                                            <th> SKU </th>
                                            <th style="width:10%"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_GET['productName'])) {
                                            $productName = $_GET['productName'];
                                            $query = "SELECT productID, productPhoto, productName, productQuantity, productDesc, productSKU FROM product WHERE '$productName' = productName";
                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                        ?> <form action="add_to_cart.php?productID=<?php echo $row['productID']; ?>" method="POST">
                                                        <tr data-href="productinfo.php?productID=<?php echo $row['productID']; ?>" style="height:100px; cursor:pointer;">
                                                            <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" style="width: 70px; height:70px;">'; ?></td>
                                                            <td><?= $row['productName']; ?></td>
                                                            <td><input type="number" class="form-control" name="quantity" min="1" max="<?= $row['productQuantity']; ?>" step="1" value="1"></td>
                                                            <td><?= $row['productDesc']; ?></td>
                                                            <td><?= $row['productSKU']; ?></td>
                                                            <td><?php if ($row['productQuantity'] == '0') { ?> <div class="soldout">Sold Out </div> <?php } else { ?>
                                                                    <button type="submit" value="add2cart" title="Add to Cart" class="btn btn-primary btn-block"><i class="fa-solid fa-cart-plus"></i></button></a> <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                <?php
                                                }
                                            } else {
                                                echo '<script type="text/javascript">
                                      alert("Product Not Found");
                                      </script>';
                                            }
                                        } else {
                                            $query = "SELECT productID, productPhoto, productName, productQuantity, productDesc, productSKU FROM product";
                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                                ?> <form action="add_to_cart.php?productID=<?php echo $row['productID']; ?>" method="POST">
                                                        <tr data-href="productinfo.php?productID=<?php echo $row['productID']; ?>" style="height:100px; cursor:pointer;">
                                                            <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" style="width: 70px; height:70px;">'; ?></td>
                                                            <td><?= $row['productName']; ?></td>
                                                            <td><input type="number" class="form-control" name="quantity" min="1" max="<?= $row['productQuantity']; ?>" step="1" value="1"></td>
                                                            <td><?= $row['productDesc']; ?></td>
                                                            <td><?= $row['productSKU']; ?></td>
                                                            <td><?php if ($row['productQuantity'] == '0') { ?> <div class="soldout">Sold Out </div> <?php } else { ?>
                                                                    <button type="submit" value="add2cart" title="Add to Cart" class="btn btn-primary btn-block"><i class="fa-solid fa-cart-plus"></i></button></a> <?php } ?>
                                                            </td>
                                                        </tr>
                                                    </form>
                                        <?php
                                                }
                                            } else {
                                                echo '<script type="text/javascript">';
                                                echo 'alert("Product Not Found");';
                                                echo 'window.location.href = "product.php";';
                                                echo '</script>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>



<div class="row">
    <div class="col-sm-2"><a href="cart.php"><button type="submit" title="Update Cart" class="btn btn-block btn-info btn-sm">Update Cart</button></a></div>
    <div class="col-sm-7"></div>
    <div class="col-sm-3">
        <div class="text-center">
            <table class="table table-bordered">
                <th>
                    <div class=grandt><?php echo "Grand Total"; ?></div>
                </th>
                <th>
                    <?php $result_grand = "SELECT * FROM cart WHERE agentID='$agentID'";
                    $query_grand = mysqli_query($db, $result_grand);
                    $row = mysqli_fetch_array($query_grand);
                    $grandtotal = $row['grandtotal']; ?>
                    <div class=grandt><?php echo "RM" . $grandtotal ?></div>
                </th>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-5"></div>
    <div class="col-sm-3">
        <div class="text-right"><a href="cart.php"><button type="button" title="Check Out" class="btn btn-block btn-success btn-lg" <?php if ($grandtotal == '0') { ?> disabled <?php   } ?>>Check Out</button></a></div>
    </div>
</div>





<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Widgets</title>
  <!-- bootstrap 4 css -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free-6.1.1-web/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/cart.css">
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
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="main_agent.php" class="nav-link">
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
              <a href="#" class="nav-link active">
                <i class="nav-icon fa fa-shopping-bag"></i>
                <p>
                  Product
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="product.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Product List</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="product_edit.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modify Product</p>
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
              <a href="agentlist.php" class="nav-link">
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
              <h1>Cart</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card mt-12">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table border table-hover">
                  <thead style="text-align: center">
                    <tr class="bg-dark text-white">
                      <th width=3%;></th>
                      <th> Photo </th>
                      <th> Name </th>
                      <th> SKU </th>
                      <th> Price </th>
                      <th width=10%;> Quantity </th>
                      <th> Total Price </th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center">
                    <?php include("config.php");
                    $agentID = $_SESSION['agentID'];
                    $query = "SELECT * FROM cart_product INNER JOIN product ON cart_product.productID = product.productID WHERE'$agentID' = cartID";
                    $query_run = mysqli_query($db, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                      foreach ($query_run as $row) {
                    ?>
                        <form action="update_cart.php" method="POST">
                          <tr>
                            <td style="text-align: center"><a href="deletecart.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Delete From Cart" class="btn btn-danger btn-block"><i class="fa-solid fa-trash"></i></button></a></td>
                            <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . ' "class="img-fluid" alt="Responsive image" style="width: 70px; height:70px;">'; ?></td>
                            <td><?= $row['productName']; ?></td>
                            <td><?= $row['productSKU']; ?></td>
                            <td><?= $row['productPrice']; ?></td>
                            <td> <input type="hidden" name="productID[]" value="<?= $row['productID']; ?>"><input type="number" name="cart_quantity[]" class="form-control" value="<?= $row['quantity']; ?>" min="1" max="<?= $row['productQuantity']; ?>"></td>
                            <td><?= $row['subtotal']; ?></td>
                          </tr>

                      <?php
                      }
                    } else {
                      echo "oos";
                    }
                      ?>
                  </tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-sm-2"><a href="cart.php"><button type="submit" title="Update Cart" class="btn btn-block btn-info btn-sm">Update Cart</button></a></div>
                <div class="col-sm-7"></div>
                <div class="col-sm-3">
                  <div class="text-center">
                    <table class="table table-bordered">
                      <th>
                        <div class=grandt><?php echo "Grand Total"; ?></div>
                      </th>
                      <th>
                        <?php $result_grand = "SELECT * FROM cart WHERE agentID='$agentID'";
                        $query_grand = mysqli_query($db, $result_grand);
                        $row = mysqli_fetch_array($query_grand);
                        $grandtotal = $row['grandtotal']; ?>
                        <div class=grandt><?php echo "RM" . $grandtotal ?></div>
                      </th>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-5"></div>
                <div class="col-sm-3">
                  <div class="text-right"><a href="cart.php"><button type="button" title="Check Out" class="btn btn-block btn-success btn-lg" <?php if ($grandtotal == '0') { ?> disabled <?php   } ?>>Check Out</button></a></div>
                </div>
              </div>
              </form>
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
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    $("#my-toggle-button").scrollbarAutoHide('1');
  </script>
</body>

</html>



<form action="" method="GET">
              <div class="row">
                <div class="col-sm-4">
                  <input type="text" placeholder="Name" name="productName" value="<?php if (isset($_GET['productName'])) {
                                                                                    echo $_GET['productName'];
                                                                                  } ?>" class="form-control">
                </div>
                <div class="col-sm-4">
                  <button type="submit" title="Search" class="btn btn-primary"><i class="fa fa-search"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="product.php"><button type="button" title="Refresh" class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i></button>
                </div>
                <div class="col-sm-4">
                  <a href="cart.php"><button type="button" title="Cart" class="btn btn-info add-new"><i class="fa-solid fa-cart-shopping"></i>Cart <span class='badge badge-danger' id='lblCartCount'> <?php include('track_cart.php'); ?> </span></button></a>
                </div>
              </div>
            </form>
            <br>
            <div class="row">
              <div class="col-sm-auto">
                <label for="category">Product Categories:</label>
              </div>
              <div class="col-sm-3">
                <?php

                $query = "SELECT * FROM category";
                $result1 = mysqli_query($db, $query);
                ?>
                <select class="form-control">
                  <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
                    <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <div class="col-sm-auto">
                <a href="cat_filter.php"><button type="button" title="Filter" class="btn btn-block bg-gradient-primary btn"></i> <i class="fa-solid fa-filter"></i> </button></a>
              </div>
            </div>













            <div class="col-sm-3">
                      <input type="text" placeholder="Name" name="productName" value="<?php if (isset($_GET['productName'])) {
                                                                                        echo $_GET['productName'];
                                                                                      } ?>" class="form-control">
                    </div>
                    <div class="col-sm-1">
                      <button type="submit" title="Search" class="btn btn-block btn-success btn-md"><i class="fa fa-search"></i></button><br>
                    </div>
                    <div class="col-sm-1"><a href="product.php"><button type="button" title="Refresh" class="btn btn-block btn-success btn-md"><i class="fa-solid fa-arrows-rotate"></i></button></div></div>
                    <div class="col-sm-5"></div>
                    <div class="col-sm-3">
                      <div class="text-right"><a href="cart.php"><button type="button" title="Cart" class="btn btn-block btn-success btn-md"><i class="fa-solid fa-cart-shopping"></i>Cart <span class='badge badge-danger' id='lblCartCount'> <?php include('track_cart.php'); ?> </span></button></a></div>
                    </div>



                    $query10 = "INSERT INTO order_product(orderID,productID,order_productQuantity,order_productSubtotal) 
            SELECT  orderlist.orderID, cart_product.productID, cart_product.quantity, cart_product.subtotal FROM orderlist INNER JOIN cart_product ON orderlist.agentID = cart_product.cartID WHERE cart_product.cartID = '{$agentID}' ";


            <div class="row">
                        <div class="col-md-6">
                            <?php
                            $orderID = $_GET['orderID'];
                            $query1 = mysqli_query($db, "SELECT order_product.productID FROM order_product INNER JOIN orderlist ON order_product.orderID = orderlist.orderID WHERE '$orderID'= order_product.orderID AND '$agentID' = agentID")or die('Error querying database. ' .  mysqli_error($db));
                            while ($row = mysqli_fetch_array($query1)) {
                                $productID = $row['productID'];
                            }
                            $query2 = "SELECT * FROM product WHERE '$productID' = productID";
                            $query_run2 = mysqli_query($db, $query2);
                            ?>


                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-square" src="getimage_order.php?productID=<?php echo $productID;?>" alt="User profile picture" style="width: 150px; height:150px;">
                                    </div>

                                    <h3 class="profile-username text-center"><?php foreach ($query_run2 as $row) {
                                                                                    echo $row['productName'];
                                                                                } ?></h3>

                                    <p class="text-muted text-center">Agent</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Agent for</b> <a class="float-right">1,322</a>
                                        </li>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <?php
                        $orderID = $_GET['orderID'];
                        $query = mysqli_query($db, "SELECT * FROM delivery WHERE orderID='$orderID'");
                        $row = mysqli_fetch_array($query); ?>
                        <div class="col-md-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        <fieldset disabled="disabled">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="<?php echo $row['deliveryName']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" value="<?php echo $row['deliveryPhone']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Courier</label>
                                                    <div class="col-sm-10">
                                                        <input type="phone" class="form-control" value="<?php echo $row['deliveryCourier']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" value="<?php echo $row['deliveryAddress']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <!-- /.card-footer -->
                                        </fieldset>
                                    </form>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>













                          <!-- Main content -->
      <div class="container-xl">
        <div class="table-title">
          <form action="" method="GET">
            <div class="row">
              <div class="col-sm-auto">
                <label for="category">Product Search:</label>
              </div>
              <div class="col-sm-4">
                <input type="text" placeholder="Name" name="productName" value="<?php if (isset($_GET['productName'])) {
                                                                                  echo $_GET['productName'];
                                                                                } ?>" class="form-control">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="product_edit.php"><button type="button" class="btn btn-primary">Reset</button>
              </div>

              <div class="col-sm-auto">
                <a href="add_product.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> New Product</button></a>
              </div>
            </div>
          </form>
          <br>
          <div class="row">
            <div class="col-sm-auto">
              <label for="category">Product Categories:</label>
            </div>
            <div class="col-sm-3">
              <?php
              $query = "SELECT * FROM category";
              $result1 = mysqli_query($db, $query);
              ?>
              <select class="form-control">
                <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
                  <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="col-sm-auto">
              <a href="cat_filter.php"><button type="button" class="btn btn-info add-new"></i> Filter </button></a>
            </div>
            <div class="col-sm-auto">
              <a href="add_product.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> New Category</button></a>
            </div>

          </div>

        </div>

        <div class="card mt-12">
          <div class="card-body">
            <table class="table table-bordered" style="width:100%">
              <thead class="thead-dark">
                <tr>
                  <th style="width:5%"> ID </th>
                  <th style="width:20%"> Photo </th>
                  <th> Name </th>
                  <th style="width:10%"> Quantity </th>
                  <th style="width:30%"> Description </th>
                  <th> SKU </th>
                  <th style="width:15%"> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_GET['productName'])) {
                  $productName = $_GET['productName'];
                  $query = "SELECT productID, productPhoto, productName, productQuantity, productDesc, productSKU FROM product WHERE '$productName' = productName";
                  $query_run = mysqli_query($db, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                ?>
                      <tr style="height:200px">
                        <td><?= $row['productID']; ?></td>
                        <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" style="width: 100px; height:100px;">'; ?></td>
                        <td><?= $row['productName']; ?></td>
                        <td><?= $row['productQuantity']; ?></td>
                        <td><?= $row['productDesc']; ?></td>
                        <td><?= $row['productSKU']; ?></td>
                        <td>
                          <a href="update.php?productID=<?php echo $row['productID']; ?>" class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                          <a href="delete.php?productID=<?php echo $row['productID']; ?>" class="delete" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php
                    }
                  } else {
                    echo '<script type="text/javascript">
                                      alert("Product Not Found");
                                      </script>';
                  }
                } else {
                  $query = "SELECT productID, productPhoto, productName, productQuantity, productDesc, productSKU FROM product";
                  $query_run = mysqli_query($db, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                    ?>
                      <tr class="clickable" data-href="productinfo.php?productID=<?php echo $row['productID']; ?>" style="height:100px; cursor:pointer;">
                        <td><?= $row['productID']; ?></td>
                        <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" style="width: 70px; height:70px;">'; ?></td>
                        <td><?= $row['productName']; ?></td>
                        <td><?= $row['productQuantity']; ?></td>
                        <td><?= $row['productDesc']; ?></td>
                        <td><?= $row['productSKU']; ?></td>
                        <td>
                          <a href="updateprod.php?productID=<?php echo $row['productID']; ?>" class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                          <a href="deleteprod.php?productID=<?php echo $row['productID']; ?>" class="delete" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                <?php
                    }
                  } else {
                    echo '<script type="text/javascript">
                                      alert("Product Not Found");
                                      </script>';
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



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
            <?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" style="width: 100px; height:100px;">'; ?>
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
            $result1 = mysqli_query($db, $query);
            ?>
            <select name="categoryID" required>
               <option disabled selected value> -- select an option -- </option>
               <?php while ($row1 = mysqli_fetch_array($result1)) :; ?>
                  <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
               <?php endwhile; ?>
            </select>
         </div>

         <div class="btn">
            <input type="submit" value="Update">
         </div>
      </form>
   </div>

</html>









<section class="content">
        <div class="container-fluid">
          <div class="table-title">
            <div class="card mt-12">
              <div class="card-body">
                <form action="" method="GET">
                  <div class="row">
                    <div class="col-sm-3">
                      <input type="text" placeholder="Name" name="productName" value="<?php if (isset($_GET['productName'])) {
                                                                                        echo $_GET['productName'];
                                                                                      } ?>" class="form-control"><br>
                    </div>
                    <div class="col-sm-1">
                      <button type="submit" title="Search" class="btn btn-block btn-info btn-md"><i class="fa fa-search"></i></button><br>
                    </div>
                    <div class="col-sm-1"><button onclick="document.location='product.php'" type="button" title="Refresh" class="btn btn-block btn-secondary btn-md"><i class="fa-solid fa-arrows-rotate"></i></button></div>
                    <div class="col-sm-6"></div><br>
                    <div class="col-sm-1">
                      <div class="text-right"><button onclick="document.location='cart.php'" type="button" title="Cart" class="btn btn-block btn-success btn-md"><i class="fa-solid fa-cart-shopping"></i> <span class='badge badge-danger' id='lblCartCount'> <?php include('track_cart.php'); ?> </span></button></div>
                    </div>
                  </div>
                </form>
                <form method="GET" action="">
                  <div class="row">
                    <div class="col-sm-auto"><label for="category">Product Categories:</label><br></div>
                    <div class="col-sm-3"><?php
                                          $query = "SELECT * FROM category";
                                          $result1 = mysqli_query($db, $query);
                                          ?>
                      <select id="box1" class="form-control" name="taskOption">
                        <option disabled selected value> Showing: <?php if (isset($_GET['taskOption'])) {
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
                    </div>
                    <div class="col-sm-1"><button type="submit" title="Filter" class="btn btn-block bg-gradient-info btn"></i> <i class="fa-solid fa-filter"></i> </button></a></div>
                  </div>
                  <?php
                  $option = isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
                  ?>
                </form>
              </div>
            </div>
          </div>



          <div class="card mt-12">
            <div class="card-body">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Age </th>
                    <th> Phone Number </th>
                    <th> Gender</th>
                    <th> Date of Birth </th>
                    <th> Location </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include('config.php');
                  if (isset($_GET['agentName'])) {
                    $agentName = $_GET['agentName'];
                    $query = "SELECT agentID, agentName, agentEmail, agentAge, agentPhone, agentGender, agentDOB, agentLocation FROM agent WHERE '$agentName' = agentName";
                    $query_run = mysqli_query($db, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                      foreach ($query_run as $row) {
                  ?>
                        <tr>
                          <td><?= $row['agentID']; ?></td>
                          <td><?= $row['agentName']; ?></td>
                          <td><?= $row['agentEmail']; ?></td>
                          <td><?= $row['agentAge']; ?></td>
                          <td><?= $row['agentPhone']; ?></td>
                          <td><?= $row['agentGender']; ?></td>
                          <td><?= $row['agentDOB']; ?></td>
                          <td><?= $row['agentLocation']; ?></td>
                          <td>
                            <a href="update.php?agentID=<?php echo $row['agentID']; ?>" class="edit" title="Edit"><i class="fa fa-edit">&#xE254;</i></a>
                            <a href="delete.php?agentID=<?php echo $row['agentID']; ?>" class="delete" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php
                      }
                    } else {
                      echo "No Record Found";
                    }
                  } else {
                    $query = "SELECT agentID, agentName, agentEmail, agentAge, agentPhone, agentGender, agentDOB, agentLocation FROM agent";
                    $query_run = mysqli_query($db, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                      foreach ($query_run as $row) {
                      ?>
                        <tr>
                          <td><?= $row['agentID']; ?></td>
                          <td><?= $row['agentName']; ?></td>
                          <td><?= $row['agentEmail']; ?></td>
                          <td><?= $row['agentAge']; ?></td>
                          <td><?= $row['agentPhone']; ?></td>
                          <td><?= $row['agentGender']; ?></td>
                          <td><?= $row['agentDOB']; ?></td>
                          <td><?= $row['agentLocation']; ?></td>
                          <td>
                            <a href="update.php?agentID=<?php echo $row['agentID']; ?>" class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="delete.php?agentID=<?php echo $row['agentID']; ?>" class="delete" title="Delete"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                  <?php
                      }
                    } else {
                      echo "No Record Found";
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>


    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
          label:'',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
