<?php
$sqlInstellingen = $mysqli -> prepare("SELECT id, weburl, naamwebsite FROM digifixx_settings ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlInstellingen -> bind_param('i',$footerId);
$sqlInstellingen->execute();
$sqlInstellingen->store_result();
$sqlInstellingen->bind_result($idInstellingen, $URLWebsite, $NaamWebsite);
$sqlInstellingen->fetch();
?>

<section id="instellingen">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
    <div class="instellingen-wrapper">
        <div class="settingTab">
            <strong>Naam website</strong>
            <span><?=$NaamWebsite;?></span>
        </div>
        <div class="settingTab">
            <strong>Website Url</strong>
            <span><?=$URLWebsite;?></span>
        </div>
    </div>
</section>