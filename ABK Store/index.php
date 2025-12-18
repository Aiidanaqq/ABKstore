<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ABK Store</title>

  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="style.css"/>

  <script src="js/jquery2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="main.js"></script>
</head>

<body>

<!-- LOADER -->
<div class="wait overlay">
  <div class="loader"></div>
</div>

<!-- NAVBAR -->
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">

    <div class="navbar-header">
      <a href="index.php" class="navbar-brand">ABK Store</a>
    </div>

    <div class="collapse navbar-collapse">

      <!-- LEFT MENU -->
      <ul class="nav navbar-nav">
        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
      </ul>

      <!-- RIGHT MENU -->
      <ul class="nav navbar-nav navbar-right">

        <!-- CART -->
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-shopping-cart"></span>
            Cart <span class="badge">0</span>
          </a>

          <div class="dropdown-menu" style="width:400px;">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-3">#</div>
                  <div class="col-md-3">Image</div>
                  <div class="col-md-3">Product</div>
                  <div class="col-md-3">Price</div>
                </div>
              </div>

              <div class="panel-body">
                <div id="cart_product"></div>
              </div>

              <div class="panel-footer"></div>
            </div>
          </div>
        </li>

        <?php if (!isset($_SESSION["uid"])) { ?>

          <!-- SIGN IN -->
          <li>
            <a href="login_form.php">
              <span class="glyphicon glyphicon-user"></span> Sign In
            </a>
          </li>

          <!-- SIGN UP -->
          <li>
            <a href="customer_registration.php?register=1">
              <span class="glyphicon glyphicon-edit"></span> Sign Up
            </a>
          </li>

        <?php } else { ?>

          <!-- LOGOUT -->
          <li>
            <a href="logout.php">
              <span class="glyphicon glyphicon-log-out"></span> Logout
            </a>
          </li>

        <?php } ?>

      </ul>

    </div>
  </div>
</div>

<br><br><br>

<!-- MAIN CONTENT -->
<div class="container-fluid">
  <div class="row">

    <!-- CATEGORIES & BRANDS -->
    <div class="col-md-2">
      <div id="get_category"></div>
      <div id="get_brand"></div>
    </div>

    <!-- PRODUCTS -->
    <div class="col-md-8">
      <div class="panel panel-info">
        <div class="panel-heading">Products</div>
        <div class="panel-body">
          <div id="get_product"></div>
        </div>
      </div>
    </div>

    <div class="col-md-2"></div>

  </div>
</div>

</body>
</html>
