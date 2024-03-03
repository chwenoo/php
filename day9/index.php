<?php

// Select Data With MySQL

include 'MySQLi.php';

// $sql = "SELECT id, name, email, register_date FROM guests WHERE name = 'John Doe'";
// $sql = "SELECT * FROM guests WHERE name = 'John Doe'";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    if ($_POST["action"] ?? '' === "DELETE") {

    } else {

        if (empty($_POST["title"])) {
            $titleErr = "* Title is required";
        } else {
            $title = testInput($_POST["title"]);
            // PHP - Validate Name
            if(!preg_match("/^[a-zA-Z-' ]*$/", $title)) {
                $titleErr = "* Only letters and spaces are allowed";
            }
        }
    }
}



$sql = "SELECT * FROM guests ORDER BY name";


$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Register Date</th><tr>";

    while ($row = $result->fetch_assoc()) {
        
        echo "<tr><td>". $row["id"]. "</td><td>". $row["name"]. "</td><td> ".$row["email"]. "</td><td>". $row["register_date"]."</td><tr>";

    }
    echo "</table>";    
} else {
    echo "0 results found";
}

$conn->close();

?>