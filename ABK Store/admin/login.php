<?php
session_start();
include "../db.php";

if (isset($_POST["email"])) {
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = md5($_POST["password"]);

    $q = mysqli_query(
        $con,
        "SELECT * FROM admins WHERE email='$email' AND password='$password'"
    );

    if (mysqli_num_rows($q) === 1) {
        $_SESSION["admin"] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid login or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="container">

<h2>Admin Login</h2>

<?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">
    <input class="form-control" name="email" placeholder="Email" required><br>
    <input class="form-control" type="password" name="password" placeholder="Password" required><br>
    <button class="btn btn-primary">Login</button>
</form>

</body>
</html>
