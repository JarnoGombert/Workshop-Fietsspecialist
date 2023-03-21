<?php
if(isset($_GET['opslaan']) == "ja") {
    $sql_insert = $mysqli->query("INSERT INTO digifixx_producten (naam, model, merk) VALUES 
    ('".$mysqli->real_escape_string($_POST['naam'])."', '" . $mysqli->real_escape_string($_POST['model']) . "', 
    '" . $mysqli->real_escape_string($_POST['merk']) . "'") or die($mysqli->error . __LINE__);

    //pagina redirecten om deze te kunnen bewerken
    header('Location: ?page=producten');
    exit;
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