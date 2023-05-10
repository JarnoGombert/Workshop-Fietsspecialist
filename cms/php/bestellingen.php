<?php
$user_id = $_SESSION['user_id'];
$sqlOrder = $mysqli -> prepare("SELECT order_id, products, payment_method, total_price status FROM orders WHERE user_id = ? ORDER BY created_at DESC") or die ($mysqli->error.__LINE__);
$sqlOrder -> bind_param('i',$user_id);
$sqlOrder->execute();
$sqlOrder->store_result();
$sqlOrder->bind_result($idOrder, $productsOrder, $MethodOrder, $Total_Price_Order);
?>

<section id="bestelling">
    <div class="title">Mijn bestellingen</div>
    <div class="orders">
        <?php 
        $orderCount = 1;
        while($sqlOrder->fetch()){ ?>
            <div id="orderTab">
                <h2>Order: <?=$orderCount;?></h2>
                <?php
                $producten = json_decode($productsOrder);
                for($i = 0; $i < count($producten); $i++){
                    $productID = $producten[$i];
                    $orderFietsen = $mysqli -> prepare("SELECT id, naam, model, merk, prijs_korting, prijs, status FROM digifixx_producten WHERE id = ?") or die ($mysqli->error.__LINE__);
                    $orderFietsen->bind_param('i',$productID);
                    $orderFietsen->execute();
                    $orderFietsen->store_result();
                    $orderFietsen->bind_result($fietsID, $naamFiets, $modelFiets, $merkFiets, $prijsKFiets, $prijsFiets, $statusFiets);
                    while($orderFietsen->fetch()){ 
                    $FietsIMG = $mysqli->query("SELECT * FROM digifixx_images WHERE product_id = ".$fietsID."");
                    $rowIMG = $FietsIMG->fetch_assoc();
                    if($FietsIMG->num_rows > 0)
                    {
                        $imageURL = '../img/'.$rowIMG["file_name"];
                    }else
                    {
                        $imageURL = '../img/noimg.jpg';
                    }
                    ?>
                    <div class="bestelling-fiets">
                        <div>item: <?=$i + 1;?></div>
                        <img src="<?=$imageURL;?>" alt="">
                        <div><?=$merkFiets;?><?=$modelFiets;?><?=$naamFiets;?></div>
                        <div>
                            <?php if($prijsKFiets != "0"){?>
                                    <small class="PrijsPproduct">€ <?=$prijsFiets;?></small><br/>
                                    <span>Prijs: € <?=$prijsKFiets;?></span>
                            <?php } else { ?>
                                <span>Prijs: € <?=$prijsFiets;?></span>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
                }
                ?>

                <div class="order-details">
                    <div><strong>Betaal Methode: </strong><?=ucfirst($MethodOrder);?></div>
                    <div><strong>Totale Prijs: </strong>€ <?=$Total_Price_Order;?>,-</div>
                    <div></div>
                    <a id="bestelling-wijzigen" href=""><i class="fa fa-edit"></i></a>
                </div>
            </div>
        <?php 
        $orderCount++;
        } ?>
    </div>
</section>