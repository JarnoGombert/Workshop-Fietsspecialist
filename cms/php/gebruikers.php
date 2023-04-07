<?php
$sqlGebruikers = $mysqli -> prepare("SELECT id, username, voorletters, achternaam, niveau, email FROM digifixxcms_gebruikers ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlGebruikers -> bind_param('i',$footerId);
$sqlGebruikers->execute();
$sqlGebruikers->store_result();
$sqlGebruikers->bind_result($idGebruikers, $usernameGebruikers, $voorLettersGebruikers, $achternaamGebruikers, $niveauGebruikers, $emailGebruikers);
?>

<section id="gebruikers">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
    <div class="gebruikers-wrapper">
        <div class="gebruikerTab">
            <div class="icon"><i class="fa fa-info"></i></div>
            <div><strong>Naam</strong></div>
            <div><strong>Niveau</strong></div>
            <div><strong>Emailadres</strong></div>
            <div><strong>Bewerken</strong></div>
        </div>
        <?php while($sqlGebruikers->fetch()){ 
        if(empty($voorLettersGebruikers) && empty($achternaamGebruikers)){
            $naam = $usernameGebruikers;
        } else {
            $naam = $voorLettersGebruikers . " " . $achternaamGebruikers;
        }
        ?>
        <div class="gebruikerTab">
            <div class="icon user"></div>
            <div><?=$naam;?></div>
            <div><?=$niveauGebruikers;?></div>
            <div><?=$emailGebruikers;?></div>
            <div class="edit-buttons"><a href=""><i class="fa fa-edit"></i></a><a href=""><i class="fa fa-trash"></i></a></div>
        </div>
        <?php } ?>
    </div>
</section>