<?php

  // login function handler

  $email = $_POST['emailLogin'];
  $result = $mysqli->query("SELECT * FROM users WHERE email = '$email'");

  if ($result->num_rows == 0) {
    $_SESSION['message'] = "Email incorrect!";
    header("location: index.php");
  } else {
    $user = $result->fetch_assoc();
    if (password_verify($_POST['passwordLogin'], $user['password'])) {
      $_SESSION['email'] = $user['email'];
      $_SESSION['first_name'] = $user['first_name'];
      $_SESSION['last_name'] = $user['last_name'];
      $_SESSION['active'] = $user['active'];

      $_SESSION['logged_in'] = true;

      header("location: home.php");
    } else {
      $_SESSION['message'] = "Password incorrect!";
      header("location: index.php");
    }
  }
?>
