<!DOCTYPE html>
<?php require("mysql.php"); ?>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> Droste Schulnetzwerk </title>


        <link rel="icon" type="image/x-icon" href="img/icon.png">

        <!-- CSS einbinden -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="gridinfo.css">
        <link rel="stylesheet" type="text/css" href="footerinfo.css">
        <link rel="stylesheet" type="text/css" href="chat.css">
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fixnav.css">


    </head>
    <?php
    session_start();
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      $loggedin = true;
    }else{
        $loggedin = false;
      }
    ?>




<body>

<header>
    <p class="logo">Schulnetzwerk</p>
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
            <a href="./upload.php">
                <span class="icon"><ion-icon name="text"></ion-icon></span>
                <span class="text">Upload</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><ion-icon name="settings"></ion-icon></span>
                <span class="text">Settings</span>
            </a>
        </li>
        <li class="list">
        <?php


        if(!$loggedin){
          $message="Profil";
          $href="login/login.php";
        }else{
          $message=$_SESSION["username"];
          $href="#";
        }
        ?>

        <a href="<?php echo $href;?>">
                <span class="icon"><ion-icon name="contact"></ion-icon></span>
                <span class="text">Login</span>
            </a>



        </li>
    </ul>
</header>
<section class="banner"></section>

<script type="text/javascript">
    window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    })
</script>


    <main class="grid" id="home">

        <article class="test img">

              <section class="highlight-clean">
                <div class="container">
                  <div class="intro">
                    <h2 class="text-center">Willkommen<?php
                    // $_SESSION["username"] = "Tom";
                    if ($loggedin == false)
                    echo("");
                    else if ($loggedin == true)
                    echo(" ".$_SESSION["username"].",");
                    ?> auf dem Schulnetzwerk der Droste </h2>
                  </div>
                  <div class="buttons"><a class="btn btn-primary" role="button" href="#">Aktuelles</a><a href="login/login.php"><button class="btn btn-light" type="button">Register</button></a></div>
                </div>
              </section>

        </article>

        <article class="test">

          <div class="bootstrap_chat">
            <div class="container py-5 px-4">
              <!-- For demo purpose-->


              <div class="row rounded-lg overflow-hidden shadow">
                <!-- Users box-->

                <!-- Chat Box-->
                <div class="">
                  <div class="px-4 py-5 chat-box bg-white">
                    <!-- Sender Message-->
                    <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                      <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-muted">Test which is a new approach all solutions</p>
                        </div>
                        <p class="small text-muted">12:00 PM | Aug 13</p>
                      </div>
                    </div>

                    <!-- Reciever Message-->
                    <div class="media w-50 ml-auto mb-3">
                      <div class="media-body">
                        <div class="bg-primary rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-white">Test which is a new approach to have all solutions</p>
                        </div>
                        <p class="small text-muted">12:00 PM | Aug 13</p>
                      </div>
                    </div>

                    <!-- Sender Message-->
                    <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                      <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-muted">Test, which is a new approach to have</p>
                        </div>
                        <p class="small text-muted">12:00 PM | Aug 13</p>
                      </div>
                    </div>

                    <!-- Reciever Message-->
                    <div class="media w-50 ml-auto mb-3">
                      <div class="media-body">
                        <div class="bg-primary rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                        </div>
                        <p class="small text-muted">12:00 PM | Aug 13</p>
                      </div>
                    </div>

                    <!-- Sender Message-->
                    <div class="media w-50 mb-3"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                      <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-muted">Test, which is a new approach</p>
                        </div>
                        <p class="small text-muted">12:00 PM | Aug 13</p>
                      </div>
                    </div>

                    <!-- Reciever Message-->
                    <div class="media w-50 ml-auto mb-3">
                      <div class="media-body">
                        <div class="bg-primary rounded py-2 px-3 mb-2">
                          <p class="text-small mb-0 text-white">Apollo University, Delhi, India Test</p>
                        </div>
                        <p class="small text-muted">12:00 PM | Aug 13</p>
                      </div>
                    </div>

                  </div>

                  <!-- Typing area -->
                  <form action="#" class="bg-light">
                    <div class="input-group">
                      <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                      <div class="input-group-append">
                        <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane">Senden</i></button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>

        </article>



        <article class="test">
          <?php
          $sql = "SELECT Filename, Link, last_edit FROM files ORDER BY File_ID DESC LIMIT 3;";
          $result = $link->query($sql);

          $names = [];
          while($row = mysqli_fetch_array($result)){
            array_push($names, $row['Filename']);

          }






          ?>

          <div>
              <section class="features-boxed">
                <div class="container">
                  <div class="intro">
                    <p class="text-center" style="font-size: 32px;"><i class="fa fa-clock-o"></i> Zuletzt bearbeitet  </p>
                  </div>
                  <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                      <div class="box">
                        <h3 class="name">1</h3>
                        <p class="description"><?php echo($names[0])?></p><a class="learn-more" href="./uploads/<?php echo($names[0])?>" download> <img src="download.png"></a>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                      <div class="box">
                        <h3 class="name">2</h3>
                        <p class="description"><?php echo($names[1])?></p><a class="learn-more" href="./uploads/<?php echo($names[1])?>"><img src="download.png"></a>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                      <div class="box">
                        <h3 class="name">3 </h3>
                        <p class="description"><?php echo($names[2])?></p><a class="learn-more" href="./uploads/<?php echo($names[2])?>"><img src="download.png"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
        </article>

        <article class="test">
            <div class="vertretungsplan">
              <iframe src="https://droste-berlin.de/vplan/PlanSchueler/default.htm" name="SELFHTML_in_a_box" width="1010%" height="500px">
                <p>Ihr Browser kann leider keine eingebetteten Frames anzeigen:
                  Sie können die eingebettete Seite über den folgenden Verweis aufrufen:
                  <a href="https://wiki.selfhtml.org/wiki/Startseite">SELFHTML</a>
                </p>
              </iframe>
            </div>
        </article>

    </main>



    <footer class="footer">
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-col">
                    <h4> Beispiel </h4>
                    <ul>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4> Beispiel </h4>
                    <ul>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4> Beispiel </h4>
                    <ul>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                        <li><a href="#">Beispiel</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4> social links </h4>
                    <div class="footer-social-links">
                        <a href="https://www.droste-gymnasium-berlin.de/"> <ion-icon name="globe"></ion-icon> </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
