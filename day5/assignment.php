<?php
// define variables and set to empty values
$nameErr = $emailErr = $imgErr = $genderErr = $websiteErr = $passwordErr = $confirmPasswordErr = "";
$name = $email = $img = $gender = $website = $comment = "";

function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$formSubmitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "* Name is required";
    } else {
        $name = testInput($_POST["name"]);
        // PHP - Validate Name
        if(!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "* Only letters and spaces are allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
    } else {
        $email = testInput($_POST["email"]);
        // PHP - Validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Invalid email format";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "* Gender is required";
    } else {
        $gender = testInput($_POST["gender"]);
    }

    if (empty($_POST["website"])) {
        $websiteErr = "* Website URL is required";
    } else {
        $website = testInput($_POST["website"]);
        // check if url address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (isset($_POST["submit"])) {

        if ($_FILES["fileToUpload"]["size"] === 0) {
            $imgErr = "* Image file is required";
        } else {
            $target_dir = "uploads/";
            $target_file = $target_dir. basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            // print_r($check);
            if($check !== false) {
                // echo "File is an image - ". $check["mime"]. ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                // echo "Sorry, file already exists.";
                $uploadOk = -1;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                // echo "Sorry, your file is too large.";
                $uploadOk = -2;
            }

            // Allow certain file formats
            if($imageFileType!= "jpg" && $imageFileType!= "png" && $imageFileType!= "jpeg"
            && $imageFileType!= "gif" ) {
                // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = -3;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $imgErr = "* Sorry, File is not an image and your file was not uploaded.";
            } elseif ($uploadOk === -1) {
                $imgErr = "* Sorry, File already exists!";
            } elseif ($uploadOk === -2) {
                $imgErr = "* Sorry, Your file is too large!";
            } elseif ($uploadOk === -3) {
                $imgErr = "* Sorry, Only JPG, JPEG, PNG & GIF files are allowed!";
            } else {
            // if everything is ok, try to upload file

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $img = $target_file;
                } else {
                    $imgErr = "Sorry, there was an error uploading your file.";
                }
            }
        }
    }

    if (empty($_POST["comment"])) {
        $commentErr = "* Comment is required";
    } else {
        $comment = testInput($_POST["comment"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "* Password is required";
    } else {
        $password = $_POST["password"];
        if (empty($_POST["password"]) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
            $passwordErr = "* Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit";
        } else {
            $password = $_POST["password"];
        }
    }

    if (empty($_POST["confirm-password"]) || ($_POST["confirm-password"] !== $_POST["password"])) {
        $confirmPasswordErr = "* Passwords doesn't not match";
    } else {
        $confirmPassword = $_POST["confirm-password"];
    }

    if (empty($nameErr) && empty($emailErr) && empty($imgErr) && empty($genderErr) && empty($websiteErr) && empty($commentErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $formSubmitted = true;
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
</head>
<body>
    <?php if ($formSubmitted) { ?>
        <alert class="alert alert-info d-block rounded-0 border-0">
            <span class="fw-semibold">login user : </span> <?= $name ?>
        </alert>
    <?php } ?>

    <div class="container my-4" style="max-width: 576px">
        <h1 class="text-center mb-2 text-primary" >PHP Form Validation Example</h1>

        <form action="<?= "assignment.php"  ?>" method="post" class="form"  enctype="multipart/form-data">

            <label for="" class="form-label fw-semibold">Name: </label>    
            <input type="text" name="name" value="<?= $name; ?>" class="form-control">
            <span class="error text-danger form-text d-block mb-1"> <?= $nameErr;?> </span>

            <label for="" class="form-label fw-semibold">E-mail: </label>
            <input type="email" name="email" value="<?= $email; ?>" class="form-control" >
            <span class="error text-danger form-text d-block mb-1"> <?= $emailErr;?> </span>

            <label for="" class="form-label fw-semibold">Website: </label>
            <input type="text" name="website" value="<?= $website; ?>" class="form-control">
            <span class="error text-danger form-text d-block mb-1"> <?= $websiteErr;?> </span>
   
            <label for="" class="form-label fw-semibold">Comment: </label>
            <textarea name="comment" rows="5" cols="40" class="form-control mb-2"><?= $comment; ?> </textarea>
            
            <label for="fileToUpload" class="form-label fw-semibold" >Upload Image: </label>
            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
            <span class="error text-danger form-text d-block mb-1"> <?= $imgErr;?> </span>

            <label for="" class="form-label fw-semibold d-block mt-2">Gender:</label>            
            <input type="radio" name="gender"
            <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
            value="female"> Female
            <input type="radio" name="gender"
            <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
            value="male"> Male
            <input type="radio" name="gender"
            <?php if (isset($gender) && $gender == "other") echo "checked"; ?>
            value="other"> Other
            <span class="error text-danger form-text d-block mb-1"> <?= $genderErr;?> </span>

            <label for="password" class="form-label fw-semibold">Password: </label>
            <input type="password" name="password" class="form-control" id="password">
            <span class="error text-danger form-text d-block mb-1"> <?= $passwordErr;?> </span>
            
            <label for="confirmPassword" class="form-label fw-semibold">Confirm Password: </label>
            <input type="password" name="confirm-password" class="form-control" id="confirmPassword">
            <?php if($confirmPasswordErr) { ?>
                <span class="form-text text-danger d-block mb-1">
                    <?= $confirmPasswordErr; ?>
                </span>
            <?php } ?>
    
            <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3 w-100">
        </form>
    </div>

    <div class="container">
        <h3 class="mt-5 mb-4 text-primary text-center">Register Users List</h3>
        <?php    
            $list = [];
    
            if ($formSubmitted) {
                $myfile = fopen('registerUsersList.txt', 'a') or die("Unable to open file");
                $user = [$name, $email, $img, $gender, $website, $comment];
    
                foreach ($user as $data) {
                    fwrite($myfile, $data);
                    fwrite($myfile, "\n");
                }
                fclose($myfile);
                
                $readfile = fopen('registerUsersList.txt', 'r') or die("Unable to open file");
                $currentUser = [];
    
                while (!feof($readfile)) {
                    // Add key-value pair to the current user data
                    $currentUser["name"] = fgets($readfile);
                    $currentUser["email"] = fgets($readfile);
                    $currentUser["img"] = fgets($readfile);
                    $currentUser["gender"] = fgets($readfile);
                    $currentUser["website"] = fgets($readfile);
                    $currentUser["comment"] = fgets($readfile);
    
                    // Add the current user to the array of list
                    // if($currentUser === []) break;
                    // $list[] = $currentUser;
    
                    // // Reset current user data for the next user
                    // $currentUser = [];

                    if(!empty($currentUser['name'])) {
                        $list[] = $currentUser;
                    }
                }   
                fclose($readfile);
            }
            // print_r($list);
        ?>
    
        <table class="table table-striped table-primary">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Gender</th>
                    <th>Website</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach ($list as $user) {?>
                        <tr>
                            <td><?= $user["name"]?></td>
                            <td><?= $user["email"]?></td>
                            <td><img src="<?= $user["img"]?>" alt="Profile" width=200; class="rounded" > </td>
                            <td><?= $user["gender"]?></td>
                            <td><?= $user["website"]?></td>
                            <td><?= $user["comment"]?></td>
                        </tr>
                    <?php }?>
            </tbody>
        </table>
    </div>   
</body>
</html>