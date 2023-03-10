<?php
ob_start();
include 'login/functies.php';
include 'login/config.php';
// bijbehorende gebruiker ophalen om niveau te bepalen
// ===================================================
$sqluser = $mysqli->query("SELECT * FROM digifixxcms_gebruikers WHERE id = '1' ") or die($mysqli->error.__LINE__);
$rowuser = $sqluser->fetch_assoc();

// if(!$mysqli) { header ('Location:../'); }
// if(login_check($mysqli) <> true) { header ('Location:../'); }

if(login_check($mysqli) == true) {

$urlCMS = $url."cms";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$urlCMS;?>/css/cmsStyle.css">
    <link rel="shortcut icon" href="<?=$url;?>favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <title>Digifixx CMS</title>
    <style>body{background: #41485085;}</style>
</head>
<body>
    <header><?php include ('php/menu.php'); ?></header>
    <main>
        
    </main>
</body>
</html>

<? 	//niet ingelogd? dan uitloggen.
	} else {
   echo 'U bent niet bevoegd deze pagina te bekijken. U dient eerst in te loggen <br/>';
   //redirecten naar inlogpagina
   header ('Location:index.php');
   ob_flush();
} 
?>