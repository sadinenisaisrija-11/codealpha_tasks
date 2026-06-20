<?php
session_start();
include 'config/db.php';

$message = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn,$sql);

    if($result && mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password']))
        {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            header("Location: dashboard/dashboard.php");
            exit();
        }
        else
        {
            $message = "Wrong Password!";
        }
    }
    else
    {
        $message = "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* extra upgrade only for login */
        .login-box input[type="password"],
        .login-box input[type="text"]{
            padding-right:40px;
        }

        .password-wrapper{
            position:relative;
        }

        .toggle-pass{
            position:absolute;
            right:10px;
            top:50%;
            transform:translateY(-50%);
            cursor:pointer;
            font-size:14px;
            color:#555;
        }

        .error-box{
            margin-top:10px;
            color:#fff;
            background:#dc2626;
            padding:10px;
            border-radius:8px;
            font-size:14px;
        }
    </style>
</head>

<body class="login-page">

<div class="login-wrapper">

    <div class="login-box">

        <h2>User Login</h2>

        <form method="POST">

            <input type="email"
                   name="email"
                   placeholder="Enter Email"
                   required>

            <div class="password-wrapper">

                <input type="password"
                       id="password"
                       name="password"
                       placeholder="Enter Password"
                       required>

                <span class="toggle-pass" onclick="togglePassword()">
                    👁
                </span>

            </div>

            <button type="submit" name="login">
                Login
            </button>

        </form>

        <?php if($message != "") { ?>
            <div class="error-box">
                <?php echo $message; ?>
            </div>
        <?php } ?>

        <a href="register.php" style="color:white; text-decoration:none; display:block; margin-top:15px;">
            Create Account
        </a>

    </div>

</div>

<script>
function togglePassword()
{
    let pass = document.getElementById("password");

    if(pass.type === "password")
    {
        pass.type = "text";
    }
    else
    {
        pass.type = "password";
    }
}
</script>

</body>
</html>