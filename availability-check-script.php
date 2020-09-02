<?php
include "config.php";
if (isset($_POST['key']) == "usernameCheck") {
    $username = $_POST['username'];
    $query = "SELECT * FROM bird_check_usernames WHERE username='$username'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        echo "<h2 style='color:red'>test^not available</h2>";
    }else{
        echo "<h2 style='color:green'>test^available</h2>";
    }

}


/*if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $query = "SELECT * FROM bird_check_usernames WHERE username='$username'";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        echo "<h2 style='color:red'>test^not available</h2>";
    }else{
        echo "<h2 style='color:green'>test^available</h2>";
    }

}*/
