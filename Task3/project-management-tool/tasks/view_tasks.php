<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

include '../config/db.php';

$sql = "SELECT tasks.*,
               projects.project_name,
               users.name
        FROM tasks
        JOIN projects ON tasks.project_id = projects.id
        JOIN users ON tasks.assigned_to = users.id";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Tasks</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Project Tool</h2>

    <a href="../dashboard/dashboard.php">Dashboard</a>
    <a href="../projects/create_project.php">Create Project</a>
    <a href="../tasks/create_task.php">Create Task</a>
    <a href="../tasks/view_tasks.php">View Tasks</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOP BAR -->
    <div class="navbar">
        <h2>All Tasks</h2>
    </div>

    <!-- TABLE -->
    <table>

        <tr>
            <th>ID</th>
            <th>Task Name</th>
            <th>Project</th>
            <th>Assigned User</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['task_name']; ?></td>
            <td><?php echo $row['project_name']; ?></td>
            <td><?php echo $row['name']; ?></td>

            <!-- STATUS BADGE -->
            <td>
                <?php
                    $status = $row['status'];

                    if($status == "Completed"){
                        echo "<span style='color:green;font-weight:bold;'>Completed</span>";
                    }
                    elseif($status == "In Progress"){
                        echo "<span style='color:orange;font-weight:bold;'>In Progress</span>";
                    }
                    else{
                        echo "<span style='color:red;font-weight:bold;'>Pending</span>";
                    }
                ?>
            </td>

            <td><?php echo $row['deadline']; ?></td>

            <td>
                <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Pending">Pending</a> |
                <a href="update_status.php?id=<?php echo $row['id']; ?>&status=In Progress">Progress</a> |
                <a href="update_status.php?id=<?php echo $row['id']; ?>&status=Completed">Done</a>
            </td>

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