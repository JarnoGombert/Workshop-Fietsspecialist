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

// $page = $_SERVER['REQUEST_URI'];
// $pagePath = parse_url($page, PHP_URL_PATH);
//print_r(basename($pagePath));

$urlCMS = $url."cms";

// page titel
if (!isset($_GET['page'])) { 
    $pageTitle = "Dashboard";
} else { 
    $pageTitle = ucfirst($_GET['page']);
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
    <!-- jquery files -->
    <script type="text/javascript" src="<?=$url;?>jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?=$url;?>jquery/digifixx.js"></script>
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <title><?=$pageTitle;?> | Digifixx CMS</title>
    <style>body{background: #41485085;}.open_menu{display: flex !important;}</style>
</head>
<body>
    <header><?php include ('php/menu.php'); ?></header>
    <main>
        <aside><?php include ('php/hoofdmenu.php'); ?></aside>
        <article>
        <?php  if (!isset($_GET['page'])) { 
            include('php/dashboard.php'); 
        } else { 
            include('php/'.$_GET['page'].'.php'); 
        } ?>
        </article>
    </main>
</body>
</html>