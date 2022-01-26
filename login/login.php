<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
}
 
require_once "config.php";
 

 
if($_SERVER["REQUEST_METHOD"] == "POST"){


    if(trim($_POST["submit_button"])=="login"){
        $log_username = $log_password = "";
        $log_username_err = $log_password_err = $login_err = "";
        if(empty(trim($_POST["log_username"]))){
            $log_username_err = "Dieses Feld darf nicht leer sein.";
        } else{
            $log_username = trim($_POST["log_username"]);
        }
        
        if(empty(trim($_POST["log_password"]))){
            $log_password_err = "Dieses Feld darf nicht leer sein.";
        } else{
            $log_password = trim($_POST["log_password"]);
        }
        
        if(empty($log_username_err) && empty($log_password_err)){
    
            $sql = "SELECT uid, username, passcode, permission_id FROM user WHERE username = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = $log_username;
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        mysqli_stmt_bind_result($stmt, $id, $log_username, $hashed_password, $permission_id);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($log_password, $hashed_password)){
                                session_start();
                                
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $log_username;               
                                $_SESSION["permission"] = $permission_id;            
                                
                                header("location: ../index.php");
                            } else{
                                $login_err = "Invalid username or password.";
                            }
                        }
                    } else{
                        $login_err = "Invalid username or password.";
                    }
                } else{
                    header("location: https://www.google.de");
                }
    
                mysqli_stmt_close($stmt);
            }
        }
        
        mysqli_close($link);

    }else{

        $username = $password = $email = $confirm_password = "";
        $username_err = $email_err = $password_err = $confirm_password_err = "";

        if(empty(trim($_POST["reg_username"]))){
            $username_err = "Dieses Feld darf nicht leer sein.";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["reg_username"]))){
            $username_err = "Benutzername darf nur Buchstaben, Zahlen und Unterstriche enthalten.";
        } else{
            $sql = "SELECT uid FROM user WHERE username = ?";

            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = trim($_POST["reg_username"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "Dieser Benutzername wird bereits verwendet.";
                    } else{
                        $username = trim($_POST["reg_username"]);
                        
                    }
                } else{
                    header("location: https://instagram.de");
                }
    
                mysqli_stmt_close($stmt);
            }
        }

        if(empty(trim($_POST["reg_email"]))){
            $email_err = "Dieses Feld darf nicht leer sein.";
        } elseif(preg_match('@', trim($_POST["reg_email"]))){
            $email_err = "Bitte eine gültige E-Mail eingeben.";
        } else{
            $sql = "SELECT uid FROM user WHERE email = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_email);
                
                $param_email = trim($_POST["reg_email"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $email_err = "Diese E-Mail wird bereits verwendet.";
                    } else{
                        $email = trim($_POST["reg_email"]);

                    }
                } else{
                    header("location: https://instagram.de");
                }
    
                mysqli_stmt_close($stmt);
            }
        }
        
        if(empty(trim($_POST["reg_password"]))){
            $password_err = "Dieses Feld darf nicht leer sein.";     
        } elseif(strlen(trim($_POST["reg_password"])) < 6){
            $password_err = "Passswort muss min. 6 Zeichen enthalten.";
        } else{
            $password = trim($_POST["reg_password"]);
        }
        
        if(empty(trim($_POST["reg_c_password"]))){
            $confirm_password_err = "Dieses Feld darf nicht leer sein.";     
        } else{
            $confirm_password = trim($_POST["reg_c_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Passwörter stimmen nicht überein.";
            }
        }
        
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)){
            
            
            $sql = "INSERT INTO user (email, username, passcode) VALUES (?, ?, ?)";

             
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_username, $param_password);
                
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                
                if(mysqli_stmt_execute($stmt)){
                    header("location: https://www.google.de");
                } else{
                    header("location: https://instagram.de");
                }
    
                mysqli_stmt_close($stmt);
            }

            $sql "INSERT INTO login_details "
        }
        
        mysqli_close($link);

    }

 
    
}
?>
   
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> Login </title> 
        <link rel="stylesheet" type="text/css" href="login.css">
        <link rel="stylesheet" type="text/css" href="#">
        <link rel="stylesheet" type="text/css" href="#">
    </head>



<body>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form" id="login">
            <h1 class="form__title">Anmeldung</h1>
            <div class="form__message form__message--error">
                <?php echo $log_login_err; ?>
                
            </div>
            <div class="form__input-group">
                <input name="log_username" type="text" class="form__input" autofocus placeholder="Benutzername">
                <div class="form__input-error-message">
                    <?php echo $log_username_err; ?>
                    
                </div>
            </div>
            <div class="form__input-group">
                <input name="log_password" type="password" class="form__input" autofocus placeholder="Passwort">
                <div class="form__input-error-message">
                    <?php echo $log_password_err; ?>
                </div>
            </div>

            <button class="form__button" name="submit_button" value="login" type="submit">Anmelden</button>
            <!--
            <p class="form__text">
                <a href="#" class="form__link">Passwort vergessen?</a>
            </p> -->
            <p class="form__text">
                <a class="form__link" id="linkCreateAccount">Noch kein Account? Registrieren</a>
            </p>
        </form>



        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form form--hidden" id="createAccount">
            <h1 class="form__title">Registrieren</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" name="reg_username" id="signupUsername" class="form__input" autofocus placeholder="Username">
                <div class="form__input-error-message">
                    <?php echo $username_err; ?>
                </div>
            </div>
            <div class="form__input-group">
                <input type="email" name="reg_email" class="form__input" autofocus placeholder="E-Mail">
                <div class="form__input-error-message">
                <?php echo $email_err; ?>
                </div>
            </div>
            <div class="form__input-group">
                <input type="password" name="reg_password" class="form__input" autofocus placeholder="Password">
                <div class="form__input-error-message">
                <?php echo $password_err; ?>

                </div>
            </div>
            <div class="form__input-group">
                <input type="password" name="reg_c_password" class="form__input" autofocus placeholder="Confirm Password">
                <div class="form__input-error-message">
                <?php echo $confirm_password_err; ?>

                </div>
            </div>

            <button class="form__button" name="submit_button" value="register" type="submit">Registrieren</button>

            
            <p class="form__text">
                <a class="form__link" id="linkLogin">Bereits regestriert? Anmeldung</a>
            </p>
        </form>
    </div>

    <script src="script.js"></script>

</body>