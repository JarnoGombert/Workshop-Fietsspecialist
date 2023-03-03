<?php
require "cms/login/config.php";
session_start(); 
ob_start(); 
// voorwaarde startpagina ophalen
// ==============================
//if (!$_GET["page"] && !$_GET["title"]) {
    $sql = $mysqli->prepare(
        "SELECT * FROM digifixxcms WHERE id = ? AND status = 'actief'") or die($mysqli->error . __LINE__);
    $voorwaarde = 1;
    $sql->bind_param("i", $voorwaarde);
// } else {
//     $sql = $mysqli->prepare(
//         "SELECT * FROM digifixxcms WHERE paginaurl = ? AND status = 'actief'"
//     ) or die($mysqli->error . __LINE__);
//     $voorwaarde = $_GET["title"];
//     $sql->bind_param("s", $voorwaarde);
// }
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

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="cms/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/slick/slick.css">
    <link rel="stylesheet" href="/slick/slick-theme.css">


    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rosario:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- jquery files -->
    <script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="jquery/digifixx.js"></script>
    <script src="/slick/slick.js"></script>


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
</body>
</html>