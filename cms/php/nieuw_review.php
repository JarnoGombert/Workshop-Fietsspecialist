<?php
if(!$mysqli) { header ('Location:../'); }

if(isset($_POST['opslaan'])) {
    $titelURL = preg_replace('/\s+/', '-', $_POST['titel']);
    $paginaurl = "review/" . strtolower($titelURL);
    $paginaUrlCheck = $mysqli->query(" SELECT * FROM digifixx_reviews WHERE paginaurl = '".$paginaurl."'") or die ($mysqli->error.__LINE__);
	$rowpaginaurl = $paginaUrlCheck->num_rows; 
    if ($rowpaginaurl > 0) {
        $error2 = "Deze menu titel bestaat al. Voer een unieke menu titel in.";
        $error_item1_2 = 'ja';
        $paginaurlerror = true;
    
        if ($paginaurlerror == true) {
            echo "
            <div class=\"alert alert-error\">
            Deze pagina bestaat al. Voer een unieke titel in.
            </div>
            ";
        };
    }
    
    if($paginaurlerror == false) {
        $sql_insert = $mysqli->query("INSERT digifixx_reviews SET  titel            = '" . $mysqli->real_escape_string($_POST['titel']) . "',
                                                                    auteur          = '" . $mysqli->real_escape_string($_POST['auteur']) . "',
                                                                    aantal_sterren  = '" . $mysqli->real_escape_string($_POST['sterren']) . "',
                                                                    paginaurl       = '".$paginaurl."'") or die($mysqli->error.__LINE__);											
        $rowid = $mysqli->insert_id;  
        // pagina redirecten om deze te kunnen bewerken
        // ============================================
        header('Location: ?page=review_bewerken&id='.$rowid.'');
        exit;

        //Als $_POST opslaan=1 is de pagina correct ingevuld en opgeslagen: dus we tonen een alert
        if (isset($_POST['opslaan'])) {
            echo "
            <div class=\"alert alert-success\">
            Gegevens zijn opgeslagen
            </div>
            ";
        };
    }
}
?>

<section id="Productewerken">
    <div class="left">
        <div class="title">Review Aanmaken</div>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="titel">Titel Review</label>
                <input type="text" value="" name="titel" id="titel">
            </div>
            <div class="form-group">
                <label for="auteur">Auteur</label>
                <input type="text" value="" name="auteur" id="auteur">
            </div>
            <div class="form-group">
                <label for="sterren">Aantal sterren (1 t/m 5)</label>
                <input type="number" value="" min="1" max="5" name="sterren" id="sterren">
            </div>
            <div class="form-group">
                <label for="tekst">Pagina Tekst</label>
                <textarea name="tekst" id="tekst" rows="7"></textarea>
            </div>
            <input class="btn" type="submit" name="opslaan" value="Opslaan">
        </form>
    </div>
</section>