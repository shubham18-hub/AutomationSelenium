<?php
    $host = 'localhost';
    $database = 'store';
    $username = 'root';
    $password = '';
    
    $con= mysqli_connect($host, $username, $password, $database);

    if(!$con)
    {
        die("Connection failed". mysqli_connect_errno());
    }
?>
