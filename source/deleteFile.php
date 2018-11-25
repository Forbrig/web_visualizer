<?php
  require 'db.php';
  // delete account function handler
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $idFile = $_POST['idFileDelete'];
  $idFileUser = $_POST['idFileUserDelete'];
  $fileExt = $_POST['fileExtDelete'];
  $fileName = $_POST['fileNameDelete'];

  $file_name_path = "uploads/".$idFileUser."_".$idFile."_".$fileName.".".$fileExt;

  if (file_exists($file_name_path)) {
    unlink($file_name_path);
  }

  $result = $mysqli->query("DELETE FROM file WHERE id = $idFile");

  if ($result) {
    header("location: home.php");
  } else {
    header("location: home.php");
  }
?>
