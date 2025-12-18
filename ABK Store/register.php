<?php
session_start();
include "db.php";

if (isset($_POST["f_name"])) {

	$f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];

	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";

	// ❗ чистим телефон: убираем +, -, пробелы
	$mobile = preg_replace('/\D/', '', $mobile);

	// ❗ если номер начинается с 996 — убираем код страны
	if (substr($mobile, 0, 3) === "996") {
		$mobile = substr($mobile, 3);
	}

	if (
		empty($f_name) || empty($l_name) || empty($email) ||
		empty($password) || empty($repassword) ||
		empty($mobile) || empty($address1)
	) {
		echo "
		<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert'>&times;</a>
			<b>Please fill all required fields</b>
		</div>";
		exit();
	}

	if (!preg_match($name, $f_name)) {
		echo "<div class='alert alert-warning'><b>First name is not valid</b></div>";
		exit();
	}

	if (!preg_match($name, $l_name)) {
		echo "<div class='alert alert-warning'><b>Last name is not valid</b></div>";
		exit();
	}

	if (!preg_match($emailValidation, $email)) {
		echo "<div class='alert alert-warning'><b>Email is not valid</b></div>";
		exit();
	}

	if (strlen($password) < 9) {
		echo "<div class='alert alert-warning'><b>Password is weak</b></div>";
		exit();
	}

	if ($password !== $repassword) {
		echo "<div class='alert alert-warning'><b>Passwords do not match</b></div>";
		exit();
	}

	// ✅ ВАЖНО: РОВНО 9 ЦИФР
	if (!preg_match('/^\d{9}$/', $mobile)) {
		echo "
		<div class='alert alert-warning'>
			<b>Mobile number must contain exactly 9 digits</b>
		</div>";
		exit();
	}

	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1";
	$check_query = mysqli_query($con, $sql);

	if (mysqli_num_rows($check_query) > 0) {
		echo "
		<div class='alert alert-danger'>
			<b>Email already exists</b>
		</div>";
		exit();
	}

	$password = md5($password);

	$sql = "INSERT INTO user_info
		(user_id, first_name, last_name, email, password, mobile, address1, address2)
		VALUES
		(NULL, '$f_name', '$l_name', '$email', '$password', '$mobile', '$address1', '$address2')";

	if (mysqli_query($con, $sql)) {
		$_SESSION["uid"] = mysqli_insert_id($con);
		$_SESSION["name"] = $f_name;

		$ip_add = getenv("REMOTE_ADDR");
		mysqli_query($con, "UPDATE cart SET user_id='$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id=-1");

		echo "register_success";
		exit();
	}
}
?>
