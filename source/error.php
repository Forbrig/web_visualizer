<?php
  session_start();
?>

<!DOCTYPE html>
<html lang = "pt-br">
  <head>
    <meta charset = "utf-8">
    <title>Error</title>
    <link href = "css/style.css" type = "text/css" rel = "stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>


  <body>
    <div class = "container-fluid bg">
      <div class = "row">
        <div class = "col-md-4 col-sm-4 col-xs-12"></div>
        <div class = "col-md-4 col-sm-4 col-xs-12 form-container">
          <h1>Error</h1>
          <div class = "error-div">
            <p>
              <?php
                if (isset($_SESSION['message']) and !empty($_SESSION['message'])) {
                  echo $_SESSION['message'];
                } else {
                  header("location: index.php");
                }
              ?>
            </p>
          </div>
          <br>
          <a href = "index.php">
            <button class = "btn btn-primary btn-block"><strong>Return</strong></button>
          </a>
        <div class = "col-md-4 col-sm-4 col-xs-12"></div>
      </div>
    </div>
  </body>
</html>
