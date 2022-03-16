<?php

define('DB_SERVER', '47.254.133.75');
define('DB_USERNAME', 'schulnetzwerk');
define('DB_PASSWORD', 'CDOUWqoAsWUHUbtl');
define('DB_NAME', 'schulnetzwerk');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
