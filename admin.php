<?php
include('includes/db_connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/head.php") ?>
</head>
<body>
    <?php include("includes/nav.php") ?>
    <div>
    <div id="admin-container">
      <main> 
    <table id="customers">
      <thead>
      <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th>Role</th>
        </tr>
      </thead> 
      <tbody>
      <?php
          $sqlQuery = "SELECT * FROM `user_login`";
          $sqlResult = $db->query($sqlQuery); // execute the query
          if($sqlResult->num_rows > 0) // if data is returned from DB
          {
            // iterate through the rows
            while($row = $sqlResult->fetch_assoc())
            {
              ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['password']; ?></td>
                  <td><?php echo $row['role']; ?></td>
                </tr>
              <?php
            }
          }
        ?>
      </tbody> 
    </table>
      </main>
    </div>
    <?php include("includes/footer.php") ?>
</body>
</html>