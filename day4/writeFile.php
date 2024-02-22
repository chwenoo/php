<?php

// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");

$txt = "Apple\n";
fwrite($myfile, $txt);

$txt = "Banana\n";
fwrite($myfile, $txt);

fwrite($myfile, "hello world\n");

fclose($myfile);

echo "Finished writing";

?>