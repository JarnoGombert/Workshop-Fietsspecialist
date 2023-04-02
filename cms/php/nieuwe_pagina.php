<?php
if(!$mysqli) { header ('Location:../'); }

if(isset($_POST['opslaan'])) {
    $item1Url = preg_replace('/\s+/', '-', $_POST['item1']);

    $paginaurl = strtolower($item1Url);
    $paginaUrlCheck = $mysqli->query(" SELECT * FROM digifixxcms WHERE paginaurl = '".$paginaurl."'") or die ($mysqli->error.__LINE__);
	$rowpaginaurl = $paginaUrlCheck->num_rows; 
    if ($rowpaginaurl > 0) {
        $error2 = "Deze menu titel bestaat al. Voer een unieke menu titel in.";
        $error_item1_2 = 'ja';
        $paginaurlerror = true;
    } else {
        $paginaurlerror = false;
    }
    
    if($paginaurlerror == false) {
        $sql_insert = $mysqli->query("INSERT digifixxcms SET item1 = '".$mysqli->real_escape_string($_POST['item1'])."',
                                                                    keuze	= '".$mysqli->real_escape_string($_POST['categorie'])."',
                                                                    paginaurl = '".$paginaurl."'") or die($mysqli->error.__LINE__);											
        $rowid = $mysqli->insert_id;  
        // pagina redirecten om deze te kunnen bewerken
        // ============================================
        header('Location: ?page=pagina_bewerken&id='.$rowid.'');
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
                <input type="text" placeholder="Voer uw Titel in" name="item1" id="item1">
            </div>
            <div class="form-group">
                <label for="categorie">Categorie Pagina</label>
                <select name="categorie" placeholder="Selecteer een categorie" >	
                    <option value="">selecteer een categorie</option>
                    <option value="hoofdmenu">Hoofdmenu</option>
                    <option value="overige">Overige</option>
                </select>
            </div>
            <input class="btn" type="submit" name="opslaan" value="Opslaan">
        </form>
    </div>
</section>