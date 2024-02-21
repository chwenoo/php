<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $passwordErr = $confirmPasswordErr = "";
$name = $email = $gender = $website = $comment = "";

function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
        $genderErr = "Gender is required";
    } else {
        $gender = testInput($_POST["gender"]);
    }

    if (empty($_POST["website"])) {
        $websiteErr = "Wibsite URL is required";
    } else {
        $website = testInput($_POST["website"]);
        // check if url address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
              $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
        $commentErr = "Comment is required";
    } else {
        $comment = testInput($_POST["comment"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
        if (empty($_POST["password"]) || (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]) === 0)) {
            $passwordErr = "Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit";
        } else {
            $password = $_POST["gender"];
        }
    }

    if (empty($_POST["confirm-password"]) || ($_POST["confirm-password"] !== $_POST["password"])) {
        $confirmPasswordErr = "Passwords doesn't not match";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>PHP Form Validation Example</h1>
    <form action="<?= "day3.php"  ?>" method="post">

        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span> <?php echo $nameErr;?> </span><br><br>

        E-mail:<input type="email" name="email" value="<?php echo $email; ?>" >
        <span> <?php echo $emailErr;?> </span><br><br>

        Website: <input type="text" name="website" value="<?php echo $website; ?>">
        <span> <?php echo $websiteErr;?> </span><br><br>
            
        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?> </textarea>
        <br><br>

        Gender:            
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
        value="female"> Female
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
        value="male"> Male
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender == "other") echo "checked"; ?>
        value="other"> Other
        <span> <?php echo $genderErr;?> </span>
        <br><br>

        <label for="password" >Password: </label>
        <input type="password" name="password" id="password">
        <span> <?php echo $passwordErr;?> </span>
        <br><br>
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="confirm-password" id="confirmPassword">
        <?php if($confirmPasswordErr) { ?>
            <span>
                <?php echo $confirmPasswordErr; ?>
            </span>
        <?php } ?>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>