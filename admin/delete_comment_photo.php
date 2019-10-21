<?php
include ("includes/header.php");

if (! $session->is_signed_in()) {
    redirect('../login.php');
}

$comment = Comment::find_by_id($_GET['id']);
if (empty($_GET['id'])) {
    redirect("../comment_photo.php?id={$comment->photo_id}");
}

if ($comment) {
    
    $comment->delete();
    $session->message("The comment has been deleted");
    redirect("comment_photo.php?id={$comment->photo_id}");
} else {
    redirect("comment_photo.php?id={$comment->photo_id}");
}

?>