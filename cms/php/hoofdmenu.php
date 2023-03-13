<ul id="hoofdmenu">
    <span id="title">CMS | <?=ucfirst($rowuser['username']); ?></span>
    <li><a <?php if (!$_GET['page'] or $_GET['page'] == "dashboard") { echo "class=\"active\""; } ?> href="?page=dashboard"><span class="menu-icon ti-view-grid"></span><span class="menu-item">dashboard</span></a></li>
    <li><a <?php if ($_GET['page'] == "webpaginas") { echo "class=\"active\""; } ?> href="?page=webpaginas"><span class="menu-icon ti-files"></span><span class="menu-item">webpagina`s</span></a></li>
    <? if ($rowuser['id'] == "1") { // alleen admin kan deze items aanpassen ?>
        <li><a <?php if ($_GET['page'] == "producten") { echo "class=\"active\""; } ?> href="?page=producten"><span class="menu-icon ti-layout-list-thumb"></span><span class="menu-item">producten</span></a></li>
        <li><a <?php if ($_GET['page'] == "reviews") { echo "class=\"active\""; } ?> href="?page=reviews"><span class="menu-icon ti-tag"></span><span class="menu-item">reviews</span></a></li>
    <? } ?>
    <li><a <?php if ($_GET['page'] == "instellingen") { echo "class=\"active\""; } ?> href="?page=instellingen"><span class="menu-icon ti-settings"></span><span class="menu-item">instellingen</span></a></li>
    <li><a <?php if ($_GET['page'] == "gebruikers") { echo "class=\"active\""; } ?> href="?page=gebruikers"><span class="menu-icon ti-user"></span><span class="menu-item">gebruikers</span></a></li>
</ul>