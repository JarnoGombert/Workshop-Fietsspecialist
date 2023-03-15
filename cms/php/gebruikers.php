<?php
$sqlGebruikers = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlGebruikers -> bind_param('i',$footerId);
$sqlGebruikers->execute();
$sqlGebruikers->store_result();
$sqlGebruikers->bind_result($idGebruikers, $titelGebruikers, $catGebruikers, $urlGebruikers, $statusGebruikers);
?>

<section id="gebruikers">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
</section>