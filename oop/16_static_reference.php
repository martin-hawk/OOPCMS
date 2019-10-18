<?php

class Cars
{

    static $door_count = 5;

    static $wheel_count = 4;

    static function car_details()
    {
        return self::$door_count . "<br>";
    }
}

class Trucks extends Cars
{

    static function display()
    {
        echo parent::car_details();
    }
}

// echo Cars::$door_count . "<br>";

// Cars::car_details();

Trucks::display();

?>