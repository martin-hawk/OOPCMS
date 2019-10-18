<?php

class Cars
{

    public $wheel_count = 4;

    static $door_count = 5;

    static $seat_count = 6;

    static function car_details()
    {
        echo Cars::$door_count . "<br>"; // don't need $this, since the variable is static
        echo Cars::$seat_count . "<br>";
    }
}

$bmw = new Cars();

// echo $bmw->wheel_count;

// echo $bmw->door_count; // not working
// echo Cars::$door_count; // working fine

Cars::car_details();

?>