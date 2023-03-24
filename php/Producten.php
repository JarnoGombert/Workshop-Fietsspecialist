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
            <select name="KortingSelect" id="KortingSelect">
                <option value="alle-fietsen">Alle fietsen</option>
                <option value="korting">Korting</option>
            </select>
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