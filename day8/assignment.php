<?php

$conn = new mySqli("localhost", "root", "", "php_project");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// echo "Connected successfully";


if ($_SERVER["REQUEST_METHOD"] === "POST") { 

        $title = $_POST['title'];
        $body = $_POST['body'];
        $stmt = $conn->prepare("INSERT INTO blog (title, body) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $body);
        $stmt->execute();

        // if ($conn->query($sql) === TRUE) { 
        //     $last_id = $conn->insert_id;
        //     $info = "New record created successfully. Last inserted ID is: ".$last_id;
        // } else {
        //     $info = "Error: ". $sql. "<br>". $conn->error;
        // }


    if ($_POST["action"] === "DELETE") {
        // echo $_POST['id']; die();
        $id = $_POST["id"];
        $delete_sql = "DELETE FROM blog WHERE id = $id";
        $conn->query($delete_sql);
    } 
    // if ($_POST["action"] === "DELETE") {
    //     // echo $_POST['id']; die();
    //     $id = $_POST["id"];
    //     $delete_sql = "DELETE FROM blog WHERE id = $id";
    //     $conn->query($delete_sql);
    // } 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
        <?php if (isset($info)) : ?>
            <div class="alert alert-info">
                <?= $info ?>
            </div>
        <?php endif ?>

        <form action="assignment.php" method="post" class="form w-50 m-auto">
            <h1 class="text-primary">Form</h1>
            <input type="text" name="title" class="form-control mb-2" placeholder="your title" required>
            <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="type your text ..." required></textarea> <br>
            
            <button class="btn btn-primary w-25">Add</button>
        </form>

        <div class="d-flex flex-wrap">
            <?php 
            $sql = "SELECT * FROM blog ORDER BY id DESC ";
            $result = $conn->query($sql);
            ?>
            <?php if ($result->num_rows > 0) :  ?>
                <!-- change result(Obj) to associative array -->
            
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="card w-50">
                        <div class="card-body">
                            <h4 class="card-title">Title : <?= $row['title'] ?></h4>
                            <p class="card-text">Body : <?= $row['body']?></p>
                            <form action="assignment.php" method="POST">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="action" value="DELETE">
                                <input type="submit" class="btn btn-danger w-100" value="Delete">
                            </form>
                        </div>
                    </div>
                <?php endwhile ?>
                <?php $conn->close() ?>
            <?php endif ?>    
        </div>
    </div>
</body>
</html>