<?php
    //Product Categorie items ophalen
    $sqlPCategorie = $mysqli -> prepare("SELECT id, catNaam FROM digifixx_product_cat") OR DIE ($mysqli->error.__LINE__);
    $sqlPCategorie -> execute();
    $sqlPCategorie -> store_result();
	$sqlPCategorie -> bind_result($idPCategorie, $namePCategorie);
?>

<section class="contentHomeMain">
    <div class="Rectagnle-main">
        <a class="card" href="<?=$url;?>/producten">
            <img src="<?=$url;?>Images/FietsImage1.png" class="ImgCard"/>
            <div class="TxtCard">
                <p style="margin-left: 10px;">Bekijk nu </br> onze producten</p>
            </div>
        </a>
        <a class="card"  href="<?=$url;?>/over-ons">
        <img src="<?=$url;?>Images/FietsImage2.png" class="ImgCard"/>
        <div class="TxtCard">
                <p style="margin-left: 10px;">Lees meer over </br> Fietsspeciaal Bakker</p>
            </div>
        </a>
        <a class="card"  href="<?=$url;?>/contact">
        <img src="<?=$url;?>Images/FietsImage3.png" class="ImgCard"/>
            <div class="TxtCard">
                    <p style="margin-left: 10px;">Kom kijken of </br> maak een afspraak</p>
            </div>
        </a>
    </div>
    <div class="Product-main">
        <div class="container mx-auto">
            <div class="ProductTxt">Producten</div>
            <div class="ProductCard">
                <div class="card">
                    <img src="<?=$url;?>Images/FietsCard.png" class="ImgCard"/>
                    <div class="TxtCard">
                        Premio EVO 5 Lite Comfort
                    </div>
                    <div class="TxtCard">
                        €3.749,00
                    </div>
                </div>
                <div class="card">
                    <img src="<?=$url;?>Images/FietsCard.png" class="ImgCard"/>
                    <div class="TxtCard">
                        Premio EVO 5 Lite Comfort
                    </div>
                    <div class="TxtCard">
                        €3.749,00
                    </div>
                </div>
                <div class="card">
                    <img src="<?=$url;?>Images/FietsCard.png" class="ImgCard"/>
                    <div class="TxtCard">
                        Premio EVO 5 Lite Comfort
                    </div>
                    <div class="TxtCard">
                        €3.749,00
                    </div>
                </div>
                <div class="card">
                    <img src="<?=$url;?>Images/FietsCard.png" class="ImgCard"/>
                    <div class="TxtCard">
                        Premio EVO 5 Lite Comfort
                    </div>
                    <div class="TxtCard">
                        €3.749,00
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Merk-main">
        <div class="container mx-auto">
            <div class="MerkTxt">
            Onze Merken
            </div>
            <div class="Row">
                <div class="MerkImages">
                    <img src="<?=$url;?>Images/gazelle-logo.png" class="RowImg">
                </div>
                <div class="MerkImages">
                    <img src="<?=$url;?>Images/batavus-logo.png" class="RowImg">
                </div>
                <div class="MerkImages">
                    <img src="<?=$url;?>Images/Sparta.png" class="RowImg">
                </div>
            </div>
            <div class="Row">
                <div class="MerkImages">
                    <img src="<?=$url;?>Images/Koga.png" class="RowImg">
                </div>
                <div class="MerkImages">
                    <img src="<?=$url;?>Images/Rih.png" class="RowImg">                
                </div>
                <div class="MerkImages">
                    <img src="<?=$url;?>Images/Cortina.png" class="RowImg">
                </div>
            </div>
            <div class="Row">
                <div class="MerkImages">
                    <img src="<?=$url;?>Images/cervelo.png" class="RowImg">
                </div>
                <div class="MerkImages">
                <img src="<?=$url;?>Images/Giant.png" class="RowImg">
                    </div>
                <div class="MerkImages">
                    <img src="<?=$url;?>Images/stella.png" class="RowImg">
                </div>
            </div>
        </div>
        
    </div>
    <div class="Main-categorieen">
        <div class="MerkTxt">
            Onze categorieen
        </div>
        <div class="merk-inner container mx-auto">
            <?php
                while($sqlPCategorie->fetch()) { 
                    if(str_contains($namePCategorie, ' ')){
                        $startsplode = explode(" ", $namePCategorie);
                        $catProduct = strtolower($startsplode[0] . "_" . $startsplode[1]);
                    } else {
                        $catProduct = strtolower($namePCategorie);
                    }
                ?>
                    <a href="<?=$url;?>producten?categorie=<?=$catProduct;?>"><?=$namePCategorie;?></a>
            <?php } ?>
        </div>
    </div>
</section>
