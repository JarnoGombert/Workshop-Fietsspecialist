<?php
$sqlDashboard = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlDashboard -> bind_param('i',$footerId);
$sqlDashboard->execute();
$sqlDashboard->store_result();
$sqlDashboard->bind_result($idDashboard, $titelDashboard, $catDashboard, $urlDashboard, $statusDashboard);
?>

<section id="dashboard">
    <div class="title">Dashboard</div>
</section>