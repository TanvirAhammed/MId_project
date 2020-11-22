<?php
    $username = "root";
    $server = "localhost";
    $password = "";

    $con = new mysqli($server, $username, $password);

    $que = "CREATE DATABASE ticketing_sys";

    if($con->connect_error)
    {
        die("Connection error!");
    }
    
    if($con->query($que))
    {
        echo "Database created successfully";
    }
    else {
        echo "Database creation failed...!";
    }

    $con->close();
?>