<?php
if(isset($_GET['categorieSelect']) && $_GET['categorieSelect'] != "alle-fietsen"){
    if(strpos($_GET['categorieSelect'], "+") !== false){
        $categorieExplode = str_replace("+"," ",$_GET['categorieSelect']);
    } else{
        $categorieExplode = $_GET['categorieSelect'];
    }
    //Producten items ophalen
    $sqlProduct = $mysqli -> prepare("SELECT id, naam, model, merk, categorie, prijs, prijs_korting, kleur, frameMaat, extras, paginaurl, status FROM digifixx_producten WHERE categorie = ? AND status = 'actief'") or die ($mysqli->error.__LINE__);
    $productCAT = $categorieExplode;
    $sqlProduct->bind_param('s',$productCAT);
    $sqlProduct->execute();
    $sqlProduct->store_result();
    $sqlProduct->bind_result($idProduct, $titelProduct, $modelProduct, $merkProduct, $CatProduct, $prijsProduct, $prijsKProduct, $kleurProduct, $frameMaatProduct, $extraProduct, $urlProduct, $statusProduct);
} else {
    //Producten items ophalen
    $sqlProduct = $mysqli -> prepare("SELECT id, naam, model, merk, categorie, prijs, prijs_korting, kleur, frameMaat, extras, paginaurl, status FROM digifixx_producten WHERE status = 'actief'") or die ($mysqli->error.__LINE__);
    $sqlProduct->execute();
    $sqlProduct->store_result();
    $sqlProduct->bind_result($idProduct, $titelProduct, $modelProduct, $merkProduct, $CatProduct, $prijsProduct, $prijsKProduct, $kleurProduct, $frameMaatProduct, $extraProduct, $urlProduct, $statusProduct);
}
?>

<div class="Product-main">
        <div class="container mx-auto">
            <div class="filters">
                <form id="CatfiltersForm" action="">
                    <select id="categorieSelect" name="categorieSelect" placeholder="Selecteer een categorie">	
                        <?php
                            if(isset($_GET['categorieSelect'])){
                                echo '<option value="'.$_GET['categorieSelect'].'">'.$_GET['categorieSelect'].'</option>';
                            } else {
                                echo '<option value="">geen categorie</option>';
                            }
                        ?>
                        <?php //categorien ophalen
                        echo '<option value="alle-fietsen">Alle fietsen</option>';
                        foreach (getCategorie($mysqli) as $categorien) {
                        echo '<option value="'.htmlspecialchars($categorien['catNaam']).'" >'.htmlspecialchars($categorien['catNaam']).'</option>';		
                        } //functie categorien ?>
                    </select>
                </form>
                
            </div>
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
                                        <input type="color" value="<?=$kleurProduct;?>" name="color" id="color" disabled>
                                    </div>
                                </div>
                            </div>
                        </a>
                <?php } ?>
            </div>
        </div>
    </div>
<script>
    const myForm = document.getElementById("CatfiltersForm");
    const mySelect = document.getElementById("categorieSelect");
  
    mySelect.addEventListener("change", () => {
      if (mySelect.value) {
        const actionUrl = "<?=$url;?>producten?categorie=" + encodeURIComponent(mySelect.value);
        document.forms[0].action = actionUrl;
        mySelect.value = mySelect.value;
        myForm.submit();
      }
    });
</script>