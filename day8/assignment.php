<?php

$conn = new mySqli("localhost", "root", "", "php_project");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    
    


    if (isset($_POST["action"]) ?? "" === "DELETE") {
        // echo $_POST['id']; die();
        $id = $_POST["id"];
        $delete_sql = "DELETE FROM blog WHERE id = $id;";
        $conn->query($delete_sql);
        // $result = $conn->query($delete_sql);
    }else{
        $title = $_POST['title'];
        $body = $_POST['body'];
        $stmt = $conn->prepare("INSERT INTO blog (title, body) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $body);
        $stmt->execute();
    }
}

$sql = "SELECT * FROM blog ORDER BY id DESC ";
$result = $conn->query($sql);
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
            <div class="alert alert-info mt-3">
                <?= $info ?>
            </div>
        <?php endif ?>

        <form action="assignment.php" method="post" class="form w-50 mx-auto mt-3">
            <h1 class="text-primary">Form</h1>
            <input type="text" name="title" class="form-control mb-2" placeholder="your title" required>
            <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="type your text ..." required></textarea> <br>
            
            <button class="btn btn-primary w-25">Add</button>
        </form>

        <div>
            <table class="table table-striped mt-5">
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
                            <td><?= htmlentities($row['title']) ?> </td>
                            <td><?= htmlentities($row['body']) ?> </td>
                            <td>
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" >
                                    <input type="hidden" name="id" value=<?= $row['id'] ?>>
                                    <input type="hidden" name="action" value="DELETE">
    
                                    <button type="submit" class="btn btn-danger">DELETE</button>
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