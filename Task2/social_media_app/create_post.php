<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['post']))
{
    $user_id = $_SESSION['user_id'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts(user_id, content)
            VALUES('$user_id', '$content')";

    if(mysqli_query($conn, $sql))
    {
        $message = "Post Created Successfully!";
    }
    else
    {
        $message = "Error creating post!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Create Post</h2>

<?php
if($message != "")
{
    echo "<p style='color:green;'>$message</p>";
}
?>

<form method="POST">

    <textarea
        name="content"
        rows="5"
        cols="40"
        placeholder="What's on your mind?"
        required></textarea>

    <br><br>

    <button type="submit" name="post">Post</button>

</form>

<br>

<a href="home.php">Back Home</a>

</body>
</html>