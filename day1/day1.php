<?php

// $num1 = "1";
// $num2 = 1;

// if ($num1 === $num2) {
//     echo "Equal";
// } else {
//     echo "Not Equal";
// }

// $ans = 4;

// // $result = $ans > 4 ? "Correct" : "Not Correct";
// $result = ($ans <= 4) ?? '10';
// // $result = ($ans <= 4) ? $ans : '10';
// echo $result;

// $roll = rand(1, 6);
// echo "You rolled a ".$roll;

// if ($roll === 6) {
//     echo "You win!";
// }

// $d = date("D");
// if ($d === "Fri") {
//     echo "Have a nice weekend!";
// } else { 
//     echo "Have a nice day!";
// }

// $d = date("D");

// if ($d === "Fri") {
//     echo "Have a nice weekend!";
// } elseif ($d === "Mon") {
//     echo "Have a nice Monday!";
// }
//  else { 
//     echo "Have a nice day!";
// }

// switch ($d) {
//     case "Mon": echo "Today is Monday!"; break;
//     case "Tue": echo "Today is Tuesday!"; break;
//     case "Wed": echo "Today is Wednesday!"; break;
//     case "Thu": echo "Today is Thursday!"; break;
//     case "Fri": echo "Today is Friday!"; break;
//     case "Sat": echo "Today is Saturday!"; break;
//     case "Sun": echo "Today is Sunday!"; break;
//     default: echo "Wonder which day is this?";
// }

// Numeric Arrays
$cars = ["Honda", "Lexus", "BMW", "Toyota"];

echo "<br/>" .$cars[0]. ", " .$cars[1]." and " .$cars[3]. " are Japanese cars.";

// Associative Arrays
$ages = ["KoPhyo" => 32, "KoNaing" => 30, "KoMyo" => 34];

echo "<br/>Ko Myo is " .$ages["KoMyo"]." years old."; 
echo "<br/>";
// echo "<br/>Ko Myo is ".$ages[2]." years old."; 

// Foreach
foreach($cars as $car) {
    echo $car;
    echo "<br/>";
}

foreach($ages as $key => $age) {
    echo $key." ".$age;
    echo "<br/>";
}

// Multidimensional Arrays
$marks = [
    "mohammad" => [
        "physics" => 35, 
        "math" => 30, 
        "chemistry" => 39                                       
    ],
    "qadir" => [
        "physics" => 30,
        "math" => 32,
        "chemistry" => 29
    ],
];

foreach ($marks as $key => $name) {
    echo "Mark for student " . $key. "<br/>";
    foreach ($name as $key => $mark) {
        echo $key. " ".$mark ."<br />";
    }
    echo "<hr/>";
}

