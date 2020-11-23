<?php include('includes/db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php
    include('includes/head.php');
?>
<body>
    <?php include('includes/nav.php') ?>
    <header>
        <div class="header-text-box">
            <div class="header-primary-text">
                <p id="small-text">Summer Styles</p>
                <p id="big-text">50% OFF</p>
            </div>
        </div>
    </header>
    <section class="big-images">
        <div class="big-images-wrapper">
            <ul>
                <li><img src="image/big-image-3.jpg" alt="image-3"></li>
                <li><img src="image/big-image-1.jpg" alt="image-1"></li>
                <li><img src="image/big-image-2.jpg" alt="image-2"></li>
            </ul>
        </div>
    </section>
    <section class="section-newarrivals">
        <h1>New Arrivals</h1>
        <div class="product-collection">
            <ul>
                <?php
                    $sqlQuery = "SELECT * FROM `products`";
                    $sqlResult = $db->query($sqlQuery);
                    if($sqlResult->num_rows > 0)
                    {
                        // iterate through the rows
                        while($row = $sqlResult->fetch_assoc())
                        {
                            ?>
                                <li>
                                    <div class="product-thumbnail">
                                        <?php echo "<a href='singleproduct.php?id=".$row['id'] ?>
                                            <img src="image/product-1.jpg" alt="product image">
                                            <p class="product-name"><?php echo $row['name'] ?></p>
                                            <p class="product-price"><?php echo "$".$row['price']; ?></p>
                                        </a>
                                    </div>
                                </li>
                            <?php
                        }
                    }
                ?>

            </ul>
        </div>
    </section>
    <?php include('includes/footer.php') ?>
</body>
</html>
