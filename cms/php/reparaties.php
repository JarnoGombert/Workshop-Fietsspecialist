<?php
$user_id = $_SESSION['user_id'];
$sqlOrder = $mysqli -> prepare("SELECT order_id, products status FROM orders WHERE user_id = ? ORDER BY created_at DESC") or die ($mysqli->error.__LINE__);
$sqlOrder -> bind_param('i',$user_id);
$sqlOrder->execute();
$sqlOrder->store_result();
$sqlOrder->bind_result($orderId, $orderProducts);

if ($_GET['repareerFiets']) {
    $fietsId = $_GET['repareerFiets'];
    $mysqli->query("INSERT INTO repairs ('user_id, product_id, status') VALUES ($user_id,$fietsId,'Waiting to be repaired')");
    echo "INSERT INTO repairs ('user_id, product_id, status') VALUES ($user_id,$fietsId,'Waiting to be repaired')";
    
    // $shopping_insert = $mysqli->query("INSERT shopping_bag SET user_id = '".$mysqli->real_escape_string($user_id)."',
    // product_id 	= '".$product_id."',
    // quantity	= '".$quantity."'") or die($mysqli->error.__LINE__);
}
?>

<h1>Voeg een reparatie toe</h1>
<form method="get">
    <input type="hidden" name="page" value="reparaties">
    <select name="repareerFiets">
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
    <input type="submit" value="Repareer!">
</form>
<h1>Huidige reparaties</h1>
<?php
$repairs = $mysqli -> prepare("SELECT product_id, status FROM repairs WHERE user_id = ?") or die ($mysqli->error.__LINE__);
$repairs->bind_param('i',$user_id);
$repairs->execute();
$repairs->store_result();
$repairs->bind_result($fietsId, $status);
while($repairs->fetch()) { ?>
    <h2><?=$fietsId;?> <?=$status?></h2>
<?php
}
?>