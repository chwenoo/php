<?php

// abstract class Car {
//     public function __construct($name) {
//         $this->name = $name;
//     }
//     abstract public function intro() : string ;
// }

// // Child class

// class Audi extends Car {
//     public function intro() : string {
//         return "Choose German quality! I'm an $this->name!";
//     }
// }

// class Volvo extends Car {
//     public function intro() : string {
//         return "Proud to be Swedish! I'm a $this->name!";
//     }
// }
// class Citroen extends Car {
//     public function intro() : string {
//         return "French extravagance! I'm a $this->name!";
//     }
// }

// $audi = new Audi("Audi");
// echo $audi->intro();
// echo "<hr />";

// $volvo = new Volvo("Volvo");
// echo $volvo->intro();
// echo "<hr />";
// $citroen = new Citroen("Citroen");
// echo $citroen->intro();
// echo "<hr />";

abstract class ParentClass {
    //Abstract method with an argument
    abstract protected function prefixName($name);
}

class ChildClass extends ParentClass {
    //The child class may define optional arguments the are not in the parent's abstract method
    public function prefixName($name, $seperator ='.', $greet = "Dear") {
        if ($name == "Aung Aung") {
            $prefix = "Mr";

        } elseif ($name == "Aye Aye") {
            $prefix = "Ms";
        } else {
            $prefix = "";
        }
        return "{$greet} {$prefix}{$seperator} {$name}";
    }
}

$class = new ChildClass;
echo $class->prefixName("Aung Aung");
echo "<br/>";
echo $class->prefixName("Aye Aye");