<?php
session_start();
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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/agentlist_test.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
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
          <a href="#" class="d-block">Admin</a>
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
            <a href="agentlist.php" class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Agent List
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="agentlist.php" class="nav-link">
              <i class="nav-icon fa fa-shopping-bag"></i>
              <p>
                Product
              </p>
            </a>
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
            <a href="agentlist.php" class="nav-link">
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
            <h1>Agent List</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-xl">

        <div class="table-title">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" placeholder="Name" name="agentName" value="<?php if(isset($_GET['agentName'])){ echo $_GET['agentName']; } ?>" class="form-control"></div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Search</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="agentlist_test.php"><button type="button" class="btn btn-primary">Reset</button></div>
                        
                    <div class="col-sm-4">
                        <a href="register.php"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                    </div>
                </div>
            </form>  
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
                                if(isset($_GET['agentName']))
                                {
                                    $agentName = $_GET['agentName'];

                                    $query = "SELECT agentID, agentName, agentEmail, agentAge, agentPhone, agentGender, agentDOB, agentLocation FROM agent WHERE '$agentName' = agentName";
                                    $query_run = mysqli_query($db, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
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
                                                <a href="update.php?agentID=<?php echo $row['agentID']; ?>"class="edit" title="Edit"><i class="fa fa-edit">&#xE254;</i></a>
                                                <a href="delete.php?agentID=<?php echo $row['agentID']; ?>" class="delete" data-toggle="tooltip"  title="Delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                                else{
                                    $query = "SELECT agentID, agentName, agentEmail, agentAge, agentPhone, agentGender, agentDOB, agentLocation FROM agent";
                                    $query_run = mysqli_query($db, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
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
                                                <a href="update.php?agentID=<?php echo $row['agentID']; ?>"class="edit" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="delete.php?agentID=<?php echo $row['agentID']; ?>" class="delete" title="Delete"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
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
<script src=".dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script type="text/javascript" language="javascript">
$(document).on('click', '.delete', function(){
    confirm("Are you sure you want to remove this?");
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
  });

</script>
</body>
</html>
