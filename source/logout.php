<?php
  if (isset($_POST['logout'])) {
    session_destroy();
    session_start();
    $_SESSION['message_type'] = "success";
    $_SESSION['message'] = 'Logged out!';
    header("Location: index.php");
  }
?>
