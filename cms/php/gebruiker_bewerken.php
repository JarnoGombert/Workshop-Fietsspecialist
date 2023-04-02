<?php
$user_id = $_SESSION['user_id'];

if(isset($_GET['opslaan']) == "ja") {
    $sql_insert = $mysqli->query("UPDATE digifixxcms_gebruikers SET 
    username    = '" . $mysqli->real_escape_string($_POST['uname']) . "',
    niveau      = '" . $_POST['niveau'] . "',
    email       = '" . $mysqli->real_escape_string($_POST['email']) . "',
    password    = '" . $mysqli->real_escape_string($_POST['password']) . "',
    titel       = '" . $_POST['titel'] . "',
    geslacht    = '" . $_POST['geslacht'] . "',
    voorletters = '" . $mysqli->real_escape_string($_POST['voorletters']) . "',
    tussenvoegsel      = '" . $mysqli->real_escape_string($_POST['tussenvoegsel']) . "',
    achternaam       = '" . $mysqli->real_escape_string($_POST['achternaam']) . "',
    adres       = '" . $mysqli->real_escape_string($_POST['adres']) . "',
    postcode       = '" . $mysqli->real_escape_string($_POST['postcode']) . "',
    plaats       = '" . $mysqli->real_escape_string($_POST['plaats']) . "',
    telefoon       = '" . $mysqli->real_escape_string($_POST['telefoon']) . "',
    mobiel       = '" . $mysqli->real_escape_string($_POST['mobiel']) . "' WHERE id = '" . $user_id . "' ") or die($mysqli->error . __LINE__);

    //pagina redirecten om deze te kunnen bewerken
    header('Location: ?page=gebruiker_bewerken&id=' . $user_id . '');
    exit;
}

$gebruikersInfo = $mysqli->query("SELECT * FROM digifixxcms_gebruikers WHERE id = ".$user_id."");
$rowGebruiker = $gebruikersInfo->fetch_assoc();

//Als $_GET opgeslagen=ja is de pagina correct ingevuld en opgeslagen: dus we tonen een alert
if (isset($_GET['opslaan']) == "ja") {
    echo "
    <div class=\"alert alert-success\">
    Gegevens zijn opgeslagen
    </div>
    ";
};
?>

<section id="gebruiker_edit">
    <div class="left">
        <div class="title">Gebruiker bewerken</div>
        <form action="?page=gebruiker_bewerken&id=<?=$user_id;?>&opslaan=ja" method="POST">
            <div class="form-group">
                <label for="username">Gebruikersnaam</label>
                <input type="text" value="<?=$rowGebruiker['username'];?>" name="username" id="username">
            </div>
            <?php if($rowGebruiker['niveau'] == "admin"){ ?>
                <div class="form-group">
                    <label for="niveau">Niveau</label>
                    <select name="niveau" id="niveau">
                        <?php if($rowGebruiker['niveau']){
                            echo '<option value="'.$rowGebruiker['niveau'].'">'.$rowGebruiker['niveau'].'</option>';
                        } else {
                            echo '<option value="">Kies een niveau</option>';
                        }?>
                        <option value="admin">admin</option>
                        <option value="medewerker">medewerker</option>
                        <option value="gebruiker">gebruiker</option>
                    </select>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="<?=$rowGebruiker['email'];?>" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Extra item 4</label>
                <input type="password" value="<?=$rowGebruiker['password'];?>" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="titel">Titel</label>
                <select name="titel" id="titel">
                    <?php if($rowGebruiker['titel']){
                        echo '<option value="'.$rowGebruiker['titel'].'">'.$rowGebruiker['titel'].'</option>';
                    } else {
                        echo '<option value="">Kies een titel</option>';
                    }?>
                    <option value="dhr.">Dhr.</option>
                    <option value="mvr.">Mvr.</option>
                    <option value="anders">anders</option>
                </select>
            </div>
            <div class="form-group">
                <label for="geslacht">Geslacht</label>
                <select name="geslacht" id="geslacht">
                    <?php if($rowGebruiker['geslacht']){
                        echo '<option value="'.$rowGebruiker['geslacht'].'">'.$rowGebruiker['geslacht'].'</option>';
                    } else {
                        echo '<option value="">Kies een geslacht</option>';
                    }?>
                    <option value="man">Man</option>
                    <option value="vrouw">Vrouw</option>
                    <option value="nonbinary">NonBinary</option>
                    <option value="anders">Anders</option>
                </select>
            </div>
            <div class="form-group">
                <label for="voorletters">Voorletters</label>
                <input type="text" value="<?=$rowGebruiker['voorletters'];?>" name="voorletters" id="voorletters">
            </div>
            <div class="form-group">
                <label for="tussenvoegsel">Tussenvoegsel</label>
                <input type="text" value="<?=$rowGebruiker['tussenvoegsel'];?>" name="tussenvoegsel" id="tussenvoegsel">
            </div>
            <div class="form-group">
                <label for="achternaam">Achternaam</label>
                <input type="text" value="<?=$rowGebruiker['achternaam'];?>" name="achternaam" id="achternaam">
            </div>
            <div class="form-group">
                <label for="adres">Adres</label>
                <input type="text" placeholder="Straat + HuisNr" value="<?=$rowGebruiker['adres'];?>" name="adres" id="adres">
            </div>
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input type="text" value="<?=$rowGebruiker['postcode'];?>" name="postcode" id="postcode">
            </div>
            <div class="form-group">
                <label for="plaats">Plaats</label>
                <input type="text" value="<?=$rowGebruiker['plaats'];?>" name="plaats" id="plaats">
            </div>
            <div class="form-group">
                <label for="telefoon">Telefoon</label>
                <input type="text" value="<?=$rowGebruiker['telefoon'];?>" name="telefoon" id="telefoon">
            </div>
            <div class="form-group">
                <label for="mobiel">Mobiel</label>
                <input type="text" value="<?=$rowGebruiker['mobiel'];?>" name="mobiel" id="mobiel">
            </div>
            <input class="btn" type="submit" value="Opslaan">
        </form>
    </div>
    <div class="right">
    </div>
</section>