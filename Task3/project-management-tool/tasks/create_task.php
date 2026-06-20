<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

include '../config/db.php';

$message = "";

/* Load data */
$projects = mysqli_query($conn,"SELECT * FROM projects");
$users = mysqli_query($conn,"SELECT * FROM users");

if(isset($_POST['create_task']))
{
    $project_id = $_POST['project_id'];
    $task_name = $_POST['task_name'];
    $assigned_to = $_POST['assigned_to'];
    $deadline = $_POST['deadline'];

    $sql = "INSERT INTO tasks (project_id, task_name, assigned_to, deadline)
            VALUES ('$project_id','$task_name','$assigned_to','$deadline')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Task Created Successfully!";
    }
    else
    {
        $message = "Error Creating Task!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Project Tool</h2>

    <a href="../dashboard/dashboard.php">Dashboard</a>
    <a href="../projects/create_project.php">Create Project</a>
    <a href="../projects/view_projects.php">View Projects</a>
    <a href="create_task.php">Create Task</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOP BAR -->
    <div class="navbar">
        <h2>Create New Task</h2>
    </div>

    <!-- FORM -->
    <form method="POST">

        <!-- PROJECT -->
        <label>Project</label>
        <select name="project_id" required>
            <option value="">Select Project</option>

            <?php while($project = mysqli_fetch_assoc($projects)) { ?>
                <option value="<?php echo $project['id']; ?>">
                    <?php echo $project['project_name']; ?>
                </option>
            <?php } ?>

        </select>

        <!-- TASK NAME -->
        <label>Task Name</label>
        <input type="text" name="task_name" required>

        <!-- USER -->
        <label>Assign User</label>
        <select name="assigned_to" required>
            <option value="">Select User</option>

            <?php while($user = mysqli_fetch_assoc($users)) { ?>
                <option value="<?php echo $user['id']; ?>">
                    <?php echo $user['name']; ?>
                </option>
            <?php } ?>

        </select>

        <!-- DEADLINE -->
        <label>Deadline</label>
        <input type="date" name="deadline" required>

        <!-- BUTTON -->
        <button type="submit" name="create_task">
            Create Task
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