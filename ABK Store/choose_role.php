<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Choose account type</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container" style="margin-top:100px; max-width:500px;">
    <div class="panel panel-primary">
        <div class="panel-heading text-center">
            Choose how you want to continue
        </div>
        <div class="panel-body text-center">

            <a href="customer_registration.php?register=1"
               class="btn btn-success btn-lg"
               style="width:100%; margin-bottom:15px;">
                Continue as Customer
            </a>

            <a href="seller_registration.php?seller_register=1"
               class="btn btn-warning btn-lg"
               style="width:100%;">
                Continue as Seller
            </a>

        </div>
    </div>
</div>

</body>
</html>
