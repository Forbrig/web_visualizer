<?php
  require 'db.php';
  // edit account function handler
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $id = $_POST['idEdit'];
  $first_name = $_POST['firstNameEdit'];
  $last_name = $_POST['lastNameEdit'];
  $email = $_POST['emailEdit'];
  $password = password_hash($_POST['passwordEdit'], PASSWORD_BCRYPT);

  echo $id;
  $result = $mysqli->query("UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password' WHERE id = '$id'");

  if ($result) {
    session_destroy();
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['email'] = $email;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    header("location: home.php");
  } else {
    //header("location: home.php");
  }

?>
