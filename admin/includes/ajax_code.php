<?php
require_once 'init.php';

$user = new User();

if (isset($_POST['image_name'])) {
    $user->ajax_change_image($_POST['image_name'], $_POST['user_id']);
}

if (isset($_POST['image_id'])) {
    Photo::ajax_sidebar($_POST['image_id']);
}

?>