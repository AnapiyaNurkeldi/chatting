<?php 
    session_start();
    include './connect.php';
    $sql = 'SELECT * FROM `users`';
    // $result = $connect->query($sql);
    $name = $_POST['name'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$name' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_array($check_user);
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $user['password']
        ];
        header ('Location: ../chat.php');
    } else {
        $_SESSION['error'] = "<span>Invalid email or password</span>";
        header("Location: ../index.php");
    }
?>