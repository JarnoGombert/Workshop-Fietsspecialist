<div id="topbar">
    <a href="<?=$url;?>" target="_blank">
        <img id="logo" src="images/logo.JPG" height="100">
    </a>
    <div class="right">
        <div id="nieuw">
            <span class="nieuw_menu"><span class="username">Nieuw</span><span class="ti-plus"></span></span>
            <div class="nieuw_opties">            
                <a href="?page=nieuwe_pagina"><span class="menu-icon ti-files"></span>nieuwe pagina</a>
                <a href="?page=nieuwe_gebruiker"><span class="menu-icon ti-user"></span>nieuwe gebruiker</a>
            </div>
        </div>
        <div id="gebruiker">
            <span class="gebruiker_menu"><span class="menu-icon ti-user"></span><span class="username">Welkom <?php echo $rowuser['username'] ?></span><span class="ti-angle-down"></span></span>
            <div class="gebruiker_opties">            
                <a href="?page=gebruiker_bewerken&id=<?php echo $rowuser['id']; ?>"><span class="menu-icon ti-settings"></span>mijn account</a>
                <a href="index.php?uitloggen=ja"><span class="menu-icon ti-lock"></span>uitloggen</a>
            </div>
        </div>
    </div>
    
</div>