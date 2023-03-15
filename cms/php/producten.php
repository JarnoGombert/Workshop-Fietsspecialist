<?php
$sqlProducten = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlProducten -> bind_param('i',$footerId);
$sqlProducten->execute();
$sqlProducten->store_result();
$sqlProducten->bind_result($idProducten, $titelProducten, $catProducten, $urlProducten, $statusProducten);
?>

<section id="producten">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
</section>