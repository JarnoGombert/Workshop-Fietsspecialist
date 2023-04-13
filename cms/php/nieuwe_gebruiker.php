<?php
if(!$mysqli) { header ('Location:../'); }

if(isset($_POST['opslaan'])) {
    $email = $_POST['email'];
    $EmailCheck = $mysqli->query(" SELECT * FROM digifixxcms_gebruikers WHERE email = '".$email."'") or die ($mysqli->error.__LINE__);
	$rowEmail = $EmailCheck->num_rows; 
    if ($rowEmail > 0) {
        $error2 = "Deze menu titel bestaat al. Voer een unieke menu titel in.";
        $error_item1_2 = 'ja';
        $emailerror = true;
    
        if ($emailerror == true) {
            echo "
            <div class=\"alert alert-error\">
            Deze pagina bestaat al. Voer een unieke titel in.
            </div>
            ";
        };
    }
    
    if($emailerror == false) {
        $sql_insert = $mysqli->query("INSERT digifixxcms_gebruikers SET  username      = '" . $mysqli->real_escape_string($_POST['username']) . "',
                                                                    niveau          = '" . $_POST['niveau'] . "',
                                                                    email           = '" . $mysqli->real_escape_string($_POST['email']) . "',
                                                                    password        = '".$mysqli->real_escape_string($_POST['password'])."'") or die($mysqli->error.__LINE__);											
        $rowid = $mysqli->insert_id;  
        // pagina redirecten om deze te kunnen bewerken
        // ============================================
        header('Location: ?page=gebruiker_bewerken&nieuwid='.$rowid.'');
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

<section id="gebruiker-aanmaken">
    <div class="left">
        <div class="title">Gebruiker Aanmaken</div>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="username">Gebruikersnaam</label>
                <input type="text" value="" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="niveau">Niveau</label>
                <select type="text" value="" name="niveau" id="niveau">
                    <option value="">Kies een niveau</option>
                    <option value="admin">admin</option>
                    <option value="medewerker">medewerker</option>
                    <option value="gebruiker">gebruiker</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" value="" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" value="" name="password" id="password">
            </div>
            <input class="btn" type="submit" name="opslaan" value="Opslaan">
        </form>
    </div>
</section>