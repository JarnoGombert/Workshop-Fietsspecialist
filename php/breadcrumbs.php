<section id="breadcrumbs">
    <div class="container mx-auto">
        <ul itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="<?=$url;?>">        
                    <span itemprop="name">Home</span>
                    <meta itemprop="position" content="1" />
                </a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item">        
                    <span itemprop="name"><?php if(isset($row['item1'])){echo $row['item1'];}else{echo $row['merk'] . " " . $row['model'] . " " . $row['naam'];}?></span>
                    <meta itemprop="position" content="2" />
                </a>
            </li>
        </ul>
    </div>
</section>
