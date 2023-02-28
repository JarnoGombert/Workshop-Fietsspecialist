<?php
require "cms/login/config.php";
session_start(); 
ob_start(); 

// voorwaarde startpagina ophalen
// ==============================
// if (!$_GET["page"] && !$_GET["title"]) {
//     $sql = $mysqli->prepare(
//         "SELECT * FROM digifixxcms WHERE id = ? AND status = 'actief'"
//     ) or die($mysqli->error . __LINE__);
//     $voorwaarde = 1;
//     $sql->bind_param("i", $voorwaarde);
// } else {
//     $sql = $mysqli->prepare(
//         "SELECT * FROM digifixxcms WHERE paginaurl = ? AND status = 'actief'"
//     ) or die($mysqli->error . __LINE__);
//     $voorwaarde = $_GET["title"];
//     $sql->bind_param("s", $voorwaarde);
// }
// $sql->execute();
// $result = $sql->get_result();
// $row = $result->fetch_assoc();
$row['id'] == 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
<<<<<<< HEAD
    <title>Document</title>
=======
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
    <title><?=$row['item1'];?></title>
>>>>>>> 94f92e6356a7c1825c50c803f3113d49872dae7c
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