<?php
($sql = $mysqli->prepare(
        "SELECT *,DATE_FORMAT(datum, '%W %e %M %Y') as datum1 FROM digifixx WHERE paginaurl = ? $taalquery AND status = 'actief'"
    )) or die($mysqli->error . __LINE__);
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
    <title>Document</title>
</head>
<body>
    <header><?php include('php/header.php'); ?></header>
    <main>
        <?php 
        if ($row['id'] == "1") {
            include('php/startpagina.php');
        } else {
            include('php/vervolgpagina.php');
        } ?>
    </main>
    <footer>

    </footer>
</body>
</html>