<?php 
$page = $_SERVER['REQUEST_URI'];
$pagePath = parse_url($page, PHP_URL_PATH);
//print_r(basename($pagePath));
?>
<ul id="hoofdmenu">
    <span id="title">CMS | <?=ucfirst($rowuser['username']); ?></span>
    <li><a <?php if (!isset($_GET['page']) or $_GET['page'] == "dashboard") { echo "class=\"active\""; } ?> href="?page=dashboard"><i class="fa fa-home"></i><span class="menu-item">dashboard</span></a></li>
    <li><a <?php if ($_GET['page'] == "webpaginas") { echo "class=\"active\""; } ?> href="?page=webpaginas"><i class="fa fa-globe"></i><span class="menu-item">webpagina`s</span></a></li>
    <? if ($rowuser['id'] == "1") { // alleen admin kan deze items aanpassen ?>
        <li><a <?php if ($_GET['page'] == "producten") { echo "class=\"active\""; } ?> href="?page=producten"><i class="fa fa-shopping-basket"></i><span class="menu-item">producten</span></a></li>
        <li><a <?php if ($_GET['page'] == "reviews") { echo "class=\"active\""; } ?> href="?page=reviews"><i class="fa fa-search"></i><span class="menu-item">reviews</span></a></li>
    <? } ?>
    <li><a <?php if ($_GET['page'] == "instellingen") { echo "class=\"active\""; } ?> href="?page=instellingen"><i class="fa fa-cog"></i><span class="menu-item">instellingen</span></a></li>
    <li><a <?php if ($_GET['page'] == "gebruikers") { echo "class=\"active\""; } ?> href="?page=gebruikers"><i class="fa fa-user"></i><span class="menu-item">gebruikers</span></a></li>
</ul>