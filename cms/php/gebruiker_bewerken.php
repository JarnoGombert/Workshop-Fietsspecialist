<?php
$sqlGebruikerEdit = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms WHERE  ORDER BY id DESC") or die ($mysqli->error.__LINE__);
$gebruikerId = $_GET['id'];
$sqlGebruikerEdit -> bind_param('i',$gebruikerId);
$sqlGebruikerEdit->execute();
$sqlGebruikerEdit->store_result();
$sqlGebruikerEdit->bind_result($idGebruikerEdit, $titelGebruikerEdit, $catGebruikerEdit, $urlGebruikerEdit, $statusGebruikerEdit);
?>

<section id="gebruiker_edit">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
</section>