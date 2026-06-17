<?php
session_start();
include("db.php");

if(isset($_POST['comment']))
{
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment_text'];

    mysqli_query($conn,
    "INSERT INTO comments(post_id,user_id,comment)
    VALUES('$post_id','$user_id','$comment')");
}

header("Location: home.php");
?>