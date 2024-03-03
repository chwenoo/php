<?php

$cookie_name = "user";
$cookie_value = "John Doe";

// setcookie($cookie_name, $cookie_value, time() + 10, '/');
// setcookie($cookie_name, $cookie_value);
setcookie("user", "", time() - 3600);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body>
    <div class="flex justify-center items-center">
        <div class="max-w-sm shadow p-5 rounded-lg mt-52">

            <?php if (count($_COOKIE) > 0) : ?>
                <h5 class="text-3xl line">Cookies are enabled</h5>
            <?php else : ?>
                <h5 class="text-3xl line">Cookies are disabled</h5>   
            <?php endif ?>
        
            <?php 
            if(!isset($_COOKIE[$cookie_name])) {
                echo "Cookie name " .$cookie_name . " is not set!";
            } else {
                echo "Cookie " . $cookie_name . " is set! <br/>";
                echo "Value is " .$_COOKIE[$cookie_name] . ".";
            }

            // if(count($_COOKIE) > 0) {
            //     echo "<h5 class='text-3xl line'>Cookies are enabled</h5>";
            // } else {
            //     echo "<h5 class='text-3xl line'>Cookies are disabled</h5>";   
            // }
            ?>

        </div>
    </div>
</body>
</html>