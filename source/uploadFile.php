<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require 'db.php';

  session_start();
  // edit account function handler
  if (isset($_POST["upload"])) {
    $user_id = $_POST["idUserUpload"];
    //check if user inserted a name if note use the file original name
    if ($_POST["fileName"] != '') {
      $file_new_name = $_POST["fileName"];
    } else {
      $file_new_name = pathinfo($_FILES["uploadedFile"]["name"], PATHINFO_FILENAME);
    }

    $file_old_name = $_FILES["uploadedFile"]["name"];

    if ($_FILES["uploadedFile"]["type"] == "image/png") {
      $file_type = 'PNG';
    } elseif ($_FILES["uploadedFile"]["type"] == "image/jpeg") {
      $file_type = 'JPG';
    } elseif ($_FILES["uploadedFile"]["type"] == "application/pdf") {
      $file_type = 'PDF';
    }

    if ($file_type == 'PNG' || $file_type == 'JPG' || $file_type == 'PDF') {
      if ($_FILES["uploadedFile"]["error"] > 0) {
        echo "Return Code:".$_FILES["uploadedFile"]["error"]."";
      } else {
        $i = 1;
        $success = false;
        while(!$success) {
          if (file_exists("uploads/".$file_new_name)) {
            $i++;
            $file_new_name = "$i".$file_old_name;
          } else {
            $success = true;
          }
        }

        // image details into database table
        $sql = "INSERT INTO file (id_user, name, type) VALUES ('$user_id', '$file_new_name', '$file_type')";

        if ($mysqli->query($sql)) {
          //returns auto increment id
          $image_id = mysqli_insert_id($mysqli);

          move_uploaded_file($_FILES["uploadedFile"]["tmp_name"],"uploads/".$user_id."_".$image_id."_".$file_new_name.".".$file_type);

          $_SESSION['message_type'] = "success";
          $_SESSION['message'] = "File uploaded with success!";
          header("location: home.php");
        } else {
          $_SESSION['message_type'] = "danger";
          $_SESSION['message'] = 'Error while uploading file!';
          header("location: home.php");
        }
      }

    } else {
      $_SESSION['message_type'] = "danger";
      $_SESSION['message'] = "Invalid file extension!";
      header("location: home.php");
    }
  }
?>
