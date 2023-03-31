<?php
    //Product Categorie items ophalen
    $sqlPCategorie = $mysqli->prepare("SELECT id, catNaam FROM digifixx_product_cat") OR die ($mysqli->error.__LINE__);
    $sqlPCategorie->execute();
    $sqlPCategorie->store_result();
	$sqlPCategorie->bind_result($idPCategorie, $namePCategorie);

    //Producten items ophalen
    $sqlProduct = $mysqli->prepare("SELECT id, naam, model, merk, categorie, prijs, prijs_korting, kleur, frameMaat, extras, paginaurl, status FROM digifixx_producten WHERE status = 'actief' ORDER BY datum DESC LIMIT 4") or die ($mysqli->error.__LINE__);
    $sqlProduct->execute();
    $sqlProduct->store_result();
    $sqlProduct->bind_result($idProduct, $titelProduct, $modelProduct, $merkProduct, $CatProduct, $prijsProduct, $prijsKProduct, $kleurProduct, $frameMaatProduct, $extraProduct, $urlProduct, $statusProduct);
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
                <?php
                    while($sqlProduct->fetch()) {
                           $query = $mysqli->query("SELECT * FROM digifixx_images WHERE product_id = ".$idProduct."");
                        $row = $query->fetch_assoc();
                        if($query->num_rows > 0)
                        {
                            $imageURL = '../img/'.$row["file_name"];
                        }else
                        {
                            $imageURL = '../img/noimg.jpg';
                        }
                             ?>
                        <a class="card" href="<?=$url;?><?=$urlProduct;?>">
                            <div class="ImageProduct">
                                <img src="<?php echo $imageURL; ?>" class="ImgCard"/>
                            </div>
                            <div class="TxtCard">
                               <?=$merkProduct;?><?=$modelProduct;?><?=$titelProduct;?>
                            </div>
                            <div class="TxtColor">
                                <div class="TxtCard">
                                        <?php if($prijsKProduct != "0"){?>
                                                <span class="PrijsPproduct">€ <?=$prijsProduct;?></span><br/>
                                                <span>€ <?=$prijsKProduct;?></span>
                                        <?php } else { ?>
                                            <span>€ <?=$prijsProduct;?></span>
                                        <?php } ?>
                                    </div>
                                <div class="TxtCard">
                                    <div class="color-wrapper">
                                        <input type="color" value="<?=$kleurProduct;?>" name="color" id="color">
                                    </div>
                                </div>
                            </div>
                        </a>
                <?php } ?>
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
