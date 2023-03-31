<div class="betaalmethode-main">
    <label for="payment-method">Selecteer betaalmethode:</label>
    <select id="payment-method" name="payment-method">
        <option value="">&#xf245; Selecteer</option>
        <option value="creditcard"><span>&#xf09d;</span> Credit Card</option>
        <option value="bitcoin"><span>&#xf15a;</span> Bitcoin</option>
        <option value="ideal"><span>&#xf0d6;</span> iDeal</option>
    </select>

    <form id="creditcard-form" action="<?=$url;?>betaling-voltooid" method="post">
        <!-- Credit card form fields -->
        <input type="text" name="card-number" placeholder="kaart nummer" required>
        <input type="text" name="card-holder-name" placeholder="kaart houder naam" required>
        <input type="text" name="expiry-date" placeholder="afloop datum" required>
        <input type="text" name="cvv" placeholder="CVV">
        <input class="divInput" type="submit" value="betalen" href="<?=$url;?>betaling-voltooid">
    </form>

    <form id="bitcoin-form" style="display:none;" action="<?=$url;?>betaling-voltooid" method="post">
        <!-- Bitcoin form fields -->
        <input type="text" name="btc-address" placeholder="Bitcoin adres" required>
        <input type="submit"  href="<?=$url;?>betaling-voltooid" class="winkelwagenInput mx-auto">Betalen</a>
        <input class="divInput" type="submit" value="betalen" href="<?=$url;?>betaling-voltooid">
    </form>

    <form id="ideal-form" style="display:none;" action="<?=$url;?>betaling-voltooid" method="post">
        <!-- iDeal form fields -->
        <input type="text" name="bank-name" placeholder="Bank naam" required>
        <input type="text" name="account-number" placeholder="Acount nummer" required>
        <input class="divInput" type="submit" value="betalen" href="<?=$url;?>betaling-voltooid">
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