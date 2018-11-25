<?php
  require 'db.php';


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

  $idFile = $_POST['idFile'];
  $idFileUser = $_POST['idFileUser'];
  $fileNameEdit = $_POST['fileNameEdit'];
  $fileExt = $_POST['fileExt'];
  $oldFileName = $_POST['oldFileName'];

  $file_old_path = "uploads/".$idFileUser."_".$idFile."_".$oldFileName.".".$fileExt;
  $file_new_path = "uploads/".$idFileUser."_".$idFile."_".$fileNameEdit.".".$fileExt;

  $result = $mysqli->query("UPDATE file SET name = '$fileNameEdit' WHERE id = '$idFile'");

  if ($result) {
    if (file_exists($file_old_path) && ((!file_exists($file_new_path)) || is_writable($file_new_path))) {
      rename($file_old_path, $file_new_path);
    }

    header("location: home.php");
  } else {
    //header("location: home.php");
  }

?>
