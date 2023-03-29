<?php
$sqlReviews = $mysqli -> prepare("SELECT id, titel, auteur, paginaurl, status FROM digifixx_reviews ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlReviews -> bind_param('i',$footerId);
$sqlReviews->execute();
$sqlReviews->store_result();
$sqlReviews->bind_result($idReviews, $titelReviews, $auteurReviews, $urlReviews, $statusReviews);
?>

<section id="reviews">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
    <div class="reviewTitels">
        <div class="pageTITLE">Review Titel</div>
        <div class="pageCAT">Auteur</div>
        <div class="pageURL">Review Link</div>
        <div class="pageSTATUS">Status</div>
        <div class="pageEDIT">Edit pagina</div>
    </div>
    <div id="reviews-wrapper">
        <?php
            while($sqlReviews->fetch()){
                ?>
                <div class="review">
                    <div class="pageTITLE"><?=$titelReviews;?></div>
                    <div class="pageCAT"><?=$auteurReviews;?></div>
                    <div class="pageURL"><?=$urlReviews;?></div>
                    <div class="pageSTATUS"><?=$statusReviews;?></div>
                    <div class="pageEDIT"><a href="?page=review_bewerken&id=<?=$idReviews;?>"><i class="fa fa-edit"></i></a></div>
                </div>
                
        <?php } ?>
    </div>
</section>