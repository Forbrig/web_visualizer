<?php
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
    session_destroy();
    session_start();
    $_SESSION['message'] = 'This email is already registered!';
    header("location: index.php");
  } else {
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) VALUES ('$first_name', '$last_name', '$email', '$password', '$hash')";

    if ($mysqli->query($sql)) {
      session_destroy();
      session_start();

      header("location: index.php");
    } else {
      $_SESSION['message'] = 'Registration failed!';
      header("location: index.php");
    }
  }

?>
