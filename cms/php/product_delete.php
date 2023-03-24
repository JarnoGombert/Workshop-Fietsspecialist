<?php
$sqlDelete = $mysqli->prepare("SELECT product_id, file_name, uploaded_on FROM digifixx_images WHERE product_id = ?") or die ($mysqli->error.__LINE__);
$deleteProductIMG = $_GET['id'];
$sqlDelete->bind_param('i', $deleteProductIMG);
$sqlDelete->execute();
$sqlDelete->store_result();
$sqlDelete->bind_result($idDelete, $fileDelete, $dateDelete);
$sqlDelete->fetch();
$imageURL = '/img/'.$fileDelete;
if(isset($_POST['verwijderen']) == "ja"){
    $insert = $mysqli->query("DELETE FROM digifixx_images WHERE product_id = ".$_GET['id']."");
    // Execute the query
    header("location:javascript://history.go(-1)");
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