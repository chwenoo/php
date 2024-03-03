<?php
include '_classes/User.php';

$name = $email = $gender = $website = $comment = $password = $confirmPassword = "";
$nameErr = $emailErr = $genderErr = $websiteErr = $passwordErr = $confirmPasswordErr = "";
$formSubmitted = false;  

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $website = $_POST["website"];
    $comment = $_POST["comment"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    $user = new User($name, $email, $gender, $website, $comment, $password, $confirmPassword);

    if ($user->validateName() === false) {
        $nameErr = "Name is required";
    } else {
        if ($user->validateName() === false) {
            $nameErr = "* Only letters and spaces are allowed";
        } else {
            $name = $user->getName();
        }
    }

    if ($user->validateEmail() === false) {
        $emailErr = "Email is required";
    } else {
        if ($user->validateEmail() === false) {
            $emailErr = "* Invalid email format";
        } else {
            $email = $user->getEmail();
        }
    }
    
    if ($user->validateGender() === false) {
        $genderErr = "Gender is required";
    } else {
        $gender = $user->getGender();
    }

    if ($user->validateWebsite() === false) {
        $websiteErr = "Website is required";
    } else {
        $website = $user->getWebsite();
    }

    if ($user->validateComment() === false) {
        $commentErr = "Comment is required";
    } else {
        $comment = $user->getComment();
    }

    if ($user->validatePassword() === false) {
        $passwordErr = "Password is required";
    } else {
        if ($user->validatePassword() === false) {
            $passwordErr = "* Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit";
        } else {
            $password = $user->getPassword();
        }
    }

    if ($user->validateConfirmPassword() === false) {
        $confirmPasswordErr = "Confirm password is required";
    } else {
        $confirmPassword = $user->getConfirmPassword();
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
        <alert class="alert alert-info d-block">login user : <?= $name ?></alert>
    <?php } ?>

    <div class="container my-4" style="max-width: 576px">
        <h1 class="text-center mb-2 text-primary" >PHP Form Validation Example</h1>

        <form action="assignment.php" method="post" class="form" >

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
</body>
</html>