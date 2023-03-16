<?php
$sqlInstellingen = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlInstellingen -> bind_param('i',$footerId);
$sqlInstellingen->execute();
$sqlInstellingen->store_result();
$sqlInstellingen->bind_result($idInstellingen, $titelInstellingen, $catInstellingen, $urlInstellingen, $statusInstellingen);
?>

<section id="instellingen">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
</section>