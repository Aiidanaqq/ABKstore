<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

/* ===================== HELPER: IMAGE PATH ===================== */
function getImagePath($image) {
	if (file_exists(__DIR__ . "/admin/uploads/" . $image)) {
		return "admin/uploads/" . $image;
	}
	if (file_exists(__DIR__ . "/product_images/" . $image)) {
		return "product_images/" . $image;
	}
	return "product_images/no-image.png";
}

/* ===================== CATEGORIES ===================== */
if (isset($_POST["category"])) {
	$q = mysqli_query($con, "SELECT * FROM categories");
	echo "<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'><h4>Categories</h4></a></li>";
	while ($r = mysqli_fetch_array($q)) {
		echo "<li>
			<a href='#' class='category' cid='{$r['cat_id']}'>
				{$r['cat_title']}
			</a>
		</li>";
	}
	echo "</div>";
	exit();
}

/* ===================== BRANDS ===================== */
if (isset($_POST["brand"])) {
	$q = mysqli_query($con, "SELECT * FROM brands");
	echo "<div class='nav nav-pills nav-stacked'>
		<li class='active'><a href='#'><h4>Brands</h4></a></li>";
	while ($r = mysqli_fetch_array($q)) {
		echo "<li>
			<a href='#' class='selectBrand' bid='{$r['brand_id']}'>
				{$r['brand_title']}
			</a>
		</li>";
	}
	echo "</div>";
	exit();
}

/* ===================== PRODUCTS ===================== */
if (isset($_POST["getProduct"])) {
	$q = mysqli_query($con, "SELECT * FROM products LIMIT 9");
	while ($r = mysqli_fetch_array($q)) {
		echo productCard($r);
	}
	exit();
}

/* ===================== FILTER CATEGORY ===================== */
if (isset($_POST["get_seleted_Category"])) {
	$id = (int)$_POST["cat_id"];
	$q = mysqli_query($con, "SELECT * FROM products WHERE product_cat='$id'");
	while ($r = mysqli_fetch_array($q)) {
		echo productCard($r);
	}
	exit();
}

/* ===================== FILTER BRAND ===================== */
if (isset($_POST["selectBrand"])) {
	$id = (int)$_POST["brand_id"];
	$q = mysqli_query($con, "SELECT * FROM products WHERE product_brand='$id'");
	while ($r = mysqli_fetch_array($q)) {
		echo productCard($r);
	}
	exit();
}

/* ===================== ADD TO CART ===================== */
if (isset($_POST["addToCart"])) {
	$p_id = (int)$_POST["proId"];
	$user_id = $_SESSION["uid"] ?? -1;

	$check = mysqli_query($con,
		"SELECT id FROM cart WHERE p_id='$p_id' AND user_id='$user_id'"
	);

	if (mysqli_num_rows($check) > 0) {
		echo "<div class='alert alert-warning'>Already in cart</div>";
		exit();
	}

	mysqli_query($con,
		"INSERT INTO cart (p_id, ip_add, user_id, qty)
		 VALUES ('$p_id','$ip_add','$user_id',1)"
	);

	echo "<div class='alert alert-success'>Product added</div>";
	exit();
}

/* ===================== COUNT CART ===================== */
if (isset($_POST["count_item"])) {
	$sql = isset($_SESSION["uid"])
		? "SELECT COUNT(*) c FROM cart WHERE user_id='{$_SESSION["uid"]}'"
		: "SELECT COUNT(*) c FROM cart WHERE ip_add='$ip_add' AND user_id=-1";

	$r = mysqli_fetch_assoc(mysqli_query($con, $sql));
	echo $r["c"];
	exit();
}

