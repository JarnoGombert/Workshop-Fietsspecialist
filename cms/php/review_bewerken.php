<?php
if(isset($_GET['opslaan']) == "ja") {
    $sql_insert = $mysqli->query("UPDATE digifixx_reviews SET 
    auteur       = '" . $mysqli->real_escape_string($_POST['auteur']) . "',
    status   = '" . $_POST['status'] . "' WHERE id = '" . $_GET['id'] . "' ") or die($mysqli->error . __LINE__);

    //pagina redirecten om deze te kunnen bewerken
    header('Location: ?page=review_bewerken&id=' . $_GET['id'] . '');
    exit;
}

$sqlReviews = $mysqli -> prepare("SELECT id, auteur, status FROM digifixx_reviews WHERE id = ? ORDER BY id") or die ($mysqli->error.__LINE__);
$reviewID = $_GET['id'];
$sqlReviews->bind_param('i',$reviewID);
$sqlReviews->execute();
$sqlReviews->store_result();
$sqlReviews->bind_result($idReviews, $auteurReviews, $statusReviews);
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
                <label for="auteur">Auteur</label>
                <input type="text" value="<?=$auteurReviews;?>" name="auteur" id="auteur">
            </div>
            <h1>Huidige status: <span class="<?=$statusReviews == 'actief' ? 'actief' : 'niet-actief';?>"><?=$statusReviews;?></span></h1>
            <div class="form-group">
                <label for="status">Review status</label>
                <select name="status" id="status">
                    <option value="actief">Actief</option>
                    <option value="niet actief">Niet actief</option>
                </select>
            </div>
            <input class="btn" type="submit" value="Opslaan">
        </form>
    </div>
</section>