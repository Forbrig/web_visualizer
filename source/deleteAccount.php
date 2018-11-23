<?php
  require 'db.php';
  // delete account function handler
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // delete files assoc with this account
    $sql = "SELECT id, id_user, name, type FROM file WHERE id_user = $id";
    $resultset = $mysqli->query($sql);
    while($rows = mysqli_fetch_array($resultset) ) {
      $file_name = "uploads/".$rows['id_user']."_".$rows['id']."_".$rows['name'].".".$rows['type'];

      if (file_exists($file_name)) {
        unlink($file_name);
      }
    }

    $result = $mysqli->query("DELETE FROM file WHERE id_user = $id");

    $result = $mysqli->query("DELETE FROM users WHERE id = $id");

    session_destroy();
    session_start();

    if (! $result) {
      $_SESSION['message'] = "An error has occurred!";
      header("location: index.php");
    } else {
      $_SESSION['message'] = "Account deleted!";
      header("location: index.php");
    }
  }
?>
