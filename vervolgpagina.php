<section class="contentVervolgMain">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
        <div class="title"><?=$row['item1'];?></div>
        <div class="content">
            <aside><?php include 'php/afbeeldingen-zijkant.php'; ?></aside>
            <article><?=$row['tekst'];?></article>
        </div>
        <?php
        if($row['id'] == '3') {
            //Reviewen items ophalen
            $sqlReview = $mysqli -> prepare("SELECT id, titel, tekst, aantal_sterren, auteur, paginaurl, status FROM digifixx_reviews WHERE status = 'actief'") or die ($mysqli->error.__LINE__);
            $sqlReview->execute();
            $sqlReview->store_result();
            $sqlReview->bind_result($idReview, $titelReview, $TekstReview, $sterrenReview, $auteurReview, $urlReview, $statusReview);
            ?>
        <div class="Review">
            <h1 style="text-align: center; margin-bottom: 50px; font-size: 40px">Reviews:</h1>
            <div id="reviews" class="ReviewRow1 swiper">
                <div class="swiper-wrapper">
                    <?php while($sqlReview->fetch()){ ?>
                        <div class="ReviewCard">
                            <div class="reviewTxt">
                                <?=$auteurReview;?>
                            </div>
                            <div class="reviewTxt">
                                <?php for($i = 0; $i <= $sterrenReview; $i++){ ?>
                                    <i class="fa fa-star"></i>
                                <?php } ?>
                            </div>
                            <div class="reviewMessageTxt">
                                <?=$TekstReview;?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <?php
        }
            if($row['id'] == '4') {
                include 'php/contact.php';
            } else if($row['id'] == '2') {
                include 'php/Producten.php';
            } else if($row['id'] == '6') {
                include 'php/betalingsmethode.php';
            }
        ?> 
    </div>
</section>