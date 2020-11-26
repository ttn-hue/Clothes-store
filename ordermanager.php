<?php
session_start();
include('includes/db_connection.php');
if(isset($_SESSION['email']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "manager")){ // authentification and authorization
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
                    <span><a href="index.php">Home</a></span>
                    <span><i class="fa fa-angle-right fa-lg"></i></span>
                    <span>Order Management</span>
                </div>
            </section>
            <section class="section-list-order">
                <div class="row">
                    <h1>Order Management</h1>
                    <div id="list-order-wrapper">
                        <table>
                            <tr>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Postcode</th>
                                <th>City</th>
                                <th>Province</th>
                                <th>Total</th>
                                <th>Selected Products</th>
                            </tr>
                            <?php
                                // get information of all customers
                                $sqlQuery1 = "
                                SELECT `customers`.*, `cards`.*, `orders`.*, `orders`.`id` AS `orderId` FROM ((`customers` JOIN `cards` ON `customers`.`cardId` = `cards`.`id`) JOIN `orders` ON `customers`.`id` = `orders`.`customerId`);
                                ";
                                $sqlResult1 = $db->query($sqlQuery1);

                                if(!$sqlResult1)
                                {
                                    exit($db->error." query 1");
                                }
                                $customerRow = $sqlResult1->fetch_assoc();

                                if($sqlResult1->num_rows>0)
                                {
                                    while($customerRow = $sqlResult1->fetch_assoc())
                                    {
                                        ?>
                                                    <!-- display order's customer infor -->
                                                    <tr>
                                                    <td><?php echo $customerRow['orderId']; ?></td>
                                                    <td><?php echo $customerRow['firstname']; ?></td>
                                                    <td><?php echo $customerRow['phone']; ?></td>
                                                    <td><?php echo $customerRow['address']; ?></td>
                                                    <td><?php echo $customerRow['email']; ?></td>
                                                    <td><?php echo $customerRow['postcode']; ?></td>
                                                    <td><?php echo $customerRow['city']; ?></td>
                                                    <td><?php echo $customerRow['province']; ?></td>
                                                    <td><?php echo $customerRow['total']; ?></td>
                                                    <td>
                                                        <?php
                                                            $orderId = $customerRow['orderId'];
                                                            $sqlQuery2 = "
                                                                SELECT `products`.* FROM ((`orders_products` JOIN `orders` ON `orders_products`.`orderId` = `orders`.`id`) JOIN `products` ON `orders_products`.`productId` = `products`.`id`) WHERE `orders`.`id`=$orderId;
                                                            ";
                                                            // Query ordered products based on order Id
                                                            $sqlResult2 = $db->query($sqlQuery2);

                                                            if(!$sqlResult2)
                                                            {
                                                                exit($db->error." query 2");
                                                            };

                                                            if($sqlResult2->num_rows>0)
                                                            {
                                                                while($productRow = $sqlResult2->fetch_assoc())
                                                                {
                                                                    ?>
                                                                        <!-- display ordered products -->
                                                                        <ul class="selected-products">
                                                                            <li><?php echo $productRow['name'] ?></li>
                                                                            <li>Quantity: 1</li>
                                                                            <li><?php echo '$'.number_format((float)$productRow['price'], 2, '.', ''); ?></li>
                                                                        </ul>
                                                                    <?php
                                                                }

                                                            }
                                                        ?>
                                                    </td>
                                                </tr>

                                        <?php
                                    }
                                }
                            ?>
                        </table>
                        </div>
                    </div>
            </section>

            <?php include('includes/footer.php') ?>
        </body>

        </html>
    <?php
} else {
    $_SESSION["back"] = "order";
    header('Location:login.php');
    exit();
}
?>
