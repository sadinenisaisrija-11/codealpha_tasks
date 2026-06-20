<?php
include 'config/db.php';

$message = "";

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(name,email,password)
            VALUES('$name','$email','$password')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Registration Successful!";
    }
    else
    {
        $message = "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>User Registration</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Enter Name" required><br><br>

    <input type="email" name="email" placeholder="Enter Email" required><br><br>

    <input type="password" name="password" placeholder="Enter Password" required><br><br>

    <button type="submit" name="register">Register</button>
</form>

<p><?php echo $message; ?></p>

<a href="login.php">Login Here</a>

</body>
</html>