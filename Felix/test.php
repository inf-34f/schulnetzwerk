<?php

include("../mysql.php");

$sql = "SELECT Filename, Link, last_edit FROM files ORDER BY File_ID DESC LIMIT 3;";
$result = $link->query($sql);

$names = [];
while($row = mysqli_fetch_array($result)){
  array_push($names, $row['Filename']);

}




?>
