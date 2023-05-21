<?php 
  session_start();
  include './inc/connect.php';

  if (isset($_POST['submit'])) {
    $content = $_POST['content'];
    $name = $_SESSION['user']['name'];

    $sql = "INSERT INTO `msg`(`name`, `message`) VALUES ('$name', '$content')";
    $result = mysqli_query($connect, $sql);

    // Выполнение перенаправления на ту же страницу
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
  }
if (isset($_POST['delete'])) {
  $chat = "DELETE FROM `msg`";
  $res = mysqli_query($connect, $chat);  
    $connect->close();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat App</title>
  <link rel="stylesheet" href="./css/chat.css">
</head>
<body>
  <div class="chat-container">
    <div class="chat-header">
      <h2>Chat App</h2>
    </div>

    <div class="chat-messages">
      <!-- Вывод сообщений из базы данных -->
      <?php
        $sql = "SELECT * FROM `msg`";
        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
          $sender = $row['name'];
          $message = $row['message'];

          echo "<div class='message'>";
          echo "<p class='sender'>$sender</p>";
          echo "<p class='content'>$message</p>";
          echo "</div>";
        }
      ?>
    </div>

    <form class="chat-input" action="" method="POST">
      <input type="text" placeholder="Type your message" name="content">
      <button name="submit" type="submit" style="margin-right: 5px">Send</button>
      <button name="delete" type="submit">Clear chat</button>
    </form>
  </div>
</body>
</html>
