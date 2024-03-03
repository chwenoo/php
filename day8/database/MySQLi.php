<?php

$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "php_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// echo "Connect successfully";


// Create database
// $sql = "CREATE DATABASE php_project";

// if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: ". $conn->error;
// }

// Create table
// $sql = "CREATE TABLE php_project.guests (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     email VARCHAR(255),
//     register_date DATETIME DEFAULT CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table users created successfully";
// } else {
//     echo "Error creating table: ". $conn->error;
// }

// $sql = "INSERT INTO php_project.guests (name, email) VALUES ('John Doe', 'John@example.com');";

// if ($conn->query($sql) === TRUE) { 
//     echo "New record created successfully";
// } else {
//     echo "Error: ". $sql. "<br>". $conn->error;
// }

// $sql = "INSERT INTO php_project.guests (name, email) VALUES ('Alice', 'John@example.com');";

// if ($conn->query($sql) === TRUE) { 
//     $last_id = $conn->insert_id;
//     echo "New record created successfully. Last inserted ID is: ".$last_id;
// } else {
//     echo "Error: ". $sql. "<br>". $conn->error;
// }

// $sql = "INSERT INTO php_project.guests (name, email) VALUES ('Henary', 'John@example.com');";
// $sql .= "INSERT INTO php_project.guests (name, email) VALUES ('Bob', 'John@example.com');";
// $sql .= "INSERT INTO php_project.guests (name, email) VALUES ('Mary', 'John@example.com');";

// if ($conn->multi_query($sql) === TRUE) { 
//     $last_id = $conn->insert_id;
//     echo "New record created successfully. Last inserted ID is: ".$last_id;
// } else {
//     echo "Error: ". $sql. "<br>". $conn->error;
// }

// Prepared Statement in MySQLi

// prepare and bind 
// $stmt = $conn->prepare("INSERT INTO php_project.guests (name, email) VALUES (?, ?)");
// $stmt->bind_param("ss", $username, $email);

// // set parameters and execute
// $username = "John Smith";
// $email = "john.smith@gmail.com";

// $stmt->execute();

// echo "New records created successfully";

// $stmt->close();
// $conn->close();



// $conn->close();