<?php
$sqlDashboard = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlDashboard -> bind_param('i',$footerId);
$sqlDashboard->execute();
$sqlDashboard->store_result();
$sqlDashboard->bind_result($idDashboard, $titelDashboard, $catDashboard, $urlDashboard, $statusDashboard);
?>

<section id="dashboard">
    <div class="title">Dashboard</div>
    <div class="dashboard-wrapper">
            <a class="dashTab" href="?page=gebruiker_bewerken&id=<?php echo $rowUser['id']; ?>"><i class="fa fa-gear"></i> Mijn account</a>
            <a class="dashTab" href="index.php?uitloggen=ja"><i class="fa fa-sign-out"></i> Uitloggen</a>
        <?php if($rowUser['niveau'] == "admin" || $rowUser['niveau'] == "medewerker"){ ?>
            <a class="dashTab" href="?page=nieuwe_pagina"><i class="fa fa-plus"></i> Nieuwe Pagina</a>
            <a class="dashTab" href="?page=nieuw_product"><i class="fa fa-plus"></i> Nieuw Product</a>
            <a class="dashTab" href="?page=nieuw_review"><i class="fa fa-plus"></i> Nieuw Review</a>
        <?php } ?>
        <?php if($rowUser['niveau'] == "admin"){ ?>
            <a class="dashTab" href="?page=nieuwe_gebruiker"><i class="fa fa-plus"></i> Nieuwe Gebruiker</a>
        <?php } ?>
    </div>
</section>