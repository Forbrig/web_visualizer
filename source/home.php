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
  <body bgcolor = "#E6E6FA">
    <div class = "container-fluid bg">
      <div class = "row">
        <div class = "col-md-1 col-sm-4 col-xs-12"></div>
        <div class = "col-md-10 col-sm-4 col-xs-12 home-body">
          <h1>aaaaaaaaaa</h1>
          <div class="container">
            <div class="row">
              <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid rounded">
              </a>
            </div>
            <div class="row">
              <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid rounded">
              </a>
            </div>

            <div class="row">
              <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid rounded">
              </a>
              <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid rounded">
              </a>
            </div>
          </div>

          <script type="text/javascript">
          $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
          });
          </script>

        </div>
        <div class = "col-md-1 col-sm-4 col-xs-12"></div>
      </div>
    </div>
  </body>
</html>
