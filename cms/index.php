<?php
session_start(); 
require "login/config.php";
require "login/functies.php";

$urlCMS = $url."cms";

// if(isset($_POST['email'], $_POST['password'])) { 
//     $email = $_POST['email'];
//     $password = $_POST['password']; // hashed password.

//     if(login($email, $password, $mysqli) == true) {
//      // na inloggen doorsturen naar dashboard
//      //======================================
//        header('Location: maincms.php?user='.$email.'');
//        exit;
//     } 
//     else {
//      // login mislukt
//      // ============
//      header('Location: ./index.php?error=1');
//     }
// }
if(isset($_POST['mySubmit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password (you should use a stronger hashing algorithm in production)
    //$hashed_password = md5($password);

    // Query the database for the user record
    $sql = $mysqli -> prepare("SELECT id FROM digifixxcms_gebruikers WHERE email = ? AND password = ?") or die ($mysqli->error.__LINE__);
    $sql->bind_param('ss',$email, $password);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($idUser);
    $sql->fetch();

    if (!$idUser) {
        // If the user is not found, display an error message and redirect back to the login page
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: ".$urlCMS."/index.php");
        exit;
    } else {

        // Set the user ID session
        $_SESSION['user_id'] = $idUser;
        print_r($idUser);
        // Redirect the user to the home page
        header("Location: ".$urlCMS."/maincms.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$urlCMS;?>/css/cmsStyle.css">
    <link rel="stylesheet" href="<?=$urlCMS;?>/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?=$url;?>favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rosario:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" daimywashier rel="stylesheet">

    <title>Digifixx CMS</title>
    <style>body{background: #41485085;}</style>
</head>
<body>
    <main id="login-main">
        <div id="logincontainer">  
            <?php if(isset($_GET['error'])) { $error = 'Foutieve of onbekende inlogcombinatie!'; } ?>
            <form id="login_form" action="index.php" method="post" name="login_form" autocomplete="off">
                <img src="images/logo.JPG" class="logologin" width="500px">
                <h2 class="inlogkop">Inloggen CMS</h2> <?php if(isset($_GET['error'])) { echo "<div class=\"foutlogin\">".$error."</div>"; } ?>
                <div class="inlog-inner">
                    <div class="logindiv">
                        <i class="fa fa-user"></i> <input type="text" id="email" name="email" class="tekstvak_medium" placeholder="E-mailadres" />
                    </div>
                    <div class="logindiv">
                        <i class="fa fa-lock"></i> <input type="password" name="password" id="password" class="tekstvak_medium" placeholder="Wachtwoord" /> <i onclick="myFunction();" class="fa fa-eye"></i>
                    </div>                         
                    <button type="submit" name="mySubmit" value="" class="login-button" onFocus="setFocus()">&raquo;</button>
                </div>
            </form> 
        </div>
    </main>
    <script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }  
    </script>
</body>
</html>