<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="container">
        <form class="card" action="./inc/sign-in.php" method="POST">
            <a class="login">Log in</a>
            <div class="inputBox">
                <input type="text" required="required" name="name">
                <span class="user">Username</span>
            </div>

            <div class="inputBox">
                <input type="password" required="required" name="password">
                <span>Password</span>
            </div>

            <input type="submit" class="enter" value="Enter" name="submit">
            <span>Do not have an account? <a href="./sign-up.php">Sign Up</a></span>
            <?php 
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    };
                ?>
        </form>
    </div>
</body>
</html>