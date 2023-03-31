<?php
if(!$mysqli) { header ('Location:../'); }

if(isset($_POST['opslaan'])) {
    $merk = preg_replace('/\s+/', '-', $_POST['merk']); 
    $model = preg_replace('/\s+/', '-', $_POST['model']); 
    $naam = preg_replace('/\s+/', '-', $_POST['naam']);

    $paginaurl = "product/" . strtolower($merk) . "-" . strtolower($model) . "-" . strtolower($naam);
    $paginaUrlCheck = $mysqli->query(" SELECT * FROM digifixx_producten WHERE paginaurl = '".$paginaurl."'") or die ($mysqli->error.__LINE__);
	$rowpaginaurl = $paginaUrlCheck->num_rows; 
    if ($rowpaginaurl > 0) {
        $error2 = "Deze menu titel bestaat al. Voer een unieke menu titel in.";
        $error_item1_2 = 'ja';
        $paginaurlerror = true;
    }
    
    if($paginaurlerror == false) {
        $sql_insert = $mysqli->query("INSERT digifixx_producten SET naam = '".$mysqli->real_escape_string($_POST['naam'])."',
                                                                    model 	= '".$mysqli->real_escape_string($_POST['model'])."',
                                                                    merk	= '".$mysqli->real_escape_string($_POST['merk'])."',
                                                                    categorie	= '".$mysqli->real_escape_string($_POST['categorie'])."',
                                                                    paginaurl = '".$paginaurl."'") or die($mysqli->error.__LINE__);											
        $rowid = $mysqli->insert_id;  
        // pagina redirecten om deze te kunnen bewerken
        // ============================================
        header('Location: ?page=product_bewerken&id='.$rowid.'');
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
        <div class="title">Product Aanmaken</div>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="item1">Titel Pagina</label>
                <input type="text" value="<?=$titelPaginaB;?>" name="item1" id="item1">
            </div>
            <div class="form-group">
                <label for="categorie">Categorie Pagina</label>
                <select name="categorie" placeholder="Selecteer een categorie" >	
                    <option value="">selecteer een categorie</option>
                        <?php //categorien ophalen
                        foreach (getCategorie($mysqli) as $categorien) {
                        echo '<option value="'.htmlspecialchars($categorien['catNaam']).'" >'.htmlspecialchars($categorien['catNaam']).'</option>';		
                        } //functie categorien ?>
                </select>
            </div>
            <input class="btn" type="submit" name="opslaan" value="Opslaan">
        </form>
    </div>
</section>