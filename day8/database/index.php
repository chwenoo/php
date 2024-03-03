<?php

// Select Data With MySQL

include 'MySQLi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] ?? '' === "DELETE") {
        // echo "Delete!"; die();
        $id = $_POST['id'];
        $sql = "DELETE FROM guests WHERE id =" . $id . ";";
        $result = $conn->query($sql);
    }
}

$sql = "SELECT * FROM guests";

$result = $conn->query($sql);

// if ($result->num_rows > 0) {

//     echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><tr>";

//     while ($row = $result->fetch_assoc()) {
        
//         echo "<tr><td>". $row["id"]. "</td><td>". $row["name"]. "</td><td> ".$row["email"]."</td><tr>";

//     }
//     echo "</table>";    
// } else {
//     echo "0 results found";
// }

// $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div>
            <table class="table table-striped">
                <tr>
                    <th>NO</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Action</th>
                </tr>
                <?php $i = 1 ?>
                <?php while ($row = $result->fetch_assoc())  : ?>
                    <div>
                        <tr>
                            <td><?= $i ?> </td>
                            <td><?= htmlentities($row['name']) ?> </td>
                            <td><?= htmlentities($row['email']) ?> </td>
                            <td>
                                <form action="index.php" method="POST" >
                                    <input type="hidden" name="id" value=<?= $row['id'] ?>>
                                    <input type="hidden" name="action" value="DELETE">
    
                                    <button class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++?>
                    </div>
                <?php endwhile;?>
            </table>
        </div>
    </div>
</body>
</html>