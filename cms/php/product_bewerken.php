<?php
if(isset($_GET['opslaan']) == "ja") {
    $sql_insert = $mysqli->query("UPDATE digifixx_producten SET 
    naam       = '" . $mysqli->real_escape_string($_POST['naam']) . "',
    model       = '" . $mysqli->real_escape_string($_POST['model']) . "',
    merk       = '" . $mysqli->real_escape_string($_POST['merk']) . "',
    categorie   = '" . $_POST['categorie'] . "',
    prijs       = '" . $mysqli->real_escape_string($_POST['prijs']) . "',
    prijs_korting  = '" . $mysqli->real_escape_string($_POST['prijsK']) . "',
    kleur       = '" . $mysqli->real_escape_string($_POST['kleur']) . "',
    frameMaat       = '" . $mysqli->real_escape_string($_POST['frameMaat']) . "',
    extras      = '" . $mysqli->real_escape_string($_POST['extras']) . "',
    status      = '" . $_POST['status'] . "',
    paginaurl   = '" . strtolower($_POST['paginaurl']) . "' WHERE id = '" . $_GET['id'] . "' ") or die($mysqli->error . __LINE__);

    //pagina redirecten om deze te kunnen bewerken
    header('Location: ?page=product_bewerken&id=' . $_GET['id'] . '');
    exit;
}

$sqlProduct = $mysqli -> prepare("SELECT id, naam, model, merk, categorie, prijs, prijs_korting, kleur, frameMaat, extras, paginaurl, status FROM digifixx_producten WHERE id = ?") or die ($mysqli->error.__LINE__);
$productId = $_GET['id'];
$sqlProduct->bind_param('i',$productId);
$sqlProduct->execute();
$sqlProduct->store_result();
$sqlProduct->bind_result($idProduct, $titelProduct, $modelProduct, $merkProduct, $CatProduct, $prijsProduct, $prijsKProduct, $kleurProduct, $frameMaatProduct, $extraProduct, $urlProduct, $statusProduct);
$sqlProduct->fetch();

//Als $_GET opgeslagen=ja is de pagina correct ingevuld en opgeslagen: dus we tonen een alert
if (isset($_GET['opslaan']) == "ja") {
    echo "
    <div class=\"alert alert-success\">
    Gegevens zijn opgeslagen
    </div>
    ";
};
?>

<section id="Productewerken">
    <div class="left">
        <div class="title">Product bewerken</div>
        <form action="?page=product_bewerken&id=<?=$_GET['id'];?>&opslaan=ja" method="POST">
            <div class="form-group">
                <label for="naam">Naam Fiets</label>
                <input type="text" value="<?=$titelProduct;?>" name="naam" id="naam">
            </div>
            <div class="form-group">
                <label for="model">Model Fiets</label>
                <input type="text" value="<?=$modelProduct;?>" name="model" id="model">
            </div>
            <div class="form-group">
                <label for="merk">Merk Fiets</label>
                <input type="text" value="<?=$merkProduct;?>" name="merk" id="merk">
            </div>
            <div class="form-group">
                <label for="categorie">Categorie Fiets</label>
                <select name="categorie" placeholder="Selecteer een categorie" >	
                <?php if ($CatProduct) { echo '<option value="'.$CatProduct.'">'.$CatProduct.'</option>'; } else { ?><option value="">selecteer een categorie</option><?php } ?>	
                    <?php //categorien ophalen
                    foreach (getCategorie($mysqli) as $categorien) {
                    echo '<option value="'.htmlspecialchars($categorien['catNaam']).'" >'.htmlspecialchars($categorien['catNaam']).'</option>';		
                    } //functie categorien ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prijs">Prijs Fiets</label>
                <input type="text" value="<?=$prijsProduct;?>" name="prijs" id="prijs">
            </div>
            <div class="form-group">
                <label for="prijsK">Prijs korting Fiets</label>
                <input type="text" value="<?=$prijsKProduct;?>" name="prijsK" id="prijsK">
            </div>
            <div class="form-group">
                <label for="kleur">Kleur Fiets</label>
                <input type="color" value="<?=$kleurProduct;?>" name="kleur" id="kleur">
            </div>
            <div class="form-group">
                <label for="frameMaat">Framemaat Fiets (Lengte in meters - framemaat in cm)</label>
                <select name="frameMaat" id="frameMaat">
                    <?php if($frameMaatProduct){ ?><option value="<?=$frameMaatProduct;?>"><?=$frameMaatProduct;?></option><?php } else { ?><option value="">selecteer een categorie</option><?php }?>
                    <option value="48/49">1.55 - 1.60 | 48/49</option>
                    <option value="50/51">1.61 - 1.65 | 50/51</option>
                    <option value="53/54">1.66 - 1.70 | 53/54</option>
                    <option value="56/57">1.71 - 1.75 | 56/57</option>
                    <option value="58/59">1.76 - 1.80 | 58/59</option>
                    <option value="60/61">1.81 - 1.85 | 60/61</option>
                    <option value="65/66">1.86 - 1.90 | 65/66</option>
                    <option value="65/66">1.91 en groter | 65/66</option>
                </select>
            </div>
            <div class="form-group">
                <label for="extras">Fiets extras</label>
                <textarea name="extras" id="extras" rows="10"><?=$extraProduct;?></textarea>
            </div>
            <div class="form-group">
                <label for="">Product url Voorbeeld</label>
                <input type="text" value="<?=$url;?><?=$urlProduct;?>/" readonly>
            </div>
            <div class="form-group">
                <label for="paginaurl">Product url</label>
                <input type="text" value="<?=$urlProduct;?>" name="paginaurl" id="paginaurl">
            </div>
            <div class="form-group">
                <label for="status">Product status</label>
                <select name="status" id="status">
                    <option value="<?=$statusProduct;?>"><?=$statusProduct;?></option>
                    <option value="actief">Actief</option>
                    <option value="niet actief">Niet actief</option>
                </select>
            </div>
            <input class="btn" type="submit" value="Opslaan">
        </form>
    </div>
    <div class="right">
        <form action="?page=upload&id=<?php echo $_GET['id'];?>" method="post" enctype="multipart/form-data">
            <p>Upload bestanden</p>
            <input type="file" multiple="multiple" name="file">
            <input type="submit" name="submit" class="btn" value="Upload">
        </form>
        <div class="image-wrapper">
        <?php
        $query = $mysqli->query("SELECT * FROM digifixx_images WHERE cms_id = ".$productId."");
            while($row = $query->fetch_assoc()){
                $imageURL = '../img/'.$row["file_name"];
            ?>
            <div class="img">
                <img src="<?php echo $imageURL; ?>" height="100%" width="100%" alt="" />
                <a class="btn-delete" href="?page=delete&id=<?php echo $_GET['id'];?>"><i class="fa fa-trash-o"></i></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>