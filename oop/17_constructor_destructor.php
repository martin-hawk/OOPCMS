<?php

class Cars
{

    public $door_count;

    static $wheel_count = 4;

    function __construct()
    {
        $this->door_count = 5;
        echo self::$wheel_count ++;
    }

    function __destruct()
    {
        $this->door_count = null;
        echo self::$wheel_count --;
    }
}

$bmw = new Cars();
// echo $bmw->door_count;
// echo Cars::$wheel_count;

$mercedes = new Cars();
$toyota = new Cars();

?>