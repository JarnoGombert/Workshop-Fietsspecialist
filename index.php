<?php
require "cms/login/config.php";
session_start(); 
ob_start(); 
// voorwaarde startpagina ophalen
// ==============================

$pagina = $_SERVER['REQUEST_URI'];
$path = parse_url($pagina, PHP_URL_PATH);
//print_r(basename($path));

if (!basename($path) || basename($path) == "Workshop-Fietsspecialist") {
    $sql = $mysqli->prepare(
        "SELECT * FROM digifixxcms WHERE id = ? AND status = 'actief'") or die($mysqli->error . __LINE__);
    $voorwaarde = 1;
    $sql->bind_param("i", $voorwaarde);
} else {
    $sql = $mysqli->prepare(
        "SELECT * FROM digifixxcms WHERE paginaurl = ? AND status = 'actief'"
    ) or die($mysqli->error . __LINE__);
    $voorwaarde = basename($path);
    $sql->bind_param("s", $voorwaarde);
}
$sql->execute();
$result = $sql->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?=$url;?>css/style.css">
    <link rel="stylesheet" href="<?=$url;?>cms/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$url;?>slick/slick.css">
    <link rel="stylesheet" href="<?=$url;?>slick/slick-theme.css">

    <!-- Slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link rel="shortcut icon" href="<?=$url;?>favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rosario:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- jquery files -->
    <script type="text/javascript" src="<?=$url;?>jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="<?=$url;?>jquery/digifixx.js"></script>
    <script src="<?=$url;?>slick/slick.js"></script>

    <title><?php echo $row['item1'];?></title>
</head>
<body>
    <header><?php include('header.php'); ?></header>
    <main>
        <?php 
        if ($row['id'] == "1") {
            include('startpagina.php');
        } else {
            include('vervolgpagina.php');
        } ?>
    </main>
    <footer><?php include('footer.php'); ?></footer>

     <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
    });
    </script>
</body>
</html>