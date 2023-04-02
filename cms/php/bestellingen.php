<?php
$sqlOrder = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlOrder -> bind_param('i',$footerId);
$sqlOrder->execute();
$sqlOrder->store_result();
$sqlOrder->bind_result($idOrder, $titelOrder, $catOrder, $urlOrder, $statusOrder);
?>

<section id="bestelling">
    <div class="title">Mijn bestellingen</div>
    
</section>