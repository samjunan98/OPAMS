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
<body class="hold-transition sidebar-mini">
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
            <h1>Product List</h1>
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
                        <input type="text" placeholder="Name" name="productName" value="<?php if(isset($_GET['productName'])){ echo $_GET['productName']; } ?>" class="form-control"> </div>
                    <div class="col-sm-4">
                        <button type="submit" title="Search" class="btn btn-primary"><i class="fa fa-search"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="product_edit.php"><button type="button" title="Refresh" class="btn btn-secondary"><i class="fa-solid fa-arrows-rotate"></i></button></div>  
                    <div class="col-sm-4">
                        <a href="cart.php"><button type="button" title="Cart" class="btn btn-info add-new""><i class="fa-solid fa-cart-shopping"></i>Cart</button></a>
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
                    include("config.php");
                    $query = "SELECT * FROM category";
                    $result1= mysqli_query($db, $query);
                    ?>
                    <select class="form-control">
                    <?php while($row1= mysqli_fetch_array($result1)):;?>
                    <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
                    <?php endwhile;?>
                    </select>
                    </div>
                    <div class="col-sm-auto">
                    <a href="cat_filter.php"><button type="button" title="Filter" class="btn btn-block bg-gradient-primary btn"></i> <i class="fa-solid fa-filter"></i> </button></a>
                    </div>
                </div>
        </div>  

          <div class="card mt-12">
                    <div class="card-body">
                        <table class="table table-bordered" style="width:100%">
                            <thead class="thead-dark">
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
                                if(isset($_GET['productName']))
                                {
                                    $productName = $_GET['productName'];
                                    $query = "SELECT productID, productPhoto, productName, productQuantity, productDesc, productSKU FROM product WHERE '$productName' = productName";
                                    $query_run = mysqli_query($db, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr style="height:200px">
                                                <td><?php echo '<img src="data:image;base64,'.base64_encode($row['productPhoto']).'"alt="Image" style="width: 100px; height:100px;">';?></td>
                                                <td><?= $row['productName']; ?></td>
                                                <td><?= $row['productQuantity']; ?></td>
                                                <td><?= $row['productDesc']; ?></td>
                                                <td><?= $row['productSKU']; ?></td>
                                                <td>
                                                <a href="update.php?productID=<?php echo $row['productID']; ?>"class="a2cart" title="Add to Cart"><i class="fa-solid fa-cart-plus"></i></a>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                      echo '<script type="text/javascript">
                                      alert("Product Not Found");
                                      </script>';
                                    }
                                }
                                else{
                                    $query = "SELECT productID, productPhoto, productName, productQuantity, productDesc, productSKU FROM product";
                                    $query_run = mysqli_query($db, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr data-href="productinfo.php?productID=<?php echo $row['productID']; ?>" style="height:100px; cursor:pointer;" >
                                                <td><?php echo '<img src="data:image;base64,'.base64_encode($row['productPhoto']).'"alt="Image" style="width: 70px; height:70px;">';?></td>
                                                <td><?= $row['productName']; ?></td>
                                                <td><input type="number" class="form-control" name="quantity" min="1" max="<?= $row['productQuantity']; ?>" step="1" value="1"></td>
                                                <td><?= $row['productDesc']; ?></td>
                                                <td><?= $row['productSKU']; ?></td>
                                                <td><?php if ($row['productQuantity'] == '0'){ ?> <div class= "soldout">Sold Out </div> <?php } else { ?>
                                                <a href="cart.php?productID=<?php echo $row['productID']; ?>"><button type="button"  title="Add to Cart" class="btn btn-primary btn-block"><i class="fa-solid fa-cart-plus"></i></button></a> <?php } ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
$('tr').attr('data-href', function() {
  return $(this).find('label,input').attr('href');
});

$('*[data-href]').on('click', function(e) {
  if (!$(e.target).is('label,input')) {
    window.location.assign($(this).data("href"));
  }
});
</script>
<script>
  $(document).ready(function () {
      $('.nav-item').click(function () {
        $('.sidebar-mini').removeClass('sidebar-open');
        $('.sidebar-mini').addClass('sidebar-closed sidebar-collapse');
      });
    });
</script>
</body>
</html>