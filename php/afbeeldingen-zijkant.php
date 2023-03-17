<div class="image-wrapper">
    <?php
    $query = $mysqli->query("SELECT * FROM digifixx_images WHERE cms_id = ".$row['id']."");
        while($row = $query->fetch_assoc()){
            $imageURL = '../img/'.$row["file_name"];
        ?>
        <div class="img">
            <img src="<?php echo $imageURL; ?>" height="100%" width="100%" alt="" />
        </div>
    <?php } ?>
</div>