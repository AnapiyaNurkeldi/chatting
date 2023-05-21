<?php 
    session_start();
    include './connect.php';
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $_SESSION['msg'] = "<span>Something went wrong</span>";

    if (isset($_POST['submit'])) {
        $sql = "INSERT INTO `users` (`id`, `email`, `name`, `password`) VALUES (NULL, '$email', '$name', '$password')";
        $result = $connect->query($sql);        
        $connect->close();
        header("Location: ../index.php");
    } else {
        header ("Location: ../sign-up.php");
    }
?>