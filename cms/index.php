<?php
require "login/config.php";
session_start(); 
ob_start(); 

if(isset($_POST['email'], $_POST['p'])) { 
    $email = $_POST['email'];
    $password = $_POST['p']; // hashed password.
    if(login($email, $password, $mysqli) == true) {
     // na inloggen doorsturen naar dashboard
     //======================================
       header('Location: maincms.php');
       exit;
    } 
    else {
     // login mislukt
     // ============
     header('Location: ./index.php?error=1');
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cms/css/cmsStyle.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <title>Digifixx CMS</title>
</head>
<body>
    <main>
        <div id="logincontainer">  
            <?php if(isset($_GET['error'])) { $error = 'Foutieve of onbekende inlogcombinatie!'; } ?>
            <form action="index.php" method="post" name="login_form" autocomplete="off">
                <img src="images/logo.JPG" class="logologin" width="100%">
                <div class="inlogkop">Inloggen CMS</div> <? if(isset($_GET['error'])) { echo "<div class=\"foutlogin\">".$error."</div>"; } ?>
                <div class="logindiv">
                    <i class="fa fa-user"></i> <input type="text" id="email" name="email" class="tekstvak_medium" placeholder="E-mailadres" />
                </div>

                <div class="logindiv">
                    <i class="fa fa-lock"></i> <input type="password" name="password" id="password" class="tekstvak_medium" placeholder="Wachtwoord" />
                </div>                         
                <button type="submit" name="mySubmit" value="" onclick="formhash(this.form, this.form.password);" class="login-button" onFocus="setFocus()">&raquo;</button>
            
            </form> 
        </div>
    </main>
</body>
</html>