<?php
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
              <a href="salesrpt.php" class="nav-link active">
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

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Sales Report</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="table-title">
            <div class="card mt-12">
              <div class="card-body">
                <form method="GET" action="">
                  <div class="form-group row">
                    <div class="col-sm-12 col-md-1 col-lg-1"><label>Agent:</label></div>
                    <div class='col-sm-12 col-md-6 col-lg-4'>
                      <div class="input-group">
                        <select id="box1" class="form-control" name="agentID">
                          <option disabled selected value> Showing: <?php

                                                                    if (isset($_GET['agentID'])) {
                                                                      $agentID_select = $_GET['agentID'];
                                                                      $query0 = "SELECT agent.agentName FROM salesreport INNER JOIN agent ON salesreport.agentID = agent.agentID WHERE '$agentID_select' = agent.agentID";
                                                                      $query_run0 = mysqli_query($db, $query0);
                                                                      while ($row =  mysqli_fetch_array($query_run0)) {
                                                                        $agentName_echo = $row['agentName'];
                                                                      }
                                                                      echo "ID:[" . $agentID_select . "] Name: " . $agentName_echo;
                                                                    } else {
                                                                      echo " All ";
                                                                    } ?> </option>

                          <?php $query = "SELECT salesreport.agentID,agent.agentName FROM agent INNER JOIN salesreport ON agent.agentID= salesreport.agentID  GROUP BY salesreport.agentID";
                          $result1 = mysqli_query($db, $query);
                          while ($row1 = mysqli_fetch_array($result1)) :; ?>
                            <option value="<?php echo $row1['agentID']; ?>"><?php echo "ID:[" .  $row1['agentID'] . "] Name: " . $row1['agentName']; ?></option>
                          <?php endwhile; ?>
                        </select>
                        <div class="input-group-append">
                          <button type="submit" title="Search" class="btn btn-info">
                            <i class="fa fa-search"></i>
                          </button>
                          <button onclick="document.location='salesrpt.php'" type="button" title="Refresh" class="btn btn-secondary">
                            <i class="fa fa-refresh"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                </form>
              </div>
            </div>
          </div>



          <div class="card mt-12">
            <div class="card-body">
              <?php
              if (isset($_GET['agentID'])) {
                $agentID = $_GET['agentID'];
                $query = "SELECT * FROM salesreport WHERE '$agentID' = agentID";
                $query_run = mysqli_query($db, $query);
                echo mysqli_error($db);
                if (mysqli_num_rows($query_run) > 0) {
              ?>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="example2">
                      <thead style="text-align: center">
                        <tr class="bg-dark text-white">
                          <th> Agent ID </th>
                          <th> Month </th>
                          <th> Year </th>
                          <th> Sales Generated (RM) </th>
                          <th> Commission (RM) </th>
                        </tr>
                      </thead>
                      <tbody style="text-align: center">
                        <?php foreach ($query_run as $row) {
                          $row['salesMonth'] = date("F", mktime(0, 0, 0, $row['salesMonth'], 10)); ?>
                          <tr>
                            <td><?= $row['agentID']; ?></td>
                            <td><?= $row['salesMonth']; ?></td>
                            <td><?= $row['salesYear']; ?></td>
                            <td><?= $row['salesGenerated']; ?></td>
                            <td><?= $row['salesCommission']; ?></td>
                          </tr>
                        <?php
                        }
                      } else { ?>
                        <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://www.kindpng.com/picc/m/280-2801416_customer-order-orders-icon-clipart-png-download-order.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                          <h3><strong>Sales Report Not Found</strong></h3>
                        </div>
                      <?php
                      }
                    } else {
                      $query = "SELECT * FROM salesreport";
                      $query_run = mysqli_query($db, $query);
                      echo mysqli_error($db);
                      if (mysqli_num_rows($query_run) > 0) {
                      ?>
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover" id="example2">
                            <thead style="text-align: center">
                              <tr class="bg-dark text-white">
                                <th> Agent ID </th>
                                <th> Month </th>
                                <th> Year </th>
                                <th> Sales Generated (RM) </th>
                                <th> Commission (RM) </th>
                              </tr>
                            </thead>
                            <tbody style="text-align: center">
                              <?php foreach ($query_run as $row) {
                                $row['salesMonth'] = date("F", mktime(0, 0, 0, $row['salesMonth'], 10)); ?>
                                <tr>
                                  <td><?= $row['agentID']; ?></td>
                                  <td><?= $row['salesMonth']; ?></td>
                                  <td><?= $row['salesYear']; ?></td>
                                  <td><?= $row['salesGenerated']; ?></td>
                                  <td><?= $row['salesCommission']; ?></td>
                                </tr>
                              <?php
                              }
                            } else { ?>
                              <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://www.kindpng.com/picc/m/280-2801416_customer-order-orders-icon-clipart-png-download-order.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                <h3><strong>Sales Report Not Found</strong></h3>
                              </div>
                          <?php
                            }
                          } ?>
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


</body>

</html>