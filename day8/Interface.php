<?php

interface Animal {
    public function makeSound();
}

class Cat implements Animal {
    public function makeSound() {
        echo "Meow";
    }
}

class Dog implements Animal {
    public function makeSound() {
        echo "Bark";
    }
}

class Mouse implements Animal {
    public function makeSound() {
        // echo "Squeak";
        echo get_class($this). " make sound 'Squeak'";
    }
}

$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = [$cat, $dog, $mouse];

foreach ($animals as $animal) {
    echo "<br />";
    $animal->makeSound();
}