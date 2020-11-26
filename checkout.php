<?php
session_start();
include('includes/db_connection.php');
if(isset($_SESSION['email'])){ // authentification
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <?php include("includes/head.php") ?>
    <script>
    $(document).ready(function(){
            // update tax value by select province
            $('#proviceSelect').on('change', function(){
                var province = $('#proviceSelect option:selected').val();
                var subtotal = $('#subtotal').text().replace('$', '');

                // ajax call
                $.ajax({
                    type : 'POST',
                    url : 'ajaxtaxprocess.php', // file for tax processing
                    data : {
                        province : province,
                        subtotal : subtotal,
                    },
                    success : function(result){
                        $('#tax').html(`$${result}`);
                        var subtotal = $('#subtotal').text().replace('$', '');
                        var subtotal = parseFloat(subtotal);
                        var tax = parseFloat(result);
                        var total = subtotal + tax;

                        $('#total').html(`$${total}`);

                    }
                })

            });

            // checkout submit with ajax
            $('#checkoutForm').on('submit', function(e){
                e.preventDefault();
                // get variables
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var postcode = $('#postcode').val();
                var address = $('#address').val();
                var city = $('#city').val();
                var province = $('#proviceSelect option:selected').text();
                var cardNumber = $('#cartnumber').val();
                var expiryMonth = $('#expirymonth').val();
                var expiryYear = $('#expiryyear').val();
                var subtotal = $('#subtotal').text().replace('$', '');
                var tax = $('#tax').text().replace('$', '');
                var total = $('#total').text().replace('$', '');

                // console.log(subtotal + " " + tax + " " + total + " " + province + " " + city + " " + address + " " + postcode + " " + phone + " " + email + " " + lastname + " " + firstname + " " + cardNumber + " " + expiryMonth + " " + expiryYear);

                // ajax call
                $.ajax({
                    type    : 'POST',
                    url     : 'ajaxcheckoutprocess.php',
                    data    : {
                        'firstname' : firstname,
                        'lastname' : lastname,
                        'email' : email,
                        'phone' : phone,
                        'postcode' : postcode,
                        'address' : address,
                        'city' : city,
                        'province' : province,
                        'cardNumber' : cardNumber,
                        'expiryMonth' : expiryMonth,
                        'expiryYear' : expiryYear,
                        'subtotal' : subtotal,
                        'tax' : tax,
                        'total' : total
                    },
                    success : function(result) {
                        localStorage.setItem('order_id', result);
                        window.location.href = 'receipt.php';
                    }
                });
            });
        });
    </script>
    </head>
    <body>
        <?php include("includes/nav.php") ?>
        <section class="section-breadcumb">
            <div class="row">
                <span><a href="#">Home</a></span>
                <span><i class="fa fa-angle-right fa-lg"></i></span>
                <span><a href="#">Product</a></span>
                <span><i class="fa fa-angle-right fa-lg"></i></span>
                <span>Check out</span>
            </div>
        </section>
        <section class="section-checkout">
            <div class="row">
                <div class="checkout-title">
                    <h1>Checkout</h1>
                </div>
            </div>
            <div class="row">
                <form action="" id="checkoutForm" method="POST">
                    <div class="checkout-wrapper">
                        <div class="checkout-form">
                            <div class="billing-details">
                                <h2>Billing Details</h2>
                                <div class="fullname">
                                    <div class="firstname">
                                        <label for="firstname">First Name</label>
                                        <input type="text" id="firstname" placeholder="First Name" name="firstname">
                                    </div>
                                    <div class="lastname">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" id="lastname" placeholder="Last Name" name="lastname">
                                    </div>
                                </div>
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" id="phone" placeholder="Phone">
                                <label for="postcode">Postcode</label>
                                <input type="text" name="postcode" id="postcode" placeholder="Postcode">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" placeholder="Address">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" placeholder="City">
                                <label for="province">Province</label>
                                <select name="province" id="proviceSelect">
                                    <option>Select</option>
                                    <option value="ON">Ontario</option>
                                    <option value="MB">Manitoba</option>
                                    <option value="BC">British Columbia</option>
                                    <option value="QC">Quebec</option>
                                    <option value="AB">Alberta</option>
                                    <option value="SK">Saskatchewan</option>
                                    <option value="NL">Newfoundland and Labrador</option>
                                    <option value="PE">Prince Edward Island</option>
                                    <option value="NS"> Scotia</option>
                                    <option value="NU">Nunavut</option>
                                    <option value="NT">Northwest</option>
                                    <option value="YT">Yukon</option>
                                </select>
                            </div>
                            <div class="payment-details">
                                <h2>Payment Details</h2>
                                <label for="cartnumber">Card Number</label>
                                <input type="text" name="cartnumber" id="cartnumber" placeholder="Card Number">
                                <label for="expirymonth">Expiry Month</label>
                                <input type="text" name="expirymonth" id="expirymonth" placeholder="Expiry Month">
                                <label for="expiryyear">Expiry Year</label>
                                <input type="text" name="expiryyear" id="expiryyear" placeholder="Expiry Year">
                            </div>
                        </div>
                        <div class="checkout-order">
                            <h2>Order Items</h2>
                            <div class="order-item-list">
                                <?php
                                    $shoppingcart = $_SESSION['shoppingcart'];
                                    foreach($shoppingcart as $object)
                                    {
                                        ?>
                                            <div class="single-order">
                                                <img src="image/product-1.jpg" alt="order item image">
                                                <ul>
                                                    <li><?php echo $object->name; ?></li>
                                                    <li><?php echo "$".number_format((float)$object->price, 2, '.', ''); ?></li>
                                                    <li><br></li>
                                                    <li>Quantity: <?php echo $object->quantity; ?></li>
                                                    <li>Size: M</li>
                                                    <li>Color: Red</li>
                                                </ul>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="order-body">
                                <ul>
                                    <?php
                                        $subtotal = 0.00;
                                        $tax = 0.00;
                                        $total = 0.00;

                                        $shoppingcart = $_SESSION['shoppingcart'];
                                        foreach($shoppingcart as $object)
                                        {
                                            // get subtotal amount
                                            $price = number_format((float)$object->price, 2, '.', '');
                                            $subtotal += (float)$object->quantity * $price;
                                        }
                                        $subtotal = number_format((float)$subtotal, 2, '.', '');
                                        $total += $subtotal + $tax;
                                        $total = number_format((float)$total, 2, '.', '');
                                    ?>
                                        <li><span>Subtotal</span><span id="subtotal"><?php echo "$".$subtotal; ?></span></li>
                                        <li><span>Tax</span><span id="tax">$0.00</span></li>
                                        <li><span>Total</span><span id="total"><?php echo "$".$total; ?></span></li>
                                        <?php
                                    ?>

                                </ul>
                            </div>
                            <input class="btn order-btn" name="submit" type="submit" value="Place Order">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php include("includes/footer.php"); ?>
        <div id="formResult">
        </div>
    </body>
    </html>
<?php
} else {
    $_SESSION["back"] = "checkout";
    header('Location:login.php');
    exit();
}
?>
