<?php
if(isset($_GET['opslaan']) == "ja") {
    $sql_insert = $mysqli->query("UPDATE digifixx_reviews SET 
    titel       = '" . $mysqli->real_escape_string($_POST['titel']) . "',
    auteur       = '" . $mysqli->real_escape_string($_POST['auteur']) . "',
    aantal_sterren = '" . $mysqli->real_escape_string($_POST['sterren']) . "',
    tekst = '" . $mysqli->real_escape_string($_POST['tekst']) . "',
    status      = '" . $_POST['status'] . "',
    paginaurl   = '" . strtolower($_POST['paginaurl']) . "' WHERE id = '" . $_GET['id'] . "' ") or die($mysqli->error . __LINE__);

    //pagina redirecten om deze te kunnen bewerken
    header('Location: ?page=review_bewerken&id=' . $_GET['id'] . '');
    exit;
}

$sqlReviews = $mysqli -> prepare("SELECT id, titel, auteur, tekst, aantal_sterren, paginaurl, status FROM digifixx_reviews WHERE id = ? ORDER BY id") or die ($mysqli->error.__LINE__);
$reviewID = $_GET['id'];
$sqlReviews->bind_param('i',$reviewID);
$sqlReviews->execute();
$sqlReviews->store_result();
$sqlReviews->bind_result($idReviews, $titelReviews, $auteurReviews, $tekstReviews, $sterrenReviews, $urlReviews, $statusReviews);
$sqlReviews->fetch();

//Als $_GET opgeslagen=ja is de pagina correct ingevuld en opgeslagen: dus we tonen een alert
if (isset($_GET['opslaan']) == "ja") {
    echo "
    <div class=\"alert alert-success\">
    Gegevens zijn opgeslagen
    </div>
    ";
};
?>

<section id="PaginaBewerken">
    <div class="left">
        <div class="title">Pagina bewerken</div>
        <form action="?page=review_bewerken&id=<?=$_GET['id'];?>&opslaan=ja" method="POST">
            <div class="form-group">
                <label for="titel">Titel Review</label>
                <input type="text" value="<?=$titelReviews;?>" name="titel" id="titel">
            </div>
            <div class="form-group">
                <label for="auteur">Auteur</label>
                <input type="text" value="<?=$auteurReviews;?>" name="auteur" id="auteur">
            </div>
            <div class="form-group">
                <label for="sterren">Aantal sterren (1 t/m 5)</label>
                <input type="number" value="<?=$sterrenReviews;?>" min="1" max="5" name="sterren" id="sterren">
            </div>
            <div class="form-group">
                <label for="tekst">Pagina Tekst</label>
                <textarea name="tekst" id="tekst" rows="7"><?=$tekstReviews;?></textarea>
            </div>
            <div class="form-group">
                <label for="">Review url Voorbeeld</label>
                <input type="text" value="<?=$url;?><?=$urlReviews;?>/" readonly>
            </div>
            <div class="form-group">
                <label for="paginaurl">Review url</label>
                <input type="text" value="<?=$urlReviews;?>" name="paginaurl" id="paginaurl">
            </div>
            <div class="form-group">
                <label for="status">Review status</label>
                <select name="status" id="status">
                    <option value="<?=$statusReviews;?>"><?=$statusReviews;?></option>
                    <option value="actief">Actief</option>
                    <option value="niet actief">Niet actief</option>
                </select>
            </div>
            <input class="btn" type="submit" value="Opslaan">
        </form>
    </div>
</section>