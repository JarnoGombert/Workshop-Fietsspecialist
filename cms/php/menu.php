<div id="topbar">
    <a href="/cms/index.php" target="_blank">
    <img id="logo" src="images/logo.JPG" height="40">
    </a>
    <button class="c-hamburger c-hamburger--htx">
            <span></span>
    </button>
    <div id="nieuw">
    <a href="#" class="nieuw_menu"><span class="username">Nieuw</span><span class="ti-plus"></span></a>
    <div class="nieuw_opties">            
        <a href="?page=nieuwe_pagina"><span class="menu-icon ti-files"></span>nieuwe pagina</a>
        <a href="?page=nieuwe_gebruiker"><span class="menu-icon ti-user"></span>nieuwe gebruiker</a>
    </div>
    </div>
    <div id="gebruiker">
    <a href="#" class="gebruiker_menu"><span class="menu-icon ti-user"></span><span class="username"><?php echo $rowuser['username'] ?></span><span class="ti-angle-down"></span></a>
    <div class="gebruiker_opties">            
        <a href="?page=gebruiker_bewerken&id=<?php echo $rowuser['id']; ?>"><span class="menu-icon ti-settings"></span>mijn account</a>
        <a href="index.php?uitloggen=ja"><span class="menu-icon ti-lock"></span>uitloggen</a>
    </div>
    </div>
</div>