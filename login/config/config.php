<?php
// vul hier alle databasegegevens in
// =================================

define("HOST", "localhost"); // host
define("USER", "jgombert_digifixx"); // gebruikersnaam database
define("PASSWORD", "5.H+AmgFH_Ge"); // wachtwoord database
define("DATABASE", "jgombert_digifixx"); // naam database 

$mysqli = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

// instellingen uit cms ophalen
// ============================
$instellingen = $mysqli->query("SELECT * FROM digifixx_settings WHERE id = '1'") or die($mysqli->error.__LINE__);
$rowinstellingen = $instellingen->fetch_assoc();

// url website
// ===========
if ($rowinstellingen['weburl'] <> "") { $url = $rowinstellingen['weburl']; }
else { $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/~".$ftpuser; }

?>