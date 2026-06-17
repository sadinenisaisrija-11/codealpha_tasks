<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($result);

$post_count = mysqli_num_rows(
    mysqli_query($conn,
    "SELECT * FROM posts WHERE user_id='$user_id'")
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="post">

    <h2>My Profile</h2>

    <p>
        <b>Username:</b>
        <?php echo $user['username']; ?>
    </p>

    <p>
        <b>Email:</b>
        <?php echo $user['email']; ?>
    </p>

    <p>
        <b>Total Posts:</b>
        <?php echo $post_count; ?>
    </p>

    <br>

    <a href="home.php">🏠 Back Home</a>

</div>

</body>
</html>