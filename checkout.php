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
if (empty($_SESSION['checkout'])) {
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location.href = "main_agent.php";';
    echo '</script>';
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
                            <h1>Confirm Order</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Delivery Info</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="order_submit.php" method="POST">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" name="deliveryName" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="deliveryPhone" pattern="^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Order Option</label>
                                            <select class="form-control" id="orderOption" name="orderOption" required>
                                                <option disabled selected value>--Select Option--</option>
                                                <option value="Pickup">Self-Pickup</option>
                                                <option value="Delivery">Courier Delivery</option>
                                            </select>
                                        </div>
                                        <div id="hidden_div" style="display:none">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" id="hideadds" class="form-control" placeholder="Enter Address" name="deliveryAddress" required>
                                            </div>
                                        </div>
                                        <div id="hidden_div1" style="display:none">
                                            <div class="form-group">
                                                <label>Pickup Location</label>
                                                <select class="form-control" name="pickupLocation" id="hideloc" required>
                                                    <option disabled selected value>--Select Location--</option>
                                                    <option value="Perlis">Perlis</option>
                                                    <option value="Kedah">Kedah</option>
                                                    <option value="Kelantan">Kelantan</option>
                                                    <option value="Penang">Penang</option>
                                                    <option value="Pahang">Pahang</option>
                                                    <option value="Perak">Perak</option>
                                                    <option value="Selangor">Selangor</option>
                                                    <option value="Terengganu">Terengganu</option>
                                                    <option value="Malacca">Malacca</option>
                                                    <option value="Johor">Johor</option>
                                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                    <option value="Sabah">Sabah</option>
                                                    <option value="Sarawak">Sarawak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Order Details</h3>
                                </div>
                                <?php
                                $agentID = $_SESSION['agentID'];
                                $query = "SELECT * FROM cart_product INNER JOIN product ON cart_product.productID = product.productID WHERE'$agentID' = cartID";
                                $query_run = mysqli_query($db, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                ?>
                                    <div class="table-responsive">
                                        <table class="table border">
                                            <tbody style="text-align: center">
                                                <?php foreach ($query_run as $row) { ?>
                                                    <tr>
                                                        <td><?php echo '<img src="data:image;base64,' . base64_encode($row['productPhoto']) . ' "class="img-fluid" alt="Responsive image" style="width: 70px; height:70px;">'; ?></td>
                                                        <td><?php echo $row['productSKU']; ?><br><?php echo $row['productName']; ?></td>
                                                        <td><?php echo "RM" . $row['productPrice']; ?></td>
                                                        <td><?php echo "x" . $row['quantity']; ?></td>
                                                        <td><?php echo "RM" . $row['subtotal']; ?></td>
                                                    </tr>
                                                <?php
                                                } ?>
                                            </tbody>
                                        </table>
                                    <?php
                                } ?>
                                    </div>
                                    <div class="text-center">
                                        <table class="table ">
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
                                    <div class="text-right"><button type="submit" title="Submit Order" class="btn btn-block btn-success btn-lg" <?php if ($grandtotal == '0') { ?> disabled <?php   } ?>>Submit Order</button></a></div>
                            </div>
                            <div class="text-center">
                                <div class="timer">
                                    <div>Complete Order to Secure Product. Please do not refresh or return.</div>
                                    <div class="time">
                                        <strong>Session expires in <span id="time">Loading...</span></strong>
                                    </div>
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
        $(document).ready(function() {
            $('#orderOption').on('change', function() {
                if (this.value == 'Delivery') {
                    $("#hidden_div").show();
                    $('#hideloc').removeAttr("required");
                    $("#hidden_div1").hide();
                    $("#hideadds").attr("required", "required");

                } else {
                    $("#hidden_div").hide();
                    $('#hideadds').removeAttr("required");
                    $("#hidden_div1").show();
                    $("#hideloc").attr("required", "required");

                }
            });
        });
    </script>

    <script>
        var time = 30 * 10;
        setInterval(function() {
            var seconds = time % 60;
            var minutes = (time - seconds) / 60;
            if (seconds.toString().length == 1) {
                seconds = "0" + seconds;
            }
            if (minutes.toString().length == 1) {
                minutes = "0" + minutes;
            }
            document.getElementById("time").innerHTML = minutes + ":" + seconds;
            time--;
            if (time == 0) {
                window.location.href = "cart.php";
            }
        }, 1000);
    </script>

</body>

</html>