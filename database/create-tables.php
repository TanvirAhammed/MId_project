<?php
    $servername = "localhost";
    $username = "root";//DB default username is root
    $password = "";//DB default password in empty/null
    $dbname = "ticketing_sys";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // sql to create table
    $sql = "CREATE TABLE users (
    username VARCHAR(30) PRIMARY KEY NOT NULL,
    fullname VARCHAR(30) NOT NULL,
    gender VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    userpass VARCHAR(50) NOT NULL,
    dob VARCHAR(20) NOT NULL,
    utype VARCHAR(20) NOT NULL,
    img VARCHAR(20) NOT NULL,
    verified VARCHAR(10) NOT NULL,
    UNIQUE (username, email)
    )";
    if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
    } else {
    echo "Error creating table: " . $conn->error;
    }
    $conn->close();
?>
<br>
<?php
    $servername = "localhost";
    $username = "root";//DB default username is root
    $password = "";//DB default password in empty/null
    $dbname = "ticketing_sys";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    // sql to create table
    $sql = "CREATE TABLE movies (
    id VARCHAR(10) PRIMARY KEY NOT NULL,
    moviename VARCHAR(50) NOT NULL,
    showtime VARCHAR(30) NOT NULL,
    UNIQUE (id)
    )";
    if ($conn->query($sql) === TRUE) {
    echo "Table movies created successfully";
    } else {
    echo "Error creating table: " . $conn->error;
    }
    $conn->close();
?>