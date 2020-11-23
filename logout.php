<?php 
  session_start();
  session_destroy(); // deletes the session
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Shopper</title>
</head>
<body>
<nav>
    <div class="row">
            <div class="wrapper">
                <ul class="main-nav-left">
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="logo-middle">
                    <p class="logo-branch">Shopper</p>
                </div>
                <ul class="main-nav-right">
                    <li><a href="login.php">Sign in</a></li>
                    <li><a href="#">Sign up</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <li><a href="#"><i class="fa fa-search fa-ms"></i></a></li>
                    <li><a href="#"><i class="fa fa-user fa-ms"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart fa-ms"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
  <main>
    <div class="logout">
    <img class="logout_image" src="image/logout.png" alt="logout_image" width="40px" height="50px">
        <p>Successfully logged out!</p>
    </div>
  </main>
  <footer>
        <div class="row">
            <div class="footer-wrapper">
                <div class="branch">
                    <p class="logo-branch">Shopper</p>
                    <p class="big-tech-icons">
                        <span><i class="fa fa-facebook sm"></i></span>
                        <span><i class="fa fa-twitter sm"></i></span>
                        <span><i class="fa fa-youtube sm"></i></span>
                        <span><i class="fa fa-instagram sm"></i></span>
                    </p>
                </div>
                <div class="support">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Size Guide</a></li>
                        <li><a href="#">Shipping & Returns</a></li>
                    </ul>
                </div>
                <div class="shop">
                    <h3>Shop</h3>
                    <ul>
                        <li><a href="#">Men's shoping</a></li>
                        <li><a href="#">Women's shopping</a></li>
                        <li><a href="#">Kid's Shopping</a></li>
                        <li><a href="#">Discounts</a></li>
                    </ul>
                </div>
                <div class="company">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy & Cookie Policy</a></li>
                    </ul>
                </div>
                <div class="Contact">
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="#">123-123-1234</a></li>
                        <li><a href="#">345-345-3456</a></li>
                        <li><a href="#">help@shopper.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="divider">
        </div>
        <div class="row">
            <div class="copyright">
                <p>@2020 All rights reserved.</p>
                <div>
                    <img src="image/brand-card.png" alt="brand card">
                </div>
            </div>
        </div>
    </footer>
</body>
</html>