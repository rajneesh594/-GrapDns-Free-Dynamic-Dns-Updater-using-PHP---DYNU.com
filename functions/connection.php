<?php
{
    $host = "127.0.0.1";
    $user = "root";
    $password = "";
    $database = "noti";
     $connection = mysqli_connect($host, $user, $password,$database);
    if (!$connection) {
        die("error " . mysqli_connect_error());
    }
    
}

?>