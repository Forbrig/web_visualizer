<?php
  require 'db.php';
  session_start();
  if($_SESSION["logged_in"] != true) {
    $_SESSION['message'] = "Please log in first!";
    header("location: index.php");
  }
?>


<!DOCTYPE html>
<html lang = "pt-br">
  <head>
    <meta charset = "utf-8">
    <title>Web Visualizer</title>
    <link href = "css/style.css" type = "text/css" rel = "stylesheet">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src = "https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- 1. Add latest jQuery and fancybox files -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>


  </head>

  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.php");
      }
    }
  ?>

  <script type = "text/javascript">
    $('[data-fancybox = "images"]').fancybox({
      buttons : [
        'slideShow',
        'share',
        'zoom',
        'fullScreen',
        'close'
      ],
      thumbs : {
        autoStart : true
      }
    });

    $('[data-fancybox="allfiles"]').fancybox({
      buttons : [
        'slideShow',
        'share',
        'zoom',
        'fullScreen',
        'close'
      ],
      thumbs : {
        autoStart : true
      }
    });

    $('[data-fancybox="pdfs"]').fancybox({
      buttons : [
        'slideShow',
        'share',
        'zoom',
        'fullScreen',
        'close'
      ],
      thumbs : {
        autoStart : true
      }
    });

  </script>


  <body>

    <nav class = "navbar navbar-expand-lg navbar-light bg-light">
      <a class = "navbar-brand" href = "home.php">Web Visualizer</a>
      <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarToggler" aria-controls = "navbarToggler" aria-expanded = "false" aria-label = "Toggle navigation">
        <span class = "navbar-toggler-icon"></span>
      </button>

      <div class = "collapse navbar-collapse" id = "navbarToggler">
        <ul class = "navbar-nav mr-auto mt-2 mt-lg-0">

          <li class = "nav-item dropdown">
            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
              <span class = "fas fa-user" style = "font-size: 15px;"></span>
              <strong><?php echo $_SESSION['first_name'];?></strong>
            </a>
            <ul class = "dropdown-menu">
              <li>
                <div class = "navbar-login">
                  <div class = "row">
                    <div class = "col-lg-4">
                      <p class = "text-center">
                        <span class = "fas fa-user" style = "font-size: 105px;"></span>
                      </p>
                    </div>
                    <div class = "col-lg-8">
                      <p class = "text-left"><strong><?php echo $_SESSION['first_name']. " " .$_SESSION['last_name'];?></strong></p>
                      <p class = "text-left small"><?php echo $_SESSION['email'];?></p>
                      <p class = "text-left">
                        <button type = "button" class = "btn btn-primary btn-block btn-sm" data-toggle = "modal" data-target = "#editAccountModal">
                          Edit Account
                        </button>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
              <li class = "divider"></li>
              <li>
                <div class = "navbar-login navbar-login-session">
                  <div class = "row">
                    <div class = "col-lg-12">
                      <p>
                        <form id = "logout" action = "home.php" method = "post">
                          <button name = "logout" type = "submit" class = "btn btn-danger btn-block"><strong>Logout</strong></button>
                        </form>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <!-- edit account popup (called via navbar button) -->
    <div class = "modal fade" id = "editAccountModal" tabindex = "-1" role = "dialog" aria-labelledby = "editAccountModal" aria-hidden = "true">
      <div class = "modal-dialog modal-dialog-centered" role = "document">
        <div class = "modal-content">
          <div class = "modal-header">
            <h5 class = "modal-title" id = "editAccountModalTitle">Edit Account</h5>
            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
              <span aria-hidden = "true">&times;</span>
            </button>
          </div>
          <div class = "modal-body">
            <form id = "editAccount" action = "editAccount.php" method = "post">
              <div class = "form-group">
                <input type = "hidden" class = "form-control" id = "idEdit" name = "idEdit" value = "<?php echo $_SESSION['id']; ?>">
              </div>
              <div class = "form-group">
                <label for = "firstNameRegister">First Name</label>
                <input type = "text" class = "form-control" id = "firstNameEdit" name = "firstNameEdit" placeholder = "First Name" value = "<?php echo $_SESSION['first_name']; ?>" required>
              </div>
              <div class = "form-group">
                <label for = "lastNameRegister">Last Name</label>
                <input type = "text" class = "form-control" id = "lastNameEdit" name = "lastNameEdit" placeholder = "Last Name" value = "<?php echo $_SESSION['last_name']; ?>" required>
              </div>
              <div class = "form-group">
                <label for = "emailRegister">Email</label>
                <input type = "email" class = "form-control" id = "emailEdit" name = "emailEdit" placeholder = "Email" value = "<?php echo $_SESSION['email']; ?>" required>
              </div>
              <div class = "form-group">
                <label for = "passwordRegister">Password</label>
                <input type = "password" class = "form-control" id = "passwordEdit" name = "passwordEdit" placeholder = "Password" required>
              </div>
              <button type = "submit" name = "submitEditForm" class = "btn btn-primary">Save changes</button>
            </form>
          </div>
          <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger mr-auto" data-toggle = "modal" data-target = "#deleteAccountModal" data-dismiss = "modal">Delete Account</button>
            <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <!-- confirm delete account popup (called via edit account pop up button) -->
    <div class = "modal fade" id = "deleteAccountModal" tabindex = "-1" role = "dialog" aria-labelledby = "deleteAccountModal" aria-hidden = "true">
      <div class = "modal-dialog modal-dialog-centered" role = "image">
        <div class = "modal-content">
          <div class = "modal-header">
            <h5 class = "modal-title" id = "deleteAccountModalTitle">Delete Account</h5>
            <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
              <span aria-hidden = "true">&times;</span>
            </button>
          </div>
          <div class = "modal-body">
            Are you sure you want to delete your profile? All your files will be erased!
          </div>
          <div class = "modal-footer">
            <button type = "button" class = "btn btn-primary" data-dismiss = "modal">Cancel</button>
            <a href = "deleteAccount.php?delete=<?php echo $_SESSION['id']; ?>" class = "btn btn-danger">Confirm</a>
          </div>
        </div>
      </div>
    </div>


    <div class = "container-fluid">
      <div class = "row">
        <div class = "col-md-1 col-sm-4 col-xs-12"></div>
        <div class = "col-md-10 col-sm-4 col-xs-12 home-body row">

          <!-- upload div -->
          <div class = "col-md-3 col-sm-4 col-xs-12 upload-div">
            <h1 class = "text-center">Upload a File</h1>
            <hr/>
            <form id = "uploadFile" enctype = 'multipart/form-data' action = "uploadFile.php" method = "post">
              <div class = "form-group">
                <input type = "hidden" class = "form-control" id = "idUserUpload" name = "idUserUpload" value = "<?php echo $_SESSION['id']; ?>">
              </div>
              <div class = "form-group">
                <label for = "fileName">File Name</label>
                <input type = "text" class = "form-control" id = "fileName" name = "fileName" placeholder = "File Name" required>
              </div>
              <div class = "form-group">
                <label for = "file">Choose File (PNG, JPG or PDF)</label>
                <input type = "file" class = "form-control-file" id = "uploadedFile" name = "uploadedFile" placeholder = "Choose File" required>
              </div>
              <br>
              <button name = "upload" type = "submit" class = "btn btn-primary btn-block"><strong>Upload</strong></button>
            </form>
          </div>

          <!-- gallery div -->
          <div class = "col-md-9 col-sm-4 col-xs-12 gallery">
            <ul class = "nav nav-tabs" id = "fileTab" role = "tablist">
              <li class = "nav-item">
                <a class = "nav-link active" id = "all-tab" data-toggle = "tab" href = "#all-tab-div" role = "tab" aria-controls = "all-tab" aria-selected="true">All</a>
              </li>
              <li class = "nav-item">
                <a class = "nav-link" id = "image-tab" data-toggle = "tab" href = "#image-tab-div" role = "tab" aria-controls = "image-tab" aria-selected="true">Images</a>
              </li>
              <li class = "nav-item">
                <a class = "nav-link" id = "pdf-tab" data-toggle = "tab" href = "#pdf-tab-div" role = "tab" aria-controls = "pdf-tab" aria-selected = "false">PDF's</a>
              </li>
            </ul>

            <div class = "tab-content" id = "tabFileContent">

              <!-- all files tab -->
              <div class = "tab-pane fade show active" id = "all-tab-div" role = "tabpanel" aria-labelledby = "all-tab">
                <?php
                  $user_id = $_SESSION['id'];
                  $sql = "SELECT id, id_user, name, type, date_inserted FROM file WHERE id_user = $user_id";
                  $resultset = $mysqli->query($sql);
                  while($rows = mysqli_fetch_array($resultset) ) {
                    if ($rows["type"] == 'PNG' || $rows["type"] == 'JPG') {
                ?>
                  <div class = "border file">
                    <a data-fancybox = "allfiles" href = "http://localhost/web_visualizer/uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>">
                      <img src = "http://localhost/web_visualizer/uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>" alt = "<?php echo $rows["name"] ?>"/>
                    </a>
                    <div class = "info">
                      <div class = "text">
                        <strong>Name: </strong>
                        <?php echo $rows["name"]; ?>
                        <br>
                        <strong>Type: </strong>
                        <?php echo $rows["type"]; ?>
                        <br>
                        <strong>Date: </strong>
                        <?php echo $rows["date_inserted"]; ?>
                      </div>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class = "border file">
                    <a data-fancybox = "allfiles" data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "800px"}}}' href = "http://localhost/web_visualizer/uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>">
                      <span class = "pdf far fa-file-pdf"></span>
                    </a>
                    <div class = "info">
                      <div class = "text">
                        <strong>Name: </strong>
                        <?php echo $rows["name"]; ?>
                        <br>
                        <strong>Type: </strong>
                        <?php echo $rows["type"]; ?>
                        <br>
                        <strong>Date: </strong>
                        <?php echo $rows["date_inserted"]; ?>
                      </div>
                    </div>
                  </div>
                <?php } } ?>

              </div>

              <!-- image files tab -->
              <div class = "tab-pane fade" id = "image-tab-div" role = "tabpanel" aria-labelledby = "image-tab">
                <?php
                  $user_id = $_SESSION['id'];
                  $sql = "SELECT id, id_user, name, type, date_inserted FROM file WHERE id_user = $user_id";
                  $resultset = $mysqli->query($sql);
                  while($rows = mysqli_fetch_array($resultset) ) {
                    if ($rows["type"] == 'PNG' || $rows["type"] == 'JPG') {
                ?>
                  <div class = "border file">
                    <a data-fancybox = "images" href = "http://localhost/web_visualizer/uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>">
                      <img src = "http://localhost/web_visualizer/uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>" alt = "<?php echo $rows["name"] ?>"/>
                    </a>
                    <div class = "info">
                      <div class = "text">
                        <strong>Name: </strong>
                        <?php echo $rows["name"]; ?>
                        <br>
                        <strong>Type: </strong>
                        <?php echo $rows["type"]; ?>
                        <br>
                        <strong>Date: </strong>
                        <?php echo $rows["date_inserted"]; ?>
                      </div>
                    </div>
                  </div>
                <?php } } ?>

              </div>

              <!-- pdf files tab -->
              <div class = "tab-pane fade" id = "pdf-tab-div" role = "tabpanel" aria-labelledby = "pdf-tab">
                <?php
                  $user_id = $_SESSION['id'];
                  $sql = "SELECT id, id_user, name, type, date_inserted FROM file WHERE id_user = $user_id";
                  $resultset = $mysqli->query($sql);
                  while($rows = mysqli_fetch_array($resultset) ) {
                    if ($rows["type"] == 'PDF') {
                ?>
                  <div class = "border file">
                    <a data-fancybox = "pdfs" data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "800px"}}}' href = "http://localhost/web_visualizer/uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>">
                      <span class = "pdf far fa-file-pdf"></span>
                    </a>
                    <div class = "info">
                      <div class = "text">
                        <strong>Name: </strong>
                        <?php echo $rows["name"]; ?>
                        <br>
                        <strong>Type: </strong>
                        <?php echo $rows["type"]; ?>
                        <br>
                        <strong>Date: </strong>
                        <?php echo $rows["date_inserted"]; ?>
                      </div>
                    </div>
                  </div>

                <?php } } ?>
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
