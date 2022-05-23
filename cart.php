<?php
session_start();
include('config.php');
$agentID = $_SESSION['agentID'];
$agentSessionid = $_SESSION['agentSessionid'];
if ($_SESSION["agentID"] == NULL) {
  header("location: index.html");
} else {
  $checkk = "SELECT * FROM agent WHERE agentID='$agentID'";
  $resultt = mysqli_query($db, $checkk) or die('Error querying database. ' .  mysqli_error($db));
  foreach ($resultt as $row) {
    if ($_SESSION['agentSessionid'] != $row['agentSessionid']) {
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
  <title>Online Petshop Agent Managment System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free-6.1.1-web/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script>
    function preventBack() {
        window.history.forward();
    }

    setTimeout("preventBack()", 0);
    window.onunload = function() {
        null
    };
</script>
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
      <a href="#" class="brand-link">
        <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Petshop</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="getImage.php" class="img-circle elevation-2" alt="User Image" style="width: 40px; height:40px;">
          </div>
          <div class="info">
            <?php $agentID = $_SESSION['agentID'];
            $query = "SELECT agentName FROM agent WHERE '$agentID' = agentID";
            $query_run = mysqli_query($db, $query);
            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $row) { ?>
                <a href="#" class="d-block"><?php echo $row['agentName']; ?></a>
          </div>
        </div> <?php }
            } else {
              echo "error";
            } ?>

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
                </li>
                <li class="nav-item">
                    <a href="product.php" class="nav-link active">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="order.php" class="nav-link">
                        <i class="nav-icon fa fa-check-square"></i>
                        <p>
                            Order
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="salesrpt_agent.php" class="nav-link">
                        <i class="nav-icon ion ion-stats-bars"></i>
                        <p>
                            Sales Report
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="agentinfo.php" class="nav-link">
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
              <?php
              $agentID = $_SESSION['agentID'];
              $query = "SELECT * FROM cart_product INNER JOIN product ON cart_product.productID = product.productID WHERE'$agentID' = cartID";
              $query_run = mysqli_query($db, $query);
              if (mysqli_num_rows($query_run) > 0) {
              ?>
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
                        <th> Subtotal </th>
                      </tr>
                    </thead>
                    <tbody style="text-align: center">
                      <?php foreach ($query_run as $row) {
                        if ($row['productQuantity'] == "0") { ?>
                          <form action="" method="POST">
                            <tr>
                              <td style="text-align: center"><a href="deletecart.php?productID=<?php echo $row['productID']; ?>"><button type="button" title="Delete From Cart" class="btn btn-danger btn-block"><i class="fa-solid fa-trash"></i></button></a></td>
                              <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . ' "class="img-fluid" alt="Responsive image" style="width: 70px; height:70px;">'; ?></td>
                              <td><?= $row['productName']; ?></td>
                              <td><?= $row['productSKU']; ?></td>
                              <td><?= $row['productPrice']; ?></td>
                              <td><i style="color:red; font-weight:bold;"> <?php echo "Out of Stock"; ?></i></td>
                              <td><?= $row['subtotal']; ?></td>
                            </tr>
                          <?php
                        } else { ?>
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
                      } ?>
                    </tbody>
                  </table>
                </div>
                <div class="row">
                  <div class="col-md-3"><button type="submit" title="Update Cart" class="btn btn-block btn-info btn-sm">Update Cart</button></div>
                  <div class="col-md-5"></div>
                  <div class="col-md-4">
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
                  <div class="col-md-3"></div>
                  <div class="col-md-5"></div>
                  <div class="col-md-4">
                    <div class="text-right"><a href="stock_check.php"><button type="button" title="Check Out" class="btn btn-block btn-success btn-lg" <?php if ($grandtotal == '0') { ?> disabled <?php   } ?>>Check Out</button></a></div>
                  </div>
                </div>
                </form>
              <?php
              } else { ?>
                <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                  <h3><strong>Your Cart is Empty</strong></h3>
                  <a href="product.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Continue Shopping</a>
                </div> <?php
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
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

</body>

</html>