<?php
  /*
  session_start();
  if($_SESSION["logged_in"] != true) {
    $_SESSION['message'] = "Please log in first!";
    header("location: error.php");
  } else {
    echo("Enter my lord!");
  }
  */
?>


<!DOCTYPE html>
<html lang = "pt-br">
  <head>
    <meta charset = "utf-8">
    <title>Web Visualizer</title>
    <link href = "css/style.css" type = "text/css" rel = "stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Web Visualizer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <div class = "container-fluid">
      <div class = "row">
        <div class = "col-md-1 col-sm-4 col-xs-12"></div>
        <div class = "col-md-10 col-sm-4 col-xs-12 home-body">
          <div class="container">

            <h1 class="my-4 text-center text-lg-left">Thumbnail Gallery</h1>

            <div class="row text-center text-lg-left">

              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                  <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
              </div>
            </div>
          </div>


        </div>
        <div class = "col-md-1 col-sm-4 col-xs-12"></div>
      </div>
    </div>

    <footer class = "py-3">
      <div class = "container">
        <p class = "m-0 text-center text-white">Developed by Vitor Forbrig. Copyright &copy; 2018</p>
      </div>
    </footer>
  </body>
</html>
