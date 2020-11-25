<?php

session_start();
include('includes/db_connection.php');

if(!empty($_POST)){ 

  $email = $_POST['email'];
  $password = $_POST['password'];

    $sqlQuery = "SELECT * FROM `user_login` WHERE `email` = '$email' AND `password` = '$password'";

  $sqlResult = $db->query($sqlQuery);

  if($sqlResult->num_rows > 0) 
  {
   
    while($row = $sqlResult->fetch_assoc())
    {
      $_SESSION['email'] = $row['email'];
      $_SESSION['role'] = $row['role'];
      break;
    }
    header("Location:checkout.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php") ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <div class="main"> 
    <main>
    <form name="loginForm" method="Post" action="">
    <img class="logo" src="image/shopper.png" alt="brand card" width="100px" height="100px">
    <p class="login">Sign In</p>
      
      <input id="email" type="text" name="email" class="username"><br/>

      <input id="password" type="password" name="password" class="password"><br/>


      <br /><br />

      <input type="submit" value="Login" class="submit">
      <p id="errors"></p>
    </form>
  </main>
  </div>
  
  <div class="clear"></div>
  <?php include("includes/footer.php") ?>
</body>
</html>
