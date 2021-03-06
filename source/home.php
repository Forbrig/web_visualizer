<?php
  require 'db.php';
  session_start();
  if($_SESSION["logged_in"] != true) {
    $_SESSION['message']="Please log in first!";
    header("location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Visualizer</title>

    <!-- my style -->
    <link href="css/style.css" type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  </head>

  <body>

    <!-- top nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="home.php">Web Visualizer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-lg-1">

          <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="fas fa-user" style="font-size: 15px;"></span>
              <strong><?php echo $_SESSION['first_name'];?></strong>
            </a>
            <ul class="dropdown-menu">
              <li>
                <div class="navbar-login">
                  <div class="row">
                    <div class="col-lg-4">
                      <p class="text-center">
                        <span class="fas fa-user" style="font-size: 105px;"></span>
                      </p>
                    </div>
                    <div class="col-lg-8">
                      <p class="text-left"><strong><?php echo $_SESSION['first_name']. " " .$_SESSION['last_name'];?></strong></p>
                      <p class="text-left small"><?php echo $_SESSION['email'];?></p>
                      <p class="text-left">
                        <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#editAccountModal">
                          Edit Account
                        </button>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="navbar-login navbar-login-session">
                  <div class="row">
                    <div class="col-lg-12">
                      <p>
                        <form id="logout" action="logout.php" method="post">
                          <button name="logout" type="submit" class="btn btn-danger btn-block"><strong>Logout</strong></button>
                        </form>
                      </p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <!-- edit account popup (called via navbar button) -->
    <div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editAccountModalTitle">Edit Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editAccount" action="editAccount.php" method="post">
              <div class="form-group">
                <input type="hidden" class="form-control" id="idEdit" name="idEdit" value="<?php echo $_SESSION['id']; ?>">
              </div>
              <div class="form-group">
                <label for="firstNameRegister">First Name</label>
                <input type="text" class="form-control" id="firstNameEdit" name="firstNameEdit" placeholder="First Name" value="<?php echo $_SESSION['first_name']; ?>" required>
              </div>
              <div class="form-group">
                <label for="lastNameRegister">Last Name</label>
                <input type="text" class="form-control" id="lastNameEdit" name="lastNameEdit" placeholder="Last Name" value="<?php echo $_SESSION['last_name']; ?>" required>
              </div>
              <div class="form-group">
                <label for="emailRegister">Email</label>
                <input type="email" class="form-control" id="emailEdit" name="emailEdit" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" required>
              </div>
              <div class="form-group">
                <label for="passwordRegister">Password</label>
                <input type="password" class="form-control" id="passwordEdit" name="passwordEdit" placeholder="Password" required>
              </div>
              <div id="passwordMessage" style="display: none">
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
              </div>

              <script>
                var myInput=document.getElementById("passwordEdit");
                var length=document.getElementById("length");

                // When the user clicks on the password field, show the message box
                myInput.onfocus=function() {
                    document.getElementById("passwordMessage").style.display="block";
                }

                // When the user clicks outside of the password field, hide the message box
                myInput.onblur=function() {
                    document.getElementById("passwordMessage").style.display="none";
                }

                // When the user starts to type something inside the password field
                myInput.onkeyup=function() {
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

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger mr-auto" data-toggle="modal" data-target="#deleteAccountModal" data-dismiss="modal">Delete Account</button>
                <button type="submit" name="submitEditForm" class="btn btn-primary">Save changes</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <!-- confirm delete account popup (called via edit account pop up button) -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="image">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteAccountModalTitle">Delete Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete your profile? All your files will be erased!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            <a href="deleteAccount.php?delete=<?php echo $_SESSION['id']; ?>" class="btn btn-danger">Confirm</a>
          </div>
        </div>
      </div>
    </div>

    <!-- edit file popup -->
    <div class="modal fade" id="editFileModal" tabindex="-1" role="dialog" aria-labelledby="editFileModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editFileModalTitle">Edit File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="editFile.php" method="post">
              <div class="form-group">
                <input type="hidden" class="form-control" name="idFile" id="idFile" value="">
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" name="idFileUser" id="idFileUser" value="">
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" name="fileExt" id="fileExt" value="">
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" name="oldFileName" id="oldFileName" value="">
              </div>
              <div class="form-group">
                <label for="fileNameEdit">File Name</label>
                <input type="text" class="form-control" name="fileNameEdit" id="fileNameEdit" placeholder="File Name" value="" required>
              </div>
          </div>
          <div class="modal-footer">

            <button type="submit" name="submitEditFileForm" class="btn btn-primary mr-auto">Save changes</button>
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <!-- main home div -->
    <div class="container-fluid">
      <div class="row">
        <div class="mx-auto col-12 col-sm-12 col-md-11 col-lg-11 row">

          <!-- upload div -->
          <div class="col-12 col-sm-12 col-md-5 col-lg-3 home-div border mt-4">
            <h1 class="text-center">Upload a File</h1>
            <hr/>
            <form id="uploadFile" enctype='multipart/form-data' action="uploadFile.php" method="post">
              <div class="form-group">
                <input type="hidden" class="form-control" id="idUserUpload" name="idUserUpload" value="<?php echo $_SESSION['id']; ?>">
              </div>
              <div class="form-group">
                <label for="fileName">File Name</label>
                <input type="text" class="form-control" id="fileName" name="fileName" placeholder="File Name">
              </div>
              <div class="form-group">
                <label for="file">Choose File (PNG, JPG or PDF)</label>
                <input type="file" class="form-control-file" id="uploadedFile" name="uploadedFile" placeholder="Choose File" required>
              </div>
              <br>
              <button name="upload" type="submit" class="btn btn-primary btn-block"><strong>Upload</strong></button>
            </form>
            <br>
            <?php
              if (isset($_SESSION['message'])) {
                echo "
                  <div class='alert alert-".$_SESSION['message_type']." danger alert-dismissible fade show' role='alert'>
                    ".$_SESSION['message']."
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                ";
                unset($_SESSION['message_type']);
                unset($_SESSION['message']);
              }
            ?>

          </div>

          <!-- gallery div -->
          <div class="col-12 col-sm-12 col-md-7 col-lg-9 gallery home-div border mt-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 scroll">

              <!-- gallery div tabs -->
              <ul class="nav nav-tabs" id="fileTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all-tab-div" role="tab" aria-controls="all-tab" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="image-tab" data-toggle="tab" href="#image-tab-div" role="tab" aria-controls="image-tab" aria-selected="true">Images</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pdf-tab" data-toggle="tab" href="#pdf-tab-div" role="tab" aria-controls="pdf-tab" aria-selected="false">PDF's</a>
                </li>
              </ul>

              <div class="tab-content mt-3" id="tabFileContent">

                <!-- all files tab -->
                <div class="tab-pane fade show active" id="all-tab-div" role="tabpanel" aria-labelledby="all-tab">
                  <div class="row">
                    <?php
                    $user_id=$_SESSION['id'];
                    $sql="SELECT id, id_user, name, type, date_inserted FROM file WHERE id_user=$user_id";
                    $resultset=$mysqli->query($sql);
                    while($rows=mysqli_fetch_array($resultset) ) {
                      if ($rows["type"] == 'PNG' || $rows["type"] == 'JPG') {
                        ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                          <div class="col-sm-12 img-box border nopadding">
                            <a class="col-sm-12 nopadding"  data-fancybox="allfiles" href="uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>">
                              <img class="col-sm-12 nopadding thumbnail" src="uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>" alt="<?php echo $rows["name"] ?>"/>
                            </a>
                          </div>

                          <div class="col-sm-12 pt-1 center_text text-truncate border">
                            <strong><?php echo $rows["name"]; ?></strong><br>
                            <strong>Type: </strong>
                            <?php echo $rows["type"]; ?>
                            <br>
                            <strong>Date: </strong>
                            <?php echo $rows["date_inserted"]; ?>
                          </div>

                          <div class="row nopadding">
                            <div class="col-md-6 nopadding">
                              <button type="button" class="btn btn-primary btn-block"
                               data-id="<?php echo $rows["id"]; ?>"
                               data-id_user="<?php echo $rows["id_user"]; ?>"
                               data-name="<?php echo $rows["name"]; ?>"
                               data-type="<?php echo $rows["type"]; ?>"
                               data-toggle="modal" data-target="#editFileModal">
                                <span class="fas fa-edit" aria-hidden="true"></span>
                              </button>
                            </div>
                            <div class="col-md-6 nopadding">
                              <form action="deleteFile.php" method="post">
                                <button type="submit" name="submitDeleteFile" class="btn btn-danger btn-block">
                                  <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                </button>
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="idFileDelete" value="<?php echo $rows["id"]; ?>">
                                </div>
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="idFileUserDelete" value="<?php echo $rows["id_user"]; ?>">
                                </div>
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="fileExtDelete" value="<?php echo $rows["type"]; ?>">
                                </div>
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="fileNameDelete" value="<?php echo $rows["name"]; ?>">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        <?php } else if ($rows["type"] == 'PDF') { ?>
                          <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                            <div class="col-sm-12 img-box border nopadding">
                              <a data-fancybox="allfiles" data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "800px"}}}' href="uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>">
                                <img class="col-sm-12 nopadding thumbnail" src="img/pdf.png">
                              </a>
                            </div>
                            <div class="col-sm-12 pt-1 center_text text-truncate border">
                              <strong><?php echo $rows["name"]; ?></strong><br>
                              <strong>Type: </strong>
                              <?php echo $rows["type"]; ?>
                              <br>
                              <strong>Date: </strong>
                              <?php echo $rows["date_inserted"]; ?>
                            </div>

                            <div class="row nopadding">
                              <div class="col-md-6 nopadding">
                                <button type="button" class="btn btn-primary btn-block"
                                 data-id="<?php echo $rows["id"]; ?>"
                                 data-id_user="<?php echo $rows["id_user"]; ?>"
                                 data-name="<?php echo $rows["name"]; ?>"
                                 data-type="<?php echo $rows["type"]; ?>"
                                 data-toggle="modal" data-target="#editFileModal">
                                  <span class="fas fa-edit" aria-hidden="true"></span>
                                </button>
                              </div>
                              <div class="col-md-6 nopadding">
                                <form action="deleteFile.php" method="post">
                                  <button type="submit" name="submitDeleteFile" class="btn btn-danger btn-block">
                                    <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                  </button>
                                  <div class="form-group nopadding">
                                    <input type="hidden" class="form-control" name="idFileDelete" value="<?php echo $rows["id"]; ?>">
                                  </div>
                                  <div class="form-group nopadding">
                                    <input type="hidden" class="form-control" name="idFileUserDelete" value="<?php echo $rows["id_user"]; ?>">
                                  </div>
                                  <div class="form-group nopadding">
                                    <input type="hidden" class="form-control" name="fileExtDelete" value="<?php echo $rows["type"]; ?>">
                                  </div>
                                  <div class="form-group nopadding">
                                    <input type="hidden" class="form-control" name="fileNameDelete" value="<?php echo $rows["name"]; ?>">
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                      <?php }
                      } ?>
                  </div>
                </div>

                <!-- image files tab -->
                <div class="tab-pane fade" id="image-tab-div" role="tabpanel" aria-labelledby="image-tab">
                  <div class="row">
                    <?php
                    $user_id=$_SESSION['id'];
                    $sql="SELECT id, id_user, name, type, date_inserted FROM file WHERE id_user=$user_id";
                    $resultset=$mysqli->query($sql);
                    while($rows=mysqli_fetch_array($resultset) ) {
                      if ($rows["type"] == 'PNG' || $rows["type"] == 'JPG') {
                        ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                          <div class="col-sm-12 img-box border nopadding">
                            <a class="col-sm-12 nopadding"  data-fancybox="images" href="uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>">
                              <img class="col-sm-12 nopadding thumbnail" src="uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>" alt="<?php echo $rows["name"] ?>"/>
                            </a>
                          </div>

                          <div class="col-sm-12 pt-1 center_text text-truncate border">
                            <strong><?php echo $rows["name"]; ?></strong><br>
                            <strong>Type: </strong>
                            <?php echo $rows["type"]; ?>
                            <br>
                            <strong>Date: </strong>
                            <?php echo $rows["date_inserted"]; ?>
                          </div>

                          <div class="row nopadding">
                            <div class="col-md-6 nopadding">
                              <button type="button" class="btn btn-primary btn-block"
                               data-id="<?php echo $rows["id"]; ?>"
                               data-id_user="<?php echo $rows["id_user"]; ?>"
                               data-name="<?php echo $rows["name"]; ?>"
                               data-type="<?php echo $rows["type"]; ?>"
                               data-toggle="modal" data-target="#editFileModal">
                                <span class="fas fa-edit" aria-hidden="true"></span>
                              </button>
                            </div>
                            <div class="col-md-6 nopadding">
                              <form action="deleteFile.php" method="post">
                                <button type="submit" name="submitDeleteFile" class="btn btn-danger btn-block">
                                  <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                </button>
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="idFileDelete" value="<?php echo $rows["id"]; ?>">
                                </div>
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="idFileUserDelete" value="<?php echo $rows["id_user"]; ?>">
                                </div>
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="fileExtDelete" value="<?php echo $rows["type"]; ?>">
                                </div>
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="fileNameDelete" value="<?php echo $rows["name"]; ?>">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                      <?php }
                    } ?>

                  </div>
                </div>

                <!-- pdf files tab -->
                <div class="tab-pane fade" id="pdf-tab-div" role="tabpanel" aria-labelledby="pdf-tab">
                  <div class="row">
                    <?php
                    $user_id=$_SESSION['id'];
                    $sql="SELECT id, id_user, name, type, date_inserted FROM file WHERE id_user=$user_id";
                    $resultset=$mysqli->query($sql);
                    while($rows=mysqli_fetch_array($resultset) ) {
                      if ($rows["type"] == 'PDF') {
                        ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-2">
                          <div class="col-sm-12 img-box border nopadding">
                            <a data-fancybox="pdfs" data-options='{"type" : "iframe", "iframe" : {"preload" : false, "css" : {"width" : "800px"}}}' href="uploads/<?php echo $rows["id_user"]."_".$rows["id"]."_".$rows["name"].".".$rows["type"]; ?>">
                              <img class="col-sm-12 nopadding thumbnail" src="img/pdf.png">
                            </a>
                          </div>
                          <div class="col-sm-12 pt-1 center_text text-truncate border">
                            <strong><?php echo $rows["name"]; ?></strong><br>
                            <strong>Type: </strong>
                            <?php echo $rows["type"]; ?>
                            <br>
                            <strong>Date: </strong>
                            <?php echo $rows["date_inserted"]; ?>
                          </div>

                          <div class="row nopadding">
                            <div class="col-md-6 nopadding">
                              <button type="button" class="btn btn-primary btn-block"
                               data-id="<?php echo $rows["id"]; ?>"
                               data-id_user="<?php echo $rows["id_user"]; ?>"
                               data-name="<?php echo $rows["name"]; ?>"
                               data-type="<?php echo $rows["type"]; ?>"
                               data-toggle="modal" data-target="#editFileModal">
                                <span class="fas fa-edit" aria-hidden="true"></span>
                              </button>
                            </div>
                            <div class="col-md-6 nopadding">
                              <form action="deleteFile.php" method="post">
                                <button type="submit" name="submitDeleteFile" class="btn btn-danger btn-block">
                                  <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                </button>
                                <div class="form-group nopadding">
                                  <input type="hidden" class="form-control" name="idFileDelete" value="<?php echo $rows["id"]; ?>">
                                </div>
                                <div class="form-group nopadding">
                                  <input type="hidden" class="form-control" name="idFileUserDelete" value="<?php echo $rows["id_user"]; ?>">
                                </div>
                                <div class="form-group nopadding">
                                  <input type="hidden" class="form-control" name="fileExtDelete" value="<?php echo $rows["type"]; ?>">
                                </div>
                                <div class="form-group nopadding">
                                  <input type="hidden" class="form-control" name="fileNameDelete" value="<?php echo $rows["name"]; ?>">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                    <?php }
                    } ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="py-3">
        <div class="container">
          <p class="m-0 text-center text-white">Developed by Vitor Forbrig. Copyright &copy; 2018</p>
        </div>
      </footer>
    </div>

    <!-- Bootstrap 4 -->

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Fancybox -->

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>

    <!-- Assets -->
    <script>
      $(document).ready(function(){
        $("[data-target='#editFileModal']").on("click", function(){
          var id = $(this).data("id");
          var id_user = $(this).data("id_user");
          var name = $(this).data("name");
          var type = $(this).data("type");
          $("#idFile").val(id);
          $("#idFileUser").val(id_user);
          $("#fileExt").val(type);
          $("#oldFileName").val(name);
          $("#fileNameEdit").val(name);
        });
      });
    </script>

    <script src="js/fancybox.js"></script>
  </body>
</html>
