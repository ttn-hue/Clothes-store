<?php
$subtotal = 0.00;
$tax = 0.00;
$total = 0.00;

//$shoppingcart = $_SESSION['shoppingcart'];
//foreach($shoppingcart as $object)
{
// get subtotal amount
//$subtotal += $object->quantity * $object->price;
                        }
// calculate tax
//$tax = calculateTax($subtotal, $province);
// get total amount
$total += $subtotal + $tax;

// function for calculating taxes
 //function calculateTaxt($subtotal, $province)
 //{
    
 //}
 //echo "Works";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php") ?>
<script>
    $('#proviceSelect').on('change', function(){
                    var province = $('#proviceSelect option:selected').text();
                    var subtotal = $('#subtotal').text().replace('$', '');
                    subtotal = parseFloat(subtotal);

                    // ajax call
                    $.ajax({
                        type : 'POST',
                        url : 'ajaxcheckout.php', // file for tax processing
                        data : {
                            province : province,
                            subtotal : subtotal
                        },
                        success : function(result){
                            $('#tax').html(result)
                        }
                    })

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
            <form name="checkoutform" id="checkoutform" action="" method="POST">
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
                            <select name="province">
                                <option value="ON">Ontario</option>
                                <option value="MB">Manitoba</option>
                                <option value="BC">British Columbia</option>
                                <option value="QC">Quebec</option>
                                <option value="AB">Alberta</option>
                                <option value="SK">Saskatchewan</option>
                                <option value="NL">Newfoundland and Labrador</option>
                                <option value="PE">Prince Edward Island</option>
                                <option value="NS">Nova Scotia</option>
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
                            <div class="single-order">
                                <img src="image/product-1.jpg" alt="order item image">
                                <ul>
                                    <li>Cotton floral print Dress</li>
                                    <li>$40.00</li>
                                    <li><br></li>
                                    <li>Size: M</li>
                                    <li>Color: Red</li>
                                </ul>
                            </div>
                            <div class="single-order">
                                <img src="image/product-2.jpg" alt="order item image">
                                <ul>
                                    <li>Suede cross body Bag</li>
                                    <li>$49.00</li>
                                    <li><br></li>
                                    <li>Color: Brown</li>
                                </ul>
                            </div>
                        </div>
                        <div class="order-body">
                            <ul>
                                <li><span>Subtotal</span><span id="subtotal">$89.00</span></li>
                                <li><span>Tax</span><span>$8.00</span></li>
                                <li><span>Total</span><span>$97.00</span></li>
                            </ul>
                        </div>
                        <input class="btn order-btn" type="submit" value="Place Order">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php include("includes/footer.php") ?>
</body>
</html>