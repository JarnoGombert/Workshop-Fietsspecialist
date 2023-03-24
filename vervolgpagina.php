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
            ?>
        <div class="Review">
            <h1 style="text-align: center; margin-bottom: 50px; font-size: 40px">Reviews:</h1>
            <div class="ReviewRow1">
                <div class="ReviewCard">
                    <div class="ImageWrapper mx-auto">
                        <img src="<?=$url;?>Images/Vrouw1.png" alt="">
                    </div>
                    <div class="reviewTxt">
                        Alisha de Jong
                    </div>
                    <div class="reviewTxt">
                        7/10
                    </div>
                    <div class="reviewMessageTxt">
                        Dit is een prachtige en efficiente website!
                    </div>

                </div>
                <div class="ReviewCard">
                    <div class="ImageWrapper mx-auto">
                        <img src="<?=$url;?>Images/Vrouw1.png" alt="">
                    </div>
                    <div class="reviewTxt">
                        Alisha de Jong
                    </div>
                    <div class="reviewTxt">
                        7/10
                    </div>
                    <div class="reviewMessageTxt">
                        Dit is een prachtige en efficiente website!
                    </div>

                </div>
                <div class="ReviewCard">
                    <div class="ImageWrapper mx-auto">
                        <img src="<?=$url;?>Images/Vrouw1.png" alt="">
                    </div>
                    <div class="reviewTxt">
                        Alisha de Jong
                    </div>
                    <div class="reviewTxt">
                        7/10
                    </div>
                    <div class="reviewMessageTxt">
                        Dit is een prachtige en efficiente website!
                    </div>

                </div>
            </div>

        </div>
        <?php
        }
            if($row['id'] == '4') {
                include 'php/contact.php';
            } else if($row['id'] == '2') {
                include 'php/producten.php';
            } else if($row['id'] == '6') {
                include 'php/betalingsmethode.php';
            }
        ?> 
    </div>
</section>