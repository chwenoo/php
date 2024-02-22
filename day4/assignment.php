<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $passwordErr = $confirmPasswordErr = "";
$name = $email = $gender = $website = $comment = $password = $confirmPassword ="";

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

    if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr) && empty($commentErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
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
        <alert class="alert alert-info d-block rounded-0 border-0">login user : <?= $name ?></alert>
    <?php } ?>

    <div class="container my-4" style="max-width: 576px">
        <h1 class="text-center mb-2 text-primary" >PHP Form Validation Example</h1>


        <form action="<?= "assignment.php"  ?>" method="post" class="form" >

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
                $user = [$name, $email, $gender, $website, $comment];
    
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
                    $currentUser["gender"] = fgets($readfile);
                    $currentUser["website"] = fgets($readfile);
                    $currentUser["comment"] = fgets($readfile);
    
                    // Add the current user to the array of list
                    $list[] = $currentUser;
    
                    // Reset current user data for the next user
                    $currentUser = [];
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