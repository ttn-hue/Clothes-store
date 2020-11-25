<?php
    session_start();
    include('includes/db_connection.php');

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['postcode'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $province = $_POST['province'];
    $cardNumber = $_POST['cardNumber'];
    $expiryMonth = $_POST['expiryMonth'];
    $expiryYear = $_POST['expiryYear'];
    $subtotal = $_POST['subtotal'];
    $tax = $_POST['tax'];
    $total = $_POST['total'];

    $subtotal = number_format($subtotal, 2);
    $tax = number_format($tax, 2);
    $total = number_format($total, 2);

    $shoppingcart = $_SESSION['shoppingcart'];

    // insert customer card info
    $sqlQueryCard = "
        INSERT INTO `cards` (`id`, `card-number`, `expiry-month`, `expiry-year`) VALUES (NULL, '$cardNumber', '$expiryMonth', '$expiryYear');
    ";

    $sqlResultCard = $db->query($sqlQueryCard);
    $last_card_id = $db->insert_id;

    if(!$sqlResultCard)
    {
        exit($db->error);
    }

    // insert customer infor
    $sqlQueryCustomer = "
        INSERT INTO `customers`
        (`firstname`, `lastname`, `email`, `phone`, `address`, `postcode`, `city`, `province`, `cardId`)
        VALUE
        ('$firstname', '$lastname', '$email', '$phone', '$address', '$city', '$postcode', '$province', `$last_card_id`);
    ";

    $sqlResultCustomer = $db->query($sqlQueryCustomer);
    $last_customer_id = $db->insert_id;

    if(!$sqlQueryCustomer)
    {
        exit($db->error);
    }

    // insert order infor
    $sqlQueryOrder = "
        INSERT INTO `orders` (`subtotal`, `tax`, `total`, `customerId`) VALUES ('$subtotal', '$tax', '$total', '$last_customer_id');
    ";

    $sqlResultOrder = $db->query($sqlQueryOrder);
    $last_order_id = $db->insert_id;

    if(!$sqlResultOrder)
    {
        exit($db->error);
    }

    // create sql query string
    $sqlQueryOrderProduct = "";
    foreach($shoppingcart as $product)
    {
        $sqlQueryOrderProduct .= "INSERT INTO `orders_products` (`orderId`, `productId`) VALUES ('$last_order_id', '$product->id');";
    }

    // insert orders_products row
    $sqlResultOrderProduct = $db->multi_query($sqlQueryOrderProduct);

    if(!$sqlResultOrderProduct)
    {
        exit($db->error);
    }

    // return nothing
?>
