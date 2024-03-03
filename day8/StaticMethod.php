<?php

class Greeting {
    public static function welcome() {
        echo "Hello World!";
    }
}

// Call static method
Greeting::welcome();

// Static Properties
class PI {
    public static $value = 3.14;
}

// Get static properties
echo PI::$value;