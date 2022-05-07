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
              <a href="main_admin.php" class="nav-link">
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
                  <a href="product_edit.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Product List</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="product_edit.php" class="nav-link active">
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Agent List</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- /.content-wrapper -->
      <!-- Main content -->
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
          <div class="table-responsive">
            <table class="table border table-hover">
              <thead style="text-align: center">

                <tr class="bg-dark text-white">
                  <th> ID </th>
                  <th> Photo </th>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Age </th>
                  <th> Phone Number </th>
                  <th> Gender</th>
                  <th> Date of Birth </th>
                  <th> Location </th>
                  <th> Joined Time </th>
                  <th> Action </th>
                </tr>
              </thead>

              <tbody style="text-align: center">
                <?php
                if (isset($_GET['agentName'])) {
                  $agentName = $_GET['agentName'];
                  $query = "SELECT agentID, agentPhoto, agentName, agentEmail, agentAge, agentPhone, agentGender, agentDOB, agentLocation, agentCreatedate FROM agent WHERE '$agentName' = agentName";
                  $query_run = mysqli_query($db, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                ?>
                      <tr>
                        <td><?= $row['agentID']; ?></td>
                        <td><?php echo '<img src="data:image;base64,' . base64_encode($row['agentPhoto']) . '"alt="Image" style="width: 70px; height:70px;">'; ?></td>
                        <td><?= $row['agentName']; ?></td>
                        <td><?= $row['agentEmail']; ?></td>
                        <td><?= $row['agentAge']; ?></td>
                        <td><?= $row['agentPhone']; ?></td>
                        <td><?= $row['agentGender']; ?></td>
                        <td><?= $row['agentDOB']; ?></td>
                        <td><?= $row['agentLocation']; ?></td>
                        <td><?= $row['agentCreatedate']; ?></td>
                        <td width="50" height="40">
                          <div class="btn-group"><button type="button" title="Edit Product" class="btn btn-warning "><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" value="add2cart" title="Delete Product" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                  } else {
                    echo "No Record Found";
                  }
                } else {
                  $query = "SELECT agentID, agentPhoto, agentName, agentEmail, agentAge, agentPhone, agentGender, agentDOB, agentLocation, agentCreatedate FROM agent";
                  $query_run = mysqli_query($db, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                    ?>
                      <tr>
                        <td><?= $row['agentID']; ?></td>
                        <td><?php echo '<img src="data:image;base64,' . base64_encode($row['agentPhoto']) . '"alt="Image" style="width: 70px; height:70px;">'; ?></td>
                        <td><?= $row['agentName']; ?></td>
                        <td><?= $row['agentEmail']; ?></td>
                        <td><?= $row['agentAge']; ?></td>
                        <td><?= $row['agentPhone']; ?></td>
                        <td><?= $row['agentGender']; ?></td>
                        <td><?= $row['agentDOB']; ?></td>
                        <td><?= $row['agentLocation']; ?></td>
                        <td><?= $row['agentCreatedate']; ?></td>
                        <td width="50" height="40">
                          <div class="btn-group"><button type="button" title="Edit Product" class="btn btn-warning "><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" value="add2cart" title="Delete Product" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                          </div>
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
</body>

</html>