<?php

function class_autoloader($class)
{
    $class = strtolower($class);

    $path = "includes/{$class}.php";

    // if (file_exists($path)) {
    // require_once $path;
    // } else {
    // die("This file {$class}.php was not found...");
    // }

    if (is_file($path) && ! class_exists($class)) {
        require_once $path;
    }
}

function redirect($location)
{
    header("Location: {$location}");
}

spl_autoload_register('class_autoloader');

?>