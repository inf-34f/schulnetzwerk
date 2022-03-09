
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title> Droste Schulnetzwerk </title>


        <link rel="icon" type="image/x-icon" href="icon.png">

        <!-- CSS einbinden --> 

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="gridinfo.css">
        <link rel="stylesheet" type="text/css" href="footerinfo.css">
        <link rel="stylesheet" type="text/css" href="chat.css">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fixnav.css">


    </head>
<body>

<header>
    <p class="logo">Upload</p>
    <ul>
        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="home"></ion-icon></span>
                <span class="text">Home</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <span class="text">Profile</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="text"></ion-icon></span>
                <span class="text">Messages</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="settings"></ion-icon></span>
                <span class="text">Settings</span>
            </a>
        </li>
        <li class="list">
            <a href="login/login.php">
                <span class="icon"><ion-icon name="contact"></ion-icon></span>
                <span class="text">Login</span>
            </a>
        </li>
    </ul>
</header>
<section class="banner" style="height: 25vh"></section>

<script type="text/javascript">
    window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })
</script>
<br>
<br>
<main>

  <form action="upload.php" method="post" enctype="multipart/form-data">
    Wähle die Datei aus:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
  </form>

</main>

</body>
</html>


<?php



define('DB_SERVER', '47.254.133.75');
define('DB_USERNAME', 'schulnetzwerk');
define('DB_PASSWORD', 'CDOUWqoAsWUHUbtl');
define('DB_NAME', 'schulnetzwerk');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $uploadOk = 1;
}


if (file_exists($target_file)) {
  echo "Die Datei existiert bereits";
  $uploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Deine Datei ist zu groß";
  $uploadOk = 0;
}


if($imageFileType != "pdf" && $imageFileType != "pptx" && $imageFileType != "doc"
&& $imageFileType != "xls" ) {
  echo "Es sind nur Schuldatein erlaubt.";
  $uploadOk = 0;
}


if ($uploadOk == 0) {
  echo "Deine Datei wurde nicht hochgeladen.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Die Datei ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " wurde hochgeladen.";
  } else {
    echo "Es gab ein Fehler beim Hochladen.";
  }
}
?>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
