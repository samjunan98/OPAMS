<?php
session_start();
include('config.php');
$agentID = $_SESSION['agentID'];
$agentSessionid = $_SESSION['agentSessionid'];
if ($_SESSION["agentID"] == NULL) {
  header("location: index.php");
} else {
  $checkk = "SELECT * FROM agent WHERE agentID='$agentID'";
  $resultt = mysqli_query($db, $checkk) or die('Error querying database. ' .  mysqli_error($db));
  foreach ($resultt as $row) {
    if ($_SESSION['agentSessionid'] != $row['agentSessionid']) {
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
            <a href="main_agent.php" class="brand-link">
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
                                <a href="agentinfo.php" class="d-block"><?php echo $row['agentName']; ?></a>
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
                    <a href="product.php" class="nav-link">
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
                    <a href="agentinfo.php" class="nav-link active">
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
                            <h1>Profile</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-wrapper -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="getImage.php" alt="User profile picture" style="width: 150px; height:150px;">
                                    </div>

                                    <h3 class="profile-username text-center"><?php foreach ($query_run as $row) {
                                                                                    echo $row['agentName'];
                                                                                } ?></h3>

                                    <p class="text-muted text-center">Agent</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                        <?php $fromdate = mysqli_query($db, "SELECT * FROM agent WHERE agentID='$agentID'");
                  $row = mysqli_fetch_array($fromdate);
                  $from1 = new DateTime($row['agentCreatedate']);
                  $today1 = new DateTime();
                  $interval1 = $today1->diff($from1);
                  $elapsed1 = $interval1->format('%a Days');
                  ?>
                                            <b>Agent for</b> <a class="float-right"><?php echo $elapsed1; ?></a>
                                        </li>
                                        <a href="agentinfoedit.php" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                                        <a href="passwordchg_agent.php" class="btn btn-primary btn-block"><b>Change Password</b></a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <?php
                        $query = mysqli_query($db, "SELECT * FROM agent WHERE agentID='$agentID'");
                        $row = mysqli_fetch_array($query); ?>
                        <div class="col-md-8">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        <fieldset disabled="disabled">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="<?php echo $row['agentName']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Age</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" value="<?php echo $row['agentAge']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label">Phone Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="phone" class="form-control" value="<?php echo $row['agentPhone']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" value="<?php echo $row['agentEmail']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label  class="col-sm-2 col-form-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="<?php echo $row['agentGender']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Date Of Birth</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" value="<?php echo $row['agentDOB']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Location</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="<?php echo $row['agentLocation']; ?>">
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


</body>

</html>