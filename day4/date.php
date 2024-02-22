<?php

echo "Today is ".date("Y/m/d") ."<br/>";
echo "Today is ".date("Y.m.d") ."<br/>";
echo "Today is ".date("Y-m-d") ."<br/>";

echo "Today is ".date("l")."<br/>";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <!-- Example -->
    <!-- copyright yeaer on your website -->
    <!-- &copy; 2010-<?php echo date("Y");?> -->


    <?php 
        // date_default_timezone_set("Asia/Yangon");
        // echo "The time is ".date("h:i:sa"); 

        // create a date from a string with strtotime()
        // $d = strtotime("10:30pm April 15 2014");
        // echo "Created date is ".date("Y-m-d h:i:sa", $d);

        // $startDate = strtotime("Saturday");
        // $endDate = strtotime("+6 weeks", $startDate);

        // while ($startDate <= $endDate) {
        //     echo date("M d", $startDate). "<br>";

        //     $startDate = strtotime("+1 week", $startDate);
        // }

        // outputs the number of days until 4th of July:
        $d1 = strtotime("July 04");

        $d2 = ceil(($d1 - time())/60/60/24);

        echo "There are ".$d2 ." days until 4th of July."
    ?>

</body>
</html>