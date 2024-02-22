<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read File</title>
</head>
<body>
    <?php

    // echo readfile("webdictionary.txt");

    // a better method to open files is with the fopen() function
    $myfile = fopen("webdictionary.txt", "r") or die("can't open file!");
    // echo fread($myfile, filesize("webdictionary.txt"));
    // echo fgets($myfile);
    // Output one line until end-of-file
    while(!feof($myfile)) {
        // echo fgets($myfile). "<br />";
        echo fgetc($myfile); //read one by one characters
    }
    fclose($myfile);

    ?>
</body>
</html>