$(document).ready(function () {

	/* ===================== LOAD INITIAL DATA ===================== */
	loadCategories();
	loadBrands();
	loadProducts();
	count_item();
	loadCartDropdown();

	// cart page exists only on cart.php
	if ($("#cart_checkout").length) {
		loadCartPage();
	}

	/* ===================== LOADERS ===================== */
	function loadCategories() {
		if ($("#get_category").length) {
			$.post("action.php", { category: 1 }, function (data) {
				$("#get_category").html(data);
			});
		}
	}

	function loadBrands() {
		if ($("#get_brand").length) {
			$.post("action.php", { brand: 1 }, function (data) {
				$("#get_brand").html(data);
			});
		}
	}

	function loadProducts() {
		if ($("#get_product").length) {
			$.post("action.php", { getProduct: 1 }, function (data) {
				$("#get_product").html(data);
			});
		}
	}

	/* ===================== CATEGORY FILTER ===================== */
	$(document).on("click", ".category", function (e) {
		e.preventDefault();

		$("#get_product").html("<h3>Loading...</h3>");

		$.post("action.php", {
			get_seleted_Category: 1,
			cat_id: $(this).attr("cid")
		}, function (data) {
			$("#get_product").html(data);
		});
	});

	/* ===================== BRAND FILTER ===================== */
	$(document).on("click", ".selectBrand", function (e) {
		e.preventDefault();

		$("#get_product").html("<h3>Loading...</h3>");

		$.post("action.php", {
			selectBrand: 1,
			brand_id: $(this).attr("bid")
		}, function (data) {
			$("#get_product").html(data);
		});
	});

	/* ===================== ADD TO CART ===================== */
	$(document).on("click", ".product", function (e) {
		e.preventDefault();

		let pid = $(this).attr("pid");
		$(".overlay").show();

		$.post("action.php", {
			addToCart: 1,
			proId: pid
		}, function (data) {
			$("#product_msg").html(data);
			count_item();
			loadCartDropdown();

			if ($("#cart_checkout").length) {
				loadCartPage();
			}

			$(".overlay").hide();
		});
	});

	/* ===================== COUNT CART ===================== */
	function count_item() {
		$.post("action.php", { count_item: 1 }, function (data) {
			$(".badge").html(data);
		});
	}

	/* ===================== CART DROPDOWN ===================== */
	function loadCartDropdown() {
		if ($("#cart_product").length) {
			$.post("action.php", {
				Common: 1,
				getCartItem: 1
			}, function (data) {
				$("#cart_product").html(data);
			});
		}
	}

	/* ===================== CART PAGE ===================== */
	function loadCartPage() {
		$.post("action.php", {
			Common: 1,
			checkOutDetails: 1
		}, function (data) {
			$("#cart_checkout").html(data);
		});
	}

	/* ===================== REMOVE FROM CART ===================== */
	$(document).on("click", ".remove", function (e) {
		e.preventDefault();

		let pid = $(this).attr("remove_id");
		$(".overlay").show();

		$.post("action.php", {
			removeItemFromCart: 1,
			rid: pid
		}, function (data) {
			$("#cart_msg").html(data);
			loadCartPage();
			loadCartDropdown();
			count_item();
			$(".overlay").hide();
		});
	});

	/* ===================== UPDATE CART ===================== */
	$(document).on("click", ".update", function (e) {
		e.preventDefault();

		let pid = $(this).attr("update_id");
		let qty = $(this).closest(".row").find(".qty").val();

		if (qty <= 0) {
			alert("Quantity must be at least 1");
			return;
		}

		$(".overlay").show();

		$.post("action.php", {
			updateCartItem: 1,
			update_id: pid,
			qty: qty
		}, function (data) {
			$("#cart_msg").html(data);
			loadCartPage();
			loadCartDropdown();
			count_item();
			$(".overlay").hide();
		});
	});

	/* ===================== LOGIN (🔥 КЛЮЧЕВО 🔥) ===================== */
	$(document).on("submit", "#login", function (e) {
		e.preventDefault();
		$(".overlay").show();

		$.post("login.php", $(this).serialize(), function (data) {

			if (data === "login_success") {
				window.location.href = "profile.php";
			}
			else if (data === "cart_login") {
				window.location.href = "cart.php";
			}
			else {
				$("#e_msg").html(data);
				$(".overlay").hide();
			}

		});
	});

	/* ===================== SIGN UP ===================== */
	$(document).on("submit", "#signup_form", function (e) {
		e.preventDefault();
		$(".overlay").show();

		$.post("register.php", $(this).serialize(), function (data) {
			$(".overlay").hide();
			if (data === "register_success") {
				window.location.href = "cart.php";
			} else {
				$("#signup_msg").html(data);
			}
		});
	});

});
