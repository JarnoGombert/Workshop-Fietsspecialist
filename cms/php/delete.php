<?php
$sqlDelete = $mysqli->prepare("SELECT cms_id, file_name, uploaded_on FROM digifixx_images") or die ($mysqli->error.__LINE__);
$sqlDelete->execute();
$sqlDelete->store_result();
$sqlDelete->bind_result($idDelete, $fileDelete, $dateDelete);
$sqlDelete->fetch();
$imageURL = '/img/'.$fileDelete;
if(isset($_POST['verwijderen']) == "ja"){
    $insert = $mysqli->query("DELETE FROM digifixx_images WHERE cms_id = ".$_GET['id']."");
    // Execute the query
    header($urlCMS . "/maincms.php?page=pagina_bewerken&id=".$_GET['id']);
    exit;
} else {
    header($urlCMS . "/maincms.php?page=pagina_bewerken&id=".$_GET['id']);
    exit;
}
?>
<div>
    <form action="" method="post">
        <div class="deleteIMG">
            <img src="<?=$url;?><?=$imageURL;?>" alt="">
        </div>
        <div class="form-group">
            <label for="">Wil je deze afbeelding echt verwijderen?</label>
            <select name="verwijderen" id="verwijderen">
                <option value="ja">Ja</option>
                <option value="nee">Nee</option>
            </select>
        </div>
        <input type="submit" class="btn" value="Verwijderen">
    </form>
</div>