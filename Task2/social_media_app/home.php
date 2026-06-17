<?php
session_start();
include("db.php");

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Welcome <?php echo $_SESSION['username']; ?></h2>

<a href="create_post.php">Create Post</a> |
<a href="profile.php">Profile</a> |
<a href="logout.php">Logout</a>

<hr>

<h2>All Posts</h2>

<?php

$query = "SELECT * FROM posts ORDER BY id DESC";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result))
{
    $post_id = $row['id'];

    $like_count = mysqli_num_rows(
        mysqli_query($conn,
        "SELECT * FROM likes WHERE post_id='$post_id'")
    );
?>

<div class="post">

    <p><?php echo $row['content']; ?></p>

    <small>
        Posted on:
        <?php echo $row['created_at']; ?>
    </small>

    <br><br>

    <a href="like.php?post_id=<?php echo $post_id; ?>">
        ❤️ Like (<?php echo $like_count; ?>)
    </a>

    <br><br>

    <form action="comment.php" method="POST">

        <input
            type="hidden"
            name="post_id"
            value="<?php echo $post_id; ?>">

        <input
            type="text"
            name="comment_text"
            placeholder="Write a comment"
            required>

        <button type="submit" name="comment">
            Comment
        </button>

    </form>

    <br>

    <h4>Comments</h4>

    <?php

    $comments = mysqli_query(
        $conn,
        "SELECT * FROM comments WHERE post_id='$post_id'"
    );

    while($c = mysqli_fetch_assoc($comments))
    {
        echo "<p>💬 ".$c['comment']."</p>";
    }

    ?>

</div>

<?php
}
?>

</body>
</html>