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
    <title>AdminLTE 3 | Widgets</title>

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
                            <a href="#" class="nav-link">
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
                                        <p>Add New Agent</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
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
                                    <a href="product_add.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New Product</p>
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
                            <a href="admin_order.php" class="nav-link active">
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Order Info</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <?php
            $orderID = $_GET['orderID'];
            $query1 = mysqli_query($db, "SELECT order_product.productID,orderlist.orderOption,orderlist.orderStatus,orderlist.agentID,orderlist.orderGrandtotal,orderlist.orderCreatedate  FROM order_product INNER JOIN orderlist ON order_product.orderID = orderlist.orderID WHERE '$orderID'= order_product.orderID") or die('Error querying database. ' .  mysqli_error($db));
            while ($row = mysqli_fetch_array($query1)) {
                $productID = $row['productID'];
                $agentID = $row['agentID'];
                $orderGrandtotal = $row['orderGrandtotal'];
                $orderCreatedate = $row['orderCreatedate'];
                $orderStatus = $row['orderStatus'];
                $orderOption = $row['orderOption'];
                $query2 = "SELECT * FROM product INNER JOIN order_product ON product.productID = order_product.productID WHERE'$orderID' = orderID";
                $query_run2 = mysqli_query($db, $query2) or die('Error querying database. ' .  mysqli_error($db));
            }
            ?>
            <section class="content">
                <div class="container-fluid">
                    <?php foreach ($query_run2 as $row) { ?>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="sq align-self-center "> <img class="img-fluid  my-auto align-self-center mr-2 mr-md-4 pl-0 p-0 m-0" src="getimage_order.php?productID=<?php echo $row['productID']; ?>" style="height:100px; width:100px; cursor:pointer;" /> </div>
                                            <div class="media-body my-auto text-right">
                                                <div class="row  my-auto flex-column flex-md-row">
                                                    <div class="col my-auto">
                                                        <h6 class="mb-0">SKU : <strong><?php echo $row['productSKU']; ?></strong></h6>
                                                    </div>
                                                    <div class="col my-auto">Name : <strong><?php echo $row['productName']; ?></strong></div>
                                                    <div class="col my-auto"> Price : <strong>RM <?php echo $row['productPrice']; ?></strong></div>
                                                    <div class="col my-auto"> Qty : <strong><?php echo $row['order_productQuantity']; ?></strong></div>
                                                    <div class="col my-auto">
                                                        <h6 class="mb-0">Subtotal : <strong>RM <?php echo $row['order_productSubtotal']; ?></strong></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="row">
                        <div class="col-md-6">

                            <?php
                            $orderID = $_GET['orderID'];
                            $query = mysqli_query($db, "SELECT * FROM delivery WHERE orderID='$orderID'");
                            $row = mysqli_fetch_array($query); ?>
                            <div class="card ">
                                <div class="card-body">
                                    <section class="content-header">
                                        <div class="container-fluid">
                                            <div class="row mb-2">
                                                <div class="col-sm-6">
                                                    <h1>Delivery Info</h1>
                                                </div>
                                            </div>
                                        </div><!-- /.container-fluid -->
                                    </section>
                                    <form class="form-horizontal">
                                        <fieldset disabled="disabled">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
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
                                                    <label class="col-sm-2 col-form-label">Method</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" value="<?php echo $orderOption ?>">
                                                    </div>
                                                </div>
                                                <?php if ($orderOption == 'Delivery') { ?>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Courier</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" value="<?php echo $row['deliveryCourier']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Address</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" value="<?php echo $row['deliveryAddress']; ?>">
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Pickup Location</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <!-- /.card-body -->
                                            <!-- /.card-footer -->
                                        </fieldset>
                                    </form>
                                </div><!-- /.card-body -->
                            </div>
                        </div>

                        <?php $query23 = "SELECT * FROM agent WHERE'$agentID' = agentID";
                        $query_run23 = mysqli_query($db, $query23) or die('Error querying database. ' .  mysqli_error($db));
                        $row = mysqli_fetch_array($query_run23); ?>
                        <div class="col-md-6">
                            <div class="text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>
                                                    <div class=grandt><?php echo "Grand Total"; ?></div>
                                                </th>
                                                <th>
                                                    <div class=grandt><?php echo "RM" . $orderGrandtotal; ?></div>
                                                </th>
                                            </tr>
                                            <td>
                                                <div class=grandt><?php echo "Order ID"; ?></div>
                                            </td>
                                            <td>
                                                <div class=grandt><?php echo $orderID; ?></div>
                                            </td>
                                            <tr>
                                                <td>
                                                    <div class=grandt><?php echo "Order Created Time"; ?></div>
                                                </td>
                                                <td>
                                                    <div class=grandt><?php echo $orderCreatedate; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class=grandt><?php echo "Order Created By Agent"; ?></div>
                                                </td>
                                                <td>
                                                    <div class=grandt><?php echo "Agent ID: [" . $row['agentID'] . "]"; ?> <br> <?php echo $row['agentName']; ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class=grandt><?php echo "Order Status"; ?></div>
                                                </td>
                                                <td>
                                                    <div class=grandt><span class="badge badge-success"><?php echo $orderStatus; ?></span></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
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