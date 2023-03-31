<?php
// Set the SMTP server and port number
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_server', 'smtp.gmail.com');
ini_set('smtp_port', 587);

// Enable encryption
ini_set('smtp_crypto', 'tls');

if(isset($_POST['versturen'])){
     $name = $_POST['name'];
     $subject = $_POST['onderwerp'];
     $message = $_POST['bericht'];
     $datum = $_POST['date'];
     $tijd = $_POST['time'];
     $email = $_POST['mail']; // sender mail address use your own

     // Recipient email address
     $to_email = 'j.gombert2005@gmail.com';
     
     $body = "Gewenste afspraak datum en tijd: ".$datum." - ".$tijd."\n\r ".$message;

     // Create email headers
     $headers = 'From: '. $name .' - '. $email . "\r\n" .
     'Reply-To: '. $email . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
     
     // Sending email
     if(mail($to_email, $subject, $body, $headers)){
         echo '<p class="success">Uw email is met success verstuurd!</p>';
     } else if($subject == "" && $message == "" && $email == ""){
         echo '<p class="error">We hebben uw mail niet kunnen versturen. Probeer het opnieuw.</p>';
     }
}
?>
<div id="contact" class="container mx-auto contact">
    <div class="Rectagnle-Contact">
        <div class="Rectagnle">
                <img src="../Images/Call-Logo.png" alt="" style=" width: 150px; height: 150px; text-align: center; margin-top: 10px">

            <div class="BigTXT">
                Bel ons<br/><br/>
            </div>
            <div class="SmallTXT">
                Telefonische Ondersteuning <br/> is beschikbaar van 9 tot 5. <br/> Bel ons gerust!
            </div>
        </div>
        <div class="Rectagnle">
                <img src="../Images/Mail-Logo.png" alt="" style=" width: 150px; height: 150px; text-align: center; margin-top: 10px">
            <div class="BigTXT">
                E-mail ons<br/><br/>
            </div>
            <div class="SmallTXT">
                Voor algemene vragen <br/> kunt u via e-mail contact <br/> met ons opnemen
            </div>
        </div>
        <div class="Rectagnle">
                    <img src="../Images/Locatie-Logo.png" alt="" style=" width: 150px; height: 150px; text-align: center; margin-top: 10px">
                <div class="BigTXT">
                    Bezoek ons<br/><br/>
                </div>
                <div class="SmallTXT">
                    Meesterlaan 37, <br/> 7241 EJ Lochem <br/> 
                </div>
            </div>
    </div>
    <div class="Afspraak-Main">
        <div class="Rectagnle">
            <div>
                <img src="" alt="">
            </div>
            <div>
                <div class="AfspraakTXT">
                    Maak een Afspraak:
                </div>
                <form class="form-group" action="<?=$url;?>contact" method="POST">
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="mail">E-mail:</label>
                    <input type="email" id="mail" name="mail" required><br><br>
                    
                    <label for="date">Datum:</label>
                    <input type="date" id="date" name="date"><br><br>
                    
                    <label for="time">Tijd:</label>
                    <input type="time" id="time" name="time"><br><br>

                    <label for="onderwerp">Onderwerp:</label>
                    <input type="text" id="onderwerp" name="onderwerp" required><br><br>
                    
                    <label for="bericht">Bericht:</label>
                    <textarea id="bericht" name="bericht" rows="5" cols="50"></textarea><br><br>
                    
                    <input type="submit" name="versturen" value="Versturen">
                </form>
            </div>

        </div>


    </div>
</div>
