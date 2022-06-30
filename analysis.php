<?php
session_start();
include('config.php');
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
      <a href="#" class="brand-link">
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
              <a href="analysis.php" class="nav-link active">
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

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Analysis</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <?php
      $ress = mysqli_query($db, "SELECT * FROM orderlist");
      ?>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php echo mysqli_num_rows($ress); ?></h3>
                  <p>Total Order</p>
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
                    <h3><?php echo "RM" . $salesGenerated ?></h3></sup>
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
                    <h3>RM 0.00</h3>
                    <p>Sales of this month</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="salesrpt.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php }
            $res2 = mysqli_query($db, "SELECT * FROM product WHERE productDelete = 0");
            ?>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php echo mysqli_num_rows($res2); ?></h3>
                  <p>Total Product</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cube"></i>
                </div>
                <a href="product_edit.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <?php
            $res1 = mysqli_query($db, "SELECT * FROM agent");
            ?>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?php echo mysqli_num_rows($res1); ?></h3>
                  <p>Total amount of Agent</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="agentlist_test.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <?php $resprod = mysqli_query($db, "SELECT SUM(order_product.order_productQuantity) AS totalProduct FROM order_product INNER JOIN orderlist ON order_product.orderID=orderlist.orderID WHERE orderlist.orderStatus = 'Completed' AND YEAR(orderlist.orderCreatedate) = 2022");
                  if (mysqli_num_rows($resprod) > 0) {
                    $row = mysqli_fetch_array($resprod);
                    $totalProduct = $row['totalProduct']; ?>
                    <h4><?php echo "Total Quantity of" ?></h4>
                    <h3><?php echo $totalProduct; ?></h3>
                  <?php } else {
                  } ?>
                  <p>Product Sold</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cash"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-6">
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
                  ?><h4><?php echo "Average Within "; ?></h4>
                    <h3><?php echo number_format($avg) . " Days" ?></h3>
                  <?php } else {
                    echo "error";
                  } ?>
                  <p>Order Process Performance</p>
                </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-success">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Total Products Sold (This Year)</h3>
                </div>
                <?php
                $year = date("Y");
                $query2 = "SELECT product.productID, product.productName,product.productPrice, SUM(order_product.order_productQuantity) AS Soldquantity FROM product INNER JOIN order_product ON product.productID = order_product.productID INNER JOIN orderlist ON order_product.orderID = orderlist.orderID WHERE YEAR(orderlist.orderCreatedate)= $year  GROUP BY order_product.productID";
                $query_run2 = mysqli_query($db, $query2) or die('Error querying database. ' .  mysqli_error($db)); ?>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-bordered table-valign-middle example2">
                    <thead>
                      <tr>
                        <th> ID </th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Sales</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($query_run2 as $row) { ?>
                        <tr>
                          <td>
                            <?= $row['productID']; ?>
                          </td>
                          <td>
                            <?= $row['productName']; ?>
                          </td>
                          <td><?php echo "RM " . $row['productPrice']; ?></td>
                          <td>
                            <?= $row['Soldquantity']; ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <div class="col-lg-6">
              <div class="card card-success">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Order Process Performance</h3>
                </div>
                <?php $resop = mysqli_query($db, "SELECT * FROM orderlist WHERE orderStatus = 'Completed'");
                if (mysqli_num_rows($resop) > 0) {
                ?>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-bordered table-valign-middle example2">
                      <thead>
                        <tr>
                          <th> Order ID </th>
                          <th>Process Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($resop as $row) {
                          $from1 = new DateTime($row['orderCreatedate']);
                          $to1 = new DateTime($row['orderCompletedate']);
                          $interval1 = $to1->diff($from1);
                          $elapsed1 = $interval1->format('%a'); ?>
                          <tr>
                            <td><a href="admin_orderinfo.php?orderID=<?php echo $row['orderID']; ?>">
                                <?= $row['orderID']; ?>
                            </td>
                            <td>
                              <?php
                              if ($elapsed1 < 1) {
                                echo "Within 1 Day";
                              } else {
                                echo $elapsed1 . " Days";
                              } ?>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                <?php } else {
                } ?>
              </div>
            </div>
            <!-- /.card -->
            <!-- /.col-md-6 -->
          </div>
          <div class="row">
          <div class="col-md-12">
              <!-- BAR CHART -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Monthly Sales</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="myChart1" width="400" height="200"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-success">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Amount of Agent Joined (This Year)</h3>
                </div>
                <div class="chart">
                  <canvas id="myChart" style="min-height: 250px; height: 290px; max-height: 290px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <div class="col-lg-6">
              <div class="card card-success">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Product Categories</h3>
                </div>
                <div class="card-body">
                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <!-- /.col-md-6 -->
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-success">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Order Delivery Types</h3>
                </div>
                <div class="card-body">
                  <canvas id="pieChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <div class="col-lg-6">
              <div class="card card-success">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Agent Location</h3>
                </div>
                <div class="card-body">
                  <canvas id="pieChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <!-- /.col-md-6 -->
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
  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
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
      $('.example2').DataTable({
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
      $.ajax({
        url: "https://petshopagentmanagementsystem.herokuapp.com/chart_agentnew.php",
        method: "GET",
        success: function(data) {
          console.log(data);

          var month = [];
          var num = [];

          for (var i in data) {

            month.push(data[i].joinMonth);
            num.push(data[i].agentno);
          }

          var chartdata = {
            labels: month,
            datasets: [{
              label: 'Amount of Agent Joined',
              backgroundColor: 'rgba(60, 179, 113, 0.75)',
              borderColor: 'rgba(200, 200, 200, 0.75)',
              hoverBackgroundColor: 'rgba(60, 179, 113, 1)',
              hoverBorderColor: 'rgba(200, 200, 200, 1)',
              data: num,
              spanGaps: true
            }]
          };

          var ctx = $("#myChart");

          var barGraph = new Chart(ctx, {
            type: 'line',
            data: chartdata
          });

          $.ajax({
            url: "https://petshopagentmanagementsystem.herokuapp.com/piechart_category.php",
            method: "GET",
            success: function(data) {
              console.log(data);

              var amount = [];
              var category = [];

              for (var i in data) {

                amount.push(data[i].amountP);
                category.push(data[i].cat);
              }

              var donutChartCanvas = $('#pieChart');
              var donutData = {
                labels: category,
                datasets: [{
                  data: amount,
                  backgroundColor: ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
                }]
              }
              var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
              }
              //Create pie or douhnut chart
              // You can switch between pie and douhnut using the method below.
              new Chart(donutChartCanvas, {
                type: 'pie',
                data: donutData,
                options: donutOptions
              })
              $.ajax({
                url: "https://petshopagentmanagementsystem.herokuapp.com/piechart_order.php",
                method: "GET",
                success: function(data) {
                  console.log(data);

                  var orderOption = [];
                  var orderAmount = [];

                  for (var i in data) {

                    orderOption.push(data[i].orderOption);
                    orderAmount.push(data[i].orderAmount);
                  }

                  var donutChartCanvas = $('#pieChart1');
                  var donutData = {
                    labels: orderOption,
                    datasets: [{
                      data: orderAmount,
                      backgroundColor: ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
                    }]
                  }
                  var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                  }
                  //Create pie or douhnut chart
                  // You can switch between pie and douhnut using the method below.
                  new Chart(donutChartCanvas, {
                    type: 'pie',
                    data: donutData,
                    options: donutOptions
                  })

                  $.ajax({
                    url: "https://petshopagentmanagementsystem.herokuapp.com/piechart_agent.php",
                    method: "GET",
                    success: function(data) {
                      console.log(data);

                      var agentLocation = [];
                      var agentAmount = [];

                      for (var i in data) {

                        agentLocation.push(data[i].agentLocation);
                        agentAmount.push(data[i].agentAmount);
                      }

                      var donutChartCanvas = $('#pieChart2');
                      var donutData = {
                        labels: agentLocation,
                        datasets: [{
                          data: agentAmount,
                          backgroundColor: ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
                        }]
                      }
                      var donutOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                      }
                      //Create pie or douhnut chart
                      // You can switch between pie and douhnut using the method below.
                      new Chart(donutChartCanvas, {
                        type: 'pie',
                        data: donutData,
                        options: donutOptions
                      })
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

                          var ctx = $("#myChart1");

                          var barGraph = new Chart(ctx, {
                            type: 'bar',
                            data: chartdata
                          });
                        },
                        error: function(data) {
                          console.log(data);
                        }
                      });
                    },
                    error: function(data) {
                      console.log(data);
                    }
                  });


                },
                error: function(data) {
                  console.log(data);
                }
              });

            },
            error: function(data) {
              console.log(data);
            }
          });
        },
        error: function(data) {
          console.log(data);
        }
      });



    });
  </script>
</body>

</html>