/* ===================== CART DROPDOWN ===================== */
if (isset($_POST["Common"]) && isset($_POST["getCartItem"])) {

	$sql = isset($_SESSION["uid"])
		? "SELECT p.product_id,p.product_title,p.product_price,p.product_image,c.qty
		   FROM products p JOIN cart c ON p.product_id=c.p_id
		   WHERE c.user_id='{$_SESSION["uid"]}'"
		: "SELECT p.product_id,p.product_title,p.product_price,p.product_image,c.qty
		   FROM products p JOIN cart c ON p.product_id=c.p_id
		   WHERE c.ip_add='$ip_add' AND c.user_id=-1";

	$q = mysqli_query($con, $sql);

	echo "<div id='cart_product'>";

	while ($r = mysqli_fetch_assoc($q)) {
		$img = getImagePath($r['product_image']);
		echo "
		<div class='row' style='margin-bottom:8px'>
			<div class='col-md-3'>
				<div class='product-image' style='height:60px'>
					<img src='$img' alt=''>
				</div>
			</div>
			<div class='col-md-5'>
				{$r['product_title']}<br>
				<small>\${$r['product_price']}</small>
			</div>
			<div class='col-md-2'>{$r['qty']}</div>
			<div class='col-md-2'>
				<button class='btn btn-danger btn-xs remove'
					remove_id='{$r['product_id']}'>✕</button>
			</div>
		</div><hr>";
	}

	echo "</div>
	<a href='cart.php' class='btn btn-warning btn-block'>View Cart</a>";
	exit();
}

/* ===================== PRODUCT CARD ===================== */
function productCard($r) {
	$img = getImagePath($r['product_image']);
	return "
	<div class='col-md-4'>
		<div class='panel panel-info'>
			<div class='panel-heading'>{$r['product_title']}</div>
			<div class='panel-body'>
				<div class='product-image'>
					<img src='$img' alt=''>
				</div>
			</div>
			<div class='panel-heading'>\${$r['product_price']}
				<button pid='{$r['product_id']}'
					class='btn btn-danger btn-xs product'
					style='float:right'>AddToCart</button>
			</div>
		</div>
	</div>";
}

/* ===================== CART PAGE ===================== */
if (isset($_POST["checkOutDetails"])) {

	$sql = isset($_SESSION["uid"])
		? "SELECT p.product_id,p.product_title,p.product_price,p.product_image,c.qty
		   FROM products p JOIN cart c ON p.product_id=c.p_id
		   WHERE c.user_id='{$_SESSION["uid"]}'"
		: "SELECT p.product_id,p.product_title,p.product_price,p.product_image,c.qty
		   FROM products p JOIN cart c ON p.product_id=c.p_id
		   WHERE c.ip_add='$ip_add'";

	$q = mysqli_query($con, $sql);
	$total = 0;

	while ($r = mysqli_fetch_assoc($q)) {
		$img = getImagePath($r['product_image']);
		$subtotal = $r['product_price'] * $r['qty'];
		$total += $subtotal;

		echo "
		<div class='row' style='margin-bottom:10px'>
			<div class='col-md-2'>
				<button class='btn btn-danger btn-xs remove'
					remove_id='{$r['product_id']}'>Delete</button>
			</div>
			<div class='col-md-2'>
				<div class='product-image' style='height:80px'>
					<img src='$img' alt=''>
				</div>
			</div>
			<div class='col-md-2'>{$r['product_title']}</div>
			<div class='col-md-2'>
				<input type='number' class='form-control qty'
					value='{$r['qty']}' min='1'
					update_id='{$r['product_id']}'>
			</div>
			<div class='col-md-2'>$ {$r['product_price']}</div>
			<div class='col-md-2'>$ {$subtotal}</div>
		</div>";
	}

	echo "<hr>
	<h3 style='text-align:right'>Total: $ {$total}</h3>
	<button class='btn btn-success btn-lg' style='float:right'>Pay Now</button>";
	exit();
}

/* ===================== REMOVE FROM CART ===================== */
if (isset($_POST["removeItemFromCart"])) {
	$id = (int)$_POST["rid"];
	$sql = isset($_SESSION["uid"])
		? "DELETE FROM cart WHERE p_id='$id' AND user_id='{$_SESSION["uid"]}'"
		: "DELETE FROM cart WHERE p_id='$id' AND ip_add='$ip_add'";
	mysqli_query($con, $sql);
	echo "<div class='alert alert-danger'>Product removed</div>";
	exit();
}

/* ===================== UPDATE CART ===================== */
if (isset($_POST["updateCartItem"])) {
	$id = (int)$_POST["update_id"];
	$qty = (int)$_POST["qty"];
	$sql = isset($_SESSION["uid"])
		? "UPDATE cart SET qty='$qty' WHERE p_id='$id' AND user_id='{$_SESSION["uid"]}'"
		: "UPDATE cart SET qty='$qty' WHERE p_id='$id' AND ip_add='$ip_add'";
	mysqli_query($con, $sql);
	echo "<div class='alert alert-info'>Cart updated</div>";
	exit();
}
?>
