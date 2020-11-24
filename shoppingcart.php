<?php

    session_start();
    include('includes/db_connection.php');

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
                <?php
                    $item1 = (object)['name'=>'Cotton leaf print Shirt', 'price'=>65.00, 'quantity'=>1];
                    $item2 = (object)['name'=>'Cotton leaf print Shirt', 'price'=>125.00, 'quantity'=>1];


                    $listItems = [];
                    array_push($listItems, $item1, $item2);

                    // set shopping cart item objects to session
                    $_SESSION['shoppingcart'] = $listItems;


                    if(isset($_SESSION['shoppingcart']))
                    {
                        $shoppingcart = $_SESSION['shoppingcart'];
                        for($i=0; $i<count($shoppingcart); $i++)
                        {
                            ?>
                                <ul>
                                    <li><?php echo ($i+1)."."; ?></li>
                                    <li><img src="image/product-1.jpg" alt="product"><?php echo $shoppingcart[$i]->name; ?></li>
                                    <li><input type="number" name="quantity" min="1" value="<?php echo $shoppingcart[$i]->quantity; ?>"></li>
                                    <li><?php echo "$".$shoppingcart[$i]->price; ?></li>
                                    <li><button class="remove-cart-item"><i class="fa fa-times fa-sm"></i></button></li>
                                </ul>
                            <?php
                        }


                    }
                ?>

            </div>
            <div class="cart-button">
                <a class="btn cart-btn" href="index.php">Continue shopping</a>
                <a class="btn cart-btn" href="checkout.php">Check out</a>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php") ?>
</body>
</html>
