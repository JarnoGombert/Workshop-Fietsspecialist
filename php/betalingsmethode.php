<?php
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['payment-method'])){
        $payment_method = $_POST['payment-method'];
        $totaalBedrag = $_GET['totaalbedrag'];

        switch ($payment_method) {
            case 'creditcard':
                $card_number = $_POST['card-number'];
                $card_holder_name = $_POST['card-holder-name'];
                $expiry_date = $_POST['expiry-date'];
                $cvv = $_POST['cvv'];
                break;
            case 'bitcoin':
                $btc_address = $_POST['btc-address'];
                break;
            case 'ideal':
                $selected_bank = $_POST['KiesUwBank'];
                $rekening_number = $_POST['rekening-number'];
                break;
                print_r('ideal Test');
        }

        $winkelmandProducts = $mysqli->prepare("SELECT product_id FROM shopping_bag WHERE user_id = ".$mysqli->real_escape_string($user_id)."");
        $winkelmandProducts->execute();

        foreach ($winkelmandProducts as $items) {
            $product_ids[] = $items["product_id"];
        }
        $Allproducts = json_encode($product_ids);

        print_r($Allproducts);

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

        //$betaling_voltooid = $mysqli->query("DELETE FROM `shopping_bag` WHERE user_id = ".$mysqli->real_escape_string($user_id)."") or die($mysqli->error.__LINE__);
    
        header("Location: ".$url."betaling-voltooid");
        exit; 
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

        <div id="creditcard-form">
            <!-- Credit card form fields -->
            <input type="text" name="card-number" placeholder="kaart nummer" required>
            <input type="text" name="card-holder-name" placeholder="kaart houder naam" required>
            <input type="text" name="expiry-date" placeholder="afloop datum" required>
            <input type="text" name="cvv" placeholder="CVV">
        </div>

        <div id="bitcoin-form" style="display:none;">
            <!-- Bitcoin form fields -->
            <input type="text" name="btc-address" placeholder="Bitcoin adres" required>
        </div>

        <div id="ideal-form" style="display:none;">
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
            <input type="text" name="rekening-number" placeholder="Rekening nummer" required>
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
        creditcardForm.style.display = "none";
        bitcoinForm.style.display = "none";
        idealForm.style.display = "none";

        // Show the selected form
        const selectedValue = paymentMethod.value;
        if (selectedValue === "creditcard") {
            creditcardForm.style.display = "block";
        } else if (selectedValue === "bitcoin") {
            bitcoinForm.style.display = "block";
        } else if (selectedValue === "ideal") {
            idealForm.style.display = "block";
        }
    });
</script>