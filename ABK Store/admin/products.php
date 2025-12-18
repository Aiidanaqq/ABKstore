<?php
include "auth.php";
include "../db.php";

$res = mysqli_query($con, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="container">

<h2>Products</h2>

<a href="product_add.php" class="btn btn-success">Add Product</a>
<a href="dashboard.php" class="btn btn-secondary">Back</a>

<br><br>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
        <tr>
            <td><?= $row["product_id"] ?></td>
            <td><?= htmlspecialchars($row["product_title"]) ?></td>
            <td>$<?= $row["product_price"] ?></td>
            <td>
                <img src="uploads/<?= htmlspecialchars($row["product_image"]) ?>" width="80">
            </td>
            <td>
                <a href="product_delete.php?id=<?= $row["product_id"] ?>"
                   class="btn btn-danger"
                   onclick="return confirm('Delete product?')">
                    Delete
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
