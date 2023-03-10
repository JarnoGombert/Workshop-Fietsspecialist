<ul id="hoofdmenu">
    <span id="title">CMS | <? echo $rowinstellingen['naamwebsite']; ?></span>
    <li><a <?php if (!$_GET['page'] or $_GET['page'] == "dashboard") { echo "class=\"active\""; } ?> href="?page=dashboard"><span class="menu-icon ti-view-grid"></span><span class="menu-item">dashboard</span></a></li>
    <li><a <?php if ($_GET['page'] == "webpaginas") { echo "class=\"active\""; } ?> href="?page=webpaginas"><span class="menu-icon ti-files"></span><span class="menu-item">webpagina`s</span></a></li>
    <? if ($rowinstellingen['makelaar'] == 'ja') { ?>
        <li><a <?php if ($_GET['page'] == "woningen") { echo "class=\"active\""; } ?> href="?makelaar=ja&page=woningen"><span class="menu-icon ti-home"></span><span class="menu-item">woningen</span></a></li>
    <? } ?>
    <? if ($rowinstellingen['makelaar'] == 'ja' && $rowinstellingen['bogaanbod'] == 'ja') { ?>    
        <li><a <?php if ($_GET['page'] == "bedrijfspanden") { echo "class=\"active\""; } ?> href="?makelaar=ja&page=bedrijfspanden"><span class="menu-icon ti-home"></span><span class="menu-item">bedrijfspanden</span></a></li>
    <? } ?>
    <li><a <?php if ($_GET['page'] == "menustructuur") { echo "class=\"active\""; } ?> href="?page=menustructuur"><span class="menu-icon ti-view-list-alt"></span><span class="menu-item">menustructuur</span></a></li>
    <? if ($rowuser['id'] == "1") { // alleen admin kan kenmerk toevoegen ?>
        <li><a <?php if ($_GET['page'] == "categorie") { echo "class=\"active\""; } ?> href="?page=categorie"><span class="menu-icon ti-layout-list-thumb"></span><span class="menu-item">categorie&euml;n</span></a></li>
        <li><a <?php if ($_GET['page'] == "kenmerken") { echo "class=\"active\""; } ?> href="?page=kenmerken"><span class="menu-icon ti-tag"></span><span class="menu-item">kenmerken</span></a></li>
        <li><a <?php if ($_GET['page'] == "blocks") { echo "class=\"active\""; } ?> href="?page=blocks"><span class="menu-icon ti-package"></span><span class="menu-item">blocks</span></a></li>
    <? } ?>
    <li><a <?php if ($_GET['page'] == "cookie") { echo "class=\"active\""; } ?> href="?page=cookie"><span class="menu-icon ti-eye"></span><span class="menu-item">cookiemelding</span></a></li>
    <li><a <?php if ($_GET['page'] == "formulieren") { echo "class=\"active\""; } ?> href="?page=formulieren"><span class="menu-icon ti-email"></span><span class="menu-item">formulieren</span></a></li>
    <li><a <?php if ($_GET['page'] == "socialmedia") { echo "class=\"active\""; } ?> href="?page=socialmedia"><span class="menu-icon ti-face-smile"></span><span class="menu-item">social media</span></a></li>
    <?php if($rowinstellingen['seopakket'] == 'ja'){?><li><a <?php if ($_GET['page'] == "seo") { echo "class=\"active\""; } ?> href="?page=seo"><span class="menu-icon ti-lock"></span><span class="menu-item">Seo</span></a></li><?}?>
    <li><a <?php if ($_GET['page'] == "instellingen") { echo "class=\"active\""; } ?> href="?page=instellingen"><span class="menu-icon ti-settings"></span><span class="menu-item">instellingen</span></a></li>
    <li><a <?php if ($_GET['page'] == "gebruikers") { echo "class=\"active\""; } ?> href="?page=gebruikers"><span class="menu-icon ti-user"></span><span class="menu-item">gebruikers</span></a></li>
    <li><a <?php if ($_GET['page'] == "inlogpogingen") { echo "class=\"active\""; } ?> href="?page=inlogpogingen"><span class="menu-icon ti-lock"></span><span class="menu-item">inlogpogingen</span></a></li>
    <li><a <?php if ($_GET['page'] == "prullenbak") { echo "class=\"active\""; } ?> href="?page=prullenbak"><span class="menu-icon ti-trash"></span><span class="menu-item">prullenbak</span></a></li>
</ul>