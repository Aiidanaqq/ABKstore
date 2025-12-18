<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ABK Store</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<div class="wait overlay">
	<div class="loader"></div>
</div>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">ABK Store</a>
		</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Product</a></li>
			</ul>
		</div>
	</div>
</div>

<p><br><br><br></p>

<div class="container-fluid">

	<div class="row">
		<div class="col-md-12" id="cart_msg"></div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Cart Checkout</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-2"><b>Action</b></div>
						<div class="col-md-2"><b>Image</b></div>
						<div class="col-md-2"><b>Name</b></div>
						<div class="col-md-2"><b>Qty</b></div>
						<div class="col-md-2"><b>Price</b></div>
						<div class="col-md-2"><b>Total</b></div>
					</div>

					<div id="cart_checkout"></div>
				</div>

				<div class="panel-footer">© ABK Store</div>
			</div>
		</div>
	</div>

</div>
</body>
</html>
