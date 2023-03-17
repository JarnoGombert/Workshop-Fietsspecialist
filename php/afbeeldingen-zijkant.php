<div class="image-wrapper">
    <?php
    $afbeeldingZijkant = $mysqli->prepare("SELECT file_name FROM digifixx_images WHERE cms_id = ?");
    $afbeeldingZijkant->bind_param('i', $row['id']);
    $afbeeldingZijkant->execute();
    $afbeeldingZijkant->store_result();
    $afbeeldingZijkant->bind_result($naamImgZijkant);


    while($afbeeldingZijkant->fetch()){
            if($afbeeldingZijkant->num_rows > 0) {
            $imageURL = '../img/'.$naamImgZijkant;
        ?>
        <div class="img">
            <img src="<?php echo $imageURL; ?>" height="100%" width="100%" alt="" />
        </div>
        <?php }
    } ?>
</div>