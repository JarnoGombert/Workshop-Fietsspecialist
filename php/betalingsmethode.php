<?php
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['payment-method'])){
        if(isset($_GET['totaalbedrag'])){
            $totaalBedrag = $_GET['totaalbedrag'];
        } else {
            $totaalBedrag = 0.00;
        }
        $payment_method = $_POST['payment-method'];
        $dataCheck = false;

        if($payment_method == "creditcard"){
            if(isset($_POST['card-number']) || isset($_POST['card-holder-name']) || isset($_POST['expiry-date']) || isset($_POST['cvv'])){
                $card_number = $_POST['card-number'];
                $card_holder_name = $_POST['card-holder-name'];
                $expiry_date = $_POST['expiry-date'];
                $cvv = $_POST['cvv'];
                $btc_address = "";
                $selected_bank = "";
                $rekening_number = "";
                $dataCheck = true;
            } else {
                $dataCheck = false;
                $card_number = "";
                $card_holder_name = "";
                $expiry_date = "";
                $cvv = "";
            }
        } else if($payment_method == "bitcoin") {
            if(isset($_POST['btc-address'])){
                $btc_address = $_POST['btc-address'];
                $card_number = "";
                $card_holder_name = "";
                $expiry_date = "";
                $cvv = "";
                $selected_bank = "";
                $rekening_number = "";
                $dataCheck = true;
            } else {
                $dataCheck = false;
                $btc_address = "";
            }
        } else if($payment_method == "ideal"){
            if(isset($_POST['KiesUwBank']) || isset($_POST['rekening-number'])){
                $selected_bank = $_POST['KiesUwBank'];
                $rekening_number = $_POST['rekening-number'];
                $card_number = "";
                $card_holder_name = "";
                $expiry_date = "";
                $cvv = "";
                $btc_address = "";
                $dataCheck = true;
            } else {
                $dataCheck = false;
                $selected_bank = "";
                $rekening_number = "";
            }
        }

        if($dataCheck == true){
            $winkelmandProducts = $mysqli -> prepare("SELECT product_id FROM shopping_bag WHERE user_id = ?") OR DIE ($mysqli->error.__LINE__);
            $winkelmandProducts -> bind_param('i',$user_id);
            $winkelmandProducts -> execute();
            $winkelmandProducts -> store_result();
            $winkelmandProducts -> bind_result($productID);

            $product_ids = array();
            $counterArray = 0;
            while($winkelmandProducts->fetch()){
                $product_ids[$counterArray] = $productID;
                $counterArray++;
            }
            $Allproducts = json_encode($product_ids);

            $shopping_make_order = $mysqli->query("INSERT orders SET user_id = '".$mysqli->real_escape_string($user_id)."',
                                                                        products 	= '".$Allproducts."',
                                                                        payment_method	= '".$payment_method."',
                                                                        card_number	= '".$card_number."',
                                                                        card_holder_name	= '".$card_holder_name."',
                                                                        expiry_date	= '".$expiry_date."',
                                                                        cvv	= '".$cvv."',
                                                                        btc_address	= '".$btc_address."',
                                                                        selected_bank	= '".$selected_bank."',
                                                                        rekening_number	= '".$rekening_number."',
                                                                        total_price	= '".$totaalBedrag."'") or die($mysqli->error.__LINE__);	

            $betaling_voltooid = $mysqli->query("DELETE FROM `shopping_bag` WHERE user_id = ".$mysqli->real_escape_string($user_id)."") or die($mysqli->error.__LINE__);
        
            header("Location: ".$url."betaling-voltooid");
            exit; 
        } else {
            echo '<p>Probeer opnieuw</p>';
        }
    }
   
?>

<div class="betaalmethode-main">
    <form action="#" method="post">
        <label for="payment-method">Selecteer betaalmethode:</label>
        <select id="payment-method" name="payment-method">
            <option value="">&#xf245; Selecteer</option>
            <option value="creditcard"><span>&#xf09d;</span> Credit Card</option>
            <option value="bitcoin"><span>&#xf15a;</span> Bitcoin</option>
            <option value="ideal"><span>&#xf0d6;</span> iDeal</option>
        </select>

        <div id="creditcard-form" style="visibility:hidden;height:0;">
            <!-- Credit card form fields -->
            <input type="text" name="card-number" placeholder="kaart nummer">
            <input type="text" name="card-holder-name" placeholder="kaart houder naam">
            <input type="text" name="expiry-date" placeholder="afloop datum">
            <input type="text" name="cvv" placeholder="CVV">
        </div>

        <div id="bitcoin-form" style="visibility:hidden;height:0;">
            <!-- Bitcoin form fields -->
            <input type="text" name="btc-address" placeholder="Bitcoin adres">
        </div>

        <div id="ideal-form" style="visibility:hidden; height:0;">
            <!-- iDeal form fields -->
            <select id="Select-bank" name="KiesUwBank">
                <option value="abn amro">ABN AMRO</option>
                <option value="asn bank">ASN Bank</option>
                <option value="deutsche bank">Deutsche Bank</option>
                <option value="friesland bank">Friesland Bank</option>
                <option value="ing">ING</option>
                <option value="rabobank">Rabobank</option>
                <option value="rbs">RBS</option>
                <option value="sns bank">SNS Bank</option>
                <option value="triodos bank">Triodos Bank</option>
                <option value="van lanshot bankier">Van Lanshot Bankier</option>
            </select>
            <input type="text" name="rekening-number" placeholder="Rekening nummer">
        </div>
        <input class="divInput" type="submit" name="betalen" value="betalen">
    </form>
</div>

<script>
    const paymentMethod = document.getElementById("payment-method");
    const creditcardForm = document.getElementById("creditcard-form");
    const bitcoinForm = document.getElementById("bitcoin-form");
    const idealForm = document.getElementById("ideal-form");

    paymentMethod.addEventListener("change", function() {
        // Hide all forms
        // creditcardForm.style.display = "none";
        // bitcoinForm.style.display = "none";
        // idealForm.style.display = "none";

        // // Show the selected form
        // const selectedValue = paymentMethod.value;
        // if (selectedValue === "creditcard") {
        //     creditcardForm.style.display = "block";
        // } else if (selectedValue === "bitcoin") {
        //     bitcoinForm.style.display = "block";
        // } else if (selectedValue === "ideal") {
        //     idealForm.style.display = "block";
        // }

        creditcardForm.style.visibility = "hidden";
        creditcardForm.style.height = "0";
        bitcoinForm.style.visibility = "hidden";
        bitcoinForm.style.height = "0";
        idealForm.style.visibility = "hidden";
        idealForm.style.height = "0";

        // Show the selected form
        const selectedValue = paymentMethod.value;
        if (selectedValue === "creditcard") {
            creditcardForm.style.visibility = "visible";
            creditcardForm.style.height = "auto";
        } else if (selectedValue === "bitcoin") {
            bitcoinForm.style.visibility = "visible";
            bitcoinForm.style.height = "auto";
        } else if (selectedValue === "ideal") {
            idealForm.style.visibility = "visible";
            idealForm.style.height = "auto";
        }
    });
</script>