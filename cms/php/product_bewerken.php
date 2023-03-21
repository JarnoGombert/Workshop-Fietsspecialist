<?php
if(isset($_GET['opslaan']) == "ja") {
    $sql_insert = $mysqli->query("UPDATE digifixx_producten SET 
    naam       = '" . $mysqli->real_escape_string($_POST['naam']) . "',
    model       = '" . $mysqli->real_escape_string($_POST['model']) . "',
    merk       = '" . $mysqli->real_escape_string($_POST['merk']) . "',
    kleur       = '" . $mysqli->real_escape_string($_POST['kleur']) . "',
    frameMaat       = '" . $mysqli->real_escape_string($_POST['frameMaat']) . "',
    extras      = '" . $mysqli->real_escape_string($_POST['extras']) . "',
    status      = '" . $_POST['status'] . "',
    paginaurl   = '" . strtolower($_POST['paginaurl']) . "' WHERE id = '" . $_GET['id'] . "' ") or die($mysqli->error . __LINE__);

    //pagina redirecten om deze te kunnen bewerken
    header('Location: ?page=product_bewerken&id=' . $_GET['id'] . '');
    exit;
}

$sqlProduct = $mysqli -> prepare("SELECT id, naam, model, merk, kleur, frameMaat, extras, paginaurl, status FROM digifixx_producten WHERE id = ?") or die ($mysqli->error.__LINE__);
$productId = $_GET['id'];
$sqlProduct->bind_param('i',$productId);
$sqlProduct->execute();
$sqlProduct->store_result();
$sqlProduct->bind_result($idProduct, $titelProduct, $modelProduct, $merkProduct, $kleurProduct, $frameMaatProduct, $extraProduct, $urlProduct, $statusProduct);
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
                <label for="item1">Naam Fiets</label>
                <input type="text" value="<?=$titelProduct;?>" name="item1" id="item1">
            </div>
            <div class="form-group">
                <label for="item2">Model Fiets</label>
                <input type="text" value="<?=$modelProduct;?>" name="item2" id="item2">
            </div>
            <div class="form-group">
                <label for="item3">Merk Fiets</label>
                <input type="text" value="<?=$merkProduct;?>" name="item3" id="item3">
            </div>
            <div class="form-group">
                <label for="item4">Kleur Fiets</label>
                <input type="color" value="<?=$kleurProduct;?>" name="item4" id="item4">
            </div>
            <div class="form-group">
                <label for="frameMaat">Framemaat Fiets (Lengte in meters - framemaat in cm)</label>
                <select name="frameMaat" id="frameMaat">
                    <option value="<?=$frameMaatProduct;?>"><?=$frameMaatProduct;?></option>
                    <option value="actief">Actief</option>
                    <option value="niet actief">Niet actief</option>
                </select>
            </div>
            <div class="form-group">
                <label for="extra">Fiets extras</label>
                <textarea name="extra" id="extra" rows="10"><?=$extraProduct;?></textarea>
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