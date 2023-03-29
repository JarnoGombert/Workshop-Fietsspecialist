<section class="contentWinkelwagen">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
       <div class="title"><?=$row['item1'];?></div> 
        <div class="winkelwagen-Main">
            <div class="showProducts">
                <img src="<?=$url;?>Images/FietsCard.png" class="ImgWinkelwagen"/>
                <div class="winkelwagenTXT">
                Premio EVO 5 Lite Comfort
                </div>
                <div class="winkelwagenTXT">
                €3.749,00
                </div>
                <div class="winkelwagenTXT">
                    1        
                </div>
                <div class="winkelwagenTXT">
                    <a >
                        <i class="fa fa-trash-o"></i>
                    </a>
                </div>
            </div> 
            <div class="winkelwagenBetalen">
            <div class="Row1">
                <a class="winkelwagenTXT">
                    Artikelen(1)
                </a>
                <a class="winkelwagenTXT">
                    €3.749,00
                </a>
            </div>
            <div class="Row1">
                <a class="winkelwagenTXT">
                    Verzendkosten
                </a>
                <a class="winkelwagenTXT">
                    €0,00
                </a>
            </div>
            <hr/>
            <div class="Row1">
                <div class="winkelwagenTXT">
                    Totaal:
                </div>
                <div class="winkelwagenTXT">
                €3.749,00
                </div>
            </div>
            <div class="divInput">
                <a  href="<?=$url;?>betalings-methode" class="winkelwagenInput mx-auto">Betalen</a>
            </div>
            </div>
        </div>
        

    </div>

</section>