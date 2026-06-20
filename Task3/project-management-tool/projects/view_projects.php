<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

include '../config/db.php';

$result = mysqli_query($conn,"SELECT * FROM projects");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Projects</title>
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
        <h2>All Projects</h2>
    </div>

    <!-- TABLE -->
    <table>
        <tr>
            <th>ID</th>
            <th>Project Name</th>
            <th>Description</th>
            <th>Created Date</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['project_name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php } ?>

    </table>

    <br>

    <a class="nav-btn" href="../dashboard/dashboard.php">
        Back to Dashboard
    </a>

</div>

</body>
</html>