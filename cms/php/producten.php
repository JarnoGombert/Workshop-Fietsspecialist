<?php
$sqlProducten = $mysqli -> prepare("SELECT id, naam, model, merk, prijs, prijs_korting, kleur, frameMaat, extras, paginaurl, status FROM digifixx_producten ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlProducten -> bind_param('i',$footerId);
$sqlProducten->execute();
$sqlProducten->store_result();
$sqlProducten->bind_result($idProducten, $titelProducten, $modelProducten, $merkProducten, $prijsProducten, $prijsKProducten, $kleurProducten, $frameMaatProducten, $extraProducten, $urlProducten, $statusProducten);
?>

<section id="producten">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
    <div id="producten-wrapper">
        <div class="product">
            <div class="pageIMG">Image</div>
            <div class="pageTITLE">Product</div>
            <div class="pageCAT">Model</div>
            <div class="pageMERK">Merk</div>
            <div class="pageURL">Pagina Link</div>
            <div class="pageSTATUS">Status</div>
            <div class="pageEDIT">Edit pagina</div>
        </div>
        <?php
            while($sqlProducten->fetch()){
                $query = $mysqli->query("SELECT * FROM digifixx_images WHERE product_id = ".$idProducten." LIMIT 1");
                ?>
                <div class="product">
                    <div class="pageIMG">
                       <?php if($query->num_rows > 0){
                            while($row = $query->fetch_assoc()){
                                $imageURL = '../img/'.$row["file_name"];
                        ?>
                            <img src="<?php echo $imageURL; ?>" height="100%" width="100%" alt="" />
                        <?php }
                        }else{ ?>
                            <img src="<?=$urlCMS;?>/images/noimg.jpg" height="100%" width="100%" alt="" />
                        <?php } ?> 
                    </div>
                    <div class="pageTITLE"><?=$titelProducten;?></div>
                    <div class="pageCAT"><?=$modelProducten;?></div>
                    <div class="pageMERK"><?=$merkProducten;?></div>
                    <div class="pageURL"><?=$urlProducten;?></div>
                    <div class="pageSTATUS"><?=$statusProducten;?></div>
                    <div class="pageEDIT"><a href="?page=product_bewerken&id=<?=$idProducten;?>"><i class="fa fa-edit"></i></a></div>
                </div>
                
        <?php } ?>
    </div>
</section>