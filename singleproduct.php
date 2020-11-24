<?php
session_start();
include('includes/db_connection.php');
$id = $_GET['id'];

$email = $_SESSION['email'];
$sqlQuery = "SELECT * FROM `products` WHERE `id` = '$id'";
$sqlResult = $db->query($sqlQuery);

if($sqlResult->num_rows > 0)
{

  while($row = $sqlResult->fetch_assoc())
  {
    $name = $row["name"];
    $description = $row["description"];
    $price = $row["price"];
    $priceFormat = number_format($price, 2, '.', '');
    break;
  }
}

if(!empty($_POST)){
 $singleItem = (object)['name' => $name, 'description' => $description, 'price' => $price, 'quantity' => $_POST["quantity"]];
    $itemList = [];
    if(!$_SESSION['shoppingcart']){
        array_push($itemList, $singleItem);
        $_SESSION['shoppingcart'] = $itemList;
    }else{
        $itemList = $_SESSION['shoppingcart'];

        array_push($itemList, $singleItem);

        $_SESSION['shoppingcart'] = $itemList;
    }
 header("Location:shoppingcart.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php") ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <form name="" method="Post" action="">
    <section class="products">
        <div class="product-card">
            <div class="product-image">
             <img src="image/product-1.jpg">
            </div>
            <div class="product-info">
                <p class="title"><?php echo $name ?></p>
                <p class="real-price">$<?php echo $priceFormat ?></p>
                <p class="lowered">$90.00</p>
                <div class="grade">
                    <div class="stars">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                    </div>
                <p class="text-review">25 Reviews</p>
            </div></br></br>
                <p>Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out and illustrated magazine and housed in a nice, glided frame.</p></br>

                <p><?php echo $description?></p></br>

                <div class="div-size">
                <p class="size">Size</p>
                <p class="required">(required)</p></br></br>
                 </div>

                <select class="select">
                    <option id="s">SMALL</option>
                    <option value="m">MEDIUM</option>
                    <option value="b">BIG</option>

                </select></br></br>
                <div class="div-quantity">
                <input type="text" id="quantity" name="quantity" placeholder="1" maxlength="2">
                <input type="submit" value="Add item to cart" class="button-cart">
                </div></br>

                <p class="category">Category</p>
                <p class="descriptions">Top and blouses</p> </br>
                <p class="tags">Tags</p>
                <p class="descriptions">Leisure, elegant</p>
            </div>
        </div>
 </section>
 <p id="errors"></p>
</form>
    <?php include("includes/footer.php") ?>
</body>
</html>
