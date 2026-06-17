<?php
session_start();
include("db.php");

$user_id = $_SESSION['user_id'];
$post_id = $_GET['post_id'];

$check = mysqli_query($conn,
"SELECT * FROM likes WHERE post_id='$post_id' AND user_id='$user_id'");

if(mysqli_num_rows($check)==0)
{
    mysqli_query($conn,
    "INSERT INTO likes(post_id,user_id)
    VALUES('$post_id','$user_id')");
}

header("Location: home.php");
?>