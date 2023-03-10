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
    <!-- jquery files -->
    <script type="text/javascript" src="<?=$url;?>jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?=$url;?>jquery/digifixx.js"></script>
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <title>Digifixx CMS</title>
    <style>body{background: #41485085;}.open_menu{display: flex !important;}</style>
</head>
<body>
    <header><?php include ('php/menu.php'); ?></header>
    <main>
        
    </main>
</body>
</html>