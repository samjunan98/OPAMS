<?php
date_default_timezone_set("Asia/Singapore");
session_start();
include('config.php');
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
if (!empty($_SESSION['success'])) {
  unset($_SESSION['success']);
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
  <link rel="stylesheet" href="css/font.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
              <a href="main_admin.php" class="nav-link active">
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
              <h1>Welcome Admin</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <?php
      $orderMonth = date("m");
      $orderYear = date("Y");
      $ress = mysqli_query($db, "SELECT * FROM orderlist WHERE  orderStatus='Pending'");
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small Box (Stat card) -->
          <h5 class="mb-2 mt-4">Dashboard</h5>
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h4 class="responsive-font-example"><?php echo mysqli_num_rows($ress); ?></h4>
                  <p>Total Pending Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="admin_order.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <?php
            $salesMonth = date("m");
            $salesYear = date("Y");
            $querydash = "SELECT SUM(salesGenerated) AS salesGenerated FROM salesreport WHERE salesMonth='$salesMonth' AND salesYear='$salesYear'";
            $resultdash = mysqli_query($db, $querydash) or die('Error querying database. ' .  mysqli_error($db));
            if (mysqli_num_rows($resultdash) > 0) {
              $row = mysqli_fetch_array($resultdash);
              $salesGenerated = $row['salesGenerated'];
            ?>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h4 class="responsive-font-example"><?php echo "RM" . $salesGenerated ?></h4>
                    <p>Sales of this Month</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="salesrpt.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php } else { ?>
              <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h4 class="responsive-font-example">RM 0.00</h4>
                    <p>Sales of this month</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="salesrpt.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php }
            $res2 = mysqli_query($db, "SELECT * FROM product WHERE productDelete = 0 AND productQuantity < 10");
            ?>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h4 class="responsive-font-example"><?php echo mysqli_num_rows($res2); ?></h4>
                  <p>Product Low in Stock</p>
                </div>
                <div class="icon">
                  <i class="ion ion-alert"></i>
                </div>
                <a href="product_edit.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <?php
            $res1 = mysqli_query($db, "SELECT * FROM product WHERE productDelete = 0");
            ?>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h4 class="responsive-font-example"><?php echo mysqli_num_rows($res1); ?></h4>
                  <p>Listing Product</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cube"></i>
                </div>
                <a href="product_edit.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-6 col-12">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <?php $resop = mysqli_query($db, "SELECT * FROM orderlist WHERE orderStatus = 'Completed'");
                  $total_elapsed = 0;
                  $count = 0;
                  if (mysqli_num_rows($resop) > 0) {
                    while ($row = mysqli_fetch_array($resop)) {
                      $from1 = new DateTime($row['orderCreatedate']);
                      $to1 = new DateTime($row['orderCompletedate']);
                      $interval1 = $to1->diff($from1);
                      $elapsed1 = $interval1->format('%a');
                      $total_elapsed += $elapsed1;
                      $count += 1;
                    }
                    $avg = $total_elapsed / $count;
                  ?>
                    <h4 class="responsive-font-example"><?php  echo "Within " .number_format($avg) . " Days" ?></h4>
                  <?php } else {
                    echo "error";
                  } ?>
                  <p>Order Process Performance</p>
                </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
                <a href="admin_order.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-12">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <?php $agentMonth = date("m");
                  $agentYear = date("Y");
                  $agentqy =  mysqli_query($db, "SELECT * FROM agent WHERE MONTH(agentCreatedate)='$agentMonth' AND YEAR(agentCreatedate)='$agentYear'")   ?>
                  <h4 class="responsive-font-example"><?php echo mysqli_num_rows($agentqy) ?></h4>
                  <p>New Agent Joined this Month</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="agentlist_test.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <!-- Bar chart -->
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card card-success">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest Orders</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <?php $query = "SELECT orderlist.orderID, product.productName,SUM(order_product.order_productSubtotal) AS grandtotal ,GROUP_CONCAT(order_product.productID) AS productID ,GROUP_CONCAT(order_product.order_productQuantity) AS quantity,orderlist.orderCreatedate,orderlist.orderStatus AS orderStatus FROM orderlist INNER JOIN order_product ON orderlist.orderID = order_product.orderID INNER JOIN product ON order_product.productID = product.productID  GROUP BY orderlist.orderID DESC LIMIT 5";
                $query_run = mysqli_query($db, $query);
                echo mysqli_error($db);
                if (mysqli_num_rows($query_run) > 0) { ?>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table m-0">
                        <thead>
                          <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Quantity </th>
                            <th>Order Created Time</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($query_run as $row) { ?>
                            <tr>
                              <td><a href="admin_orderinfo.php?orderID=<?php echo $row['orderID']; ?>"><?php echo $row['orderID']; ?></a></td>
                              <td><?php $productID = explode(',', $row['productID']);
                                  foreach ($productID as $productID1) {
                                    $rsp = mysqli_query($db,  "SELECT * FROM product WHERE productID='$productID1'") or die('Error querying database. ' .  mysqli_error($db));
                                    $row1 = mysqli_fetch_array($rsp);
                                    echo '[' . $row1['productName'] . ']'. '<br />';
                                  } ?></td>
                                  <td><?php $quantity = explode(',', $row['quantity']);
                                                            foreach ($quantity as $quantity1) {
                                                                echo "x" . $quantity1 . '<br />';
                                                            } ?></td>
                              <td><?= $row['orderCreatedate']; ?></td>
                              <td><span <?php if ($row['orderStatus'] == 'Pending') { ?> class="badge badge-danger" <?php } else { ?> class="badge badge-success" <?php } ?>><?php echo $row['orderStatus']; ?></span></td>
                            </tr>
                          <?php
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  <?php } else { ?>
                    <div class="empty-cart-cls text-center"> <img src="https://www.kindpng.com/picc/m/280-2801416_customer-order-orders-icon-clipart-png-download-order.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                      <h3><strong>Order Not Found</strong></h3>
                    </div>
                  <?php
                } ?>
                  <!-- /.table-responsive -->
                  </div>
                  <div class="card-footer clearfix">
                <a href="admin_order.php" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
                  <!-- /.card-body -->
              </div>

              <!-- /.card-footer -->
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <!-- TABLE: LATEST ORDERS -->
              <div class="card card-success">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Recently Added Products</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                  <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                  <!-- /.item -->
                  
                  <?php 
                  $query = "SELECT * FROM product  WHERE productDelete =0  GROUP BY productID DESC LIMIT 5 ";
                $query_run = mysqli_query($db, $query);
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $row) { ?>
                  <li class="item">
                    <div class="product-img">
                    <?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . '"alt="Image" class="img-size-50"">'; ?>
                    </div>
                    <div class="product-info">
                      <a href="product.php" class="product-title"><?= $row['productName'];?>
                        <span class="badge badge-info float-right"><?php echo "RM".$row['productPrice'];?></span></a>
                      <span class="product-description">
                      <?= $row['productDesc'];?>
                      </span>
                    </div>
                  </li>
                  <?php } } else {?>
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://icon-library.com/images/product-icon-png/product-icon-png-11.jpg" width="130" height="130" class="img-fluid mb-4 mr-3">
                    <h3><strong>Product Not Found</strong></h3>
                  </div>
                     <?php }?>
                  <!-- /.item -->
                </ul>
                  <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->
              </div>

              <!-- /.card-footer -->
            </div>
            <!-- /.col -->
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
  <script>
    $(document).ready(function() {
      $.ajax({
        url: "https://petshopagentmanagementsystem.herokuapp.com/create_chart_all.php",
        method: "GET",
        success: function(data) {
          console.log(data);

          var month = [];
          var sales = [];

          for (var i in data) {

            month.push(data[i].salesMonth);
            sales.push(data[i].salesGenerated);
          }

          var chartdata = {
            labels: month,
            datasets: [{
              label: 'Total Sales',
              backgroundColor: 'rgba(60, 179, 113, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(60, 179, 113, 1)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: sales,
            }]
          };

          var ctx = $("#myChart");

          var barGraph = new Chart(ctx, {
            type: 'bar',
            data: chartdata
          });
        },
        error: function(data) {
          console.log(data);
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      <?= isset($hasData) && $hasData === true ? 'run();' : '' ?>
    });

    function run() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Login Success',
        autohide: true,
        delay: 5000,
        body: 'Welcome to Online Petshop Agent Management System!'
      })
    }
  </script>
</body>

</html>