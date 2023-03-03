<?php
    //menu items ophalen
    $sqlMenu = $mysqli -> prepare("SELECT id, item1, paginaurl FROM digifixxcms WHERE keuze = ? AND STATUS = 'actief' LIMIT 4") OR DIE ($mysqli->error.__LINE__);
    $keuze = "hoofdmenu";
    $sqlMenu -> bind_param('s',$keuze);
    $sqlMenu -> execute();
    $sqlMenu -> store_result();
	$sqlMenu -> bind_result($idMenu, $item1Menu, $paginaurlMenu);
?>
<ul class="nav-menu">
    <?php 
        while($sqlMenu->fetch()) 
        {					
            //active status
            if ( $idMenu == $row['id']) 
            {
                $active = 'active';
            }
            else 
            {
                $active = '';
            }

            $link = $url.'/'.$paginaurlMenu;
            
        echo "
            <li class=\"{$active} menu-item\"> 
                <a href=\"{$link}\" >
                    {$item1Menu}
                </a>
            </li>";
        } ?>
        <li><a href="<?=$url;?>winkelwagen"><i class="fa fa-shopping-cart"></i></a></li>   
</ul>