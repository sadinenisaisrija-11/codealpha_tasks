<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

include '../config/db.php';

$totalProjects = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM projects"));

$totalTasks = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tasks"));

$completedTasks = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tasks WHERE status='Completed'"));

$pendingTasks = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tasks WHERE status='Pending'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Project Tool</h2>

    <a href="#">Dashboard</a>
    <a href="../projects/create_project.php">Create Project</a>
    <a href="../projects/view_projects.php">View Projects</a>
    <a href="../tasks/create_task.php">Create Task</a>
    <a href="../tasks/view_tasks.php">View Tasks</a>
    <a href="../comments/add_comment.php">Comments</a>
    <a href="../logout.php">Logout</a>
</div>

<!-- MAIN CONTENT -->
<div class="main">

    <!-- TOP BAR -->
    <div class="navbar">
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?> 👋</h2>
    </div>

    <p style="color:white; margin-bottom:5px;">
        Manage Projects, Tasks and Team Collaboration Efficiently
    </p>

    <p style="color:#e5e7eb; margin-bottom:20px;">
        Track projects, assign tasks, update progress and collaborate with your team.
    </p>

    <!-- STATS CARDS -->
    <div class="card">
        <h3>📁 Total Projects</h3>
        <p><?php echo $totalProjects; ?></p>
    </div>

    <div class="card">
        <h3>📋 Total Tasks</h3>
        <p><?php echo $totalTasks; ?></p>
    </div>

    <div class="card">
        <h3>✅ Completed Tasks</h3>
        <p><?php echo $completedTasks; ?></p>
    </div>

    <div class="card">
        <h3>⏳ Pending Tasks</h3>
        <p><?php echo $pendingTasks; ?></p>
    </div>

    <hr>

    <!-- ACTION BUTTONS -->
    <div style="margin-top:20px;">

        <a class="nav-btn" href="../projects/create_project.php">Create Project</a>
        <a class="nav-btn" href="../projects/view_projects.php">View Projects</a>
        <a class="nav-btn" href="../tasks/create_task.php">Create Task</a>
        <a class="nav-btn" href="../tasks/view_tasks.php">View Tasks</a>
        <a class="nav-btn" href="../comments/add_comment.php">Add Comment</a>
        <a class="nav-btn" href="../logout.php">Logout</a>

    </div>

    <footer>
        © 2026 Project Management Tool | Developed by Saisrija
    </footer>

</div>

</body>
</html>