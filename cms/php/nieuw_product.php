<?php
if(isset($_GET['opslaan']) == "ja") {

    $paginaurl = strtolower($_POST['merk']) . "-" . strtolower($_POST['model']) . "-" . strtolower($_POST['naam']);
    $paginaUrlCheck = $mysqli->query(" SELECT * FROM digifixx_producten WHERE paginaurl = '".$paginaurl."'") or die ($mysqli->error.__LINE__);
	$rowpaginaurl = $paginaUrlCheck->num_rows; 
    if ($rowpaginaurl > 0) {
        $error2 = "Deze menu titel bestaat al. Voer een unieke menu titel in.";
        $error_item1_2 = 'ja';
        $paginaurlerror = true;
    }
    
    if($paginaurlerror == false) {
        $sql_insert = $mysqli->query("INSERT digifixx_producten SET naam 	= '".$mysqli->real_escape_string($_POST['naam'])."',
                                                                model	= '".$mysqli->real_escape_string($_POST['model'])."',
                                                                merk	= '".$mysqli->real_escape_string($_POST['merk'])."',
                                                                paginaurl = '".$paginaurl."") or die($mysqli->error.__LINE__);											
        $rowid = $mysqli->insert_id;
                
        // pagina redirecten om deze te kunnen bewerken
        // ============================================
        header('Location: ?page=product_bewerken&id='.$rowid.'');
    }
}

//Als $_GET opgeslagen=ja is de pagina correct ingevuld en opgeslagen: dus we tonen een alert
// if (isset($_GET['opslaan']) == "ja") {
//     echo "
//     <div class=\"alert alert-success\">
//     Gegevens zijn opgeslagen
//     </div>
//     ";
// };
?>

<section id="Productewerken">
    <div class="left">
        <div class="title">Product Aanmaken</div>
        <form action="?page=producten" method="POST">
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
            <input class="btn" type="submit" value="Opslaan">
        </form>
    </div>
</section>