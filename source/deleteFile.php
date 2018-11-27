<?php
  require 'db.php';
  session_start();
  // delete account function handler
  $idFile = $_POST['idFileDelete'];
  $idFileUser = $_POST['idFileUserDelete'];
  $fileExt = $_POST['fileExtDelete'];
  $fileName = $_POST['fileNameDelete'];

  $file_name_path = "uploads/".$idFileUser."_".$idFile."_".$fileName.".".$fileExt;

  $result = $mysqli->query("DELETE FROM file WHERE id = $idFile");

  if ($result) {
    if (file_exists($file_name_path)) {
      unlink($file_name_path);
    }
    $_SESSION['message_type'] = "success";
    $_SESSION['message'] = "File deleted!";
    header("location: home.php");
  } else {
    $_SESSION['message_type'] = "alert";
    $_SESSION['message'] = "Error deleting file!";
    header("location: home.php");
  }
?>
