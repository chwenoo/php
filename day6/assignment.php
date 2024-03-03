<?php
$title = $body = "";
$titleErr = $bodyErr = "";
$notes = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "* Title is required";
    } else {
        $title = $_POST["title"];
        $title = filter_var($title, FILTER_SANITIZE_STRING);
    }

    if (empty($_POST["body"])) {
        $bodyErr = "* Body is required";
    } else {
        $body = $_POST["body"];
        $body = filter_var($body, FILTER_SANITIZE_STRING);
    }

    if (empty($titleErr) && empty($bodyErr)) {
        $myNote = ["title" => $title,"body" => $body];
        $notes[] = $myNote;
    }
}

$data = array_map(function ($x) {
    return $x;
}, $notes);

print_r($data);

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
        <h1 class="text-primary text-uppercase w-50 m-auto my-3">Notes</h1>

        <form action="assignment.php" method="post" class="form w-50 m-auto">
            <input type="text" name="title" class="form-control" placeholder="your title">
            <span class="text-danger"><?= $titleErr ?></span>
            <textarea name="body" id="" cols="30" rows="10" class="form-control mt-2 mb-0" placeholder="type your text ..."></textarea> <br>
            <span class="text-danger d-block mb-3"><?= $bodyErr ?></span>
            <button class="btn btn-primary w-25">Add</button>
        </form>

        <h3>My Notes</h3>
        
    </div>
</body>
</html>