<?php
session_start(); 
require "login/config.php";
require "login/functies.php";

$urlCMS = $url."cms";
if(isset($_POST['mySignUp'])){
    $firstName = $_POST['fname'];
    $lastName = $_POST['aname'];
    $signupEmail = $_POST['signupemail'];
    $signupPassword = $_POST['signuppassword'];
    $username = ucfirst($firstName) . "" . ucfirst($lastName);
    $voorletter = substr($firstName, 0, 1);

    $registreerCheck = $mysqli->query(" SELECT * FROM digifixxcms_gebruikers WHERE email = '".$signupEmail."'") or die ($mysqli->error.__LINE__);
	$rowCheck = $registreerCheck->num_rows; 
    if ($rowCheck > 0) {
        $error2 = "Deze menu titel bestaat al. Voer een unieke menu titel in.";
        $error_item1_2 = 'ja';
        $paginaurlerror = true;
    } else {
        $paginaurlerror = false;
    }
    
    if($paginaurlerror == false) {
        $sql_insert = $mysqli->query("INSERT digifixxcms_gebruikers SET email = '".$mysqli->real_escape_string($_POST['signupemail'])."',
                                                                    password	= '".$mysqli->real_escape_string($_POST['signuppassword'])."',
                                                                    voorletters	= '".$voorletter."',
                                                                    achternaam	= '".$mysqli->real_escape_string($_POST['aname'])."',
                                                                    username = '".$username."'") or die($mysqli->error.__LINE__);											
        $rowid = $mysqli->insert_id;  
        // pagina redirecten om deze te kunnen bewerken
        // ============================================
        header('Location: '.$url."cms/index.php");
        exit;

        //Als $_POST opslaan=1 is de pagina correct ingevuld en opgeslagen: dus we tonen een alert
        if (isset($_POST['opslaan'])) {
            echo "
            <div class=\"alert alert-success\">
            Gebruiker is aangemaakt.
            </div>
            ";
        };
    }
}
if(isset($_POST['mySubmit'])){
    $email = $_POST['Loginemail'];
    $password = $_POST['loginpassword'];
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
        header("Location: ".$urlCMS."/index.php?error=1");
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
    <!-- jquery files -->
    <script type="text/javascript" src="<?=$url;?>jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?=$url;?>jquery/digifixx.js"></script>

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
            <a href="<?=$url;?>"><img src="images/logo.JPG" class="logologin" width="500px"></a>
            <?php if(isset($_GET['error'])) { $error = 'Foutieve of onbekende inlogcombinatie!'; } ?>
            <div class="tab-group">
                <div class="tab active" data-tab="tab1">Log In</div>
                <div class="tab" data-tab="tab2">Sign Up</div>
            </div>
            <div class="tab-content">
                <form id="login_form" class="tab-pane active" data-tab="tab1" action="index.php" method="post" name="login_form" autocomplete="off">
                    <h2 class="inlogkop">Inloggen CMS</h2>
                    <?php if(isset($_GET['error'])) { echo "<div class=\"foutlogin\">".$error."</div>"; } ?>
                    <div class="inlog-inner">
                        <div class="logindiv">
                            <i class="fa fa-user"></i> <input type="text" id="Loginemail" name="Loginemail" class="tekstvak_medium" placeholder="E-mailadres" />
                        </div>
                        <div class="logindiv">
                            <i class="fa fa-lock"></i> <input type="password" name="loginpassword" id="loginpassword" class="tekstvak_medium" placeholder="Wachtwoord" /> <i onclick="myFunctionLogin();" class="fa fa-eye"></i>
                        </div>                         
                        <button type="submit" name="mySubmit" value="" class="login-button" onFocus="setFocus()">&raquo;</button>
                    </div>
                </form> 
                <form id="register_form" class="tab-pane" data-tab="tab2" action="index.php" method="post" name="register_form" autocomplete="off">
                    <h2 class="inlogkop">Registreren CMS</h2>
                    <div class="register-inner">
                        <div class="registerdiv">
                            <i class="fa fa-user"></i> <input type="text" id="fname" name="fname" class="tekstvak_medium" placeholder="Voornaam" />
                        </div>
                        <div class="registerdiv">
                            <i class="fa fa-user"></i> <input type="text" id="aname" name="aname" class="tekstvak_medium" placeholder="Achternaam" />
                        </div>
                        <div class="registerdiv">
                            <i class="fa fa-user"></i> <input type="text" id="signupemail" name="signupemail" class="tekstvak_medium" placeholder="E-mailadres" />
                        </div>
                        <div class="registerdiv">
                            <i class="fa fa-lock"></i> <input type="password" name="signuppassword" id="signuppassword" class="tekstvak_medium" placeholder="Wachtwoord" /> <i onclick="myFunctionRegistreer();" class="fa fa-eye"></i>
                        </div>            
                        <input type="hidden" name="opslaan">             
                        <button type="submit" name="mySignUp" value="" class="register-button" onFocus="setFocus()">&raquo;</button>
                    </div>
                </form> 
            </div>
        </div>
    </main>
    <script>
    function myFunctionRegistreer() {
        var x = document.getElementById("signuppassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }  

    function myFunctionLogin() {
        var x = document.getElementById("loginpassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    } 
    </script>
</body>
</html>