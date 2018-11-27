<?php
  session_start();
?>

<!DOCTYPE html>
<html lang = "pt-br">
  <head>
    <title>Web Visualizer</title>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <link href = "css/style.css" type = "text/css" rel = "stylesheet">
    <link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class = "container-fluid">
      <div class = "row">
        <div class = "mx-auto col-xs-12 col-sm-8 col-md-8 col-lg-6 col-xl-4 form-container">

          <?php
            if (isset($_SESSION['message'])) {
              ?>
              <div class = 'alert alert-<?php echo $_SESSION['message_type']; ?> danger alert-dismissible fade show' role = 'alert'>
                <?php echo $_SESSION['message']; ?>
                <button type = 'button' class = 'close' data-dismiss = 'alert' aria-label = 'Close'>
                  <span aria-hidden = 'true'>&times;</span>
                </button>
              </div>
              <?php
              unset($_SESSION['message_type']);
              unset($_SESSION['message']);
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
              <form id = "login" action = "login.php" method = "post">
                <div class = "form-group">
                  <label for = "emailLogin">Email</label>
                  <input type = "email" class = "form-control" id = "emailLogin" name = "emailLogin" aria-describedby = "emailHelp" placeholder = "Email" required>
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
              <form id = "signup" action = "signup.php" method = "post">
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
                  <input type = "password" class = "form-control" id = "passwordRegister" pattern=".{8,}" name = "passwordRegister" placeholder = "Password" required>
                </div>

                <div id="passwordMessage" style="display: none">
                  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>

                <script>

                  var myInput = document.getElementById("passwordRegister");
                  var length = document.getElementById("length");

                  // When the user clicks on the password field, show the message box
                  myInput.onfocus = function() {
                    document.getElementById("passwordMessage").style.display = "block";
                  }

                  // When the user clicks outside of the password field, hide the message box
                  myInput.onblur = function() {
                    document.getElementById("passwordMessage").style.display = "none";
                  }

                  // When the user starts to type something inside the password field
                  myInput.onkeyup = function() {
                    // Validate length
                    if(myInput.value.length >= 8) {
                      length.classList.remove("invalid");
                      length.classList.add("valid");
                    } else {
                      length.classList.remove("valid");
                      length.classList.add("invalid");
                    }
                  }
                </script>

                <div class = "form-group">
                  <label for = "confirmPassword">Confirm Password</label>
                  <input type = "password" class = "form-control" id = "confirmPassword" name = "confirmPassword" placeholder = "Confirm Password" required>
                </div>

                <div id="confirmPasswordMessage" style="display: none">
                  <p id="matchPassword" class="invalid">Password fields need to match!</b></p>
                </div>

                <script>
                  var password = document.getElementById("passwordRegister");
                  var confirmPassword = document.getElementById("confirmPassword");
                  var matchPassword = document.getElementById("matchPassword");

                  // When the user clicks on the password field, show the message box
                  confirmPassword.onfocus = function() {
                      document.getElementById("confirmPasswordMessage").style.display = "block";
                  }

                  // When the user clicks outside of the password field, hide the message box
                  confirmPassword.onblur = function() {
                      document.getElementById("confirmPasswordMessage").style.display = "none";
                  }

                  // When the user starts to type something inside the password field
                  confirmPassword.onkeyup = function() {
                    // Validate length
                    if(password.value == confirmPassword.value) {
                      matchPassword.classList.remove("invalid");
                      matchPassword.classList.add("valid");
                    } else {
                      matchPassword.classList.remove("valid");
                      matchPassword.classList.add("invalid");
                    }
                  }
                </script>

                <br>
                <button name = "signup" type = "submit" class = "btn btn-primary btn-block"><strong>Register</strong></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class = "py-3">
      <div class = "container">
        <p class = "m-0 text-center text-white">Developed by Vitor Forbrig. Copyright &copy; 2018</p>
      </div>
    </footer>
  </body>
</html>
