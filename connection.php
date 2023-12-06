<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "FoodOrder";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "CREATE TABLE users (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     Fullname VARCHAR(70) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     pasword varchar(255) DEFAULT NULL
//     )";
// if ($conn->query($sql) === TRUE) {
//     echo "Table users created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }
// $sql = "CREATE TABLE foodinventory(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     dish_name VARCHAR(70) NOT NULL,
//     restaurant_name VARCHAR(100) NOT NULL,
//     price int,
//     email VARCHAR(50),
//     img LONGBLOB NOT NULL,
//     entry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
// if ($conn->query($sql) === TRUE) {
//     echo "Table users created successfully";
// } else {
//     echo "Error creating table: " . $conn->error;
// }
?>