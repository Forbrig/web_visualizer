<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
  require 'db.php';
  session_start();
  if (isset($_POST['signup'])) {
    $first_name = $_POST['firstNameRegister'];
    $last_name = $_POST['lastNameRegister'];
    $email = $_POST['emailRegister'];
    $password = password_hash($_POST['passwordRegister'], PASSWORD_BCRYPT);
    $hash = md5(rand(0,1000));

    $result = $mysqli->query("SELECT * FROM users WHERE email = '$email'") or die($mysqli->error());

    if ($result->num_rows > 0) {
      $_SESSION['message_type'] = "danger";
      $_SESSION['message'] = 'This email is already registered!';
      header("location: index.php");
    } else {
      $sql = "INSERT INTO users (first_name, last_name, email, password, hash) VALUES ('$first_name', '$last_name', '$email', '$password', '$hash')";

      if ($mysqli->query($sql)) {
        $_SESSION['email'] = $_POST['emailRegister'];
        $_SESSION['first_name'] = $_POST['firstNameRegister'];
        $_SESSION['last_name'] = $_POST['lastNameRegister'];



        $_SESSION['message_type'] = "success";
        $_SESSION['message'] = "Successfully registered!";
        header("location: index.php");
      } else {
        $_SESSION['message_type'] = "danger";
        $_SESSION['message'] = 'Registration failed!';
        header("location: index.php");
      }
    }
  }
?>
