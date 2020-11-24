<?php
session_start();
include('includes/db_connection.php');

$itemList = $_SESSION['shoppingcart'];

print_r($itemList);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php") ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <section class="section-breadcumb">
        <div class="row">
            <span>Home</span>
            <span><i class="fa fa-angle-right fa-lg"></i></span>
            <span>Shopping cart</span>
        </div>
    </section>
    <section class="section-shoppingcart">
        <div class="row">
            <div class="shoppingcart-wrapper">
                <ul>
                    <li>1.</li>
                    <li><img src="image/product-1.jpg" alt="product"> Cotton leaf print Shirt</li>
                    <li><input type="number" name="quantity" min="1" value=1></li>
                    <li>$65.00</li>
                    <li><button class="remove-cart-item"><i class="fa fa-times fa-sm"></i></button></li>
                </ul>
                <ul>
                    <li>2.</li>
                    <li><img src="image/product-1.jpg" alt="product"> Cotton leaf print Shirt</li>
                    <li><input type="number" name="quantity" min="1" value=1></li>
                    <li>$65.00</li>
                    <li><button class="remove-cart-item"><i class="fa fa-times fa-sm"></i></button></li>
                </ul>
            </div>
            <div class="cart-button">
                <button class="btn cart-btn">Continue shopping</button>
                <button class="btn cart-btn">Check out</button>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php") ?>
</body>
</html>
