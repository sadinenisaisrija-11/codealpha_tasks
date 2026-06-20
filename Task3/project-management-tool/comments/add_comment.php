<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

include '../config/db.php';

$message = "";

if(isset($_POST['add_comment']))
{
    $task_id = $_POST['task_id'];
    $user_id = $_SESSION['user_id'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments(task_id,user_id,comment)
            VALUES('$task_id','$user_id','$comment')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Comment Added Successfully!";
    }
}

$tasks = mysqli_query($conn,"SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Comment</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Project Tool</h2>

    <a href="../dashboard/dashboard.php">Dashboard</a>
    <a href="../tasks/create_task.php">Create Task</a>
    <a href="../tasks/view_tasks.php">View Tasks</a>
    <a href="add_comment.php">Add Comment</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOP BAR -->
    <div class="navbar">
        <h2>Add Task Comment</h2>
    </div>

    <!-- FORM -->
    <form method="POST">

        <label>Select Task</label>
        <select name="task_id" required>
            <option value="">Select Task</option>

            <?php while($task = mysqli_fetch_assoc($tasks)) { ?>
                <option value="<?php echo $task['id']; ?>">
                    <?php echo $task['task_name']; ?>
                </option>
            <?php } ?>

        </select>

        <label>Comment</label>
        <textarea name="comment" rows="5" placeholder="Enter Comment" required></textarea>

        <button type="submit" name="add_comment">
            Add Comment
        </button>

    </form>

    <p class="success"><?php echo $message; ?></p>

    <br>

    <a class="nav-btn" href="../dashboard/dashboard.php">
        Back to Dashboard
    </a>

</div>

</body>
</html>