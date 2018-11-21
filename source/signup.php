<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  // registration function handler
  echo "signup.php"."<br />";


  $_SESSION['email'] = $_POST['emailRegister'];
  $_SESSION['first_name'] = $_POST['firstNameRegister'];
  $_SESSION['last_name'] = $_POST['lastNameRegister'];


  $first_name = $_POST['firstNameRegister'];
  $last_name = $_POST['lastNameRegister'];
  $email = $_POST['emailRegister'];
  $password = password_hash($_POST['passwordRegister'], PASSWORD_BCRYPT);
  $hash = md5(rand(0,1000));

  $result = $mysqli->query("SELECT * FROM users WHERE email = '$email'") or die($mysqli->error());

  if ($result->num_rows > 0) {
    echo "Free email"."<br />";
    $_SESSION['message'] = 'This email is already registered!';
    header("location: error.php");
  } else {
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) VALUES ('$first_name', '$last_name', '$email', '$password', '$hash')";

    if ($mysqli->query($sql)) {
      $_SESSION['logged_in'] = true;

      header("location: home.php");
    } else {
      $_SESSION['message'] = 'Registration failed!';
      header("location: error.php");
    }
  }

?>
