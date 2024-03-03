<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Cookie</title>
</head>
<body>
    <div class="flex justify-center items-center">
            <div class="max-w-sm shadow p-5 rounded-lg mt-52">
                <?php
                print_r($_COOKIE);
                echo "Cookie 'user' is deleted!" 
                ?>
            </div>
        </div>
</body>
</html>