<?php
  require 'db.php';
  // delete account function handler

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

    if (! $result) {
      session_destroy();
      session_start();
      $_SESSION['message_type'] = "danger";
      $_SESSION['message'] = "Could't delete account!";
      header("location: index.php");
    } else {
      session_destroy();
      session_start();
      $_SESSION['message_type'] = "success";
      $_SESSION['message'] = 'Account deleted!';
      header("Location: index.php");
    }
  }
?>
