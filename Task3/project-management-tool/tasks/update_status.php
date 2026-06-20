<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

include '../config/db.php';

if(isset($_GET['id']) && isset($_GET['status']))
{
    $id = $_GET['id'];
    $status = $_GET['status'];

    mysqli_query(
        $conn,
        "UPDATE tasks SET status='$status' WHERE id='$id'"
    );
}

header("Location: view_tasks.php");
exit();
?>