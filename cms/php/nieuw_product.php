<?php
if(!$mysqli) { header ('Location:../'); }

if(isset($_POST['opslaan'])) {
    $sql_insert = $mysqli->query("INSERT digifixx_producten SET naam = '".$mysqli->real_escape_string($_POST['naam'])."',
                                                                model 	= '".$mysqli->real_escape_string($_POST['model'])."',
                                                                merk	= '".$mysqli->real_escape_string($_POST['merk'])."'") or die($mysqli->error.__LINE__);											
    $rowid = $mysqli->insert_id;  
    // pagina redirecten om deze te kunnen bewerken
    // ============================================
    header('Location: ?page=product_bewerken&id='.$rowid.'');
    exit;
    //Als $_GET opgeslagen=ja is de pagina correct ingevuld en opgeslagen: dus we tonen een alert
    if ($_POST['opslaan'] == 1) {
        echo "
        <div class=\"alert alert-success\">
        Gegevens zijn opgeslagen
        </div>
        ";
    };
}
?>

<section id="Productewerken">
    <div class="left">
        <div class="title">Product Aanmaken</div>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="naam">Naam Fiets</label>
                <input type="text" value="" name="naam" id="naam">
            </div>
            <div class="form-group">
                <label for="model">Model Fiets</label>
                <input type="text" value="" name="model" id="model">
            </div>
            <div class="form-group">
                <label for="merk">Merk Fiets</label>
                <input type="text" value="" name="merk" id="merk">
            </div>
            <input class="btn" type="submit" name="opslaan" value="Opslaan">
        </form>
    </div>
</section>