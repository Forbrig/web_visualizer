<?php
  require 'db.php';
  session_start();
?>

<!DOCTYPE html>
<html lang = "pt-br">
  <head>
    <title>Web Visualizer</title>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <link href = "css/style.css" type = "text/css" rel = "stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>

  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['login'])) {
        //echo "LOGIN!"."<br />";
        require 'login.php';
      } elseif (isset($_POST['signup'])) {
        //echo "SIGNUP!"."<br />";
        require 'signup.php';
      }
    }
  ?>

  <body>
    <div class = "container-fluid">
      <div class = "row">
        <div class = "col-md-4 col-sm-4 col-xs-12"></div>
        <div class = "col-md-4 col-sm-4 col-xs-12 form-container">

          <?php
            if (isset($_SESSION['message']) and !empty($_SESSION['message'])) {
              echo "
              <div class = 'alert alert-danger alert-dismissible fade show' role = 'alert'>
              ".$_SESSION['message']."
                <button type = 'button' class = 'close' data-dismiss = 'alert' aria-label = 'Close'>
                  <span aria-hidden = 'true'>&times;</span>
                </button>
              </div>";
            }
          ?>

          <ul class = "nav nav-pills nav-fill" role = "tablist">
            <li class = "nav-item">
              <a class = "nav-link active" href = "#login" data-toggle = "tab">Login</a>
            </li>
            <li class = "nav-item">
              <a class = "nav-link" href = "#signup" data-toggle = "tab">Sign Up</a>
            </li>
          </ul>

          <div class = "tab-content">
            <div class = "tab-pane show active fade mt-4" id = "login">
              <h1 class = "text-center">Welcome Back!</h1>
              <form id = "login" action = "index.php" method = "post">
                <div class = "form-group">

                    <label for = "emailLogin">Email address</label>
                    <input type = "email" class = "form-control" id = "emailLogin" name = "emailLogin" aria-describedby = "emailHelp" placeholder = "Enter email" required>
                    <small id = "emailHelp" class = "form-text">We'll never share your email with anyone else.</small>
                  </div>
                  <div class = "form-group">
                    <label for = "passwordLogin">Password</label>
                    <input type = "password" class = "form-control" id = "passwordLogin" name = "passwordLogin" placeholder = "Password" required>
                  </div>
                  <!--
                  <div class = "form-check">
                    <input type = "checkbox" class = "form-check-input" id = "rememberLogin">
                    <label class = "form-check-label" for = "rememberLogin">Remember me!</label>
                  </div>
                  -->
                  <br>
                  <button name = "login" type = "submit" class = "btn btn-primary btn-block"><strong>Login</strong></button>
              </form>
            </div>

            <div class = "tab-pane fade mt-4" id = "signup">
                <h1 class = "text-center">Sign up now!</h1>
                <form id = "signup" action = "index.php" method = "post">
                  <div class = "form-group">
                    <label for = "firstNameRegister">First Name</label>
                    <input type = "text" class = "form-control" id = "firstNameRegister" name = "firstNameRegister" placeholder = "First Name" required>
                  </div>
                  <div class = "form-group">
                    <label for = "lastNameRegister">Last Name</label>
                    <input type = "text" class = "form-control" id = "lastNameRegister" name = "lastNameRegister" placeholder = "Last Name" required>
                  </div>
                  <div class = "form-group">
                    <label for = "emailRegister">Email</label>
                    <input type = "email" class = "form-control" id = "emailRegister" name = "emailRegister" placeholder = "Email" required>
                  </div>
                  <div class = "form-group">
                    <label for = "passwordRegister">Password</label>
                    <input type = "password" class = "form-control" id = "passwordRegister" name = "passwordRegister" placeholder = "Password" required>
                  </div>
                  <div class = "form-group">
                    <label for = "confirmPassword">Confirm Password</label>
                    <input type = "password" class = "form-control" id = "confirmPassword" name = "confirmPassword" placeholder = "Confirm Password" required>
                  </div>
                  <br>
                  <button name = "signup" type = "submit" class = "btn btn-primary btn-block"><strong>Register</strong></button>
                </form>
              </div>
            </div>
          </div>

        </div>
        <div class = "col-md-4 col-sm-4 col-xs-12"></div>
      </div>
    </div>

    <footer class = "py-3 footer">
      <div class = "container">
        <p class = "m-0 text-center text-white">Developed by Vitor Forbrig. Copyright &copy; 2018</p>
      </div>
    </footer>
  </body>
</html>
