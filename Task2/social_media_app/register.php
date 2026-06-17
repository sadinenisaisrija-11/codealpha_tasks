<?php
include("db.php");

$message = "";

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "Email already registered!";
    }
    else
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username,email,password)
                VALUES('$username','$email','$password')";

        if(mysqli_query($conn,$sql))
        {
            $message = "Registration Successful!";
        }
        else
        {
            $message = "Registration Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="post">

    <h2>Register</h2>

    <?php
    if($message != "")
    {
        echo "<p><b>$message</b></p>";
    }
    ?>

    <form method="POST">

        <input
            type="text"
            name="username"
            placeholder="Username"
            required>

        <br><br>

        <input
            type="email"
            name="email"
            placeholder="Email"
            required>

        <br><br>

        <input
            type="password"
            name="password"
            placeholder="Password"
            required>

        <br><br>

        <button type="submit" name="register">
            Register
        </button>

    </form>

    <br>

    <a href="login.php">Login Here</a>

</div>

</body>
</html>