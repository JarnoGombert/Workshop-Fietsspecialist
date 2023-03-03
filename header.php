<section id="header-main">
    <div class="Header-Bar">
        <div class="Logo-Header">
            <a href="<?=$url;?>">
                <img src="<?=$url;?>/Images/Fietsspeciaal-Bakker-Logo.png" class="image-Logo-Header" />
            </a>
        </div>
        <div class="Text-Header">
            <?php include 'php/menu.php';?>
        </div>
    </div>
</section>

<section id="slider-main" class="<?php if($row['id'] != "1"){echo "slider-vervolg";};?>">
    <div id="hero">
        <?php include 'php/slider.php';?>
    </div>
</section>

