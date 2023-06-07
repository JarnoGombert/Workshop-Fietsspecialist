<?php
$user_id = $_SESSION['user_id'];
$sqlOrder = $mysqli -> prepare("SELECT order_id, products status FROM orders WHERE user_id = ? ORDER BY created_at DESC") or die ($mysqli->error.__LINE__);
$sqlOrder -> bind_param('i',$user_id);
$sqlOrder->execute();
$sqlOrder->store_result();
$sqlOrder->bind_result($orderId, $orderProducts);

if (isset($_GET['repareerFiets'])) {
    $fietsId = $_GET['repareerFiets'];
    $mysqli->query("INSERT repairs SET user_id = $user_id, product_id = $fietsId, status = 'Waiting to be repaired'");
}
if($rowUser['niveau'] != "admin") {
?>
    <h1>Voeg een reparatie toe</h1>
    <form method="get">
        <input type="hidden" name="page" value="reparaties">
        <select id="reparatie-select" name="repareerFiets">
        <?php while($sqlOrder->fetch()) { ?>
            <?php
                $producten = json_decode($orderProducts);
                for($i = 0; $i < count($producten); $i++) {
                    $orderFietsen = $mysqli -> prepare("SELECT naam, model, merk FROM digifixx_producten WHERE id = ?") or die ($mysqli->error.__LINE__);
                    $orderFietsen->bind_param('i',$producten[$i]);
                    $orderFietsen->execute();
                    $orderFietsen->store_result();
                    $orderFietsen->bind_result($naamFiets, $modelFiets, $merkFiets);
                    $orderFietsen->fetch();
                    ?>
                    <option value="<?=$producten[$i];?>"><?=$merkFiets;?><?=$modelFiets;?><?=$naamFiets;?></option>
                    <?php
                }
            ?>
        <?php } ?>
        </select>
        <input type="submit" class="btn" value="Repareer!">
    </form>
    <h1>Huidige reparaties</h1>
    <?php
    $repairs = $mysqli -> prepare("SELECT product_id, status FROM repairs WHERE user_id = ?") or die ($mysqli->error.__LINE__);
    $repairs->bind_param('i',$user_id);
    $repairs->execute();
    $repairs->store_result();
    $repairs->bind_result($fietsId, $status);
    while($repairs->fetch()) {
        $orderFietsen = $mysqli -> prepare("SELECT id, naam, model, merk, prijs_korting, prijs, status FROM digifixx_producten WHERE id = ?") or die ($mysqli->error.__LINE__);
        $orderFietsen->bind_param('i',$fietsId);
        $orderFietsen->execute();
        $orderFietsen->store_result();
        $orderFietsen->bind_result($fietsID, $naamFiets, $modelFiets, $merkFiets, $prijsKFiets, $prijsFiets, $statusFiets);
        $orderFietsen->fetch(); 
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
        
        <div class="fietsRepairs">
            
            <?=$naamFiets?> <img src="<?=$imageURL?>">
        </div>
    <?php
    } ?>
<?php } ?>


<?php
if($rowUser['niveau'] == "admin") { ?>
    <h1 class="title">Reparatie overzicht</h1>
    <section id="reparatie-overzicht">
        <div class="header">
            <div class="counter">Nr.</div>
            <div id="naam">Fiets naam</div>
            <p>Status</p>
        </div>
        <?php
            $repairsOverzicht = $mysqli -> prepare("SELECT product_id, status FROM repairs") or die ($mysqli->error.__LINE__);
            $repairsOverzicht->execute();
            $repairsOverzicht->store_result();
            $repairsOverzicht->bind_result($fietsOverzichtId, $status);
            $tabCounter = 1;
            while($repairsOverzicht->fetch()) { 
            $FietsOverzicht = $mysqli->query("SELECT * FROM digifixx_producten WHERE id = ".$fietsOverzichtId."");
            $rowOverzicht = $FietsOverzicht->fetch_assoc();

            $FietsOverzichtIMG = $mysqli->query("SELECT * FROM digifixx_images WHERE product_id = ".$fietsOverzichtId."");
            $rowOverzichtIMG = $FietsOverzichtIMG->fetch_assoc();
            if($FietsOverzichtIMG->num_rows > 0)
            {
                $imageURL = '../img/'.$rowOverzichtIMG["file_name"];
            }else
            {
                $imageURL = '../img/noimg.jpg';
            }    
            ?>
                <div class="reparatie-tab">
                    <div class="inner">
                        <div class="counter">
                            <?=$tabCounter;?>
                        </div>
                        <div id="naam">
                        <?=$rowOverzicht['merk'];?>
                            <?=$rowOverzicht['model'];?>
                            <?=$rowOverzicht['naam'];?>  
                        </div>
                        <p><?=$status;?></p>
                        <a href="" class="btn"><i class="fa fa-save"></i></a>
                    </div>
                </div>
        <?php
        $tabCounter++; 
        } ?>
    </section>
<?php } ?>