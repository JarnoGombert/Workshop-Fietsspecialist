<?php
$sqlReviews = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlReviews -> bind_param('i',$footerId);
$sqlReviews->execute();
$sqlReviews->store_result();
$sqlReviews->bind_result($idReviews, $titelReviews, $catReviews, $urlReviews, $statusReviews);
?>

<section id="reviews">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
</section>