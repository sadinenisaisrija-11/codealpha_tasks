<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

include '../config/db.php';

$message = "";

if(isset($_POST['create']))
{
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO projects (project_name, description, created_by)
            VALUES ('$project_name', '$description', '$user_id')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Project Created Successfully!";
    }
    else
    {
        $message = "Error Creating Project!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Project Tool</h2>

    <a href="../dashboard/dashboard.php">Dashboard</a>
    <a href="create_project.php">Create Project</a>
    <a href="view_projects.php">View Projects</a>
</div>

<!-- MAIN CONTENT -->
<div class="main">

    <div class="navbar">
        <h2>Create New Project</h2>
    </div>

    <!-- FORM CARD -->
    <form method="POST">

        <input type="text"
               name="project_name"
               placeholder="Project Name"
               required>

        <textarea name="description"
                  placeholder="Project Description"
                  rows="5"
                  required></textarea>

        <button type="submit" name="create">
            Create Project
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