<?php
$orderID = $_GET['bestellingId'];
$user_id = $_SESSION['user_id'];

if(isset($_GET['verwijderItemID'])){
    $item_verwijder_id = $_GET['verwijderItemID'];

    $shopping_delete = $mysqli->query("DELETE FROM orders WHERE user_id = '".$mysqli->real_escape_string($user_id)."' AND order_id = '".$orderID."'") or die($mysqli->error.__LINE__);	

    header("Location: ".$url."winkelwagen");
    exit;
} else {
    $sqlOrderWijzig = $mysqli -> prepare("SELECT products, payment_method, total_price status FROM orders WHERE user_id = ? AND order_id = ? ORDER BY created_at DESC") or die ($mysqli->error.__LINE__);
    $sqlOrderWijzig -> bind_param('ii',$user_id, $orderID);
    $sqlOrderWijzig->execute();
    $sqlOrderWijzig->store_result();
    $sqlOrderWijzig->bind_result($productsOrder, $MethodOrder, $Total_Price_Order);  
}


?>

<section id="bestelling">
    <div class="title">Bestelling wijzigen</div>
    <div class="orders">
        <?php 
        while($sqlOrderWijzig->fetch()){ ?>
            <div id="orderTab">
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
                        <div><a id="item-verwijderen" href="?page=bestelling-wijzigen&bestellingId=<?=$orderID;?>&verwijderItemID=<?=$fietsID;?>"><i class="fa fa-trash-o"></i></a></div>
                    </div>
                <?php }
                }
                ?>

                <div class="order-details">
                    <div><strong>Betaal Methode: </strong><?=ucfirst($MethodOrder);?></div>
                    <div><strong>Totale Prijs: </strong>€ <?=$Total_Price_Order;?>,-</div>
                    <div></div>
                    <a id="bestelling-wijzigen" class="btn" href="?page=bestelling-wijzigen&bestellingId=<?=$idOrder;?>">Opslaan</a>
                </div>
            </div>
        <?php 
        } ?>
    </div>
</section>