<?php
    //Product Categorie items ophalen
    $sql = $mysqli->prepare(
        "SELECT * FROM digifixx_producten WHERE paginaurl = ? AND status = 'actief'"
    ) or die($mysqli->error . __LINE__);
    $voorwaarde = "product/" . basename($path);
    $sql->bind_param("s", $voorwaarde);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();
?>
<section class="contentProductMain">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
        <div class="title"><?=$row['merk'];?> <?=$row['model'];?> <?=$row['naam'];?></div>
    </div>
</section>