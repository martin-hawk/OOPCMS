<?php

class Cars
{

    var $wheels = 4;

    function get_wheels()
    {
        return "The mean of transport has " . $this->wheels . " wheels";
    }
}

$bmw = new Cars();

class Trucks extends Cars
{

    //var $wheels = 10;
}

$scania = new Trucks();
echo $scania->wheels;
echo "<br>";
echo $scania->get_wheels();

?>