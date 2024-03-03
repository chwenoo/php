<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>
</head>
<body>
    <!-- <table>
        <thead>
            <tr>
                <td>Filter Name</td>
                <td>Filter ID</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (filter_list() as $id => $filter) {
                echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
            }
            ?>
        </tbody>
    </table> -->

    <?php
    // $str = "<h1>Hello World</h1>";
    // echo $str;
    // echo filter_var($str, FILTER_SANITIZE_STRING);
    // echo strip_tags($str);

    // $int = 10;
    // if (!filter_var($int, FILTER_VALIDATE_INT) === false || filter_var($int, FILTER_VALIDATE_INT) === 0 ) {
    //     echo "Integer is valid";
    // } else {
    //     echo "Integer is not valid";
    // }

    // $ip = "1.255.255.255";

    // if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
    //     echo "$ip is a valid IP address";
    // } else {
    //     echo "$ip is not a valid IP address";
    // }

    // $email = "john@example.com";

    // $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    //     echo " $email is a valid email address";
    // } else {
    //     echo "$email is not a valid email address";
    // }
    
    function my_callback($item) {
        return strlen($item);
    }
  
    $strings = ["apple", "orange", "banana", "coconut"];
    $lengths = array_map("my_callback", $strings);
    print_r($lengths);

    function exclaim($str)
    {
        return $str . "!";
    }

    function ask($str)
    {
        return $str . "?";
    }

    function printMessage($message, $format)
    {
        echo $format($message) . "<br>";
    }

    printMessage("Happy new year", "exclaim");
    printMessage("Happy new year", "ask");

    $number = [1, 2, 4, 6, 9];
    $ans = array_map(
        function ($n) {
            return $n * $n;
        }
    , $number);

    print_r($ans);
    
    ?>
</body>
</html>