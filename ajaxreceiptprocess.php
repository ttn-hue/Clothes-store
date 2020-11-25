<?php
    include('includes/db_connection.php');
    $orderId = $_POST['orderId'];

    // get information of order's customer
    $sqlQuery1 = "
        SELECT `customers`.*, `cards`.*, `orders`.`id` AS `orderId` FROM ((`customers` JOIN `cards` ON `customers`.`cardId` = `cards`.`id`) JOIN `orders` ON `customers`.`id` = `orders`.`customerId`) WHERE `orders`.`id`=$orderId;
    ";
    $sqlResult1 = $db->query($sqlQuery1);

    if(!$sqlResult1)
    {
        exit($db->error." query 1");
    }
    $customerRow = $sqlResult1->fetch_assoc();

    // get information of order's products
    $sqlQuery2 = "
        SELECT `products`.* FROM ((`orders_products` JOIN `orders` ON `orders_products`.`orderId` = `orders`.`id`) JOIN `products` ON `orders_products`.`productId` = `products`.`id`) WHERE `orders`.`id`=$orderId;
    ";
    $sqlResult2 = $db->query($sqlQuery2);

    if(!$sqlResult2)
    {
        exit($db->error." query 2");
    }
    ;

    // get information of order
    $sqlQuery3 = "
        SELECT * FROM orders WHERE orders.id=$orderId;
    ";
    $sqlResult3 = $db->query($sqlQuery3);

    if(!$sqlResult3)
    {
        exit($db->error." query 3");
    }
    $orderRow = $sqlResult3->fetch_assoc();

    echo '<h2>Receipt of payment</h2>
            <div class="receipt-header">
                <ul>
                    <li>Order Id: '.$customerRow['orderId'].'</li>
                    <li>Name: '.$customerRow['firstname'].' '.$customerRow['lastname'].'</li>
                    <li>Phone: '.$customerRow['phone'].'</li>
                    <li>Email: '.$customerRow['email'].'</li>
                    <li>Address: '.$customerRow['address'].'</li>
                    <li>Postcode: '.$customerRow['postcode'].'</li>
                    <li>City: '.$customerRow['city'].'</li>
                    <li>Province: '.$customerRow['province'].'</li>
                    <li>Card number: '.$customerRow['card-number'].'</li>
                    <li>Expiry month: '.$customerRow['expiry-month'].'</li>
                    <li>Expiry year: '.$customerRow['expiry-year'].'</li>
                </ul>
            </div>
            <div class="receipt-body">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>';
                    if($sqlResult2->num_rows>0)
                    {
                        while($productRow = $sqlResult2->fetch_assoc())
                        {
                            echo '<tr>
                                    <td>'.$productRow['name'].'</td>
                                    <td>1</td>
                                    <td>$'.number_format((float)$productRow['price'], 2, '.', '').'</td>
                                </tr>';
                        };
                    }


                    echo '<tr>
                        <th>Subtotal</th>
                        <td></td>
                        <td>$'.number_format((float)$orderRow['subtotal'], 2, '.', '').'</td>
                    </tr>
                    <tr>
                        <th>Tax</th>
                        <td></td>
                        <td>$'.number_format((float)$orderRow['tax'], 2, '.', '').'</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td></td>
                        <td>$'.number_format((float)$orderRow['total'], 2, '.', '').'</td>
                    </tr>
                </table>
            </div>'

?>
