<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./css/sign-up.css">
</head>
<script>
    function validatePassword(event) {
        event.preventDefault(); // Prevent form submission

        const passwordInput = document.getElementById('password');
        const password = passwordInput.value;

        // Check if password meets the criteria
        if (!/\d/.test(password) || password.length < 6) {
            openModal(); // Open the modal if conditions are not met
        } else {
            event.target.submit(); // Submit the form if conditions are met
        }
    }

    function openModal() {
        const modal = document.getElementById('modal');
        modal.style.display = 'block';
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        modal.style.display = 'none';
    }
    </script>
<body>
    <div class="container">
        <form class="card" action="./inc/sign-up-connect.php" method="POST">
            <a class="singup">Sign Up</a>
            <div class="inputBox1">
                <input type="email" required="required" name="email">
                <span class="user">Email</span>
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="name">
                <span>Username</span>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="password" id="password">
                <span>Password</span>
            </div>
            <!-- <button class="enter" name="submit">Enter</button> -->
            <input type="submit" class="enter" value="Enter" name="submit">
            <span class="have">Have an account? <a href="./index.php">Log In</a></span>
            <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']); 
                }
            ?>
        </form>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <p>Your password must contain at least one digit and have a minimum length of 6 characters.</p>
            </div>
        </div>
    </div>
</body>
</html>