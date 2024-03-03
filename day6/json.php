<?php

// $age = ["Peter" => 35, "Ben" => 20, "john" => 39];
// echo json_encode($age);

// $cars = ["Volvo", "BMW", "Toyota"];
// echo json_encode($cars);

$jsonObj = '{"Peter":35,"Ben":20,"john":39}';
var_dump(json_decode($jsonObj, true));

// $obj = json_decode($jsonObj);
// // echo $obj->Peter . "<br>";
// // echo $obj->Ben . "<br>";
// // echo $obj->john;

// foreach ($obj as $key => $value) {
//     echo "$key => $value";
// }