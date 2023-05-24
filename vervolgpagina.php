<section class="contentVervolgMain">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
        <div class="title"><?=$row['item1'];?></div>
        <?php if($row['tekst']){ ?>
            <div class="content">
                <aside><?php include 'php/afbeeldingen-zijkant.php'; ?></aside>
                <article><?=$row['tekst'];?></article>
            </div>
        <?php
        }
        if($row['id'] == '3') {
            //Reviewen items ophalen
            $sqlReview = $mysqli -> prepare("SELECT id, tekst, aantal_sterren, auteur FROM digifixx_reviews WHERE status = 'actief' ORDER BY id DESC LIMIT 5") or die ($mysqli->error.__LINE__);
            $sqlReview->execute();
            $sqlReview->store_result();
            $sqlReview->bind_result($idReview, $TekstReview, $sterrenReview, $auteurReview);
        ?>
            <div class="Review">
                <div>
                    <h2 style="text-align: center; margin-bottom: -25px; font-size: 40px">Reviews</h2>
                    <p style="text-align: center; margin-bottom: 20px; color: darkgray;">(Log eerst in om een review te plaatsen)</p>
                </div>
                <div class="ReviewRow1">
                    <?php while($sqlReview->fetch()){ ?>
                        <div class="ReviewCard">
                            <div class="reviewTxt">
                                <?=$auteurReview;?>
                            </div>
                            <div class="reviewTxt">
                                <?php for($i = 1; $i <= $sterrenReview; $i++){ ?>
                                    <i class="fa fa-star"></i>
                                <?php } ?>
                            </div>
                            <div class="reviewMessageTxt">
                                <?=$TekstReview;?>
                            </div>
                        </div>
                    <?php } ?>
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
            }else if($row['id'] == '7') {
                include 'php/betalingvoltooid.php';
            } else if($row['id'] == '8') {
                include 'php/process_form.php';
            } else if($row['id'] == '9') {
                header('Location: ' . $url . "cms/index.php");
                exit;
            }
        ?> 
    </div>
</section>