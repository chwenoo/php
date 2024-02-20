<?php

// Insert , Remove
$fruits = ["apple", "banana", "orange", "strawberry"];

//add the elements
array_push($fruits, "pear");
array_push($fruits, "raspberry", "grape");

print_r($fruits);
echo "<br/>";

// remove last element
array_pop($fruits);

print_r($fruits);
echo "<br/>";

// remove first element
array_shift($fruits);

print_r($fruits);
echo "<br/>";

// add an element to the first index of the array
array_unshift($fruits, "mango");

print_r($fruits);
echo "<br/>";

echo "direct access: ".$fruits[2];

$juices = ["apple" => 5, "orange" => 11, "banana" => 10, "grape" => 11] ;

echo "<br/>";

$juices["sunkist"] = 22;
$juices["banana"] = 100;

// delete elements
unset($juices["apple"]);

print_r($juices);

echo "<br/>";
$juices["apple"] = 33;
print_r($juices);
echo "<br/>";


$marks = [
    "John Wick" => [
        "physics" => 35, 
        "math" => 30, 
        "chemistry" => 39                                       
    ],
    "Mary" => [
        "physics" => 30,
        "math" => 32,
        "chemistry" => 29
    ],
];

foreach ($marks as $student => $value) {
    echo "Student's Name: " .$student."<br/>";
    foreach ($value as $key => $mark) {
        echo $mark === 30 ? $key." ".$mark : "";
    }
    echo "<br/>";
}

