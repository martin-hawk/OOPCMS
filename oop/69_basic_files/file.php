<?php
echo __FILE__ . "<br>";
echo __LINE__ . "<br>";
echo __DIR__ . "<br>";

if (file_exists(__DIR__)) {
    echo "yes<br>";
} else {
    echo "no<br>";
}

if (is_file(__DIR__)) {
    echo "yes<br>";
} else {
    echo "no<br>";
}

if (is_file(__FILE__)) {
    echo "yes<br>";
} else {
    echo "no<br>";
}

if (is_dir(__DIR__)) {
    echo "yes<br>";
} else {
    echo "no<br>";
}

echo is_dir(__FILE__) ? "yes<br>" : "no<br>"; // Ternary operator a.k.a Elvis operator

?>