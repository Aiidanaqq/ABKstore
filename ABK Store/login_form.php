<?php
session_start();

if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ABK Store - Login</title>

	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="style.css"/>

	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</head>

<body>

<div class="wait overlay">
	<div class="loader"></div>
</div>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">ABK Store</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
		</ul>
	</div>
</div>

<br><br><br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-primary">
				<div class="panel-heading">Customer Login</div>

				<div class="panel-body">
					<!-- ✅ LOGIN FORM -->
					<form id="login">
						<label>Email</label>
						<input type="email" class="form-control" name="email" required>

						<label>Password</label>
						<input type="password" class="form-control" name="password" required>

						<br>

						<button type="submit" class="btn btn-success pull-right">
							Login
						</button>

						<a href="forgot_password.php" style="color:#333;">
							Forgotten Password?
						</a>

						<br><br>

						<a href="customer_registration.php?register=1">
							Create a new account
						</a>
					</form>
				</div>

				<div class="panel-footer">
					<div id="e_msg"></div>
				</div>

			</div>
		</div>
	</div>
</div>

</body>
</html>
