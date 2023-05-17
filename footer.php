<?php
    //menu items ophalen
    $sqlMenu = $mysqli -> prepare("SELECT id, item1, paginaurl FROM digifixxcms WHERE keuze = ? AND STATUS = 'actief' LIMIT 4") OR DIE ($mysqli->error.__LINE__);
    $keuze = "hoofdmenu";
    $sqlMenu -> bind_param('s',$keuze);
    $sqlMenu -> execute();
    $sqlMenu -> store_result();
	$sqlMenu -> bind_result($idMenu, $item1Menu, $paginaurlMenu);

    //Product Categorie items ophalen
    $sqlPCategorie = $mysqli -> prepare("SELECT id, catNaam FROM digifixx_product_cat WHERE catPopulair = 'ja'") OR DIE ($mysqli->error.__LINE__);
    $sqlPCategorie -> execute();
    $sqlPCategorie -> store_result();
	$sqlPCategorie -> bind_result($idPCategorie, $namePCategorie);


    if(isset($_POST['niewsbriefSent'])){
        $email = $_POST['mail']; // sender mail address use your own
        $shopping_insert = $mysqli->query("INSERT digifixx_nieuwsbrief SET email	= '".$email."'") or die($mysqli->error.__LINE__);	
   }
?>
<footer>    
    <div class="row1">
        <div class="ImgFooter">
            <img src="<?=$url;?>Images/Fietsspeciaal-Bakker-Logo.png" >
        </div>
        <div>
            <Span>Meesterlaan 37,
                <br/>
                7241 EJ Lochem
            </Span>
        </div>
        <div class="contactGegevens">
            T <a class="Contact" href="tel: 0575436345">0575-43 63 45</a> <br/>
            E <a class="Contact" href="mailto:info@fietsspeciaal-bakker.nl">info@fietsspeciaal-bakker.nl</a>
        </div>
    </div>
    <div class="rowHeader">
        <h2>Direct naar:</h2>
        <?php 
        while($sqlMenu->fetch()) 
        {					
            $link = $url.$paginaurlMenu;
            
        echo "
                <a href=\"{$link}\" >
                    {$item1Menu}
                </a>";
        } ?>
    </div>
    <div class="rowCategorieen">
        <h2>Populaire categorieen:</h2>
        <?php
            while($sqlPCategorie->fetch()) { 
                if(str_contains($namePCategorie, ' ')){
                    $startsplode = explode(" ", $namePCategorie);
                    $catProduct = strtolower($startsplode[0] . "_" . $startsplode[1]);
                } else {
                    $catProduct = strtolower($namePCategorie);
                }
            ?>
                <a href="<?=$url;?>producten?categorieSelect=<?=$catProduct;?>"><?=$namePCategorie;?></a>
        <?php } ?>
    </div>

</footer>

<div class="NB">
    <h1>Blijf op de hoogte met onze nieuwsbrief.</h1>
    <div>
    <form class="form-group" action="#" method="POST">
        <input type="email" id="mail" name="mail" required>
        <input type="submit" class="btn" name="niewsbriefSent" value="Aanmelden">
    </form>
    </div>
</div>

<div class="footerEnd">
    <span class="FooterEndContactLeft" >
        © 2023, Fietsspeciaal Bakker
    </span>
    <span class="FooterEndContactRight">
        <a>Made by Digifixx</a>
        <img src="<?=$url;?>Images/DigifixxLogo.png" style="width: 60px; height: 30px;">
    </span>  
</div>
