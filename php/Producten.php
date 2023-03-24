<?php
    //Producten items ophalen
    $sqlProduct = $mysqli -> prepare("SELECT id, naam, model, merk, categorie, prijs, prijs_korting, kleur, frameMaat, extras, paginaurl, status FROM digifixx_producten") or die ($mysqli->error.__LINE__);
    // $productId = $_GET['id'];
    // $sqlProduct->bind_param('i',$productId);
    $sqlProduct->execute();
    $sqlProduct->store_result();
    $sqlProduct->bind_result($idProduct, $titelProduct, $modelProduct, $merkProduct, $CatProduct, $prijsProduct, $prijsKProduct, $kleurProduct, $frameMaatProduct, $extraProduct, $urlProduct, $statusProduct);
?>

<div class="Product-main">
        <div class="container mx-auto">
            <div class="ProductCard">
                <?php
                    while($sqlProduct->fetch()) {?>
                        <a class="card" href="<?=$url;?><?=$urlProduct;?>">
                            <img src="<?=$url;?>Images/FietsCard.png" class="ImgCard"/>
                            <div class="TxtCard">
                               <?=$merkProduct;?><?=$modelProduct;?><?=$titelProduct;?>
                            </div>
                            <div class="TxtColor">
                                <div class="TxtCard">
                                        <?php if($prijsKProduct != "0.00"){?>
                                            <span>€ <?=$prijsProduct;?></span>
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