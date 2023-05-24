<?php
if(!$mysqli) { header ('Location:../'); }

if(isset($_POST['opslaan'])) {
    $paginaUrlCheck = $mysqli->query("SELECT * FROM digifixx_reviews") or die ($mysqli->error.__LINE__);
	$rowpaginaurl = $paginaUrlCheck->num_rows; 
    if ($rowpaginaurl > 0) {
        $error2 = "Deze menu titel bestaat al. Voer een unieke menu titel in.";
        $error_item1_2 = 'ja';
    }
    
    $sql_insert = $mysqli->query("INSERT digifixx_reviews SET   auteur          = '" . $mysqli->real_escape_string($_POST['auteur']) . "',
                                                                aantal_sterren  = '" . $mysqli->real_escape_string($_POST['sterren']) . "',
                                                                tekst       = '".$mysqli->real_escape_string($_POST['review_text'])."'") or die($mysqli->error.__LINE__);											
    $rowid = $mysqli->insert_id;
    success();
    exit;
}

function success() {
    echo "
        <div class=\"alert alert-success\">
        Gegevens zijn opgeslagen
        </div>
        ";
}
?>

<section id="Productewerken">
    <div class="left">
        <div class="title">Review Aanmaken</div>
        <form method="POST">
            <div class="form-group">
                <label for="auteur">Auteur</label>
                <input type="text" value="" name="auteur" id="auteur">
            </div>
            <div class="form-group">
                <label for="sterren">Aantal sterren (1 t/m 5)</label>
                <input type="number" value="" min="1" max="5" name="sterren" id="sterren">
            </div>
            <div class="form-group">
                <label for="review_text">Pagina Tekst</label>
                <textarea name="review_text" id="review_text" rows="7"></textarea>
            </div>
            <input class="btn" type="submit" name="opslaan" value="Opslaan">
        </form>
    </div>
</section>