<?php
  $host = 'localhost';
  $user = 'root';
  $password = '123';
  $db = 'web_visualizer';

  $mysqli = new mysqli($host, $user, $password, $db) or die($mysqli->error);
  /*
  if ($mysqli) {
    echo "Connected to db"."<br />";
  }
  */
?>
