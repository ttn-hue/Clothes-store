<?php
    
    include('includes/db_connection.php');
    
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $repeat = $_POST['repeat'];

    // insert data into the database
    $sqlQuery = "
        
        INSERT INTO user_login
        (email, password, role)
        VALUES
        ('$email', '$psw', 'manager');
    
    "; 

    $sqlResult = $db->query($sqlQuery);
    if(!$sqlResult)
    {
        exit($db->error);
        // exit('Some error occurred. Please try again...');
    }

    // show the output
    echo "A user with the role of manager has been created successfully! <br>";
    echo "Email: $email <br>";
    echo "Password: $psw <br>";
    echo "Role: Manager <br>";
    