<?php
include "auth.php";
include "../db.php";

$error = "";

/* ---------- LOAD CATEGORIES & BRANDS ---------- */
$categories = mysqli_query($con, "SELECT * FROM categories");
$brands     = mysqli_query($con, "SELECT * FROM brands");

/* ---------- FORM SUBMIT ---------- */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title    = mysqli_real_escape_string($con, $_POST["title"]);
    $price    = mysqli_real_escape_string($con, $_POST["price"]);
    $desc     = mysqli_real_escape_string($con, $_POST["desc"]);
    $keywords = mysqli_real_escape_string($con, $_POST["keywords"]);
    $cat      = (int)$_POST["cat"];
    $brand    = (int)$_POST["brand"];

    /* ---------- VALIDATION ---------- */
    if (
        empty($title) ||
        empty($price) ||
        empty($desc) ||
        empty($keywords) ||
        empty($cat) ||
        empty($brand) ||
        empty($_FILES["image"]["name"])
    ) {
        $error = "All fields are required";
    } else {

        /* ---------- IMAGE HANDLING ---------- */
        $allowed_types = ["jpg", "jpeg", "png", "webp"];
        $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed_types)) {
            $error = "Only JPG, PNG, WEBP images are allowed";
        } else {

            // ✅ SAFE filename (NO Cyrillic symbols)
            $image = time() . "_" . uniqid() . "." . $ext;
            $upload_path = __DIR__ . "/uploads/" . $image;

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $upload_path)) {
                $error = "Image upload failed";
            } else {

                /* ---------- INSERT INTO DB ---------- */
                $sql = "INSERT INTO products
                (product_cat, product_brand, product_title, product_price,
                 product_desc, product_image, product_keywords)
                VALUES
                ('$cat','$brand','$title','$price','$desc','$image','$keywords')";

                if (mysqli_query($con, $sql)) {
                    header("Location: products.php");
                    exit();
                } else {
                    $error = "Database error";
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="container">

<h2>Add Product</h2>

<?php if (!empty($error)) { ?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">

    <label>Title</label>
    <input type="text" name="title" class="form-control" required>

    <label>Price</label>
    <input type="number" name="price" class="form-control" required>

    <label>Description</label>
    <textarea name="desc" class="form-control" required></textarea>

    <label>Keywords</label>
    <input type="text" name="keywords" class="form-control" required>

    <!-- ✅ CATEGORY SELECT -->
    <label>Category</label>
    <select name="cat" class="form-control" required>
        <option value="">-- Select Category --</option>
        <?php while ($c = mysqli_fetch_assoc($categories)) { ?>
            <option value="<?= $c['cat_id'] ?>">
                <?= htmlspecialchars($c['cat_title']) ?>
            </option>
        <?php } ?>
    </select>

    <!-- ✅ BRAND SELECT -->
    <label>Brand</label>
    <select name="brand" class="form-control" required>
        <option value="">-- Select Brand --</option>
        <?php while ($b = mysqli_fetch_assoc($brands)) { ?>
            <option value="<?= $b['brand_id'] ?>">
                <?= htmlspecialchars($b['brand_title']) ?>
            </option>
        <?php } ?>
    </select>

    <label>Image</label>
    <input type="file" name="image" class="form-control" required>

    <br>
    <button class="btn btn-success">Add Product</button>
    <a href="products.php" class="btn btn-secondary">Back</a>

</form>

</body>
</html>
