<?php
ob_start();
include 'login/functies.php';
include 'login/config.php';

$urlCMS = $url."cms";

// $page = $_SERVER['REQUEST_URI'];
// $pagePath = parse_url($page, PHP_URL_PATH);
//print_r(basename($pagePath));

// bijbehorende gebruiker ophalen om niveau te bepalen
// ===================================================
$sqluser = $mysqli->query("SELECT * FROM digifixxcms_gebruikers WHERE id = '2' ") or die($mysqli->error.__LINE__);
$rowuser = $sqluser->fetch_assoc();

if(!$mysqli) { header ($urlCMS.'/index.php'); }
if(login_check($mysqli) <> true) { header ($urlCMS.'/index.php'); }

// page titel
if (!isset($_GET['page'])) { 
    $pageTitle = "Dashboard";
} else if(str_contains($_GET['page'], '_')){
    $startsplode = explode("_", $_GET['page']);
    $pageTitle = ucfirst($startsplode[0]) . " " . $startsplode[1];
} else { 
    $pageTitle = ucfirst($_GET['page']);
} 

if(!isset($_GET['uitloggen'])){
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
        } else if(str_contains($_GET['page'], '?')){
            $pageIndicator = explode("?", $_GET['page']);
            include('php/'.$pageIndicator[0].'.php?'.$pageIndicator[1]);
        } else if(str_contains($_GET['page'], '?') && str_contains($_GET['page'], '&')){
            $pageIndicator2 = explode("?", $_GET['page']);
            $pageIndicator3 = explode("&", $_GET['page']);
            include('php/'.$pageIndicator2[0].'.php?'.$pageIndicator2[1].''.$pageIndicator3[0].''.$pageIndicator3[1]);
        } else { 
            include('php/'.$_GET['page'].'.php'); 
        } ?>
        <span class="TerugBtn" onclick="history.back();">Terug</span>
        </article>
    </main>
</body>
</html>
<?php } else {
    header ($urlCMS.'/index.php');
} ?>