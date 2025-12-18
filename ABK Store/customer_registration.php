<?php
if (isset($_GET["register"])) {

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
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">ABK Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Customer SignUp Form</div>
					<div class="panel-body">

					<form id="signup_form" onsubmit="return false">
						<div class="row">
							<div class="col-md-6">
								<label for="f_name">First Name</label>
								<input type="text" id="f_name" name="f_name" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="l_name">Last Name</label>
								<input type="text" id="l_name" name="l_name" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" name="email" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="repassword">Re-enter Password</label>
								<input type="password" id="repassword" name="repassword" class="form-control">
							</div>
						</div>

						<!-- ⭐ НОВЫЙ БЛОК ТЕЛЕФОНА +996 xxx-xxx-xxx -->
						<div class="row">
							<div class="col-md-12">
								<label for="mobile">Phone number</label>
								<input type="tel"
									   id="mobile"
									   name="mobile"
									   class="form-control"
									   placeholder="+996 xxx-xxx-xxx"
									   required>
							</div>
						</div>

						<script>
// Автоматически ставим +996 при загрузке
const mobile = document.getElementById("mobile");
mobile.value = "+996 ";

// Маска формата: +996 xxx-xxx-xxx
mobile.addEventListener("input", function () {
	let value = mobile.value.replace(/\D/g, ""); // оставляем только цифры

	// гарантируем, что номер начинается с 996
	if (!value.startsWith("996")) {
		value = "996" + value;
	}

	value = value.substring(0, 12); // ограничиваем длину (996 + 9 цифр)

	let local = value.substring(3); // оставшиеся цифры после кода страны

	let formatted = "+996 ";

	if (local.length > 0) {
		formatted += local.substring(0, 3);
	}
	if (local.length >= 4) {
		formatted += "-" + local.substring(3, 6);
	}
	if (local.length >= 7) {
		formatted += "-" + local.substring(6, 9);
	}

	mobile.value = formatted;
});
						</script>
						<!-- ⭐ КОНЕЦ НОВОГО БЛОКА -->

						<div class="row">
							<div class="col-md-12">
								<label for="address1">Address Line 1</label>
								<input type="text" id="address1" name="address1" class="form-control">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="address2">Address Line 2</label>
								<input type="text" id="address2" name="address2" class="form-control">
							</div>
						</div>

						<p><br/></p>

						<div class="row">
							<div class="col-md-12">
								<input style="width:100%;" value="Sign Up" type="submit" name="signup_button" class="btn btn-success btn-lg">
							</div>
						</div>

					</form>

					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>

<?php
}
?>
