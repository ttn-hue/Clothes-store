<?php
session_start();
include('includes/db_connection.php');
if(isset($_SESSION['email']) && $_SESSION['role'] == "admin"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/head.php") ?>
<script>
    
    $(document).ready(function(){
      $('#userform').on('submit', function(e){
        // stop the form from submitting
        e.preventDefault();
        //alert('form stopped');
        //fetch the fields
        var email = $('#email').val();
        var psw = $('#psw').val();
        var repeat = $('#psw-repeat').val();
        // ajax call
        $.ajax({
          type  : 'POST',
          url   : 'ajaxprocess.php',
          data  : {
            email : email,
            psw : psw,
            repeat : repeat
          },
          success : function(processeddata){
            $('#formResult').html(processeddata);
          }
        });

      });
    });

  </script>
</head>
<body>
<?php include('includes/nav.php') ?>
    <section> 
    <form name="userform" id="userform" method="Post" action="">
        <div class="register-container">
          <h2>Register</h2>
         
      
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required>
      
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
      
          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
          
          <input type="submit" value="Submit" name="submit"  class="registerbtn">
        </div>
    </form>
    </section>
    <section>
        <div class="formData">
            <p id="formResult"></p>
        </div>
    </section>
    <?php include("includes/footer.php") ?>
</body>
</html>
<?php
}else{
$_SESSION["back"] = "insertuser";
header('Location:login.php');
exit();
}
?>
