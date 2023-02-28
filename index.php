<?php
require "cms/login/config.php";
session_start(); 
ob_start(); 

// voorwaarde startpagina ophalen
// ==============================

$sql = $mysqli->prepare(
    "SELECT * FROM digifixxcms WHERE paginaurl = ? AND status = 'actief'"
) or die($mysqli->error . __LINE__);
$voorwaarde = $_GET["title"];
$sql->bind_param("s", $voorwaarde);

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
    <title><?=$row['item1'];?></title>
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