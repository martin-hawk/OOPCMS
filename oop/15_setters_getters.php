<?php

class Cars
{

    private $door_count = 5;

    function get_values()
    {
        return $this->door_count . "<br>";
    }

    function set_values()
    {
        $this->door_count = 3;
    }
}

$bmw = new Cars();

echo $bmw->get_values();
$bmw->set_values();
echo $bmw->get_values();

?>