<?php

// class Fruit {
//     // Properties
//     private $name;
//     private $color;

//     // Methods
//     function setName($name) {
//         $this->name = $name;
//     }
//     function getName() {
//         return $this->name;
//     }
//     function setColor($color) {
//         $this->color = $color;
//     }
//     function getColor() {
//         return  $this->color; 
//     }
// }

// $apple = new Fruit();
// $apple->setName('Apple');
// $apple->setColor('Red');
// echo "Name: " . $apple->getName();
// echo "<br/>";
// echo "Color: " . $apple->getColor();

// echo "<hr/>";
// $mango = new Fruit();
// $mango->setName('Mango');
// $mango->setColor('Green');
// echo "Name: " . $mango->getName();
// echo "<br/>";
// echo "Color: " . $mango->getColor();

// echo "<hr/>";
// $banana = new Fruit();
// $banana->setName('Banana');
// $banana->setColor('Yellow');
// echo "Name: " . $banana->getName();
// echo "<br/>";
// echo  "Color: " . $banana->getColor();

// echo "<hr/>";
// var_dump($apple instanceof Fruit);

/**** with Constructor */
// class Fruit {
//     // Properties
//     private $name;
//     private $color;

//     // Methods
//     function __construct($name, $color) {
//         $this->name = $name;
//         $this->color = $color;
//     }
//     function getName() {
//         return $this->name;
//     }
//     function getColor() {
//         return  $this->color; 
//     }
// }

// $apple = new Fruit("Apple", "Red");
// echo "Name: " . $apple->getName();
// echo "<br/>";
// echo "Color: " . $apple->getColor();

// echo "<hr/>";
// $mango = new Fruit("Mango", "Green");
// echo "Name: " . $mango->getName();
// echo "<br/>";
// echo "Color: " . $mango->getColor();

// echo "<hr/>";
// $banana = new Fruit("Banana", "Yellow");
// echo "Name: " . $banana->getName();
// echo "<br/>";
// echo  "Color: " . $banana->getColor();

/*** Fruit Class with destructor function */
// class Fruit {
//     // Properties
//     public $name;
//     public $color;

//     function __construct($name, $color) {
//         $this->name = $name;
//         $this->color = $color;
//     }
//     function __destruct() {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }
// }

// $apple = new Fruit("Apple", "Red");


// /*** Fruit Class with access modifiers */
// class Fruit {
//     public $name;
//     protected $color;
//     private $weight;
// }

// $mango = new Fruit();
// $mango->name = "Mango";
// // $mango->color = "Yellow";
// // $mango->weight = "300";
// echo $mango->name;

/** Fruit Class with access Modifier */
// class Fruit {
//     // Properties
//     public $name;
//     public $color;
//     public $weight;

//     // Methods
//     function setName($name) {
//         $this->name = $name;
//     }
//     protected function setColor($color) {
//         $this->color = $color;
//     }
//     private function setWeight($weight) {
//         $this->weight = $weight;
//     }
// }

// $mango = new Fruit();
// $mango->setName("Mango");
// // $mango->setColor("Yellow"); Error
// // $mango->setWeight('300'); Error

// echo $mango->name;

// class Fruit {
//     // Properties
//     public $name;
//     public $color;

//     public function __construct($name, $color) {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     public function intro() {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }  
// }

// class Strawberry extends Fruit {
//     public function message() {
//         echo "Am I a fruit or a berry. ";
//     }
// }

// $strawberry = new Strawberry("Strawberry", "Red");
// $strawberry->message();
// $strawberry->intro();

// class Fruit {
//     // Properties
//     public $name;
//     public $color;

//     public function __construct($name, $color) {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     protected function intro() {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }  
// }

// class Strawberry extends Fruit {
//     public function message() {
//         echo "Am I a fruit or a berry. ";
//     }
// }

// $strawberry = new Strawberry("Strawberry", "Red");
// $strawberry->message();
// $strawberry->intro(); // Error, intro is protected

// class Fruit {
//     // Properties
//     public $name;
//     public $color;

//     public function __construct($name, $color) {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     protected function intro() {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }  
// }

// class Strawberry extends Fruit {
//     public function message() {
//         echo "Am I a fruit or a berry. ";
//         $this->intro();

//     }
// }

// $strawberry = new Strawberry("Strawberry", "Red");
// $strawberry->message();

/*** Fruit Class with Overriding Inherited Methods */
// class Fruit {
//     // Properties
//     public $name;
//     public $color;

//     public function __construct($name, $color) {
//         $this->name = $name;
//         $this->color = $color;
//     }

//     protected function intro() {
//         echo "The fruit is {$this->name} and the color is {$this->color}.";
//     }  
// }

// class Strawberry extends Fruit {

//     public $weight;

//     public function __construct($name, $color, $weight) {
//         $this->name = $name;
//         $this->weight = $weight;
//         $this->weight = $weight;
//     }

//     public function intro() {
//         echo "The fruit is {$this->name}, the color is {$this->color} and the weight is {$this->weight} gram." ;
//     }
// }

// $strawberry = new Strawberry("Strawberry", "Red", 50);
// $strawberry->intro();

/*** Fruit Class with fianl Keyword */
// final class fruit {
//     // some code
// }

// // will result in error
// class Strawberry extends Fruit {
//     // some code
// }

/*** Another Example */
// class fruit {
//     final public function intro() {
//         // some code
//     }
// }

// class Strawberry extends Fruit {
//     // will result in error
//     public function intro() {
//         // some code
//     }
// }

// class Fruit {
//     const MESSAGE = "Thank you for buying fruits!";
// }
// echo Fruit::MESSAGE;

class Fruit {
    const MESSAGE = "Thank you for buying fruits!";

    public function thankYou() {
        echo self::MESSAGE;
    }
}

$goodbye = new Fruit();
$goodbye->thankYou();
echo $goodbye::MESSAGE;



