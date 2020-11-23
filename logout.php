<?php 
  session_start();
  session_destroy(); // deletes the session
?><!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?>
</head>
<body>
     <?php include('includes/nav.php') ?>
  <main>
    <div class="logout">
    <img class="logout_image" src="image/logout.png" alt="logout_image" width="40px" height="50px">
        <p>Successfully logged out!</p>
    </div>
  </main>
  <?php include("includes/footer.php") ?>
</body>
</html>