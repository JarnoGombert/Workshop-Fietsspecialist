<?php
$sqlWebpaginas = $mysqli -> prepare("SELECT id, item1, keuze, paginaurl, status FROM digifixxcms ORDER BY id DESC") or die ($mysqli->error.__LINE__);
//$sqlWebpaginas -> bind_param('i',$footerId);
$sqlWebpaginas->execute();
$sqlWebpaginas->store_result();
$sqlWebpaginas->bind_result($idWebpaginas, $titelWebpaginas, $catWebpaginas, $urlWebpaginas, $statusWebpaginas);
?>

<section id="webpaginas">
    <div class="title"><?=ucfirst($_GET['page']);?></div>
    <div class="webpaginaTitels">
        <div class="pageIMG">Image</div>
        <div class="pageTITLE">Pagina Titel</div>
        <div class="pageCAT">Categorie</div>
        <div class="pageURL">Pagina Link</div>
        <div class="pageSTATUS">Status</div>
        <div class="pageEDIT">Edit pagina</div>
    </div>
    <div id="webpaginas-wrapper">
        <?php
            while($sqlWebpaginas->fetch()){
                $query = $mysqli->query("SELECT * FROM digifixx_images WHERE cms_id = ".$idWebpaginas." LIMIT 1");
                ?>
                <div class="webpagina">
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
                    <div class="pageTITLE"><?=$titelWebpaginas;?></div>
                    <div class="pageCAT"><?=$catWebpaginas;?></div>
                    <div class="pageURL"><?=$urlWebpaginas;?></div>
                    <div class="pageSTATUS"><?=$statusWebpaginas;?></div>
                    <div class="pageEDIT"><a href="?page=pagina_bewerken&id=<?=$idWebpaginas;?>"><i class="fa fa-edit"></i></a></div>
                </div>
                
        <?php } ?>
    </div>
</section>