<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php") ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <section class="products">
        <div class="product-card">
            <div class="product-image">
             <img src="image/product-1.jpg"> 
            </div>
            <div class="product-info">
                <p class="title">Dress</p>
                <p class="real-price">$65.00</p>
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
                <button class="button-cart">Add item to cart</button>
                </div></br>
               
                <p class="category">Category</p>
                <p class="descriptions">Top and blouses</p> </br>
                <p class="tags">Tags</p>
                <p class="descriptions">Leisure, elegant</p>
            </div>
        </div>
 </section>
    <?php include("includes/footer.php") ?>
</body>
</html>