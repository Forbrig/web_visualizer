<?php
  $host = 'localhost';
  $user = 'root';
  $password = '123';
  $db = 'web_visualizer';

  /*
    $host = 'localhost';
    $user = 'admin';
    $password = 'admin123';
    $db = 'id7955912_web_visualizer';
  */

  $mysqli = new mysqli($host, $user, $password, $db) or die($mysqli->error);

  if (!$mysqli) {
    echo "
    <!-- Modal -->
    <div id='myModal' class='modal fade' role='dialog'>
      <div class='modal-dialog'>

        <!-- Modal content-->
        <div class='modal-content'>
          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
            <h4 class='modal-title'>Modal Header</h4>
          </div>
          <div class='modal-body'>
            <p>Some text in the modal.</p>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
          </div>
        </div>

      </div>
    </div>

    ";
  }
?>
