<?php

// function xc(array $a) {

// }

// try {
//     xc(4);
// } catch (Exception $e) { 
//     echo $e->getMessage();
// }

// function inverse($x) {
//     if (!$x) {
//         throw new Exception("Division by zero.");
//     }
//     return 1 / $x;
// }

// try {
//     echo inverse(5). "<br />";
//     echo inverse(0). "<br />";
//     // echo inverse(-1). "<br />";
//     echo "Still working";
// } catch (Exception $e) {
//     echo "Caught exception: ", $e->getMessage(), "<br />";
// }

// Continue execution
// echo "Hello World\n";

// Array Items
// function myFunction() {
//     echo "This text comes from a function";
// }

// // create array
// $myArr = ["Volvo", "15", ["apples", "bananas"], "myFunction"];

// // calling the function from the array item:
// $myArr[3]();

// Add Multiple Array Items

// $fruits = ["Apple", "Banana", "Cherry"];
// array_push($fruits, "Orange", "Kiwi", "Lemon");

// var_dump($fruits);

// add mullitple items to Associative Arrays
// $cars = ["brand" => "Ford", "model" => "Mustang"];

// $cars += ["color" => "red", "year" => 1964];
// var_dump($cars);

// Delete Array Items
// $cars = ["Volvo", "BMW", "Toyota"];

// // array_splice($cars, 1, 2);
// unset($cars[2]);

// array_push($cars, "Tesla");

// var_dump($cars);

// Remove Item From an Assocative  Array

// $cars = ["brand" => "Ford", "model" => "Mustang", "year" => 1964];

// unset($cars["model"]);

// var_dump($cars);

// Using array_diff Function
// $cars = ["brand" => "Ford", "Model" => "Mustang", "year" => 1964];

// $newarray = array_diff($cars, ["Mustang", 1964]);
// var_dump($newarray);


// Sort Array in Ascending order
$cars = ["Volvo", "BMW", "Toyo"];
sort($cars);

var_dump($cars);

$numbers = [4, 6, 2, 22, 11];
// sort($numbers);
// var_dump($numbers);

rsort($numbers);
var_dump($numbers);

// Associative Array - According to Value - asort -arsort
$ages = ["Peter"=> 35, "Ben"=> 37, "Joe" => 43];
arsort($ages);
var_dump($ages);
