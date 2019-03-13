<?php
    include "connect.php";
    $sql = "CREATE DATABASE ".$dbname." 
   DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
        echo "<br>";
    } else {
        echo "Error creating database: " . $conn->error;
        echo "<br>";
    }
    include "connect.php";
    $sql="CREATE TABLE users(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username varchar(255) UNIQUE NOT NULL,
pass varchar(255) NOT NULL,
sess varchar(255)
)";
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
        echo "<br>";
    } else {
        echo "Error creating table: " . $conn->error;
        echo "<br>";
    }

?>