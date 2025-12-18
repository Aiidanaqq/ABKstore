<?php
include "auth.php";
include "../db.php";

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];

    $res = mysqli_query($con, "SELECT product_image FROM products WHERE product_id=$id");
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        unlink("uploads/" . $row["product_image"]);
        mysqli_query($con, "DELETE FROM products WHERE product_id=$id");
    }
}

header("Location: products.php");
exit();
