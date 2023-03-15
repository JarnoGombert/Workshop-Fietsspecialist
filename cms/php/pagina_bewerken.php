<?php
if(isset($_GET['opslaan']) == "ja") {
    $sql_insert = $mysqli->query("UPDATE digifixxcms SET 
    item1       = '" . $mysqli->real_escape_string($_POST['item1']) . "',
    item2       = '" . $mysqli->real_escape_string($_POST['item2']) . "',
    item3       = '" . $mysqli->real_escape_string($_POST['item3']) . "',
    item4       = '" . $mysqli->real_escape_string($_POST['item4']) . "',
    item5       = '" . $mysqli->real_escape_string($_POST['item5']) . "',
    keuze      = '" . $_POST['keuze'] . "',
    status      = '" . $_POST['status'] . "',
    tekst      = '" . str_replace('\r\n', '', $mysqli->real_escape_string(htmlspecialchars($_POST['tekst']))) . "',
    paginaurl   = '" . strtolower($_POST['paginaurl']) . "' WHERE id = '" . $_GET['id'] . "' ") or die($mysqli->error . __LINE__);

    //pagina redirecten om deze te kunnen bewerken
    //header('Location: ?page=pagina_bewerken&id=' . $_GET['id'] . '');
}

$sqlPaginaB = $mysqli -> prepare("SELECT id, item1, item2, item3, item4, item5, tekst, keuze, paginaurl, status FROM digifixxcms WHERE id = ? ORDER BY datum") or die ($mysqli->error.__LINE__);
$pageId = $_GET['id'];
$sqlPaginaB->bind_param('i',$pageId);
$sqlPaginaB->execute();
$sqlPaginaB->store_result();
$sqlPaginaB->bind_result($idPaginaB, $titelPaginaB, $item2PaginaB, $item3PaginaB, $item4PaginaB, $item5PaginaB, $tekstPaginaB, $catPaginaB, $urlPaginaB, $statusPaginaB);
$sqlPaginaB->fetch();

//Als $_GET opgeslagen=ja is de pagina correct ingevuld en opgeslagen: dus we tonen een alert
if (isset($_GET['opslaan']) == "ja") {
    echo "
    <div class=\"alert alert-success\">
    Gegevens zijn opgeslagen
    </div>
    ";
};
?>

<section id="paginaBewerken">
    <div class="left">
        <div class="title">Pagina bewerken</div>
        <form action="?page=pagina_bewerken&id=<?=$_GET['id'];?>&opslaan=ja" method="POST">
            <div class="form-group">
                <label for="item1">Titel Pagina</label>
                <input type="text" value="<?=$titelPaginaB;?>" name="item1" id="item1">
            </div>
            <div class="form-group">
                <label for="item2">Extra item 2</label>
                <input type="text" value="<?=$item2PaginaB;?>" name="item2" id="item2">
            </div>
            <div class="form-group">
                <label for="item3">Extra item 3</label>
                <input type="text" value="<?=$item3PaginaB;?>" name="item3" id="item3">
            </div>
            <div class="form-group">
                <label for="item4">Extra item 4</label>
                <input type="text" value="<?=$item4PaginaB;?>" name="item4" id="item4">
            </div>
            <div class="form-group">
                <label for="item5">Extra item 5</label>
                <input type="text" value="<?=$item5PaginaB;?>" name="item5" id="item5">
            </div>
            <div class="form-group">
                <label for="tekst">Pagina Tekst</label>
                <textarea value="<?=$tekstPaginaB;?>" name="tekst" id="tekst" rows="7"></textarea>
            </div>
            <div class="form-group">
                <label for="">Pagina url Voorbeeld</label>
                <input type="text" value="<?=$url;?><?=$urlPaginaB;?>/" readonly>
            </div>
            <div class="form-group">
                <label for="paginaurl">Pagina url</label>
                <input type="text" value="<?=$urlPaginaB;?>" name="paginaurl" id="paginaurl">
            </div>
            <div class="form-group">
                <label for="keuze">Pagina categorie</label>
                <select name="keuze" id="keuze">
                    <option value="<?=$catPaginaB;?>"><?=$catPaginaB;?></option>
                    <option value="hoofdmenu">Hoofdmenu</option>
                    <option value="overige">Overige</option>
                    <option value="nieuws">Nieuws</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Pagina status</label>
                <select name="status" id="status">
                    <option value="<?=$statusPaginaB;?>"><?=$statusPaginaB;?></option>
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
        $query = $mysqli->query("SELECT * FROM digifixx_images WHERE cms_id = ".$pageId."");
            while($row = $query->fetch_assoc()){
                $imageURL = '../img/'.$row["file_name"];
            ?>
            <div class="img">
                <img src="<?php echo $imageURL; ?>" height="100%" width="100%" alt="" />
            </div>
            <?php } ?>
        </div>
    </div>
</section>