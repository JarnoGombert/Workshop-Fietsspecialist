<section class="contentWinkelwagen">
    <div class="container mx-auto">
        <?php include 'php/breadcrumbs.php'; ?>
       <div class="title"><?=$row['item1'];?></div> 
       <?php
            // Get the user ID from the session
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
            }

            // Query the database for the shopping bag items
            $stmt = $mysqli->prepare("SELECT * FROM shopping_bag WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

       ?>
       <?php if($result->num_rows != 0) { ?>
            <div class="winkelwagen-Main">
                <div class="producten-show">
                    <div class="producten-aanduiding">
                        <div class="afbeelding"><strong>Afbeelding</strong></div>
                        <div class="titel"><strong>Naam Product</strong></div>
                        <div class="prijs"><strong>Prijs</strong></div>
                        <div><strong>Aantal</strong></div>
                        <div><strong>Verwijder</strong></div>
                    </div>
                    <?php  while ($row = $result->fetch_assoc()) {

                        $products = $mysqli->prepare("SELECT * FROM digifixx_producten WHERE id = ?");
                        $products->bind_param("i", $row['product_id']);
                        $products->execute();
                        $producten = $products->get_result();
                        $rowProducten = $producten->fetch_assoc();

                        $queryIMG = $mysqli->query("SELECT * FROM digifixx_images WHERE product_id = ".$rowProducten['id']."");
                        $rowIMG = $queryIMG->fetch_assoc();
                        if($queryIMG->num_rows > 0)
                        {
                            $imageURL = '../img/'.$rowIMG["file_name"];
                        }else
                        {
                            $imageURL = '../img/noimg.jpg';
                        }
                    ?>
                    <div id="showProducts" class="showProducts">
                        <div class="ImgWinkelwagen">
                            <img src="<?php echo $imageURL; ?>"/>
                        </div>
                        <div id="title" class="winkelwagenTXT title"><?=$rowProducten['merk'];?> <?=$rowProducten['model'];?> <?=$rowProducten['naam'];?></div>
                        <div class="winkelwagenTXT totaalPrijs">
                            <div class="TxtCard prijs">
                                <?php if($rowProducten['prijs_korting'] != "0"){?>
                                        <span>€ <span id="totalPrice"><?=$rowProducten['prijs_korting'];?></span></span>
                                        <span class="PrijsPproduct">€ <?=$rowProducten['prijs'];?></span>
                                <?php } else { ?>
                                    <span>€ <span id="totalPrice"><?=$rowProducten['prijs'];?></span></span>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- <div id="quantity" class="winkelwagenTXT"><?//=$row['quantity'];?></div> -->
                        <input type="number" class="winkelwagenTXT" name="quantity" id="quantity" value="<?=$row['quantity'];?>">
                        <div class="winkelwagenTXT">
                            <a id="deleteID" href="<?=$url;?>wijzig-winkelwagen?deleteID=<?=$rowProducten['id'];?>">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </div> 
                    <?php } ?>
                    <div><a href="" class="btn">Update winkelmand</a></div>
                </div>
                    <div class="winkelwagenBetalen">
                        <div class="Row1">
                            <a class="winkelwagenTXT">Artikelen(<?=$result->num_rows;?>)</a>
                            <a class="winkelwagenTXT">€ <span id="TotalAlleProducten"></span></a>
                        </div>
                        <div class="Row1">
                            <a class="winkelwagenTXT">
                                Verzendkosten
                            </a>
                            <a class="winkelwagenTXT">
                                € <span id="verzendkosten"></span>
                            </a>
                        </div>
                        <hr/>
                        <div class="Row1">
                            <div class="winkelwagenTXT">
                                Totaal:
                            </div>
                            <div class="winkelwagenTXT">
                            € <span id="TotalWinkelmand"></span>
                            </div>
                        </div>
                        <div class="divInput">
                            <a  href="<?=$url;?>betalings-methode" class="winkelwagenInput mx-auto">Betalen</a>
                        </div>
                    </div>
            </div>
        <?php } else {?>
            <div class="lege-winkelmand">
                <p>Je hebt geen product(en) in je winkelwagen.</p>
                <p>Klik <a href="<?=$url;?>producten">hier</a> om verder te gaan met winkelen.</p>
                <p>Heb je nog geen account? Maak die dan <a href="<?=$url;?>inloggen">hier</a> aan.</p>
            </div>
        <?php } ?>
    </div>
</section>